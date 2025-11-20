@extends('layouts.app')

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
        }
    </style>
@endsection

@section('content')
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <p>📭 Tidak ada data transaksi</p>
            </div>
        @endif
    </div>
</div>
@endsection
