<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\MlProductMapping;
use App\Models\Transaction;
use App\Models\CustomerBehavior;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 0. Ambil semua transaksi user untuk kalkulasi total pengeluaran
        $transaksi = Transaction::where('user_id', $user->id)->get();

        // 1. STATISTIK USER
        $totalTransaksi = Transaction::where('user_id', $user->id)->count();
        $transaksiPending = Transaction::where('user_id', $user->id)
                                       ->where('status', 'pending')
                                       ->count();
        $transaksiBerhasil = Transaction::where('user_id', $user->id)
                                        ->where('status', 'success')
                                        ->count();

        // Ambil 5 transaksi terakhir
        // Jika sebelumnya ada relasi 'paketData', biarkan saja (tidak dihapus)
        $transaksiTerakhir = Transaction::with(['product'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // 2. LOGIKA REKOMENDASI ML (TIDAK DIUBAH)
        $operator = $this->detectOperator($user->phone_number);
        $behavior = CustomerBehavior::where('user_id', $user->id)->latest()->first();

        $rekomendasi = [];
        $sumber = '';

        if ($behavior) {
            $sumber = 'Selamat Datang Kembali';
            try {
                $payload = [
                    'operator'          => $operator,
                    'plan_type'         => $behavior->plan_type,
                    'device_brand'      => $behavior->device_brand,
                    'avg_data_usage_gb' => $behavior->avg_data_usage_gb,
                    'pct_video_usage'   => $behavior->pct_video_usage,
                    'avg_call_duration' => $behavior->avg_call_duration,
                    'sms_freq'          => $behavior->sms_freq,
                    'monthly_spend'     => $behavior->monthly_spend,
                    'topup_freq'        => $behavior->topup_freq,
                    'travel_score'      => $behavior->travel_score,
                    'complaint_count'   => $behavior->complaint_count,
                ];

                $apiUrl = env('ML_API_URL', 'http://127.0.0.1:5000/recommend');
                $response = Http::timeout(5)->post($apiUrl, $payload);

                if ($response->successful()) {
                    $hasil_ml = $response->json()['rekomendasi_teratas'];

                    foreach ($hasil_ml as $item) {
                        $kategori_ai = $item['kategori_ai'] ?? null;
                        $nama_produk = $item['produk'] ?? null;
                        $keyakinan   = $item['keyakinan'] ?? null;

                        $produk_db = null;

                        try {
                            $mappingQuery = MlProductMapping::where('operator', $operator);

                            if ($nama_produk) {
                                $mappingQuery = $mappingQuery
                                    ->where(function ($q) use ($nama_produk) {
                                        $q->where('ml_produk', $nama_produk)
                                          ->orWhereRaw('LOWER(ml_produk) LIKE ?', ['%' . strtolower($nama_produk) . '%']);
                                    });
                            }

                            if ($kategori_ai) {
                                $mappingQuery = $mappingQuery->orWhere('ml_kategori', $kategori_ai);
                            }

                            $mapping = $mappingQuery->whereNotNull('product_id')->first();
                            if ($mapping && $mapping->product_id) {
                                $produk_db = Product::find($mapping->product_id);
                            }
                        } catch (\Exception $e) {
                            logger()->warning('ML mapping lookup failed: ' . $e->getMessage());
                        }

                        // FALLBACK fuzzy match
                        if (!$produk_db && $nama_produk) {
                            $needle = strtolower($nama_produk);
                            $produk_db = Product::where('operator', $operator)
                                ->whereRaw('LOWER(product_name) LIKE ?', ["%{$needle}%"])
                                ->first();
                        }

                        if (!$produk_db && $kategori_ai) {
                            $kat = trim($kategori_ai);
                            $produk_db = Product::where('operator', $operator)
                                ->where('ml_category', $kat)
                                ->inRandomOrder()
                                ->first();

                            if (!$produk_db) {
                                $produk_db = Product::where('operator', $operator)
                                    ->whereRaw('LOWER(ml_category) LIKE ?', ['%' . strtolower($kat) . '%'])
                                    ->inRandomOrder()
                                    ->first();
                            }
                        }

                        if ($produk_db) {
                            $produk_db->keyakinan = $keyakinan;
                            $rekomendasi[] = $produk_db;
                        }
                    }
                } else {
                    $sumber = 'API Error - Menampilkan Populer';
                    $rekomendasi = $this->getPopularProducts($operator);
                }
            } catch (\Exception $e) {
                $sumber = 'Server ML Offline - Menampilkan Populer';
                $rekomendasi = $this->getPopularProducts($operator);
            }

        } else {
            $sumber = 'User Baru - Produk Terpopuler';
            $rekomendasi = $this->getPopularProducts($operator);
        }

        return view('dashboard', compact(
            'user',
            'totalTransaksi',
            'transaksiPending',
            'transaksiBerhasil',
            'transaksiTerakhir',
            'rekomendasi',
            'operator',
            'sumber',
            'transaksi'
        ));
    }

    private function getPopularProducts($operator)
{
    return Product::select('products.*')
        ->leftJoin('transactions', 'transactions.product_id', '=', 'products.id')
        ->where('products.operator', $operator)
        ->where('transactions.status', 'success')
        ->selectRaw('COUNT(transactions.id) as total_transaksi')
        ->groupBy('products.id')
        ->orderByDesc('total_transaksi')
        ->take(6)
        ->get();
}

    private function detectOperator($phone)
    {
        $prefix = substr($phone, 0, 4);

        if (in_array($prefix, ['0811','0812','0813','0821','0822','0823','0852','0853'])) return 'Telkomsel';
        if (in_array($prefix, ['0814','0815','0816','0855','0856','0857','0858'])) return 'Indosat';
        if (in_array($prefix, ['0817','0818','0819','0859','0877','0878'])) return 'XL';
        if (in_array($prefix, ['0895','0896','0897','0898','0899'])) return 'Tri';
        if (in_array($prefix, ['0881','0882','0883','0884','0885','0886','0887','0888','0889'])) return 'Smartfren';

        return 'Telkomsel';
    }
}
