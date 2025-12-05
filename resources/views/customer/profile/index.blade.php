@extends('layouts.app')

@section('title', 'Profile')

@section('extra-styles')
    <style>
        /* --- CSS DARI FRONTEND TEAM --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
        }

        /* (Navbar Style dihapus karena sudah ada di Layouts) */

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-header { margin-bottom: 2rem; }
        .page-header h1 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }
        .page-header p { color: #666; font-size: 1.1rem; }

        .profile-grid {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2rem;
        }

        /* Sidebar */
        .profile-sidebar {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            text-align: center;
            height: fit-content;
            border: 1px solid #eee;
        }

        .profile-avatar {
            width: 120px; height: 120px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 3rem; color: white; font-weight: bold;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .profile-sidebar h2 { color: #333; margin-bottom: 0.5rem; font-size: 1.4rem; }
        .profile-sidebar p { color: #666; margin-bottom: 1.5rem; font-size: 0.9rem; }

        .profile-stats {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #eee;
        }

        .stat-item {
            display: flex; justify-content: space-between;
            padding: 0.5rem 0; color: #666; font-size: 0.95rem;
        }

        .stat-item strong { color: #667eea; }

        /* Main Content Card */
        .card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            border: 1px solid #eee;
        }

        .card h2 {
            color: #333;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
            font-weight: 700;
            border-bottom: 2px solid #f5f6fa;
            padding-bottom: 10px;
        }

        .form-group { margin-bottom: 1.5rem; }
        
        .form-group label {
            display: block; margin-bottom: 0.5rem;
            color: #555; font-weight: 600; font-size: 0.9rem;
        }

        .form-control {
            width: 100%; padding: 12px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
            background: #fcfcfc;
        }

        .form-control:focus {
            outline: none; border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
        }

        /* Button Styles */
        .btn {
            padding: 12px 24px;
            border: none; border-radius: 8px;
            font-weight: 600; cursor: pointer;
            transition: all 0.3s; display: inline-block;
            font-size: 0.95rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; box-shadow: 0 4px 10px rgba(102, 126, 234, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(102, 126, 234, 0.3);
        }

        /* Alert Styles */
        .alert {
            padding: 1rem; border-radius: 10px; margin-bottom: 1.5rem; font-size: 0.95rem;
        }
        .alert-success { background: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; }
        .alert-error { background: #f8d7da; color: #842029; border: 1px solid #f5c2c7; }
        
        .error-message { color: #dc3545; font-size: 0.85rem; margin-top: 5px; display: block; }

        @media (max-width: 768px) {
            .profile-grid { grid-template-columns: 1fr; }
            .profile-sidebar { margin-bottom: 2rem; }
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1>👤 Profile Saya</h1>
        <p>Kelola informasi akun dan keamanan Anda</p>
    </div>

    <div class="profile-grid">
        
        <!-- 1. SIDEBAR PROFILE -->
        <div class="profile-sidebar">
            <div class="profile-avatar">
                <!-- Initials Avatar -->
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            
            <h2>{{ $user->name }}</h2>
            <p>{{ $user->phone_number }}</p> <!-- Ganti email jadi phone_number -->

            <div class="profile-stats">
                <div class="stat-item">
                    <span>Bergabung Sejak</span>
                    <strong>{{ $user->created_at->format('M Y') }}</strong>
                </div>
                <div class="stat-item">
                    <span>Status Akun</span>
                    <!-- Badge Role -->
                    <span class="badge {{ $user->role == 'admin' ? 'bg-danger' : 'bg-success' }}">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- 2. MAIN CONTENT (FORMS) -->
        <div class="profile-content">
            
            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    ❌ Gagal menyimpan perubahan. Silakan periksa input Anda.
                </div>
            @endif

            <!-- Form 1: Edit Informasi Pribadi -->
            <div class="card">
                <h2>✏️ Informasi Pribadi</h2>
                
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nama Lengkap -->
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nomor HP (Readonly karena Primary Key Login) -->
                    <div class="form-group">
                        <label for="phone">Nomor HP</label>
                        <input type="text" class="form-control" value="{{ $user->phone_number }}" disabled 
                               style="background-color: #e9ecef; cursor: not-allowed;">
                        <small class="text-muted">Nomor HP tidak dapat diubah karena digunakan untuk login.</small>
                    </div>

                    <!-- Email (Opsional, jika kolomnya masih ada di DB) -->
                    <!-- Jika sudah dihapus, hapus blok div ini -->
                    <div class="form-group">
                        <label for="email">Email (Opsional)</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="{{ old('email', $user->email ?? '') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
                </form>
            </div>

            <!-- Form 2: Ubah Password -->
            <div class="card">
                <h2>🔒 Keamanan (Ubah Password)</h2>
                
                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="current_password">Password Saat Ini</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                        @error('current_password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary" style="background: #2d3748;">🔒 Update Password</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection