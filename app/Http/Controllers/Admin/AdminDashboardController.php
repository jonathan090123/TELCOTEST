<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Product; // Model baru

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistik Global untuk Admin
        $totalUsers = User::count();
        $totalTransaksi = Transaksi::count();
        $totalProduk = Product::count();
        $pendapatan = Transaksi::where('status', 'success')->sum('harga');

        // Transaksi Terbaru (Global)
        $transaksiTerbaru = Transaksi::with(['user', 'product'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalTransaksi',
            'totalProduk',
            'pendapatan',
            'transaksiTerbaru'
        ));
    }
}