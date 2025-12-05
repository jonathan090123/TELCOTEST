@extends('layouts.app')

{{-- Gunakan $paket->product_name karena tabel baru 'products' --}}
@section('title', $paket->product_name)

@section('extra-styles')
    <style>
        /* --- CSS ASLI DARI KODE LAMA ANDA (TETAP DIPERTAHANKAN) --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
        }

        /* (Navbar CSS dihapus karena sudah ada di Layout, fokus ke konten saja) */

        .container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .back-link {
            display: inline-flex; align-items: center; gap: 0.5rem;
            color: #667eea; text-decoration: none; margin-bottom: 2rem; font-weight: 600;
            font-size: 0.95rem;
        }
        .back-link:hover { text-decoration: underline; }

        .detail-card {
            background: white; border-radius: 15px; overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; padding: 2rem 1.5rem; text-align: center;
        }

        .package-icon {
            width: 100px; height: 100px; background: rgba(255, 255, 255, 0.2);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-size: 3rem; margin: 0 auto 1.5rem;
        }

        .card-header h1 { font-size: 1.75rem; margin-bottom: 1rem; }

        .card-header .price {
            font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;
        }
        .card-header .price small { font-size: 1rem; opacity: 0.9; }

        .card-body { padding: 2rem 1.5rem; }

        .info-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1.5rem; margin-bottom: 2rem; padding-bottom: 2rem;
            border-bottom: 2px solid #e9ecef;
        }

        .info-item { text-align: center; }
        .info-item .icon { font-size: 2rem; margin-bottom: 0.5rem; }
        .info-item h3 { color: #667eea; font-size: 1.5rem; margin-bottom: 0.3rem; }
        .info-item p { color: #666; font-size: 0.9rem; }

        .description { margin-bottom: 2rem; }
        .description h2 { color: #333; margin-bottom: 1rem; font-size: 1.25rem; }
        .description p { color: #666; line-height: 1.8; font-size: 0.95rem; }

        .features-list { list-style: none; margin-bottom: 2rem; }
        .features-list li {
            padding: 0.75rem; border-bottom: 1px solid #e9ecef;
            display: flex; align-items: center; color: #333; font-size: 0.95rem;
        }
        .features-list li:before {
            content: "✓"; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; width: 28px; height: 28px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin-right: 1rem; flex-shrink: 0; font-size: 0.8rem;
        }

        .action-buttons { display: flex; gap: 1rem; margin-top: 2rem; flex-wrap: wrap; }
        .btn {
            flex: 1; min-width: 120px; padding: 0.75rem 1.5rem; border: none; border-radius: 12px;
            font-size: 0.95rem; font-weight: 600; cursor: pointer; text-decoration: none;
            text-align: center; transition: all 0.3s;
        }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4); }
        .btn-secondary { background: white; color: #667eea; border: 2px solid #667eea; }
        .btn-secondary:hover { background: #f8f9fa; }

        @media (max-width: 640px) {
            .container { margin: 1rem auto; }
            .card-header { padding: 1.5rem 1rem; }
            .card-header h1 { font-size: 1.5rem; }
            .card-header .price { font-size: 2rem; }
            .card-body { padding: 1.5rem 1rem; }
            .action-buttons { flex-direction: column; }
            .btn { min-width: 100%; }
            .info-grid { grid-template-columns: 1fr; gap: 1rem; }
        }

        @media (max-width: 768px) {
            .card-header h1 { font-size: 1.5rem; }
            .card-header .price { font-size: 2rem; }
            .action-buttons { flex-direction: column; }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('home') }}#paket-data" class="back-link">
            ← Kembali ke Daftar Paket
        </a>

        <div class="detail-card">
            <div class="card-header">
                <div class="package-icon">📱</div>
                <h1>{{ $paket->product_name }}</h1>
                
                <div class="price">
                    Rp {{ number_format($paket->price, 0, ',', '.') }}
                    <small>/bulan</small> 
                </div>
            </div>

            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="icon">📊</div>
                        <h3>{{ $paket->ml_category }}</h3>
                        <p>Kategori</p>
                    </div>
                    <div class="info-item">
                        <div class="icon">📶</div>
                        <h3>{{ $paket->operator }}</h3>
                        <p>Operator</p>
                    </div>
                    <div class="info-item">
                        <div class="icon">⚡</div>
                        <h3>Instant</h3>
                        <p>Aktivasi</p>
                    </div>
                </div>

                @if($paket->description)
                    <div class="description">
                        <h2>Deskripsi Paket</h2>
                        <p>{{ $paket->description }}</p>
                    </div>
                @endif

                <div class="description">
                    <h2>Keuntungan Paket Ini</h2>
                    <ul class="features-list">
                        <li>Kategori: {{ $paket->ml_category }}</li>
                        <li>Operator: {{ $paket->operator }}</li>
                        <li>Aktivasi otomatis setelah pembayaran</li>
                        <li>Jaringan 4G LTE tercepat</li>
                        <li>Customer support 24/7</li>
                    </ul>
                </div>

                <div class="action-buttons">
                    @auth
                        <a href="{{ route('customer.transaksi.create', $paket->id) }}" class="btn btn-primary">
                            🛒 Beli Paket Ini
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            🔐 Login untuk Membeli
                        </a>
                    @endauth
                    
                    <a href="{{ route('home') }}#paket-data" class="btn btn-secondary">
                        Lihat Paket Lain
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection