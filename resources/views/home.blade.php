@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

{{-- HERO SECTION --}}
<section class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-blue-100 pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-12 items-center">

        {{-- Heading --}}
        <div>
            <span class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-1.5 rounded-full text-sm font-semibold shadow-sm">
                <i data-lucide="sparkles" class="w-4 h-4"></i>
                Agen Premium
            </span>

            <h1 class="text-4xl lg:text-6xl font-extrabold text-blue-900 leading-tight mt-6">
                Sinerbiz Digital <br>
                <span class="block">Agensi Digital Marketing</span>
            </h1>

            <p class="mt-6 text-gray-600 text-lg leading-relaxed">
                Strategi pemasaran digital komprehensif yang disesuaikan dengan kebutuhan bisnis Anda.
            </p>

            <div class="flex gap-4 mt-8">
                <a href="#layanan"
                    class="bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold shadow-md hover:bg-blue-800 transition inline-flex items-center gap-2">
                    Mulai Sekarang
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>

                <a href="#tentang" class="bg-white border border-gray-200 px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition inline-flex items-center gap-2">
                    Pelajari Lebih Lanjut
                    <i data-lucide="external-link" class="w-4 h-4"></i>
                </a>
            </div>
        </div>

        {{-- Service Cards (Glassmorphism) --}}
        <div class="backdrop-blur-xl bg-white/40 shadow-xl border border-white/20 rounded-2xl p-6 grid grid-cols-2 gap-4">

            <div class="p-5 bg-white/60 rounded-xl shadow-sm border border-gray-200">
                <i data-lucide="bar-chart-3" class="w-8 h-8 text-blue-700 mb-3"></i>
                <h3 class="font-semibold text-gray-800 text-lg">Pemasaran Berbasis Kinerja</h3>
                <p class="text-gray-600 text-sm mt-1">Maksimalkan ROI dengan strategi berbasis data</p>
            </div>

            <div class="p-5 bg-white/60 rounded-xl shadow-sm border border-gray-200">
                <i data-lucide="chart-bar" class="w-8 h-8 text-blue-700 mb-3"></i>
                <h3 class="font-semibold text-gray-800 text-lg">Analitik & Pelaporan</h3>
                <p class="text-gray-600 text-sm mt-1">Dashboard lengkap untuk pemantauan performa</p>
            </div>

            <div class="p-5 bg-white/60 rounded-xl shadow-sm border border-gray-200">
                <i data-lucide="refresh-cw" class="w-8 h-8 text-blue-700 mb-3"></i>
                <h3 class="font-semibold text-gray-800 text-lg">Optimasi Konversi</h3>
                <p class="text-gray-600 text-sm mt-1">Ubah pengunjung menjadi pelanggan</p>
            </div>

            <div class="p-5 bg-white/60 rounded-xl shadow-sm border border-gray-200">
                <i data-lucide="search" class="w-8 h-8 text-blue-700 mb-3"></i>
                <h3 class="font-semibold text-gray-800 text-lg">SEO & Konten Profesional</h3>
                <p class="text-gray-600 text-sm mt-1">Naikkan ranking pencarian dengan konten berkualitas</p>
            </div>

        </div>

    </div>
</section>

{{-- STATISTICS SECTION --}}
<section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">

        <div class="p-6 bg-gray-50 border border-gray-200 rounded-2xl shadow-sm">
            <i data-lucide="users" class="w-7 h-7 text-blue-700 mx-auto mb-2"></i>
            <p class="text-3xl font-bold text-blue-900">10K+</p>
            <p class="text-gray-600 text-sm">Pengguna Aktif</p>
        </div>

        <div class="p-6 bg-gray-50 border border-gray-200 rounded-2xl shadow-sm">
            <i data-lucide="trending-up" class="w-7 h-7 text-blue-700 mx-auto mb-2"></i>
            <p class="text-3xl font-bold text-blue-900">1M+</p>
            <p class="text-gray-600 text-sm">Transaksi</p>
        </div>

        <div class="p-6 bg-gray-50 border border-gray-200 rounded-2xl shadow-sm">
            <i data-lucide="star" class="w-7 h-7 text-blue-700 mx-auto mb-2"></i>
            <p class="text-3xl font-bold text-blue-900">4.9/5</p>
            <p class="text-gray-600 text-sm">Rating</p>
        </div>

        <div class="p-6 bg-gray-50 border border-gray-200 rounded-2xl shadow-sm">
            <i data-lucide="briefcase" class="w-7 h-7 text-blue-700 mx-auto mb-2"></i>
            <p class="text-3xl font-bold text-blue-900">500+</p>
            <p class="text-gray-600 text-sm">Partner</p>
        </div>

    </div>
</section>

@endsection

