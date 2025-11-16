<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Data - TelcoApp</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
        }

        /* Navbar */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: #667eea;
        }

        .nav-icons {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .btn-logout {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Main Content */
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
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">TelcoApp</div>
            <ul class="nav-menu">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('paket-data.index') }}">Paket Data</a></li>
                <li><a href="{{ route('profile.index') }}">Profile</a></li>
            </ul>
            <div class="nav-icons">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h1 class="page-title">📱 Pilih Paket Data Anda</h1>

        @if($paketData->isEmpty())
            <div class="empty-message">
                <p>Tidak ada paket data yang tersedia saat ini. Silakan cek kembali nanti.</p>
            </div>
        @else
            <div class="paket-grid">
                @foreach($paketData as $paket)
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

                            <a href="{{ route('paket-data.beli', $paket->id) }}" class="btn-beli">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="back-link">
            <a href="{{ route('dashboard') }}">← Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
