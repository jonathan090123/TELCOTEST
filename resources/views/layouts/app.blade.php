<!DOCTYPE html>
<html lang="id">
<<<<<<< HEAD

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
=======
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - TelcoApp</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: @yield('bg-color', '#f5f6fa');
        }

        /* Navbar Styles */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 0;
            text-decoration: none;
            cursor: pointer;
            transition: opacity 0.3s;
        }

        .logo img {
            height: 48px;
            width: auto;
            border-radius: 6px;
            display: block;
        }

        .logo:hover {
            opacity: 0.9;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
            list-style: none;
        }

        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .nav-menu a:hover {
            color: #667eea;
            background: rgba(102, 126, 234, 0.1);
        }

        .nav-menu a.active {
            color: #667eea;
            background: rgba(102, 126, 234, 0.15);
            font-weight: 600;
        }

        .nav-icons {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .icon-link {
            color: #333;
            text-decoration: none;
            font-size: 1.2rem;
            transition: color 0.3s;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.05);
        }

        .icon-link:hover {
            color: #667eea;
            background: rgba(102, 126, 234, 0.15);
        }

        .btn-action {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.3s, box-shadow 0.3s;
            font-size: 0.95rem;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Generic button utilities used across pages */
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            box-shadow: 0 6px 18px rgba(102,126,234,0.15);
        }

        .btn-secondary {
            background: #eef2f7;
            color: #333;
            border: 1px solid #e2e8f0;
        }

        .mt-3 { margin-top: 1rem; }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #333;
        }

        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .nav-container {
                padding: 1rem;
            }

            .logo {
                font-size: 1.2rem;
            }

            .nav-icons {
                gap: 1rem;
            }
        }

        .logout-form {
            display: inline;
            margin: 0;
        }

        .logout-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
            font-size: 0.95rem;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* SPA Navigation */
        html {
            scroll-behavior: smooth;
        }

        section {
            scroll-margin-top: 80px;
        }

        .nav-menu a.nav-link {
            cursor: pointer;
        }

        .nav-menu a.nav-link.active {
            color: #667eea !important;
            background: rgba(102, 126, 234, 0.15) !important;
            font-weight: 600 !important;
        }

        /* Page transition helper for SPA sections */
        .page-transition {
            transition: opacity 360ms cubic-bezier(.2,.9,.2,1), transform 360ms cubic-bezier(.2,.9,.2,1);
            will-change: opacity, transform;
        }

        .page-transition.is-fading {
            opacity: 0;
            transform: translateY(8px);
            pointer-events: none;
        }

        @yield('extra-styles')
    </style>
</head>
<body>
    <!-- Navbar (can be overridden by admin-navbar section). If not overridden and we're in admin area, include admin component. Otherwise render default navbar-menu. -->
    @hasSection('admin-navbar')
        @yield('admin-navbar')
    @elseif(request()->is('admin/*') || request()->routeIs('admin.*'))
        @include('components.admin-navbar')
    @else
        <nav class="navbar">
            <div class="nav-container">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('img/icon.jpg') }}" alt="TelcoApp">
                </a>
                
                @component('components.navbar-menu')
                @endcomponent

                <div class="nav-icons">
                    @auth
                        <a href="{{ route('profile.index') }}" class="icon-link" title="Profile">👤</a>
                        <form action="{{ route('logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit" class="logout-btn">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-action">Login</a>
                    @endauth
                </div>

                <button class="mobile-menu-btn">☰</button>
            </div>
        </nav>
    @endif

    <main id="app-content" class="page-transition">
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
        @yield('content')
    </main>

    <script>
<<<<<<< HEAD
        document.querySelector('.mobile-menu-btn').addEventListener('click', () => {
            document.querySelector('.mobile-menu').classList.toggle('hidden');
        });
    </script>

</body>

=======
        // Mobile menu toggle
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            const navMenu = document.querySelector('.nav-menu');
            navMenu.style.display = navMenu.style.display === 'flex' ? 'none' : 'flex';
        });

        // SPA Navigation - Smooth scroll for anchor links with a fade transition
        @if(Route::currentRouteName() === 'home')
            const navLinks = document.querySelectorAll('.nav-link');
            const appContent = document.getElementById('app-content');
            const FADE_DURATION = 360; // should match CSS transition duration (ms)

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    const targetSection = document.getElementById(targetId);

                    if (!targetSection) return;

                    // Add fading class to content
                    appContent.classList.add('is-fading');

                    // Wait for fade-out, then scroll and fade-in
                    setTimeout(() => {
                        targetSection.scrollIntoView({ behavior: 'smooth' });
                        // small delay to allow smooth scroll to start
                        setTimeout(() => {
                            appContent.classList.remove('is-fading');
                            updateActiveNavLink();
                        }, 120);
                    }, FADE_DURATION - 120);
                });
            });

            // Update active link based on scroll position
            window.addEventListener('scroll', updateActiveNavLink);

            function updateActiveNavLink() {
                let current = 'home';
                const sections = document.querySelectorAll('section[id]');

                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    if (window.pageYOffset >= sectionTop - 120) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${current}`) {
                        link.classList.add('active');
                    }
                });
            }

            // Set initial active link
            updateActiveNavLink();
        @endif
    </script>
</body>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
</html>
