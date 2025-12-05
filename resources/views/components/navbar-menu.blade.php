@if(Auth::check() && Auth::user()->role === 'admin')
<<<<<<< HEAD
    <ul class="nav-menu">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
        </li>
        
        <li>
            <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                Produk (ML)
            </a>
        </li>

        <li>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                User
            </a>
        </li>
        
        <li>
            <a href="{{ route('admin.transaksi.index') }}" class="{{ request()->routeIs('admin.transaksi.*') ? 'active' : '' }}">
                Transaksi
            </a>
        </li>
    </ul>

@elseif(Auth::check())
    <ul class="nav-menu">
        @if(Route::currentRouteName() === 'home')
            <li><a href="#home" class="nav-link active">Beranda</a></li>
            <li><a href="#paket-data" class="nav-link">Paket Data</a></li>
            <li><a href="#tentang" class="nav-link">Tentang</a></li>
        @else
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('home') }}#paket-data">Paket Data</a></li>
            <li><a href="{{ route('about') }}">Tentang</a></li>
        @endif

        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
        </li>
    </ul>

@else
    <ul class="nav-menu">
        @if(Route::currentRouteName() === 'home')
            <li><a href="#home" class="nav-link active">Beranda</a></li>
            <li><a href="#paket-data" class="nav-link">Paket Data</a></li>
            <li><a href="#tentang" class="nav-link">Tentang</a></li>
        @else
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('home') }}#paket-data">Paket Data</a></li>
            <li><a href="{{ route('about') }}">Tentang</a></li>
        @endif
    </ul>
@endif
=======
    <!-- Admin Navbar -->
    <ul class="nav-menu">
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.users.index') }}">Manajemen User</a></li>
        <li><a href="{{ route('admin.transaksi.index') }}">Manajemen Transaksi</a></li>
    </ul>
@elseif(Auth::check())
    <!-- Customer Navbar -->
    @if(Route::currentRouteName() === 'home')
        <!-- SPA Mode: Show section links -->
        <ul class="nav-menu">
            <li><a href="#home" class="nav-link active">Beranda</a></li>
            <li><a href="#paket-data" class="nav-link">Paket Data</a></li>
            <li><a href="#tentang" class="nav-link">Tentang</a></li>
        </ul>
    @else
        <!-- Normal Mode: Show route links -->
        <ul class="nav-menu">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('home') }}#paket-data">Paket Data</a></li>
            <li><a href="{{ route('about') }}">Tentang</a></li>
        </ul>
    @endif
@else
    <!-- Guest Navbar -->
    @if(Route::currentRouteName() === 'home')
        <!-- SPA Mode: Show section links -->
        <ul class="nav-menu">
            <li><a href="#home" class="nav-link active">Beranda</a></li>
            <li><a href="#paket-data" class="nav-link">Paket Data</a></li>
            <li><a href="#tentang" class="nav-link">Tentang</a></li>
        </ul>
    @else
        <!-- Normal Mode: Show route links -->
        <ul class="nav-menu">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('home') }}#paket-data">Paket Data</a></li>
            <li><a href="{{ route('about') }}">Tentang</a></li>
        </ul>
    @endif
@endif
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
