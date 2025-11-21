@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('extra-styles')
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .admin-header {
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

        .admin-header-left h1 {
            font-size: 2.2rem;
            margin-bottom: 0.3rem;
            font-weight: 700;
        }

        .admin-header-left p {
            opacity: 0.95;
            font-size: 1rem;
        }

        .greeting-text {
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            letter-spacing: 0.2px;
        }

        .user-name {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .greeting-time {
            text-align: right;
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .greeting-time .time {
            font-size: 1.8rem;
            font-weight: 700;
            margin-top: 0.5rem;
        }

        .admin-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
            border-color: #667eea;
        }

        .stat-card h3 {
            color: #667eea;
            font-size: 0.9rem;
            text-transform: uppercase;
            margin-bottom: 1rem;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .stat-card .number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .stat-card .description {
            color: #999;
            font-size: 0.85rem;
        }

        .admin-actions {
            background: white;
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #f0f0f0;
        }

        .admin-actions h2 {
            color: #333;
            margin-bottom: 1.5rem;
            font-size: 1.4rem;
            font-weight: 600;
        }

        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .action-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: block;
            transition: all 0.3s ease;
            text-align: center;
            font-size: 1rem;
        }

        .action-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .action-btn.secondary {
            background: #f0f0f0;
            color: #333;
        }

        .action-btn.secondary:hover {
            background: #e0e0e0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .admin-header {
                flex-direction: column;
                text-align: center;
                gap: 1.5rem;
            }

            .admin-header-left h1 {
                font-size: 1.8rem;
            }

            .greeting-time {
                text-align: center;
            }

            .admin-container {
                padding: 1rem;
            }
        }
    </style>
@endsection

@section('content')
<div class="admin-container">
    <div class="admin-header">
        <div class="admin-header-left">
            <div class="greeting-text" id="greeting-message">Selamat Pagi</div>
            <h1 class="user-name">👤 {{ Auth::user()->name }}</h1>
            <p>Kelola sistem dan transaksi pengguna</p>
        </div>
        <div class="greeting-time">
            <div>Waktu Sekarang</div>
            <div class="time" id="current-time">--:--</div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="admin-stats">
        <div class="stat-card">
            <h3>👥 Total Users</h3>
            <div class="number">{{ App\Models\User::count() }}</div>
            <div class="description">Pengguna terdaftar di sistem</div>
        </div>

        <div class="stat-card">
            <h3>💳 Total Transaksi</h3>
            <div class="number">{{ App\Models\Transaksi::count() }}</div>
            <div class="description">Transaksi yang telah dilakukan</div>
        </div>

        <div class="stat-card">
            <h3>📦 Total Produk</h3>
            <div class="number">{{ App\Models\PaketData::count() }}</div>
            <div class="description">Jumlah paket data tersedia di katalog</div>
        </div>
    </div>

    <!-- Admin Actions -->
    <div class="admin-actions">
        <h2>⚙️ Manajemen Sistem</h2>
        <div class="action-grid">
            <a href="{{ route('admin.users.index') }}" class="action-btn">
                👥 Manajemen User
            </a>
            <a href="{{ route('admin.transaksi.index') }}" class="action-btn">
                💳 Manajemen Transaksi
            </a>
            <a href="{{ route('admin.paket-data.index') }}" class="action-btn">
                📦 Manajemen Paket Data
            </a>
        </div>
    </div>
</div>

<script>
    function updateTime() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        document.getElementById('current-time').textContent = hours + ':' + minutes;

        // dynamic greeting
        const hour = now.getHours();
        let greeting = 'Selamat Pagi 👋';
        if (hour >= 12 && hour < 15) {
            greeting = 'Selamat Siang 👋';
        } else if (hour >= 15 && hour < 18) {
            greeting = 'Selamat Sore';
        } else if (hour >= 18 || hour < 5) {
            greeting = 'Selamat Malam 👋';
        }
        const el = document.getElementById('greeting-message');
        if (el) el.textContent = greeting;
    }
    updateTime();
    setInterval(updateTime, 1000);
</script>
@endsection
