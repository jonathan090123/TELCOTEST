<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - TelcoApp</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('extra-styles')
</head>

<body class="bg-white text-gray-700 selection:bg-blue-100 selection:text-blue-700">

    <nav class="sticky top-0 bg-white/70 backdrop-blur-md shadow-sm z-50 border-b border-blue-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <a href="/" class="flex items-center gap-2">
                <div
                    class="relative w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-500 rounded-xl
                flex items-center justify-center shadow-md">
                    <span
                        class="absolute -top-1 -right-1 bg-yellow-400 text-white w-4 h-4
                     rounded-full flex items-center justify-center shadow">
                        <i data-lucide="flame" class="w-2.5 h-2.5 text-yellow-900"></i>
                    </span>
                    <i data-lucide="radio" class="w-5 h-5 text-white"></i>
                </div>
                <div class="flex flex-col leading-tight">
                    <span
                        class="text-1xl font-extrabold bg-gradient-to-r from-blue-500 to-blue-300
                     bg-clip-text text-transparent">
                        TelcoApp
                    </span>
                    <span class="text-gray-400 text-xs tracking-wide">
                        TELCO SOLUTIONS
                    </span>
                </div>
            </a>


            <ul class="hidden md:flex items-center gap-8 font-medium">

    @guest
        <li>
            <a href="#home"
                class="flex items-center gap-2 px-3 py-2 rounded-xl transition
                {{ request()->is('/') ? 'text-blue-600 bg-blue-50' : 'hover:bg-blue-50 hover:text-blue-600' }}">
                Beranda
            </a>
        </li>

        <li>
            <a href="#paket"
                class="flex items-center gap-2 px-3 py-2 rounded-xl transition
                {{ request()->is('#paket') ? 'text-blue-600 bg-blue-50' : 'hover:bg-blue-50 hover:text-blue-600' }}">
                Paket Data
            </a>
        </li>

        <li>
            <a href="#tentang"
                class="flex items-center gap-2 px-3 py-2 rounded-xl transition
                {{ request()->is('#tentang') ? 'text-blue-600 bg-blue-50' : 'hover:bg-blue-50 hover:text-blue-600' }}">
                Tentang
            </a>
        </li>

        <li>
            <a href="#keunggulan"
                class="flex items-center gap-2 px-3 py-2 rounded-xl transition
                {{ request()->is('#keunggulan') ? 'text-blue-600 bg-blue-50' : 'hover:bg-blue-50 hover:text-blue-600' }}">
                Keunggulan
            </a>
        </li>
    @endguest

        

    @auth
        <li>
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-2 px-3 py-2 rounded-xl transition
               {{ request()->routeIs('dashboard') ? 'text-blue-600 bg-blue-50' : 'hover:bg-blue-50 hover:text-blue-600' }}">
                 Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('customer.paket-data.index') }}"
                class="flex items-center gap-2 px-3 py-2 rounded-xl transition
                {{ request()->routeIs('customer.paket-data.*') ? 'text-blue-600 bg-blue-50' : 'hover:bg-blue-50 hover:text-blue-600' }}">
                Daftar Paket
            </a>
        </li>

        <li>
            <a href="{{ route('customer.transaksi.riwayat') }}"
                class="flex items-center gap-2 px-3 py-2 rounded-xl transition
                {{ request()->routeIs('customer.transaksi.*') ? 'text-blue-600 bg-blue-50' : 'hover:bg-blue-50 hover:text-blue-600' }}">
                Riwayat Transaksi
            </a>
        </li>

        {{-- <li>
            <a href="{{ route('riwayat') }}"
                class="flex items-center gap-2 px-3 py-2 rounded-xl transition
               {{ request()->routeIs('riwayat') ? 'text-blue-600 bg-blue-50' : 'hover:bg-blue-50 hover:text-blue-600' }}">
                <i data-lucide="history" class="w-5 h-5"></i> Riwayat
            </a>
        </li>

        <li>
            <a href="{{ route('products.index') }}"
                class="flex items-center gap-2 px-3 py-2 rounded-xl transition
               {{ request()->routeIs('products.*') ? 'text-blue-600 bg-blue-50' : 'hover:bg-blue-50 hover:text-blue-600' }}">
                <i data-lucide="shopping-bag" class="w-5 h-5"></i> Daftar Produk
            </a>
        </li> --}}

        @if (Auth::user()->role === 'admin')
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-2 px-3 py-2 rounded-xl text-pink-600 font-semibold hover:bg-pink-50 transition
               {{ request()->routeIs('admin.*') ? 'bg-pink-50' : '' }}">
                    <i data-lucide="shield-check" class="w-5 h-5"></i> Admin Panel
                </a>
            </li>
        @endif
    @endauth
</ul>


            <div class="hidden md:flex items-center gap-4">
                @auth
                    <a href="{{ route('profile.index') }}"
    class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full hover:bg-blue-50 hover:text-blue-600 transition">
    <div class="profile-avatar font-medium">
        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
    </div>
</a>


                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-2 px-5 py-2 rounded-full border border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition font-medium">
                            <i data-lucide="log-out" class="w-5 h-5"></i>
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="px-6 py-2 rounded-full bg-gradient-to-r from-blue-600 to-blue-400 text-white font-semibold shadow hover:shadow-xl transition flex items-center gap-2">
                        <i data-lucide="log-in" class="w-5 h-5"></i>
                        Masuk
                    </a>
                @endauth
            </div>

            <button class="md:hidden mobile-menu-btn">
                <i data-lucide="menu" class="w-7 h-7 text-gray-700"></i>
            </button>
        </div>

        <div class="mobile-menu hidden px-6 pb-4">
    <ul class="flex flex-col gap-4 text-lg font-medium">

        @guest
            <a href="#home" class="flex items-center gap-2 py-2">
                 Beranda
            </a>

            <a href="#paket" class="flex items-center gap-2 py-2">
                 Paket Data
            </a>

            <a href="#tentang" class="flex items-center gap-2 py-2">
                 Tentang
            </a>

            <a href="#keunggulan" class="flex items-center gap-2 py-2">
                 Keunggulan
            </a>
        @endguest

            <a href="{{ route('customer.paket-data.index') }}" class="flex items-center gap-2 py-2">
                 Daftar Paket
            </a>

              <a href="{{ route('customer.transaksi.riwayat') }}" class="flex items-center gap-2 py-2">
                  Riwayat Transaksi
              </a>


        @auth
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 py-2">
                 Dashboard
            </a>

            {{-- <a href="{{ route('riwayat') }}" class="flex items-center gap-2 py-2">
                <i data-lucide="history" class="w-5 h-5"></i> Riwayat
            </a>

            <a href="{{ route('products.index') }}" class="flex items-center gap-2 py-2">
                <i data-lucide="shopping-bag" class="w-5 h-5"></i> Daftar Produk
            </a> --}}

            @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 py-2 text-pink-600">
                    <i data-lucide="shield-check" class="w-5 h-5"></i> Admin Panel
                </a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="mt-3 flex items-center gap-2 py-2 px-3 rounded-xl bg-red-500 text-white w-full justify-center">
                    <i data-lucide="log-out" class="w-5 h-5"></i> Logout
                </button>
            </form>
        @endauth

    </ul>
</div>

    </nav>

    <main class="px-6 md:px-0 animate-fadeIn">
        @yield('content')
    </main>

    <script>
        document.querySelector('.mobile-menu-btn').addEventListener('click', () => {
            document.querySelector('.mobile-menu').classList.toggle('hidden');
        });
    </script>

</body>

</html>
