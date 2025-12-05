<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction; // Model baru
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // 1. LOGIC PRODUK (tetap sama)
        $query = Product::query();

        // Jika ada filter operator di querystring, gunakan itu.
        if ($request->has('operator') && $request->operator) {
            $query->where('operator', $request->operator);
        } else {
            // Jika user terautentikasi, deteksi operator berdasarkan nomor HP dan filter otomatis
            if (Auth::check()) {
                $user = Auth::user();
                $detected = $this->detectOperator($user->phone_number ?? '');
                if ($detected) {
                    $query->where('operator', $detected);
                }
            }
        }

        $products = $query->where('status', 'active')
            ->orderBy('price', 'asc')
            ->get();

        // 2. LOGIC TRANSAKSI (pakai model baru Transaction)
        $transaksi = Transaction::where('user_id', Auth::id())
            ->where('status', 'success')  // opsional
            ->get();

        // 3. KIRIM KE VIEW (pakai nama variabel lama biar tidak error)
        return view('customer.paket-data.index', [
            'paketData' => $products,
            'transaksis' => $transaksi,  // view lama pakai ini
            'transaksi' => $transaksi,   // alias tambahan
        ]);
    }

    public function show($id)
    {
        $product = Product::where('status', 'active')->findOrFail($id);

        return view('customer.paket-data.show', ['paket' => $product]);
    }

    /**
     * Detect operator from phone prefix (same logic as DashboardController)
     */
    private function detectOperator($phone)
    {
        $phone = (string) $phone;
        if (strlen($phone) < 4) return null;
        $prefix = substr($phone, 0, 4);

        if (in_array($prefix, ['0811','0812','0813','0821','0822','0823','0852','0853'])) return 'Telkomsel';
        if (in_array($prefix, ['0814','0815','0816','0855','0856','0857','0858'])) return 'Indosat';
        if (in_array($prefix, ['0817','0818','0819','0859','0877','0878'])) return 'XL';
        if (in_array($prefix, ['0895','0896','0897','0898','0899'])) return 'Tri';
        if (in_array($prefix, ['0881','0882','0883','0884','0885','0886','0887','0888','0889'])) return 'Smartfren';

        return null;
    }
}
