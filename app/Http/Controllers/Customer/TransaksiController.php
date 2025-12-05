<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Services\Midtrans\MidtransService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    /**
     * Check if the given order_id is already used by ANOTHER transaction.
     *
     * @param string $orderId
     * @param int $currentId
     * @return bool
     */
    protected function isOrderUsed($orderId, $currentId)
    {
        return Transaction::where('order_id', $orderId)
            ->where('id', '!=', $currentId) // penting: jangan hitung transaksi yg sama
            ->exists();
    }

    public function create($productId)
    {
        $product = Product::where('status', 'active')->findOrFail($productId);
        $user = Auth::user();

        $paket = $product; // alias lama biar view tetap jalan

        return view('customer.paket-data.beli', compact('product', 'paket', 'user'));
    }

    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $user = Auth::user();

        $validated = $request->validate([
            'nomor_hp' => 'required|string|max:15',
            'metode_pembayaran' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $transaksi = Transaction::create([
                'user_id'       => $user->id,
                'product_id'    => $product->id,

                // sesuai database baru
                'order_id' => 'ORDER-' . strtoupper(Str::uuid()),
                'transaction_id' => null,
                'amount'        => $product->price,
                'payment_type'  => $validated['metode_pembayaran'],
                'status'        => 'pending',
            ]);

            DB::commit();

            return redirect()
                ->route('customer.transaksi.pembayaran', $transaksi->id)
                ->with('success', 'Transaksi dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function pembayaran($id)
    {
        $transaksi = Transaction::with('product')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

// Selalu cek apakah transaksi belum punya Snap Token atau halaman di-refresh
if ($this->isOrderUsed($transaksi->order_id, $transaksi->id)) {
    $transaksi->order_id = 'ORDER-' . strtoupper(Str::uuid());
    $transaksi->save();
}

        $midtrans = new MidtransService();

        $params = [
            'transaction_details' => [
                'order_id' => $transaksi->order_id,
                'gross_amount' => $transaksi->amount,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email'      => Auth::user()->email,
                'phone'      => $transaksi->nomor_hp,
            ]
        ];

        $snapToken = $midtrans->createTransaction($params);

        return view('customer.paket-data.pembayaran', compact('transaksi', 'snapToken'));
    }

    public function prosesPembayaran($id)
    {
        $transaksi = Transaction::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $transaksi->update([
            'status' => 'success',
            'updated_at' => now(),
        ]);
        // Perbarui CustomerBehavior via helper supaya behavior tersimpan di DB
        try {
            $this->updateCustomerBehavior($transaksi);
        } catch (\Exception $e) {
            logger()->error('Gagal update CustomerBehavior: ' . $e->getMessage());
        }

        return redirect()
            ->route('customer.transaksi.riwayat')
            ->with('success', 'Pembayaran berhasil! Paket data Anda akan segera aktif.');
    }

    public function riwayat()
    {
        $transaksis = Transaction::with('product')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $transaksi = $transaksis;

        return view('customer.transaksi.index', compact('transaksis', 'transaksi'));
    }

    public function callback(Request $request)
    {
        // ==== 1. Validasi Signature ====
        $serverKey = config('midtrans.server_key');

        $localSignature = hash('sha512',
            $request->order_id .
            $request->status_code .
            $request->gross_amount .
            $serverKey
        );

        if ($localSignature !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // ==== 2. Ambil transaksi ====
        $trx = Transaction::where('order_id', $request->order_id)->first();

        if (!$trx) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // ==== 3. Mapping status ====
        $status = $request->transaction_status;
        $mapped = 'pending';

        if (in_array($status, ['settlement','capture'])) {
            $mapped = 'success';
        }
        if (in_array($status, ['deny','cancel','expire'])) {
            $mapped = 'failed';
        }
        if ($status === 'pending') {
            $mapped = 'pending';
        }

        // ==== 4. Update Transaksi ====
        $trx->update([
            'status'         => $mapped,
            'payment_type'   => $request->payment_type ?? null,
            'transaction_id' => $request->transaction_id ?? null,
        ]);

        // Jika status berubah menjadi success, perbarui CustomerBehavior juga
        if ($mapped === 'success') {
            try {
                $this->updateCustomerBehavior($trx);
            } catch (\Exception $e) {
                logger()->error('Gagal update CustomerBehavior on callback: ' . $e->getMessage());
            }
        }

        return response()->json(['message' => 'OK']);
    }

    /**
     * Cek status transaksi ke Midtrans dan update ke database
     */
    public function checkPaymentStatus($id)
    {
        $transaksi = Transaction::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $midtrans = new MidtransService();
        $status = $midtrans->getTransactionStatus($transaksi->order_id);

        if (!$status) {
            return response()->json(['success' => false, 'message' => 'Gagal cek status ke Midtrans'], 500);
        }

        // Map status dari Midtrans
        $midtransStatus = strtolower($status->transaction_status ?? 'pending');
        $mapped = 'pending';

        if (in_array($midtransStatus, ['settlement', 'capture'])) {
            $mapped = 'success';
        } elseif (in_array($midtransStatus, ['deny', 'cancel', 'expire'])) {
            $mapped = 'failed';
        }

        // Pastikan status valid
        if (!in_array($mapped, ['pending', 'success', 'failed'])) {
            $mapped = 'pending';
        }

        // Update ke database
        $transaksi->update([
            'status'         => $mapped,
            'payment_type'   => $status->payment_type ?? null,
            'transaction_id' => $status->transaction_id ?? null,
        ]);

        // Jika status akhir adalah success, jalankan update CustomerBehavior
        if ($mapped === 'success') {
            try {
                $this->updateCustomerBehavior($transaksi);
            } catch (\Exception $e) {
                Log::error('Gagal update CustomerBehavior on checkPaymentStatus: ' . $e->getMessage());
            }
        }

        Log::info('Check payment status', [
            'order_id' => $transaksi->order_id,
            'midtrans_status' => $midtransStatus,
            'mapped_status' => $mapped,
        ]);

        return response()->json([
            'success' => true,
            'status' => $mapped,
            'message' => 'Status transaksi berhasil diperbarui'
        ]);
    }

    /**
     * Mapping kebiasaan berdasarkan kategori ML produk.
     */
    /**
     * Update or merge CustomerBehavior for given transaction.
     */
    private function updateCustomerBehavior($transaksi)
    {
        if (!$transaksi) return;

        $product = $transaksi->product;
        $userId = $transaksi->user_id;

        if (!$userId) return;

        $behavior = \App\Models\CustomerBehavior::where('user_id', $userId)->latest()->first();
        if (!$behavior) {
            $behavior = \App\Models\CustomerBehavior::create([
                'user_id' => $userId,
                'plan_type' => 'Unknown',
                'device_brand' => 'Generic',
                'avg_data_usage_gb' => 0,
                'pct_video_usage' => 0,
                'avg_call_duration' => 0,
                'sms_freq' => 0,
                'monthly_spend' => 0,
                'topup_freq' => 0,
                'travel_score' => 0,
                'complaint_count' => 0,
            ]);
        }

        $preset = $this->behaviorPresetForCategory($product->ml_category ?? null);

        // Incremental aggregates
        $behavior->monthly_spend = ($behavior->monthly_spend ?? 0) + ($transaksi->amount ?? 0);
        $behavior->topup_freq = ($behavior->topup_freq ?? 0) + ($preset['topup_freq_delta'] ?? 1);

        // Soft update (moving average) untuk fitur kontinu
        $behavior->avg_data_usage_gb = $this->blendValue($behavior->avg_data_usage_gb, $preset['avg_data_usage_gb']);
        $behavior->pct_video_usage = $this->blendValue($behavior->pct_video_usage, $preset['pct_video_usage']);
        $behavior->avg_call_duration = $this->blendValue($behavior->avg_call_duration, $preset['avg_call_duration']);
        $behavior->sms_freq = $this->blendValue($behavior->sms_freq, $preset['sms_freq']);
        $behavior->travel_score = $this->blendValue($behavior->travel_score, $preset['travel_score']);
        $behavior->complaint_count = max(0, (int) ($behavior->complaint_count ?? 0) + ($preset['complaint_delta'] ?? 0));

        // Kategori atribut
        $behavior->plan_type = $preset['plan_type'] ?? ($behavior->plan_type ?: 'Prepaid');
        $behavior->device_brand = $preset['device_brand'] ?? ($behavior->device_brand ?: 'Generic');

        $behavior->save();
    }

    /**
     * Mapping kebiasaan berdasarkan kategori ML produk.
     */
    private function behaviorPresetForCategory(?string $category): array
    {
        $default = [
            'plan_type' => 'Prepaid',
            'device_brand' => 'Generic',
            'avg_data_usage_gb' => 25,
            'pct_video_usage' => 30,
            'avg_call_duration' => 8,
            'sms_freq' => 10,
            'travel_score' => 1,
            'complaint_delta' => 0,
            'topup_freq_delta' => 1,
        ];

        $presets = [
            'Data Booster' => [
                'avg_data_usage_gb' => 45,
                'pct_video_usage' => 55,
                'avg_call_duration' => 6,
                'sms_freq' => 5,
                'topup_freq_delta' => 2,
            ],
            'General Offer' => [
                'avg_data_usage_gb' => 35,
                'pct_video_usage' => 40,
                'avg_call_duration' => 10,
            ],
            'Device Upgrade Offer' => [
                'plan_type' => 'Postpaid',
                'avg_data_usage_gb' => 40,
                'pct_video_usage' => 45,
                'avg_call_duration' => 12,
                'device_brand' => 'Premium Device',
            ],
            'Roaming Pass' => [
                'travel_score' => 4,
                'avg_data_usage_gb' => 25,
                'pct_video_usage' => 20,
                'avg_call_duration' => 6,
            ],
            'Streaming Partner Pack' => [
                'pct_video_usage' => 90,
                'avg_data_usage_gb' => 60,
                'avg_call_duration' => 4,
                'sms_freq' => 4,
            ],
            'Retention Offer' => [
                'plan_type' => 'Postpaid',
                'avg_data_usage_gb' => 30,
                'pct_video_usage' => 35,
                'avg_call_duration' => 10,
                'complaint_delta' => -1,
            ],
            'Top-up Promo' => [
                'avg_data_usage_gb' => 28,
                'pct_video_usage' => 25,
                'topup_freq_delta' => 3,
                'sms_freq' => 12,
            ],
            'Voice Bundle' => [
                'avg_call_duration' => 25,
                'sms_freq' => 18,
                'pct_video_usage' => 10,
                'avg_data_usage_gb' => 15,
            ],
            'Family Plan Offer' => [
                'plan_type' => 'Postpaid',
                'avg_data_usage_gb' => 50,
                'pct_video_usage' => 60,
                'topup_freq_delta' => 2,
                'sms_freq' => 15,
            ],
        ];

        return array_merge($default, $presets[$category] ?? []);
    }

    /**
     * Membaurkan nilai lama dengan preset agar perubahan lebih halus (moving average).
     */
    private function blendValue($current, $target, float $weight = 0.35)
    {
        $current = $current ?? 0;
        return round(($current * (1 - $weight)) + ($target * $weight), 2);
    }
}

