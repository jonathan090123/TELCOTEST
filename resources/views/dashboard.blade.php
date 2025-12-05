@extends('layouts.app')

@section('title', 'Dashboard')

<<<<<<< HEAD
@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-xl sm:rounded-2xl p-4 sm:p-6 lg:p-8 shadow-lg sm:shadow-xl flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 lg:gap-6">
        <div class="w-full lg:w-auto">
            <h1 class="text-2xl sm:text-3xl font-bold flex items-center gap-2 flex-wrap">
                Halo, {{ Auth::user()->name }}!
            </h1>
            <p class="text-white/90 mt-1 text-sm sm:text-base">
                {{ Auth::user()->phone_number }} / <strong>{{ $operator }}</strong>
            </p>
        </div>

        <div class="text-right lg:ml-auto">
            <div class="text-xs sm:text-sm opacity-90">{{ $sumber }}</div>
            <div id="current-time" class="text-2xl sm:text-3xl font-extrabold mt-1">--:--</div>
        </div>
    </div>

    <h3 class="text-lg sm:text-xl font-bold text-gray-700 mt-8 sm:mt-10 mb-4 flex items-center gap-2">
        <i data-lucide="flame" class="w-4 sm:w-5 h-4 sm:h-5 text-indigo-500"></i>
        Sedang Populer
    </h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        @forelse($rekomendasi as $item)
        <div class="bg-white rounded-lg sm:rounded-xl p-4 sm:p-6 shadow-md hover:shadow-xl transition-all border border-gray-100 relative flex flex-col h-full">

            @if(isset($item->keyakinan))
            <span class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-green-600 text-white px-2 sm:px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1">
                {{ $item->keyakinan }} Cocok
            </span>
            @endif

            <h2 class="text-base sm:text-lg font-semibold text-indigo-600 border-b pb-2">
                {{ $item->product_name }}
            </h2>

            <div class="text-xl sm:text-2xl font-bold text-gray-800 mt-2 sm:mt-3">
                Rp {{ number_format($item->price, 0, ',', '.') }}
            </div>

            <p class="text-gray-500 text-xs sm:text-sm mt-2 sm:mt-3 leading-relaxed flex-grow">
                {{ \Illuminate\Support\Str::limit($item->description ?? '', 80) }}
            </p>

            {{-- PROGRESS BAR --}}
            @if(isset($item->keyakinan))
                @php $persen = floatval(str_replace('%', '', $item->keyakinan)); @endphp
                <div class="w-full bg-gray-200 rounded-full h-2 mt-3 sm:mt-4 overflow-hidden">
                    <div class="bg-green-600 h-2 rounded-full" style="width: {{ $persen }}%"></div>
                </div>
            @endif

            <form action="{{ route('customer.transaksi.create', $item->id) }}" method="GET" class="mt-4 sm:mt-5">
                <button class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold py-2 sm:py-2.5 rounded-lg shadow hover:shadow-lg transition text-sm sm:text-base">
                    Beli Sekarang
                </button>
            </form>
        </div>
        @empty
            <div class="col-span-full text-center text-gray-500 text-sm sm:text-base py-8">Belum ada rekomendasi saat ini.</div>
        @endforelse
    </div>

    {{--<div class="border-t border-dashed my-10"></div>

    <h3 class="text-xl font-bold text-gray-700 mb-4 flex items-center gap-2">
        <i data-lucide="layout-grid" class="w-5 h-5 text-indigo-500"></i>
        Menu Utama
    </h3>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition border border-gray-100">
            <h2 class="text-lg font-semibold text-indigo-600 flex items-center gap-2">
                <i data-lucide="user" class="w-5 h-5"></i>
                Profil Saya
            </h2>

            <div class="bg-gray-50 p-4 rounded-lg mt-3 text-gray-700 leading-relaxed">
                <strong>{{ Auth::user()->name }}</strong><br>
                Nomor HP: {{ Auth::user()->phone_number }}<br>
                Role: {{ Auth::user()->role ?? 'Customer' }}
            </div>

            <a href="{{ route('profile.index') }}"
               class="w-full mt-4 block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2.5 rounded-lg text-center transition">
               Edit Profil
            </a>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition border border-gray-100">
            <h2 class="text-lg font-semibold text-indigo-600 flex items-center gap-2">
                <i data-lucide="credit-card" class="w-5 h-5"></i>
                Riwayat Transaksi
            </h2>

            <div class="text-4xl font-bold text-indigo-600 mt-4">
                {{ $totalTransaksi }}
            </div>
            <div class="text-sm text-gray-500 uppercase tracking-wide">Total Transaksi</div>

            <a href="{{ route('customer.transaksi.riwayat') }}"
               class="w-full mt-6 block bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold py-2.5 rounded-lg text-center shadow hover:shadow-lg transition">
               Lihat Detail
            </a>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition border border-gray-100">
            <h2 class="text-lg font-semibold text-indigo-600 flex items-center gap-2">
                <i data-lucide="bar-chart-2" class="w-5 h-5"></i>
                Statistik
            </h2>

            <div class="flex justify-between text-center mt-5">
                <div>
                    <div class="text-3xl font-bold text-green-600">{{ $transaksiBerhasil }}</div>
                    <div class="text-sm text-gray-500 uppercase tracking-wide">Berhasil</div>
                </div>
                <div class="border-l"></div>
                <div>
                    <div class="text-3xl font-bold text-yellow-500">{{ $transaksiPending }}</div>
                    <div class="text-sm text-gray-500 uppercase tracking-wide">Pending</div>
                </div>
            </div>

            <p class="text-gray-500 text-xs mt-4 text-center">Ringkasan status pembelian Anda.</p>
        </div>

        {{-- Bantuan
        <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition border border-gray-100">
            <h2 class="text-lg font-semibold text-indigo-600 flex items-center gap-2">
                <i data-lucide="help-circle" class="w-5 h-5"></i>
                Bantuan
            </h2>

            <div class="bg-gray-50 p-4 rounded-lg mt-4 text-gray-700 text-sm leading-relaxed">
                <strong>Hubungi Tim Support</strong><br>
                Email: support@telcoapp.com <br>
                WhatsApp: +62 812-3456-7890
            </div>

            <button class="w-full mt-4 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2.5 rounded-lg transition">
                Chat CS
            </button>
        </div>

    </div> --}}
</div>

{{-- TIME JS --}}
<script>
    function updateTime() {
        const now = new Date();
        document.getElementById('current-time').textContent =
            now.getHours().toString().padStart(2,'0') + ':' +
            now.getMinutes().toString().padStart(2,'0');
=======
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
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
    }
    updateTime();
    setInterval(updateTime, 1000);
</script>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
