<nav class="navbar">
    <div class="nav-container">
        <a href="{{ route('admin.dashboard') }}" class="logo">
<<<<<<< HEAD
            <span style="font-size: 1.5rem;">🛡️ Admin Panel</span>
        </a>

        <ul class="nav-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                   Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('admin.products.index') }}" 
                   class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                   Manajemen Produk
                </a>
            </li>

            <li>
                <a href="{{ route('admin.transaksi.index') }}" 
                   class="nav-link {{ request()->routeIs('admin.transaksi.*') ? 'active' : '' }}">
                   Transaksi
                </a>
            </li>

            <li>
                <a href="{{ route('admin.users.index') }}" 
                   class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                   Users
                </a>
            </li>
        </ul>

        <div class="nav-icons">
            <div style="margin-right: 15px; font-weight: bold; color: #333;">
                Halo, {{ Auth::user()->name }}
            </div>
            
            <form action="{{ route('logout') }}" method="POST" class="logout-form" style="display:inline">
                @csrf
                <button type="submit" class="logout-btn" style="background: #dc3545; color: white; border:none; padding: 5px 15px; border-radius: 15px; cursor: pointer;">
                    Logout
                </button>
=======
            <img src="{{ asset('img/icon.jpg') }}" alt="Admin" style="height:40px; margin-right:8px;">
         
        </a>

        <ul class="nav-menu">
            <li><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
            <li><a href="{{ route('admin.paket-data.index') }}" class="nav-link">Paket Data</a></li>
            <li><a href="{{ route('admin.transaksi.index') }}" class="nav-link">Manajemen Transaksi</a></li>
            <li><a href="{{ route('admin.users.index') }}" class="nav-link">Manajemen User</a></li>
        </ul>

        <div class="nav-icons">
            <a href="{{ route('profile.index') }}" class="icon-link" title="Profile">👤</a>
            <form action="{{ route('logout') }}" method="POST" class="logout-form" style="display:inline">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
            </form>
        </div>

        <button class="mobile-menu-btn">☰</button>
    </div>
<<<<<<< HEAD
</nav>
=======
</nav>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
