@extends('layouts.app')

@section('title', 'Pembayaran ' . $transaksi->kode_transaksi)

@section('content')
    <div class="container" style="max-width:800px; margin:3rem auto;">
        <div style="background:white; padding:2rem; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.08);">
            <h2>Bayar Transaksi</h2>
            <p>Kode Transaksi: <strong>{{ $transaksi->kode_transaksi }}</strong></p>
            <p>Paket: <strong>{{ $transaksi->paketData->nama }}</strong></p>
            <p>Nomor Tujuan: <strong>{{ $transaksi->nomor_hp }}</strong></p>
            <p>Total: <strong>Rp {{ number_format($transaksi->harga,0,',','.') }}</strong></p>
            <p>Metode: <strong>{{ ucfirst($transaksi->metode_pembayaran) }}</strong></p>
            <p>Status: <strong>{{ ucfirst($transaksi->status) }}</strong></p>

            <form action="{{ route('paket-data.pembayaran.proses', $transaksi->id) }}" method="POST">
                @csrf
                <p class="mt-3">Klik tombol "Selesaikan Pembayaran" untuk menyelesaikan (demo).</p>
                <button type="submit" class="btn btn-primary">Selesaikan Pembayaran</button>
                <a href="{{ route('paket-data.riwayat') }}" class="btn btn-secondary">Kembali ke Riwayat</a>
            </form>
        </div>
    </div>
@endsection
