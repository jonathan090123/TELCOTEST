@extends('layouts.app')

@section('title', $paket->nama)

@section('extra-styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
        }

        .container {
            max-width: 900px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            margin-bottom: 2rem;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .detail-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }

        .package-icon {
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            margin: 0 auto 1.5rem;
        }

        .card-header h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .card-header .price {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .card-header .price small {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .card-body {
            padding: 3rem 2rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid #e9ecef;
        }

        .info-item {
            text-align: center;
        }

        .info-item .icon {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .info-item h3 {
            color: #667eea;
            font-size: 1.8rem;
            margin-bottom: 0.3rem;
        }

        .info-item p {
            color: #666;
        }

        .description {
            margin-bottom: 2rem;
        }

        .description h2 {
            color: #333;
            margin-bottom: 1rem;
        }

        .description p {
            color: #666;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .features-list {
            list-style: none;
            margin-bottom: 2rem;
        }

        .features-list li {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            color: #333;
        }

        .features-list li:before {
            content: "✓";
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            flex: 1;
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #f8f9fa;
        }

        @media (max-width: 768px) {
            .card-header h1 {
                font-size: 2rem;
            }

            .card-header .price {
                font-size: 2.5rem;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
@endsection

@section('content')
        <a href="{{ route('paket-data.index') }}" class="back-link">
            ← Kembali ke Daftar Paket
        </a>

        <div class="detail-card">
            <div class="card-header">
                <div class="package-icon">📱</div>
                <h1>{{ $paket->nama }}</h1>
                <div class="price">
                    Rp {{ number_format($paket->harga, 0, ',', '.') }}
                    <small>/{{ $paket->masa_aktif }} hari</small>
                </div>
            </div>

            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="icon">📊</div>
                        <h3>{{ $paket->kuota }}</h3>
                        <p>Total Kuota</p>
                    </div>
                    <div class="info-item">
                        <div class="icon">⏰</div>
                        <h3>{{ $paket->masa_aktif }}</h3>
                        <p>Hari Aktif</p>
                    </div>
                    <div class="info-item">
                        <div class="icon">⚡</div>
                        <h3>Instant</h3>
                        <p>Aktivasi</p>
                    </div>
                </div>

                @if($paket->deskripsi)
                    <div class="description">
                        <h2>Deskripsi Paket</h2>
                        <p>{{ $paket->deskripsi }}</p>
                    </div>
                @endif

                <div class="description">
                    <h2>Keuntungan Paket Ini</h2>
                    <ul class="features-list">
                        <li>Kuota internet {{ $paket->kuota }}</li>
                        <li>Masa aktif {{ $paket->masa_aktif }} hari</li>
                        <li>Aktivasi otomatis setelah pembayaran</li>
                        <li>Jaringan 4G LTE tercepat</li>
                        <li>Customer support 24/7</li>
                        <li>Bisa digunakan untuk semua aplikasi</li>
                    </ul>
                </div>

                <div class="action-buttons">
                    @auth
                        <a href="{{ route('paket-data.beli', $paket->id) }}" class="btn btn-primary">
                            🛒 Beli Paket Ini
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            🔐 Login untuk Membeli
                        </a>
                    @endauth
                    <a href="{{ route('paket-data.index') }}" class="btn btn-secondary">
                        Lihat Paket Lain
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
