@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Riwayat Transaksi')

@section('extra-styles')
    <style>
        /* --- GAYA SESUAI DASHBOARD BARU --- */
        
        .page-container {
            max-width: 1200px; margin: 0 auto; padding: 2rem;
        }

        /* HEADER */
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; padding: 2.5rem; border-radius: 15px;
            margin-bottom: 2rem; box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            display: flex; justify-content: space-between; align-items: center;
        }
        .page-header h1 { font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; }
        .page-header p { opacity: 0.9; font-size: 1rem; }
        
        .stat-info { text-align: right; }
        .stat-number { font-size: 2.2rem; font-weight: 700; }
        .stat-label { font-size: 0.9rem; opacity: 0.9; }

        /* TABLE CARD */
        .content-card {
            background: white; border-radius: 15px; padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); border: 1px solid #f0f0f0;
        }

        .table-responsive { overflow-x: auto; }
        
        .custom-table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        .custom-table th {
            background: #f8f9fa; color: #666; font-weight: 600; padding: 1rem;
            text-align: left; border-bottom: 2px solid #e9ecef;
            text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.5px;
        }
        .custom-table td {
            padding: 1rem; border-bottom: 1px solid #f1f1f1; color: #333; vertical-align: middle;
        }
        .custom-table tr:hover { background: #fcfcfc; }
        .custom-table tr:last-child td { border-bottom: none; }

        /* BADGES */
        .badge {
            padding: 0.4rem 0.8rem; border-radius: 20px; font-size: 0.75rem;
            font-weight: 700; text-transform: capitalize; display: inline-block;
        }
        .badge-success { background: #d1e7dd; color: #0f5132; }
        .badge-pending { background: #fff3cd; color: #856404; }
        .badge-failed { background: #f8d7da; color: #842029; }

        /* BUTTONS */
        .btn-back {
            background: rgba(255,255,255,0.2); color: white;
            padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none;
            font-weight: 600; font-size: 0.9rem; transition: background 0.2s;
            border: 1px solid rgba(255,255,255,0.3);
        }
        .btn-back:hover { background: rgba(255,255,255,0.3); }

        /* EMPTY STATE */
        .empty-state { text-align: center; padding: 4rem 2rem; color: #999; }
        .empty-icon { font-size: 4rem; margin-bottom: 1rem; opacity: 0.5; }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; padding: 0.8rem 1.5rem; border-radius: 25px;
            text-decoration: none; font-weight: 600; display: inline-block;
            transition: transform 0.2s;
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3); }

        @media (max-width: 768px) {
            .page-header { flex-direction: column; text-align: center; gap: 1.5rem; }
            .stat-info { text-align: center; }
            .btn-back { margin-top: 10px; }
=======
@section('title', 'Manajemen Transaksi')

@section('extra-styles')
    <style>
        .transaksi-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .transaksi-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .transaksi-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
        }

        .transaksi-header p {
            opacity: 0.9;
            margin-top: 0.5rem;
        }

        .stat-info {
            text-align: right;
        }

        .stat-info .number {
            font-size: 2.2rem;
            font-weight: 700;
        }

        .stat-info .label {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-top: 0.3rem;
        }

        .transaksi-content {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #f0f0f0;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #f8f9fa;
            border-bottom: 2px solid #e0e0e0;
        }

        table thead th {
            padding: 1.2rem;
            text-align: left;
            color: #667eea;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        table tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: all 0.3s ease;
        }

        table tbody tr:hover {
            background: #f8f9ff;
        }

        table tbody td {
            padding: 1.2rem;
            color: #333;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-success {
            background: #d4edda;
            color: #155724;
        }

        .status-failed {
            background: #f8d7da;
            color: #721c24;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #999;
        }

        .empty-state p {
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            .transaksi-header {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }

            .stat-info {
                text-align: center;
            }

            .transaksi-container {
                padding: 1rem;
            }

            table {
                font-size: 0.9rem;
            }

            table thead th,
            table tbody td {
                padding: 0.8rem;
            }
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
        }
    </style>
@endsection

@section('content')
<<<<<<< HEAD
<div class="page-container">
    
    <!-- Header (Ungu Gradasi) -->
    <div class="page-header">
        <div>
            <h1>💳 Riwayat Transaksi</h1>
            <p>Daftar lengkap pembelian paket data Anda</p>
        </div>
        <div class="stat-info">
            <div class="stat-number">{{ $transaksi->count() }}</div>
            <div class="stat-label">Total Transaksi</div>
            <div style="margin-top: 1rem;">
                <a href="{{ route('dashboard') }}" class="btn-back">← Kembali ke Dashboard</a>
            </div>
        </div>
    </div>

    <!-- Content Card -->
    <div class="content-card">
        
        @if(session('success'))
            <div class="alert alert-success" style="background:#d1e7dd; color:#0f5132; padding:1rem; border-radius:10px; margin-bottom:1.5rem;">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if($transaksi->count() > 0)
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Kode TRX</th>
                            <th>Paket Data</th>
                            <th>Nomor Tujuan</th>
                            <th>Harga</th>
                            <th>Metode</th>
=======
<div class="transaksi-container">
    <div class="transaksi-header">
        <div>
            <h1>💳 Manajemen Transaksi</h1>
            <p>Lihat dan kelola semua transaksi pengguna</p>
        </div>
        <div class="stat-info">
            <div class="number">{{ $transaksis->count() }}</div>
            <div class="label">Total Transaksi</div>
        </div>
    </div>

    <div class="transaksi-content">
        @if($transaksis->count() > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Kode Transaksi</th>
                            <th>User</th>
                            <th>Paket Data</th>
                            <th>Harga</th>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
<<<<<<< HEAD
                        @foreach($transaksi as $item)
                            <tr>
                                <!-- Kode Transaksi -->
                                <td>
                                    <span style="font-family: monospace; color: #667eea; font-weight: bold;">
                                        {{ $item->kode_transaksi ?? '-' }}
                                    </span>
                                </td>

                                <!-- Nama Paket (Hybrid Logic) -->
                                <td>
                                    <div style="font-weight: 600;">
                                        @if($item->paketData)
                                            {{ $item->paketData->nama }}
                                        @elseif($item->product)
                                            {{ $item->product->product_name }}
                                        @else
                                            <span style="color: #999; font-style: italic;">Produk tidak tersedia</span>
                                        @endif
                                    </div>
                                </td>

                                <!-- Nomor HP -->
                                <td>{{ $item->nomor_hp }}</td>

                                <!-- Harga -->
                                <td>
                                    <strong>Rp {{ number_format($item->harga ?? 0, 0, ',', '.') }}</strong>
                                </td>

                                <!-- Metode Pembayaran -->
                                <td>
                                    <span style="color: #666; font-size: 0.9rem;">
                                        {{ ucfirst($item->metode_pembayaran) }}
                                    </span>
                                </td>

                                <!-- Status Badge -->
                                <td>
                                    @php
                                        $status = $item->status ?? 'pending';
                                        $badgeClass = 'badge-' . ($status == 'success' ? 'success' : ($status == 'pending' ? 'pending' : 'failed'));
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>

                                <!-- Tanggal -->
                                <td style="color: #888; font-size: 0.85rem;">
                                    {{ $item->created_at->format('d M Y, H:i') }}
                                </td>
                            </tr>
=======
                        @foreach($transaksis as $transaksi)
                        <tr>
                            <td>
                                <strong>{{ $transaksi->kode_transaksi ?? '-' }}</strong>
                            </td>
                            <td>
                                @if($transaksi->user)
                                    {{ $transaksi->user->name }}<br>
                                    <small style="color: #999;">{{ $transaksi->user->email }}</small>
                                @else
                                    User dihapus
                                @endif
                            </td>
                            <td>
                                @if($transaksi->paketData)
                                    {{ $transaksi->paketData->nama }}
                                @else
                                    Paket dihapus
                                @endif
                            </td>
                            <td>
                                Rp {{ number_format($transaksi->harga ?? 0, 0, ',', '.') }}
                            </td>
                            <td>
                                @php
                                    $status = $transaksi->status ?? 'pending';
                                    $badgeClass = 'status-' . $status;
                                @endphp
                                <span class="status-badge {{ $badgeClass }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                            <td>
                                {{ $transaksi->created_at->format('d M Y H:i') }}
                            </td>
                        </tr>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
                        @endforeach
                    </tbody>
                </table>
            </div>
<<<<<<< HEAD

            <!-- Pagination (Jika ada) -->
            @if(method_exists($transaksi, 'hasPages') && $transaksi->hasPages())
                <div style="margin-top: 2rem; display: flex; justify-content: center;">
                    {{ $transaksi->links() }}
                </div>
            @endif

        @else
            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <h3>Belum Ada Transaksi</h3>
                <p>Anda belum pernah melakukan pembelian paket data.</p>
                <a href="{{ route('home') }}#paket-data" class="btn-primary">Mulai Belanja</a>
=======
        @else
            <div class="empty-state">
                <p>📭 Tidak ada data transaksi</p>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
            </div>
        @endif
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
