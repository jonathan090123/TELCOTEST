<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketData;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaketDataController extends Controller
{
    // Tampilkan semua paket data
    public function index()
    {
        $paketData = PaketData::where('status', 'active')
            ->orderBy('harga', 'asc')
            ->get();
        
        return view('customer.paket-data.index', compact('paketData'));
    }

    // Tampilkan detail paket
    public function show($id)
    {
        $paket = PaketData::findOrFail($id);
        return view('customer.paket-data.show', compact('paket'));
    }

    // Halaman form beli paket
    public function beliPaket($id)
    {
        $paket = PaketData::findOrFail($id);
        $user = Auth::user();
        
        return view('customer.paket-data.beli', compact('paket', 'user'));
    }

    // Proses pembelian paket
    public function prosesBeliPaket(Request $request, $id)
    {
        $paket = PaketData::findOrFail($id);
        $user = Auth::user();

        $validated = $request->validate([
            'nomor_hp' => 'required|string|max:15',
            'metode_pembayaran' => 'required|in:transfer,ewallet,gopay,ovo,dana',
        ]);

        DB::beginTransaction();
        try {
            // Buat transaksi
            $transaksi = Transaksi::create([
                'user_id' => $user->id,
                'paket_data_id' => $paket->id,
                'nomor_hp' => $validated['nomor_hp'],
                'harga' => $paket->harga,
                'metode_pembayaran' => $validated['metode_pembayaran'],
                'status' => 'pending',
                'kode_transaksi' => 'TRX' . date('Ymd') . rand(1000, 9999),
            ]);

            DB::commit();

            // Redirect user to pembayaran page for this transaksi
            return redirect()
                ->route('paket-data.pembayaran.show', $transaksi->id)
                ->with('success', 'Transaksi dibuat. Silakan selesaikan pembayaran.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Riwayat pembelian
    public function riwayat()
    {
        $transaksi = Transaksi::with('paketData')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('customer.paket-data.riwayat', compact('transaksi'));
    }

    // Tampilkan halaman pembayaran untuk transaksi tertentu
    public function showPembayaran($transaksiId)
    {
        $transaksi = Transaksi::with('paketData')
            ->where('id', $transaksiId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('customer.paket-data.pembayaran', compact('transaksi'));
    }

    // Proses pembayaran (dummy) — tandai transaksi sebagai success
    public function prosesPembayaran(Request $request, $transaksiId)
    {
        $transaksi = Transaksi::where('id', $transaksiId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // In real app: integrate payment gateway here. For now we mark success.
        $transaksi->status = 'success';
        $transaksi->save();

        return redirect()
            ->route('paket-data.riwayat')
            ->with('success', 'Pembayaran berhasil. Paket akan segera diaktifkan.');
    }

    // ===== ADMIN FUNCTIONS =====
    
    // Create paket baru
    public function create()
    {
        return view('admin.paket-data.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kuota' => 'required|string|max:50',
            'masa_aktif' => 'required|integer',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        PaketData::create($validated);

        return redirect()
            ->route('admin.paket-data.index')
            ->with('success', 'Paket data berhasil ditambahkan!');
    }

    // Edit paket
    public function edit($id)
    {
        $paket = PaketData::findOrFail($id);
        return view('admin.paket-data.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $paket = PaketData::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kuota' => 'required|string|max:50',
            'masa_aktif' => 'required|integer',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $paket->update($validated);

        return redirect()
            ->route('admin.paket-data.index')
            ->with('success', 'Paket data berhasil diupdate!');
    }

    // Hapus paket
    public function destroy($id)
    {
        $paket = PaketData::findOrFail($id);
        $paket->delete();

        return redirect()
            ->route('admin.paket-data.index')
            ->with('success', 'Paket data berhasil dihapus!');
    }
}