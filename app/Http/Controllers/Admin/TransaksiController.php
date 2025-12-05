<?php

namespace App\Http\Controllers\Admin; // <--- Namespace HARUS Admin

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    // Halaman daftar semua transaksi masuk (Admin View)
    public function index()
    {
        // Load relasi user dan product agar tidak N+1 problem
        // Urutkan dari yang terbaru
        $transaksi = Transaksi::with(['user', 'product'])
            ->latest()
            ->paginate(10);

        return view('admin.transaksi.index', compact('transaksi'));
    }

    // Proses Admin Menyetujui / Menolak Pembayaran
    public function updateStatus(Request $request, $id)
    {
        // Validasi input status
        $request->validate([
            'status' => 'required|in:pending,success,failed'
        ]);

        $transaksi = Transaksi::findOrFail($id);
        
        // Update status
        $transaksi->update([
            'status' => $request->status,
            'updated_at' => now() // Opsional: update timestamp
        ]);

        return back()->with('success', 'Status transaksi berhasil diubah menjadi ' . $request->status);
    }
}