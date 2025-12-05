@extends('layouts.app')

@section('title', 'Daftar Paket')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">

    {{-- HEADER (match dashboard style) --}}
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-xl sm:rounded-2xl p-4 sm:p-6 lg:p-8 shadow-lg sm:shadow-xl flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 lg:gap-6">
        <div class="w-full lg:w-auto">
            <h1 class="text-2xl sm:text-3xl font-bold flex items-center gap-2 flex-wrap">📦 Daftar Paket</h1>
            <p class="text-white/90 mt-1 text-sm sm:text-base">Semua paket dikelompokkan berdasarkan operator. Pilih paket dan klik Beli.</p>
        </div>

        <div class="text-right lg:ml-auto">
            <div class="text-xs sm:text-sm opacity-90">Total Paket</div>
            <div class="text-2xl sm:text-3xl font-extrabold mt-1">{{ isset($paketData) ? $paketData->count() : 0 }}</div>
        </div>
    </div>

    {{-- Filter label --}}
    <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-3">
        <form method="GET" action="{{ route('customer.paket-data.index') }}" class="w-full sm:w-auto">
            <select name="operator" class="w-full sm:w-auto border border-gray-200 rounded-md px-3 py-2 text-sm" onchange="this.form.submit()">
                <option value="">Semua Operator</option>
                @if(isset($paketData))
                    @foreach($paketData->pluck('operator')->unique() as $op)
                        <option value="{{ $op }}" {{ request('operator')===$op ? 'selected' : '' }}>{{ $op }}</option>
                    @endforeach
                @endif
            </select>
        </form>

        <a href="{{ route('dashboard') }}" class="w-full sm:w-auto sm:ml-auto inline-block text-center bg-white/10 text-white px-4 py-2 rounded-md text-sm hover:bg-white/20 transition">← Kembali</a>
    </div>

    {{-- Paket per Operator --}}
    @if(isset($paketData) && $paketData->count())
        @php $byOperator = $paketData->groupBy('operator'); @endphp
        @foreach($byOperator as $operator => $items)
            <h3 class="text-lg sm:text-xl font-bold text-gray-700 mt-8 sm:mt-10 mb-4 flex items-center gap-2">
                <i data-lucide="radio" class="w-4 sm:w-5 h-4 sm:h-5 text-indigo-500"></i>
                {{ $operator }}
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach($items as $item)
                    <div class="bg-white rounded-lg sm:rounded-xl p-4 sm:p-6 shadow-md hover:shadow-xl transition-all border border-gray-100 relative flex flex-col h-full">

                        @if(isset($item->is_popular) && $item->is_popular)
                            <span class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-green-600 text-white px-2 sm:px-3 py-1 rounded-full text-xs font-semibold">Populer</span>
                        @endif

                        <h2 class="text-base sm:text-lg font-semibold text-indigo-600 border-b pb-2">{{ $item->product_name }}</h2>

                        <div class="text-xl sm:text-2xl font-bold text-gray-800 mt-2 sm:mt-3">Rp {{ number_format($item->price, 0, ',', '.') }}</div>


                        <form action="{{ route('customer.transaksi.create', $item->id) }}" method="GET" class="mt-auto pt-4 sm:pt-5">
                            <button class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold py-2 sm:py-2.5 rounded-lg shadow hover:shadow-lg transition text-sm sm:text-base">Beli Sekarang</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <div class="text-center text-gray-500 mt-8 text-sm sm:text-base py-8">Tidak ada paket tersedia.</div>
    @endif

</div>
@endsection
