@extends('layouts.app')

@section('title', 'Dashboard')

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
    }
    updateTime();
    setInterval(updateTime, 1000);
</script>
@endsection
