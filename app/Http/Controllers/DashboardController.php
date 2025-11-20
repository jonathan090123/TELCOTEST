<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PaketData;
use App\Models\Transaksi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Statistik untuk user
        $totalTransaksi = Transaksi::where('user_id', $user->id)->count();
        $transaksiPending = Transaksi::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();
        $transaksiBerhasil = Transaksi::where('user_id', $user->id)
            ->where('status', 'success')
            ->count();
        
        // Transaksi terakhir
        $transaksiTerakhir = Transaksi::with('paketData')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Paket data populer
        $paketPopuler = PaketData::where('status', 'active')
            ->orderBy('harga', 'asc')
            ->limit(3)
            ->get();
        
        return view('dashboard', compact(
            'user',
            'totalTransaksi',
            'transaksiPending',
            'transaksiBerhasil',
            'transaksiTerakhir',
            'paketPopuler'
        ));
    }

    public function adminDashboard()
    {
        // Admin dapat melihat statistik global
        $totalUsers = User::count();
        $totalTransaksi = Transaksi::count();
        $adminUsers = User::where('role', 'admin')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalTransaksi',
            'adminUsers'
        ));
    }

    public function transaksiCustomer()
    {
        $user = Auth::user();
        $transaksis = Transaksi::where('user_id', $user->id)
            ->with('paketData')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('transaksi.index', compact('transaksis'));
    }

    public function transaksiIndex()
    {
        // Admin melihat semua transaksi
        $transaksis = Transaksi::with('paketData', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.transaksi.index', compact('transaksis'));
    }
}