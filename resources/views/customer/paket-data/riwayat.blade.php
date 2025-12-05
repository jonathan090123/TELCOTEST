@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('extra-styles')
    <style>
        .container-fluid {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.5rem;
        }

        /* HEADER (Sama dengan Dashboard) */
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem 2rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            display: flex;
            flex-direction: column;
            gap: 1rem;
            justify-content: space-between;
            align-items: flex-start;
        }

        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .page-header p {
            opacity: 0.9;
            font-size: 0.95rem;
            margin: 0;
        }

        /* CARD TABLE */
        .table-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            overflow: hidden;
            border: 1px solid #e9ecef;
        }

        /* TABLE STYLES - responsive wrapper */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        .custom-table th {
            background: #f8f9fa;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #666;
            border-bottom: 2px solid #eee;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .custom-table td {
            padding: 1rem;
            border-bottom: 1px solid #f1f1f1;
            color: #333;
            vertical-align: middle;
        }

        .custom-table tr:last-child td {
            border-bottom: none;
        }

        .custom-table tr:hover {
            background-color: #fafbff;
        }

        /* BADGES */
        .status-badge {
            padding: 0.4rem 1rem;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            display: inline-block;
        }
        .status-success { background: #d1e7dd; color: #0f5132; }
        .status-pending { background: #fff3cd; color: #854d0e; }
        .status-failed { background: #f8d7da; color: #842029; }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
        }
        .empty-icon { font-size: 3rem; margin-bottom: 1rem; opacity: 0.5; }
        .empty-text { color: #666; font-size: 1rem; margin-bottom: 1.5rem; }

        /* BUTTONS */
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s;
            border: none;
            display: inline-block;
            font-size: 0.9rem;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            color: white;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid white;
            color: white;
            padding: 0.6rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
        }
        .btn-outline:hover {
            background: white;
            color: #667eea;
        }

        @media (max-width: 640px) {
            .container-fluid {
                padding: 1rem;
            }
            .page-header {
                padding: 1.25rem 1rem;
                flex-direction: column;
            }
            .page-header h1 { font-size: 1.5rem; }
            .page-header p { font-size: 0.85rem; }
            .custom-table { font-size: 0.85rem; }
            .custom-table th { padding: 0.75rem; font-size: 0.7rem; }
            .custom-table td { padding: 0.75rem; }
            .table-responsive { overflow-x: auto; }
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">

    <div class="page-header">
        <div>
            <h1>💳 Riwayat Transaksi</h1>
            <p>Daftar semua pembelian paket data Anda</p>
        </div>
        <div style="margin-top: 1rem; width: 100%; display: flex; justify-content: flex-start;">
            <a href="{{ route('home') }}#paket-data" class="btn-outline">
                + Beli Paket Baru
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 10px; margin-bottom: 1.5rem;">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="table-card">
        @if($transaksi->count() > 0)
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Kode TRX</th>
                            <th>Paket Data</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Metode</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $item)
                            <tr>
                                <td>
                                    <strong style="color: #667eea; font-family: monospace; font-size: 1rem;">
                                        {{ $item->kode_transaksi ?? '-' }}
                                    </strong>
                                </td>

                                <td>
                                    <div style="font-weight: 600; color: #333;">
                                        {{ $item->paketData->nama ?? ($item->product->product_name ?? 'Produk tidak tersedia') }}
                                    </div>
                                    <small class="text-muted">{{ $item->nomor_hp }}</small>
                                </td>

                                <td>
                                    <strong>Rp {{ number_format($item->harga ?? 0, 0, ',', '.') }}</strong>
                                </td>

                                <td>
                                    @php
                                        $status = $item->status ?? 'pending';
                                        $badgeClass = 'status-' . ($status == 'success' ? 'success' : ($status == 'pending' ? 'pending' : 'failed'));
                                    @endphp
                                    <span class="status-badge {{ $badgeClass }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>

                                <td style="color: #666; font-size: 0.9rem;">
                                    {{ $item->created_at->format('d M Y, H:i') }}
                                </td>

                                <td>
                                    <span style="background: #f8f9fa; padding: 2px 8px; border-radius: 4px; font-size: 0.8rem; color: #555; border: 1px solid #eee;">
                                        {{ ucfirst($item->metode_pembayaran ?? 'Pulsa') }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if(method_exists($transaksi, 'hasPages') && $transaksi->hasPages())
                <div style="padding: 1.5rem; display: flex; justify-content: center;">
                    {{ $transaksi->links() }}
                </div>
            @endif

        @else
            <div class="empty-state">
                <div class="empty-icon">🧾</div>
                <h3>Belum Ada Transaksi</h3>
                <p class="empty-text">Anda belum pernah melakukan pembelian paket data apapun.</p>
                <a href="{{ route('home') }}#paket-data" class="btn-primary">Mulai Belanja</a>
            </div>
        @endif
    </div>
</div>
@endsection
