@extends('layouts.app')

@section('title', 'Beranda')

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
            </div>
        </div>
    </section>

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
