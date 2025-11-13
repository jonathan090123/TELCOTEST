<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TelcoApp</title>
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

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn-logout {
            background: #dc3545;
            color: white;
            padding: 0.5rem 1.2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Welcome Section */
        .welcome-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .welcome-section h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }

        .stat-icon.orange {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .stat-info h3 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 0.3rem;
        }

        .stat-info p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            color: #333;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        /* Transaction Table */
        .transaction-table {
            width: 100%;
            border-collapse: collapse;
        }

        .transaction-table th {
            background: #f8f9fa;
            padding: 1rem;
            text-align: left;
            color: #666;
            font-weight: 600;
            border-bottom: 2px solid #e9ecef;
        }

        .transaction-table td {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            color: #333;
        }

        .badge {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge-pending {
            background: #fff3cd;
            color: #856404;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-failed {
            background: #f8d7da;
            color: #721c24;
        }

        /* Paket Cards */
        .paket-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .paket-item {
            padding: 1.5rem;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            transition: all 0.3s;
        }

        .paket-item:hover {
            border-color: #667eea;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
        }

        .paket-item h4 {
            color: #333;
            margin-bottom: 0.5rem;
        }

        .paket-item .price {
            color: #667eea;
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .paket-item p {
            color: #666;
            font-size: 0.9rem;
        }

        .btn-beli {
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 1rem;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #666;
        }

        @media (max-width: 968px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .transaction-table {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">TelcoApp</div>
            
            <div class="nav-menu">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('paket-data.index') }}">Paket Data</a>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('profile.index') }}">Profile</a>
            </div>

            <div class="user-info">
                <span>👤 {{ $user->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Container -->
    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1>Selamat Datang, {{ $user->name }}! 👋</h1>
            <p>Kelola paket data dan transaksi Anda dengan mudah</p>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon blue">📊</div>
                <div class="stat-info">
                    <h3>{{ $totalTransaksi }}</h3>
                    <p>Total Transaksi</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon orange">⏳</div>
                <div class="stat-info">
                    <h3>{{ $transaksiPending }}</h3>
                    <p>Menunggu Pembayaran</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green">✅</div>
                <div class="stat-info">
                    <h3>{{ $transaksiBerhasil }}</h3>
                    <p>Transaksi Berhasil</p>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Recent Transactions -->
            <div class="card">
                <h2>Transaksi Terakhir</h2>
                @if($transaksiTerakhir->count() > 0)
                    <table class="transaction-table">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Paket</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksiTerakhir as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->kode_transaksi }}</td>
                                    <td>{{ $transaksi->paketData->nama }}</td>
                                    <td>Rp {{ number_format($transaksi->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge badge-{{ $transaksi->status }}">
                                            {{ ucfirst($transaksi->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $transaksi->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('paket-data.riwayat') }}" style="display: inline-block; margin-top: 1rem; color: #667eea; font-weight: 600;">
                        Lihat Semua Transaksi →
                    </a>
                @else
                    <div class="empty-state">
                        <p>Belum ada transaksi</p>
                    </div>
                @endif
            </div>

            <!-- Popular Packages -->
            <div class="card">
                <h2>Paket Populer</h2>
                <div class="paket-list">
                    @foreach($paketPopuler as $paket)
                        <div class="paket-item">
                            <h4>{{ $paket->nama }}</h4>
                            <div class="price">Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
                            <p>{{ $paket->kuota }} • {{ $paket->masa_aktif }} hari</p>
                            <a href="{{ route('paket-data.beli', $paket->id) }}" class="btn-beli">
                                Beli Sekarang
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>