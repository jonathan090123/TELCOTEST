@extends('layouts.app')

@section('title', 'Paket Data')

@section('extra-styles')
    <style>
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .page-title {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 2rem;
            text-align: center;
        }

        .paket-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .paket-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .paket-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .paket-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .paket-header h2 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .paket-body {
            padding: 2rem;
        }

        .paket-kuota {
            font-size: 2rem;
            color: #667eea;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .paket-info {
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            color: #666;
        }

        .paket-info p {
            margin-bottom: 0.5rem;
        }

        .paket-price {
            font-size: 1.8rem;
            color: #333;
            font-weight: bold;
            margin-bottom: 1rem;
            border-top: 1px solid #eee;
            padding-top: 1rem;
        }

        .btn-beli {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-beli:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .empty-message {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            color: #666;
        }

        .back-link {
            text-align: center;
            margin-top: 2rem;
        }

        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .paket-grid {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 1.8rem;
            }

            .container {
                padding: 1rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h1 class="page-title">📱 Pilih Paket Data Anda</h1>

        @if($paketData->isEmpty())
            <div class="empty-message">
                <p>Tidak ada paket data yang tersedia saat ini. Silakan cek kembali nanti.</p>
            </div>
        @else
            <div class="paket-grid">
                @foreach($paketData as $paket)
                    <a href="{{ route('paket-data.show', $paket->id) }}" class="paket-link" style="text-decoration:none;color:inherit;">
                        <div class="paket-card">
                            <div class="paket-header">
                                <h2>{{ $paket->nama }}</h2>
                            </div>
                            <div class="paket-body">
                                <div class="paket-kuota">{{ $paket->kuota }}</div>
                                
                                <div class="paket-info">
                                    <p><strong>Masa Aktif:</strong> {{ $paket->masa_aktif }} hari</p>
                                    @if($paket->deskripsi)
                                        <p><strong>Deskripsi:</strong> {{ $paket->deskripsi }}</p>
                                    @endif
                                </div>

                                <div class="paket-price">
                                    Rp {{ number_format($paket->harga, 0, ',', '.') }}
                                </div>

                                <div style="margin-top:1rem;">
                                    <a href="{{ route('paket-data.show', $paket->id) }}" class="btn-beli">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        <div class="back-link">
            <a href="{{ route('home') }}">← Kembali ke Beranda</a>
        </div>
    </div>
@endsection
