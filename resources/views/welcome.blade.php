@extends('layouts.app')

@section('title', 'Beranda')
<<<<<<< HEAD

@section('content')

    <section id="home"
        class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-blue-100 pt-18 pb-20 py-1">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-12 items-center" style="margin-top: -2rem">

            <div>
                <span
                    class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-1.5 rounded-full text-sm font-semibold shadow-sm">
                    <i data-lucide="sparkles" class="w-4 h-4"></i>
                    Selamat Datang
                </span>

                <h1 class="text-4xl lg:text-6xl font-extrabold text-blue-900 leading-tight mt-5">
                    TelcoApp <br>
                    <span class="block">Penjualan Paket Internet</span>
                </h1>

                <p class="mt-6 text-gray-600 text-lg leading-relaxed">
                    Strategi Penjualan Paket Internet Terbaik untuk Kebutuhan Anda dengan Berbasis Rekomendasi Prilaku User.
                </p>

                <div class="flex gap-4 mt-8">
                    <a href="#layanan"
                        class="bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold shadow-md hover:bg-blue-800 transition inline-flex items-center gap-2">
                        Beli Sekarang
                        <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                    </a>

                    <a href="#tentang"
                        class="bg-white border border-gray-200 px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition inline-flex items-center gap-2">
                        Pelajari Lebih Lanjut
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <div
                class="relative backdrop-blur-xl bg-white/40 shadow-xl border border-white/20 rounded-2xl p-6 grid grid-cols-2 gap-4">

                <span
                    class="absolute -top-2 right-2 inline-flex items-center gap-1
    bg-blue-100 text-blue-700 px-2.5 py-1 rounded-full
    text-xs font-semibold shadow-md">
                    <i data-lucide="zap" class="w-3 h-3"></i>
                    Tunggu apalagi?
                </span>


                <div class="col-span-2 mb-2">
                    <h2 class="text-2xl font-bold text-gray-800">Layanan Rekomendasi Prilaku User</h2>
                    <p class="text-gray-700 text-sm mt-1">
                        Kami menggabungkan teknologi terkini untuk menganalisis perilaku pengguna.
                    </p>
                </div>

                <div class="p-5 bg-white/60 rounded-xl shadow-sm border border-gray-200">
                    <div
                        class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500/30 to-blue-600/20
                flex items-center justify-center shadow-sm backdrop-blur-sm mb-3">
                        <i data-lucide="shopping-bag" class="w-6 h-6 text-blue-400"></i>
                    </div>

                    <h3 class="font-semibold text-gray-800 text-lg">Pembelian Paket Data</h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Beli paket internet dengan cepat dan mudah langsung dari TelcoApp.
                    </p>
                </div>

                <div class="p-5 bg-white/60 rounded-xl shadow-sm border border-gray-200">
                    <div
                        class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500/30 to-blue-600/20
                flex items-center justify-center shadow-sm backdrop-blur-sm mb-3">
                        <i data-lucide="receipt" class="w-6 h-6 text-blue-400"></i>
                    </div>

                    <h3 class="font-semibold text-gray-800 text-lg">Cek Riwayat Transaksi</h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Lihat detail pembelian kamu yang sudah pernah dilakukan.
                    </p>
                </div>

                <div class="p-5 bg-white/60 rounded-xl shadow-sm border border-gray-200">
                    <div
                        class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500/30 to-blue-600/20
                flex items-center justify-center shadow-sm backdrop-blur-sm mb-3">
                        <i data-lucide="flame" class="w-6 h-6 text-blue-400"></i>
                    </div>

                    <h3 class="font-semibold text-gray-800 text-lg">Paket Internet Terlaris</h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Temukan paket yang paling banyak dipilih pengguna lainnya.
                    </p>
                </div>

                <div class="p-5 bg-white/60 rounded-xl shadow-sm border border-gray-200">
                    <div
                        class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500/30 to-blue-600/20
                flex items-center justify-center shadow-sm backdrop-blur-sm mb-3">
                        <i data-lucide="smartphone" class="w-6 h-6 text-blue-400"></i>
                    </div>

                    <h3 class="font-semibold text-gray-800 text-lg">Cari Paket Sesuai Kebutuhan</h3>
                    <p class="text-gray-600 text-sm mt-1">
                        Gunakan fitur pencarian untuk menemukan paket yang cocok.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">

            <div class="p-6 bg-gray-50 border border-gray-200 rounded-2xl shadow-sm text-center">

                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500/30 to-blue-600/20
                flex items-center justify-center backdrop-blur-sm shadow-sm mx-auto mb-3">
                    <i data-lucide="users" class="w-6 h-6 text-blue-400"></i>
                </div>

                <p class="text-3xl font-bold text-blue-900">10K+</p>
                <p class="text-gray-600 text-sm">Pengguna Aktif</p>
            </div>

            <div class="p-6 bg-gray-50 border border-gray-200 rounded-2xl shadow-sm text-center">

                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500/30 to-blue-600/20
                flex items-center justify-center backdrop-blur-sm shadow-sm mx-auto mb-3">
                    <i data-lucide="trending-up" class="w-6 h-6 text-blue-400"></i>
                </div>

                <p class="text-3xl font-bold text-blue-900">1M+</p>
                <p class="text-gray-600 text-sm">Transaksi</p>
            </div>

            <div class="p-6 bg-gray-50 border border-gray-200 rounded-2xl shadow-sm text-center">

                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500/30 to-blue-600/20
                flex items-center justify-center backdrop-blur-sm shadow-sm mx-auto mb-3">
                    <i data-lucide="star" class="w-6 h-6 text-blue-400"></i>
                </div>

                <p class="text-3xl font-bold text-blue-900">4.9/5</p>
                <p class="text-gray-600 text-sm">Rating</p>
            </div>

            <div class="p-6 bg-gray-50 border border-gray-200 rounded-2xl shadow-sm text-center">

                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500/30 to-blue-600/20
                flex items-center justify-center backdrop-blur-sm shadow-sm mx-auto mb-3">
                    <i data-lucide="briefcase" class="w-6 h-6 text-blue-400"></i>
                </div>

                <p class="text-3xl font-bold text-blue-900">500+</p>
                <p class="text-gray-600 text-sm">Partner</p>
            </div>
        </div>
    </section>

    <section id="paket" class="bg-gradient-to-br from-blue-50 to-white py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">

            <h2 class="text-3xl font-extrabold text-blue-900 mb-10 flex items-center gap-3">
                <i data-lucide="flame" class="w-7 h-7"></i>
                Jelajahi Paket Populer
            </h2>

            <div class="grid md:grid-cols-3 gap-6">

                {{-- Logic Diambil dari controller Landing --}}
                @foreach ($produkPopuler as $paket)
                    <div
                        class="bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition overflow-hidden">
                        <span
                            class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-1.5 rounded-full text-sm font-semibold shadow-sm m-5">
                            {{ $paket->operator }}
                        </span>
                        <div class="h-48 w-full overflow-hidden">
                            <img src="{{ $paket->image_path }}" class="w-full h-full object-cover object-center">
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-xl text-blue-900 leading-tight">
                                {{ $paket->product_name }}
                            </h3>

                            <p class="text-gray-600 text-sm mt-1">
                                {{ $paket->ml_category }}
                            </p>

                            <p class="text-blue-700 font-semibold mt-4 text-lg">
                                Rp {{ number_format($paket->price, 0, ',', '.') }}
                            </p>

                            <a href="/paket/{{ $paket->id }}"
                                class="mt-4 inline-flex items-center gap-2 text-blue-700 font-semibold hover:underline">
                                Lihat Detail
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <section id="tentang" class="py-24 bg-white text-blue-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-16 items-center">

            <div>
                <span class="text-xs font-medium px-4 py-1 bg-blue-50 text-blue-700 rounded-full border border-blue-200">
                    Informasi Mengenai Kami
                </span>

                <h2 class="text-4xl font-extrabold mt-6 flex items-center gap-3">
                    Tentang TelcoApp
                </h2>

                <p class="text-gray-600 leading-relaxed mt-6 text-lg">
                    TelcoApp adalah platform penjualan paket internet yang mengutamakan pengalaman pengguna.
                </p>

                <div class="grid grid-cols-2 gap-6 mt-10">
                    <div class="p-6 bg-blue-50 rounded-xl border border-blue-200 shadow-sm">
                        <i data-lucide="eye" class="w-7 h-7 text-blue-700 mb-3"></i>
                        <h3 class="font-bold text-xl">Visi</h3>
                        <p class="text-gray-600 mt-3 leading-relaxed text-sm">
                            Menjadi platform terdepan dalam penjualan paket internet berbasis rekomendasi prilaku user.
                        </p>
                    </div>

                    <div class="p-6 bg-blue-50 rounded-xl border border-blue-200 shadow-sm">
                        <i data-lucide="target" class="w-7 h-7 text-blue-700 mb-3"></i>
                        <h3 class="font-bold text-xl">Misi</h3>
                        <p class="text-gray-600 mt-3 leading-relaxed text-sm">
                            Memberikan layanan terbaik dengan teknologi analitik untuk memenuhi kebutuhan internet pengguna.
                        </p>
                    </div>
                </div>

                <div class="flex gap-12 mt-10 text-center">
                    <div>
                        <h4 class="text-3xl font-bold text-blue-900">4</h4>
                        <p class="text-gray-600 text-sm mt-1">Developer</p>
                    </div>
                    <div>
                        <h4 class="text-3xl font-bold text-blue-900">100+</h4>
                        <p class="text-gray-600 text-sm mt-1">Produk Paket Internet</p>
                    </div>
                    <div>
                        <h4 class="text-3xl font-bold text-blue-900">4+</h4>
                        <p class="text-gray-600 text-sm mt-1">Operator Kartu</p>
                    </div>
                </div>
            </div>
            <div>
                <img src="{{ asset('img/tentang_kami.jpeg') }}"
                    class="rounded-2xl shadow-xl w-full object-cover h-[380px]" />
