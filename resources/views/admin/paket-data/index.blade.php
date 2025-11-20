@extends('layouts.app')

@section('title', 'Kelola Paket Data')

@section('extra-styles')
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #667eea;
            padding-bottom: 1rem;
        }

        .page-header h1 {
            color: #333;
            font-size: 2rem;
        }

        .btn-create {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .filter-section {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .filter-group {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .table-container {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        .paket-table {
            width: 100%;
            border-collapse: collapse;
        }

        .paket-table thead {
            background: #667eea;
            color: white;
        }

        .paket-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .paket-table td {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
        }

        .paket-table tbody tr:hover {
            background: #f8f9fa;
        }

        .status-badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.3s;
            font-size: 0.9rem;
        }

        .btn-edit {
            background: #667eea;
            color: white;
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
        }

        .btn-action:hover {
            transform: translateY(-2px);
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

        .btn-back {
            background: #f0f0f0;
            color: #333;
        }

        .btn-back:hover {
            background: #e0e0e0;
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .paket-table {
                font-size: 0.9rem;
            }

            .paket-table th,
            .paket-table td {
                padding: 0.7rem;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
@endsection

@section('content')
<div class="admin-container">
    <div class="page-header">
        <h1>📦 Kelola Paket Data</h1>
        <a href="{{ route('admin.paket-data.create') }}" class="btn-create">+ Tambah Paket</a>
    </div>

    <div class="filter-section">
        <div class="filter-group">
            <a href="{{ route('admin.dashboard') }}" class="btn-action btn-back">← Kembali ke Dashboard</a>
        </div>
    </div>

    @if($paketData->count() > 0)
        <div class="table-container">
            <table class="paket-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kuota</th>
                        <th>Masa Aktif</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($paketData as $paket)
                        <tr>
                            <td>{{ $paket->nama }}</td>
                            <td>{{ $paket->kuota }}</td>
                            <td>{{ $paket->masa_aktif }} hari</td>
                            <td>Rp {{ number_format($paket->harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="status-badge status-{{ $paket->status }}">
                                    {{ ucfirst($paket->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.paket-data.edit', $paket->id) }}" class="btn-action btn-edit">Edit</a>
                                    <form action="{{ route('admin.paket-data.destroy', $paket->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center;">Tidak ada data paket</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @else
        <div class="table-container">
            <div class="empty-state">
                <div class="empty-state-icon">📦</div>
                <h3>Belum ada paket data</h3>
                <p>Belum ada paket data yang terdaftar</p>
                <div style="margin-top: 1.5rem;">
                    <a href="{{ route('admin.paket-data.create') }}" class="btn-create">Tambah Paket Pertama</a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
