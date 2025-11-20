@extends('layouts.app')

@section('title', 'Dashboard')

@section('extra-styles')
    <style>
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .dashboard-header {
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

        .dashboard-header-left h1 {
            font-size: 2.2rem;
            margin-bottom: 0.3rem;
            font-weight: 700;
        }

        .dashboard-header-left p {
            opacity: 0.95;
            font-size: 1.05rem;
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

        .dashboard-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 1.8rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
            border-color: #667eea;
        }

        .card h2 {
            color: #667eea;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            border-bottom: 2px solid #667eea;
            padding-bottom: 0.8rem;
            font-weight: 600;
        }

        .card p {
            color: #666;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .card-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.85rem 1.8rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #f0f0f0;
            color: #333;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .info-text {
            background: #f8f9fa;
            padding: 1.2rem;
            border-left: 4px solid #667eea;
            margin-bottom: 1rem;
            border-radius: 5px;
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .info-text strong {
            color: #333;
            display: block;
            margin-bottom: 0.3rem;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .btn-group .btn {
            text-align: center;
            width: 100%;
        }

        .stat-label {
            color: #999;
            font-size: 0.9rem;
            margin-top: 0.3rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                text-align: center;
                gap: 1.5rem;
            }

            .dashboard-header-left h1 {
                font-size: 1.8rem;
            }

            .greeting-time {
                text-align: center;
            }

            .dashboard-container {
                padding: 1rem;
            }
        }
    </style>
@endsection

@section('content')
<div class="dashboard-container">
    <div class="dashboard-header">
        <div class="dashboard-header-left">
            <h1>👋 Halo, {{ Auth::user()->name }}!</h1>
            <p>Kelola akun dan transaksi Anda dengan mudah</p>
        </div>
        <div class="greeting-time">
            <div>Selamat Pagi</div>
            <div class="time" id="current-time">--:--</div>
        </div>
    </div>

    <div class="dashboard-content">
        <!-- Profile Card -->
        <div class="card">
            <h2>👤 Profil Saya</h2>
            <div class="info-text">
                <strong>{{ Auth::user()->name }}</strong>
                {{ Auth::user()->email }}<br>
                📱 {{ Auth::user()->phone ?? 'Belum diisi' }}
            </div>
            <a href="{{ route('profile.index') }}" class="btn">Edit Profil</a>
        </div>

        <!-- Paket Data Card -->
        <div class="card">
            <h2>📦 Paket Data</h2>
            <p>Temukan dan beli paket data yang sesuai kebutuhan Anda</p>
            <div class="card-number">{{ App\Models\PaketData::count() }}</div>
            <div class="stat-label">Paket tersedia</div>
            <div style="margin-top: 1.5rem;">
                <a href="{{ route('paket-data.index') }}" class="btn">Lihat Paket</a>
            </div>
        </div>

        <!-- Transaksi Card -->
        <div class="card">
            <h2>💳 Riwayat Transaksi</h2>
            <p>Lihat semua pembelian paket data Anda</p>
            <div class="card-number">{{ App\Models\Transaksi::where('user_id', Auth::id())->count() }}</div>
            <div class="stat-label">Transaksi Anda</div>
            <div style="margin-top: 1.5rem;">
                <a href="{{ route('transaksi.index') }}" class="btn">Lihat Riwayat</a>
            </div>
        </div>

        <!-- Quick Actions Card -->
        <div class="card">
            <h2>⚡ Aksi Cepat</h2>
            <p>Akses fitur-fitur penting dengan satu klik</p>
            <div class="btn-group" style="margin-top: 1.5rem;">
                <a href="{{ route('paket-data.index') }}" class="btn">💰 Beli Paket Data</a>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">📊 Lihat Transaksi</a>
                <a href="{{ route('profile.index') }}" class="btn btn-secondary">⚙️ Pengaturan Akun</a>
            </div>
        </div>

        <!-- Support Card -->
        <div class="card">
            <h2>❓ Butuh Bantuan?</h2>
            <div class="info-text">
                <strong>Hubungi Tim Support Kami</strong>
                📧 Email: support@telcoapp.com<br>
                📱 WhatsApp: +62 812-3456-7890<br>
                Kami siap membantu 24/7
            </div>
        </div>

        <!-- Statistics Card -->
        <div class="card">
            <h2>📊 Statistik</h2>
            <div style="display: flex; justify-content: space-between; text-align: center;">
                <div>
                    <div class="card-number">{{ App\Models\Transaksi::where('user_id', Auth::id())->count() }}</div>
                    <div class="stat-label">Total Pembelian</div>
                </div>
                <div style="border-left: 1px solid #eee; flex: 1;">
                    <div class="card-number">-</div>
                    <div class="stat-label">Total Pengeluaran</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateTime() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        document.getElementById('current-time').textContent = hours + ':' + minutes;
    }
    updateTime();
    setInterval(updateTime, 1000);
</script>
@endsection