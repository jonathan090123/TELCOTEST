@extends('layouts.app')

@section('title', 'Manajemen User')

@section('extra-styles')
    <style>
        .users-container {
<<<<<<< HEAD
            max-width: 1200px; margin: 0 auto; padding: 2rem;
        }

        /* HEADER (Sama seperti Dashboard Admin Baru) */
        .users-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; padding: 2.5rem; border-radius: 15px;
            margin-bottom: 2rem; box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            display: flex; justify-content: space-between; align-items: center;
        }
        .users-header h1 { font-size: 2rem; font-weight: 700; margin: 0; }
        .users-header p { opacity: 0.9; margin-top: 0.5rem; font-size: 1rem; }
        
        .stat-info { text-align: right; }
        .stat-info .number { font-size: 2.2rem; font-weight: 700; }
        .stat-info .label { font-size: 0.9rem; opacity: 0.9; margin-top: 0.3rem; }

        /* TABLE CARD */
        .users-content {
            background: white; border-radius: 12px; padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); border: 1px solid #f0f0f0;
        }

        .table-wrapper { overflow-x: auto; }
        
        /* TABLE STYLING (Modern) */
        .custom-table { width: 100%; border-collapse: collapse; }
        .custom-table th {
            background: #f8f9fa; padding: 1.2rem; text-align: left; color: #667eea;
            font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;
            border-bottom: 2px solid #e0e0e0;
        }
        .custom-table td { padding: 1.2rem; color: #333; border-bottom: 1px solid #f0f0f0; vertical-align: middle; }
        .custom-table tbody tr:hover { background: #f8f9ff; }

        .col-no { color: #999; font-weight: 600; width: 50px; text-align: center; }
        .col-aksi { text-align: center; width: 100px; }

        /* BADGE ROLE */
        .role-badge {
            padding: 4px 10px; border-radius: 15px; font-size: 0.75rem; font-weight: bold; text-transform: uppercase;
        }
        .role-customer { background: #e0e7ff; color: #4338ca; border: 1px solid #c7d2fe; }
        .role-admin { background: #fce7f3; color: #be185d; border: 1px solid #fbcfe8; }

        /* BUTTONS */
        .btn-delete {
            background: #fee2e2; color: #dc2626; padding: 0.5rem 1rem; border: 1px solid #fecaca;
            border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 0.85rem;
            transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 5px;
        }
        .btn-delete:hover { background: #fecaca; transform: translateY(-2px); }

        /* EMPTY STATE */
        .empty-state { text-align: center; padding: 3rem; color: #999; }
        .empty-icon { font-size: 3rem; margin-bottom: 1rem; opacity: 0.5; }

        @media (max-width: 768px) {
            .users-header { flex-direction: column; gap: 1.5rem; text-align: center; }
            .stat-info { text-align: center; }
            .users-container { padding: 1rem; }
=======
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .users-header {
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

        .users-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
        }

        .users-header p {
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

        .users-content {
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

        table tbody td.no {
            color: #999;
            font-weight: 600;
            width: 50px;
        }

        table tbody td.aksi {
            text-align: center;
        }

        .btn-delete {
            background: #ff6b6b;
            color: white;
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .btn-delete:hover {
            background: #ff5252;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        }

        .form-delete {
            display: inline;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #999;
        }

        .empty-state p {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .users-header {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }

            .stat-info {
                text-align: center;
            }

            .users-container {
                padding: 1rem;
            }

            table {
                font-size: 0.9rem;
            }

            table thead th,
            table tbody td {
                padding: 0.8rem;
            }

            .btn-delete {
                padding: 0.5rem 0.8rem;
                font-size: 0.75rem;
            }
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
        }
    </style>
@endsection

@section('content')
<div class="users-container">
<<<<<<< HEAD
    
    <div class="users-header">
        <div>
            <h1>👥 Manajemen User</h1>
            <p>Kelola data pelanggan terdaftar</p>
        </div>
        <div class="stat-info">
            {{-- Hitung Customer Saja --}}
            @php 
                $customerCount = $users->where('role', 'customer')->count(); 
            @endphp
            <div class="number">{{ $customerCount }}</div>
=======
    <div class="users-header">
        <div>
            <h1>👥 Manajemen User</h1>
            <p>Kelola data pengguna pelanggan sistem</p>
        </div>
        <div class="stat-info">
            @php $customers = $users->where('role', 'customer'); @endphp
            <div class="number">{{ $customers->count() }}</div>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
            <div class="label">Total Customer</div>
        </div>
    </div>

    <div class="users-content">
<<<<<<< HEAD
        
        {{-- Tampilkan Pesan Sukses --}}
        @if(session('success'))
            <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border: 1px solid #a7f3d0;">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if($customerCount > 0)
            <div class="table-wrapper">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th class="col-no">No</th>
                            <th>Nama Lengkap</th>
                            <th>Nomor HP</th> <th>Role</th>
                            <th>Bergabung</th>
                            <th class="col-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            {{-- Hanya Tampilkan Customer (Sembunyikan Admin Lain) --}}
                            @if($user->role === 'customer')
                            <tr>
                                <td class="col-no">{{ $loop->iteration }}</td>
                                
                                <td>
                                    <div style="font-weight: 600; color: #333;">{{ $user->name }}</div>
                                    @if($user->email)
                                        <div style="font-size: 0.8rem; color: #888;">{{ $user->email }}</div>
                                    @endif
                                </td>
                                
                                <td>
                                    <span style="font-family: monospace; font-size: 0.95rem; color: #555;">
                                        {{ $user->phone_number }}
                                    </span>
                                </td>

                                <td>
                                    <span class="role-badge role-customer">Customer</span>
                                </td>
                                
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                
                                <td class="col-aksi">
                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn-delete" onclick="if(confirm('Apakah Anda yakin ingin menghapus user {{ $user->name }}? Data perilaku dan transaksi juga akan terhapus.')) this.closest('form').submit();">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
=======
        @if($customers->count() > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Bergabung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $user)
                        <tr>
                            <td class="no">{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? '-' }}</td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td class="aksi">
                                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="form-delete" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn-delete" onclick="confirm('Apakah Anda yakin ingin menghapus user ini?') && this.closest('form').submit();">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
                        @endforeach
                    </tbody>
                </table>
            </div>
<<<<<<< HEAD
            
            {{-- Pagination (Jika pakai paginate di controller) --}}
            @if(method_exists($users, 'hasPages'))
                <div style="margin-top: 2rem; display: flex; justify-content: center;">
                    {{ $users->links() }}
                </div>
            @endif

        @else
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <p>Belum ada data customer yang terdaftar.</p>
=======
        @else
            <div class="empty-state">
                <p>📭 Tidak ada data customer</p>
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
