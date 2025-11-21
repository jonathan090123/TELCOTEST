<nav class="navbar">
    <div class="nav-container">
        <a href="{{ route('admin.dashboard') }}" class="logo">
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
            </form>
        </div>

        <button class="mobile-menu-btn">☰</button>
    </div>
</nav>
