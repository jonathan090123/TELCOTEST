@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('extra-styles')
    <style>
        .transaksi-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
        }

        .transaksi-header {
            margin-bottom: 2rem;
            border-bottom: 2px solid #667eea;
            padding-bottom: 1rem;
        }

        .transaksi-header h1 {
            color: #333;
            font-size: 2rem;
        }

        .filter-section {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        .transaksi-table {
            width: 100%;
            border-collapse: collapse;
        }

        .transaksi-table thead {
            background: #667eea;
            color: white;
        }

        .transaksi-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .transaksi-table td {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
        }

        .transaksi-table tbody tr:hover {
            background: #f8f9fa;
        }

        .status-badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
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

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #f0f0f0;
            color: #333;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        @media (max-width: 768px) {
            .transaksi-table {
                font-size: 0.9rem;
            }

            .transaksi-table th,
            .transaksi-table td {
                padding: 0.7rem;
            }
        }
    </style>
@endsection

@section('content')
<div class="transaksi-container">
    <div class="transaksi-header">
        <h1>💳 Riwayat Transaksi</h1>
    </div>

        <div class="filter-section">
        <a href="{{ route('home') }}#paket-data" class="btn">Kembali ke Beranda</a>
    </div>

    @if($transaksis->count() > 0)
        <div class="table-container">
            <table class="transaksi-table">
                <thead>
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Paket Data</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksis as $transaksi)
                        <tr>
                            <td>
                                <strong>{{ $transaksi->kode_transaksi ?? '-' }}</strong>
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
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="table-container">
            <div class="empty-state">
                <div class="empty-state-icon">📭</div>
                <h3>Belum ada transaksi</h3>
                <p>Anda belum melakukan pembelian paket data</p>
                    <div style="margin-top: 1.5rem;">
                    <a href="{{ route('home') }}#paket-data" class="btn">Beli Paket Data</a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
