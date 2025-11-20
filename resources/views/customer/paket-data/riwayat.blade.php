@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('extra-styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .page-header p {
            color: #666;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .transaction-table {
            width: 100%;
            border-collapse: collapse;
        }

        .transaction-table thead {
            background: #f8f9fa;
        }

        .transaction-table th {
            padding: 1rem;
            text-align: left;
            color: #666;
            font-weight: 600;
            border-bottom: 2px solid #e9ecef;
        }

        .transaction-table td {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            color: #333;
        }

        .transaction-table tbody tr:hover {
            background: #f8f9fa;
        }

        .badge {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge-pending {
            background: #fff3cd;
            color: #856404;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-failed {
            background: #f8d7da;
            color: #721c24;
        }

        .badge-cancelled {
            background: #e2e3e5;
            color: #383d41;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #666;
        }

        .empty-state .icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            margin-bottom: 0.5rem;
        }

        .empty-state a {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.8rem 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .pagination a,
        .pagination span {
            padding: 0.5rem 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            text-decoration: none;
            color: #333;
        }

        .pagination .active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-color: #667eea;
        }

        @media (max-width: 768px) {
            .transaction-table {
                font-size: 0.85rem;
            }

            .transaction-table th,
            .transaction-table td {
                padding: 0.8rem 0.5rem;
            }
        }
    </style>
@endsection

@section('content')
        <div class="page-header">
            <h1>📜 Riwayat Transaksi</h1>
            <p>Lihat semua riwayat pembelian paket data Anda</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            @if($transaksi->count() > 0)
                <div style="overflow-x: auto;">
                    <table class="transaction-table">
                        <thead>
                            <tr>
                                <th>Kode Transaksi</th>
                                <th>Paket</th>
                                <th>Nomor HP</th>
                                <th>Harga</th>
                                <th>Metode</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksi as $item)
                                <tr>
                                    <td><strong>{{ $item->kode_transaksi }}</strong></td>
                                    <td>{{ $item->paketData->nama }}</td>
                                    <td>{{ $item->nomor_hp }}</td>
                                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>{{ ucfirst($item->metode_pembayaran) }}</td>
                                    <td>
                                        <span class="badge badge-{{ $item->status }}">
                                            @if($item->status == 'pending')
                                                ⏳ Pending
                                            @elseif($item->status == 'success')
                                                ✅ Berhasil
                                            @elseif($item->status == 'failed')
                                                ❌ Gagal
                                            @else
                                                🚫 Dibatalkan
                                            @endif
                                        </span>
                                    </td>
                                    <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($transaksi->hasPages())
                    <div class="pagination">
                        @if ($transaksi->onFirstPage())
                            <span>« Prev</span>
                        @else
                            <a href="{{ $transaksi->previousPageUrl() }}">« Prev</a>
                        @endif

                        @foreach ($transaksi->getUrlRange(1, $transaksi->lastPage()) as $page => $url)
                            @if ($page == $transaksi->currentPage())
                                <span class="active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($transaksi->hasMorePages())
                            <a href="{{ $transaksi->nextPageUrl() }}">Next »</a>
                        @else
                            <span>Next »</span>
                        @endif
                    </div>
                @endif
            @else
                <div class="empty-state">
                    <div class="icon">📭</div>
                    <h3>Belum Ada Transaksi</h3>
                    <p>Anda belum melakukan pembelian paket data</p>
                    <a href="{{ route('paket-data.index') }}">Lihat Paket Data</a>
                </div>
            @endif
        </div>
    </div>
@endsection