=======
@section('bg-color', 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)')

@section('extra-styles')
    <style>
        html {
            scroll-behavior: smooth;
        }

        .nav-menu a.nav-link {
            cursor: pointer;
        }

        .nav-menu a.nav-link.active {
            color: #667eea;
            background: rgba(102, 126, 234, 0.15);
            font-weight: 600;
        }

        /* Section Styles */
        section {
            scroll-margin-top: 80px;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 5rem 2rem;
            text-align: center;
            color: white;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero p {
            font-size: 1.3rem;
            opacity: 0.95;
            margin-bottom: 2rem;
        }

        /* Carousel Styles */
        .carousel-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 3rem 2rem;
        }

        .carousel-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        .carousel-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .carousel-title h2 {
            font-size: 2.5rem;
            color: white;
            margin-bottom: 0.5rem;
        }

        .carousel-title p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
        }

        .carousel {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-slide {
            min-width: 100%;
            padding: 3rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .product-info h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .product-data {
            font-size: 4rem;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .product-price {
            font-size: 2rem;
            color: #333;
            margin-bottom: 2rem;
        }

        .product-price span {
            font-size: 1rem;
            color: #666;
        }

        .product-features {
            list-style: none;
            margin-bottom: 2rem;
        }

        .product-features li {
            padding: 0.8rem 0;
            border-bottom: 1px solid #eee;
            color: #666;
            display: flex;
            align-items: center;
        }

        .product-features li:before {
            content: "✓";
            color: #667eea;
            font-weight: bold;
            margin-right: 0.5rem;
            font-size: 1.2rem;
        }

        .product-visual {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-icon {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 5rem;
            color: white;
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
            z-index: 10;
            color: #667eea;
        }

        .carousel-btn:hover {
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .carousel-btn.prev {
            left: 1rem;
        }

        .carousel-btn.next {
            right: 1rem;
        }

        .carousel-indicators {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .indicator.active {
            background: white;
            width: 30px;
            border-radius: 6px;
        }

        /* Paket Data Section */
        .paket-data-section {
            background: white;
            padding: 4rem 2rem;
        }

        .paket-data-header {
            text-align: center;
            max-width: 1200px;
            margin: 0 auto 3rem;
        }

        .paket-data-header h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .paket-data-header p {
            color: #666;
            font-size: 1.1rem;
        }

        /* Paket Grid Cards */
        .paket-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .paket-grid-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            border: 1px solid #eee;
        }

        .paket-grid-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .paket-grid-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .paket-grid-header h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .paket-grid-icon {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .paket-grid-body {
            padding: 2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .paket-quota {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 1rem;
        }

        .paket-price {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .paket-price .period {
            font-size: 0.85rem;
            color: #999;
            font-weight: normal;
        }

        .paket-features {
            list-style: none;
            margin-bottom: 2rem;
            flex-grow: 1;
        }

        .paket-features li {
            padding: 0.6rem 0;
            border-bottom: 1px solid #eee;
            color: #666;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }

        .paket-features li:last-child {
            border-bottom: none;
        }

        .paket-features li:before {
            content: "✓";
            color: #667eea;
            font-weight: bold;
            margin-right: 0.8rem;
            font-size: 1rem;
        }

        .paket-grid-footer {
            padding: 0 2rem 2rem 2rem;
            margin-top: auto;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: block;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            width: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Tentang Section */
        .tentang-section {
            padding: 4rem 2rem;
            background: white;
        }

        .tentang-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .tentang-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .tentang-header h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .tentang-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .tentang-card {
            padding: 2rem;
            background: #f8f9ff;
            border-radius: 15px;
            border-left: 4px solid #667eea;
        }

        .tentang-card h3 {
            color: #667eea;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .tentang-card p {
            color: #666;
            line-height: 1.8;
        }

        .tentang-features {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 3rem 2rem;
            border-radius: 15px;
            color: white;
        }

        .tentang-features h3 {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 2rem;
        }

        .tentang-features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .tentang-feature-item {
            text-align: center;
        }

        .tentang-feature-item-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .tentang-feature-item h4 {
            margin-bottom: 0.5rem;
        }

        .tentang-feature-item p {
            font-size: 0.95rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .product-card {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .product-data {
                font-size: 3rem;
            }

            .carousel-btn {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }

            .tentang-grid {
                grid-template-columns: 1fr;
            }

            .tentang-features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Paket Data Terbaik untuk Kebutuhan Anda</h1>
            <p>Nikmati internet cepat dengan harga terjangkau</p>
        </div>
    </section>

    <!-- Carousel Section -->
    <section class="carousel-section" id="carousel">
        <div class="carousel-container">
            <div class="carousel-title">
                <h2>Paket Unggulan Kami</h2>
                <p>Geser untuk melihat lebih banyak paket menarik</p>
            </div>
            
            <div class="carousel">
                <button class="carousel-btn prev" onclick="changeSlide(-1)">‹</button>
                <button class="carousel-btn next" onclick="changeSlide(1)">›</button>
                
                <div class="carousel-track" id="carouselTrack">
                    @foreach($paketData as $paket)
                        <div class="carousel-slide">
                            <div class="product-card">
                                <div class="product-info">
                                    <h2>{{ $paket->nama }}</h2>
                                    <div class="product-data">{{ $paket->kuota }}</div>
                                    <div class="product-price">Rp {{ number_format($paket->harga, 0, ',', '.') }} <span>/{{ $paket->masa_aktif }} hari</span></div>
                                    <ul class="product-features">
                                        @if($paket->deskripsi)
                                            <li>{{ Str::limit($paket->deskripsi, 120) }}</li>
                                        @else
                                            <li>Paket data sesuai kebutuhan Anda</li>
                                        @endif
                                    </ul>
                                    @auth
                                        <a href="{{ route('paket-data.show', $paket->id) }}" class="btn-primary">Lihat Detail</a>
                                    @else
                                        <a href="{{ route('paket-data.show', $paket->id) }}" class="btn-primary">Lihat Detail</a>
                                    @endauth
                                </div>
                                <div class="product-visual">
                                    <div class="product-icon">📱</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                @for ($i = 0; $i < $paketData->count(); $i++)
                    <button class="indicator @if($i == 0) active @endif" onclick="goToSlide({{ $i }})"></button>
                @endfor
            </div>
        </div>
    </section>

    <!-- Paket Data Section -->
    <section class="paket-data-section" id="paket-data">
        <div class="paket-data-header">
            <h2>Semua Paket Data Kami</h2>
            <p>Pilih paket yang sesuai dengan kebutuhan Anda</p>
        </div>

        <div class="paket-grid">
            @foreach($paketData as $paket)
                <div class="paket-grid-card">
                    <div class="paket-grid-header">
                        <div class="paket-grid-icon">📱</div>
                        <h3>{{ $paket->nama }}</h3>
                    </div>
                    <div class="paket-grid-body">
                        <div class="paket-quota">{{ $paket->kuota }}</div>
                        <div class="paket-price">Rp {{ number_format($paket->harga, 0, ',', '.') }} <span class="period">/{{ $paket->masa_aktif }} hari</span></div>
                        <ul class="paket-features">
                            @if($paket->deskripsi)
                                <li>{{ Str::limit($paket->deskripsi, 120) }}</li>
                            @else
                                <li>Paket data sesuai kebutuhan Anda</li>
                            @endif
                        </ul>
                        <div class="paket-grid-footer">
                            <a href="{{ route('paket-data.show', $paket->id) }}" class="btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Tentang Section -->
    <section class="tentang-section" id="tentang">
        <div class="tentang-container">
            <div class="tentang-header">
                <h2>Tentang TelcoApp</h2>
            </div>

            <div class="tentang-grid">
                <div class="tentang-card">
                    <h3>🌟 Apa itu TelcoApp?</h3>
                    <p>Platform terpercaya untuk pembelian paket data internet dengan harga terjangkau dan proses yang mudah. Kami berkomitmen memberikan layanan terbaik dengan dukungan pelanggan 24/7.</p>
                </div>

                <div class="tentang-card">
                    <h3>💡 Visi Kami</h3>
                    <p>Menjadi penyedia layanan paket data terdepan yang memberikan akses internet berkualitas tinggi kepada seluruh masyarakat Indonesia dengan harga yang kompetitif dan terjangkau.</p>
                </div>

                <div class="tentang-card">
                    <h3>🎯 Misi Kami</h3>
                    <p>Memberikan solusi konektivitas internet yang inovatif, aman, dan terpercaya dengan fokus pada kepuasan pelanggan, transparansi harga, dan layanan purna jual yang responsif.</p>
                </div>
            </div>

            <div class="tentang-features">
                <h3>✨ Keunggulan Kami</h3>
                <div class="tentang-features-grid">
                    <div class="tentang-feature-item">
                        <div class="tentang-feature-item-icon">💰</div>
                        <h4>Harga Terjangkau</h4>
                        <p>Paket data dengan harga kompetitif dan terbaik di kelasnya</p>
                    </div>
                    <div class="tentang-feature-item">
                        <div class="tentang-feature-item-icon">⚡</div>
                        <h4>Proses Cepat</h4>
                        <p>Aktivasi instan dan mudah melalui platform online kami</p>
                    </div>
                    <div class="tentang-feature-item">
                        <div class="tentang-feature-item-icon">🔒</div>
                        <h4>Aman & Terpercaya</h4>
                        <p>Transaksi aman dengan enkripsi tingkat bank</p>
                    </div>
                    <div class="tentang-feature-item">
                        <div class="tentang-feature-item-icon">📱</div>
                        <h4>Fleksibel</h4>
                        <p>Berbagai pilihan paket sesuai kebutuhan Anda</p>
                    </div>
                </div>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
            </div>
        </div>
    </section>

<<<<<<< HEAD
    <section id="keunggulan" class="bg-blue-50 py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">

            <div class="text-center mb-14">
                <span class="text-xs font-medium px-4 py-1 bg-white/70 rounded-full border border-blue-200 text-blue-700">
                    Mengapa Memilih Kami?
                </span>
                <h2 class="text-4xl font-extrabold text-blue-900 mt-4">Keunggulan Kami</h2>
                <p class="text-gray-600 mt-3">
                    Solusi modern yang dirancang untuk mendukung pertumbuhan bisnis Anda.
                </p>
            </div>

            <div class="relative grid md:grid-cols-2 gap-14">
                <div class="step-group-top mt-7" style="z-index: 4;">
                    <div class="step-bubble">1</div>
                    <div class="step-bubble">2</div>
                </div>

                <div class="p-6 bg-white/30 backdrop-blur-xl rounded-2xl shadow-lg border border-blue-700 relative">
                    <div class="mb-4 bg-gradient-to-br from-blue-500/30 to-blue-600/20 w-12 h-12 flex items-center justify-center rounded-xl shadow-sm">
                        <i data-lucide="bar-chart-3" class="w-7 h-7 text-blue-700"></i>
                    </div>
                    <h3 class="font-semibold text-xl text-gray-900">Strategi Rekomendasi User</h3>
                    <p class="text-gray-600 mt-2">Semua keputusan berdasarkan data dan prilaku user.</p>
                </div>

                <div class="p-6 bg-white/30 backdrop-blur-xl rounded-2xl shadow-lg border border-blue-700 relative">
                    <div class="mb-4 bg-gradient-to-br from-blue-500/30 to-blue-600/20 w-12 h-12 flex items-center justify-center rounded-xl shadow-sm">
                        <i data-lucide="shield" class="w-7 h-7 text-blue-700"></i>
                    </div>
                    <h3 class="font-semibold text-xl text-gray-900">Keamanan Terjamin</h3>
                    <p class="text-gray-600 mt-2">Privasi dan integritas data adalah prioritas utama.</p>
                </div>

                <div class="p-6 bg-white/30 backdrop-blur-xl rounded-2xl shadow-lg border border-blue-700 relative">
                    <div class="mb-4 bg-gradient-to-br from-blue-500/30 to-blue-600/20 w-12 h-12 flex items-center justify-center rounded-xl shadow-sm">
                        <i data-lucide="rocket" class="w-7 h-7 text-blue-700"></i>
                    </div>
                    <h3 class="font-semibold text-xl text-gray-900">Performa Maksimal</h3>
                    <p class="text-gray-600 mt-2">Platform yang teroptimisasi untuk hasil terbaik.</p>
                </div>

               <div class="p-6 bg-white/30 backdrop-blur-xl rounded-2xl shadow-lg border border-blue-700 relative">
                    <div class="mb-4 bg-gradient-to-br from-blue-500/30 to-blue-600/20 w-12 h-12 flex items-center justify-center rounded-xl shadow-sm">
                        <i data-lucide="trending-up" class="w-7 h-7 text-blue-700"></i>
                    </div>
                    <h3 class="font-semibold text-xl text-gray-900">Hasil dan Transaksi</h3>
                    <p class="text-gray-600 mt-2">Kami bantu Anda me-rekomendasikan paket internet.</p>
                </div>

                <div class="step-group-bottom" style="margin-bottom: 10rem">
                    <div class="step-bubble">3</div>
                    <div class="step-bubble">4</div>
                </div>

            </div>
        </div>
    </section>

    <footer class="bg-blue-900 text-white py-14">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 grid md:grid-cols-3 gap-10">
            <div>
                <h3 class="text-xl font-bold">Telco App</h3>
                <p class="text-gray-300 text-sm mt-4">Agensi digital modern dengan layanan pemasaran lengkap.</p>
            </div>

            <div>
                <h4 class="font-semibold mb-4">Menu</h4>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="/" class="hover:text-white">Beranda</a></li>
                    <li><a href="#paket" class="hover:text-white">Paket Data</a></li>
                    <li><a href="#tentang" class="hover:text-white">Tentang</a></li>
                    <li><a href="#keunggulan" class="hover:text-white">Keunggulan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-4">Kontak</h4>
                <ul class="space-y-2 text-gray-300">
                    <li class="flex items-center gap-2">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                        hello@telcoapp.com
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="phone" class="w-4 h-4"></i>
                        +62 812 3456 7890
                    </li>
                </ul>
            </div>

        </div>

        <div class="text-center text-gray-400 text-sm mt-15">
            © 2025 Telco App — All Rights Reserved.
        </div>
    </footer>


@endsection
=======
    <script>
        let currentSlide = 0;
        const totalSlides = {{ $paketData->count() }};

        function changeSlide(direction) {
            currentSlide += direction;
            
            if (currentSlide < 0) {
                currentSlide = totalSlides - 1;
            } else if (currentSlide >= totalSlides) {
                currentSlide = 0;
            }
            
            updateCarousel();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateCarousel();
        }

        function updateCarousel() {
            const track = document.getElementById('carouselTrack');
            const indicators = document.querySelectorAll('.indicator');
            
            track.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            indicators.forEach((indicator, index) => {
                if (index === currentSlide) {
                    indicator.classList.add('active');
                } else {
                    indicator.classList.remove('active');
                }
            });
        }

        // Auto slide every 5 seconds
        setInterval(() => {
            changeSlide(1);
        }, 5000);
    </script>
@endsection
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
