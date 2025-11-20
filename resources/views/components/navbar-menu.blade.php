@if(Auth::check() && Auth::user()->role === 'admin')
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
            <li><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
        </ul>
    @else
        <!-- Normal Mode: Show route links -->
        <ul class="nav-menu">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('paket-data.index') }}">Paket Data</a></li>
            <li><a href="{{ route('about') }}">Tentang</a></li>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
            <li><a href="{{ route('paket-data.index') }}">Paket Data</a></li>
            <li><a href="{{ route('about') }}">Tentang</a></li>
        </ul>
    @endif
@endif
