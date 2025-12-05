@extends('layouts.app')

@section('title', 'Beli ' . $paket->product_name)

@section('extra-styles')
    <style>
        /* reset page-specific background so layout.app navbar and page style show consistently */
        body { background: inherit; }
    </style>
@endsection

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">

        {{-- Header (match dashboard) --}}
        <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-xl sm:rounded-2xl p-4 sm:p-6 lg:p-8 shadow-lg sm:shadow-xl flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 lg:gap-6">
            <div class="w-full lg:w-auto">
                <h1 class="text-2xl sm:text-3xl font-bold flex items-center gap-2 flex-wrap">🛒 Beli — {{ $paket->product_name }}</h1>
                <p class="text-white/90 mt-1 text-sm sm:text-base">Operator: <strong>{{ $paket->operator }}</strong> · Kategori: <strong>{{ $paket->ml_category }}</strong></p>
            </div>

            <div class="text-right lg:ml-auto">
                <div class="text-xs sm:text-sm opacity-90">Total Pembayaran</div>
                <div class="text-2xl sm:text-3xl font-extrabold mt-1">Rp {{ number_format($paket->price, 0, ',', '.') }}</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 mt-6 sm:mt-8">
            {{-- Deskripsi paket --}}
            <div class="lg:col-span-2 bg-white rounded-lg sm:rounded-xl p-4 sm:p-6 shadow-md border border-gray-100">
                <h2 class="text-base sm:text-lg font-semibold text-indigo-600">{{ $paket->product_name }}</h2>
                <div class="text-xl sm:text-2xl font-bold text-gray-800 mt-2 sm:mt-3">Rp {{ number_format($paket->price, 0, ',', '.') }}</div>
                @if($paket->description)
                    <p class="text-gray-500 text-xs sm:text-sm mt-3 leading-relaxed">{{ $paket->description }}</p>
                @endif

                <div class="mt-4 sm:mt-6 grid grid-cols-2 gap-3 sm:gap-4">
                    <div class="bg-gray-50 p-3 sm:p-4 rounded-md">
                        <div class="text-xs sm:text-sm text-gray-500">Kategori</div>
                        <div class="font-semibold text-sm sm:text-base">{{ $paket->ml_category ?? '-' }}</div>
                    </div>
                    <div class="bg-gray-50 p-3 sm:p-4 rounded-md">
                        <div class="text-xs sm:text-sm text-gray-500">Operator</div>
                        <div class="font-semibold text-sm sm:text-base">{{ $paket->operator }}</div>
                    </div>
                </div>
            </div>

            {{-- Form Pembelian --}}
            <div class="bg-white rounded-lg sm:rounded-xl p-4 sm:p-6 shadow-md border border-gray-100">
                @if($errors->any())
                    <div class="mb-4 p-3 rounded-md bg-red-50 text-red-700 text-sm">
                        <strong>Ada kesalahan:</strong>
                        <ul class="mt-2 list-disc list-inside text-xs sm:text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-4 p-3 rounded-md bg-blue-50 text-blue-700 text-xs sm:text-sm">
                    Paket akan otomatis aktif setelah pembayaran dikonfirmasi.
                </div>

                <form action="{{ route('customer.transaksi.store', $paket->id) }}" method="POST">
                    @csrf

                    <label class="block text-xs sm:text-sm font-medium text-gray-700">Nomor HP Tujuan</label>
                    <input type="tel" name="nomor_hp" required
                           value="{{ old('nomor_hp', Auth::user()->phone_number ?? '') }}"
                           class="mt-1 mb-3 sm:mb-4 block w-full rounded-md border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">

                    <label class="block text-xs sm:text-sm font-medium text-gray-700">Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="mt-1 mb-3 sm:mb-4 block w-full rounded-md border-gray-200 text-sm">
                        <option value="transfer">Transfer Bank</option>
                        <option value="gopay">GoPay</option>
                        <option value="ovo">OVO</option>
                        <option value="dana">DANA</option>
                    </select>

                    <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold py-2 sm:py-2.5 rounded-lg shadow hover:shadow-lg transition text-sm sm:text-base">💳 Bayar Sekarang</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@endsection
