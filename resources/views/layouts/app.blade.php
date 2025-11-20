<!DOCTYPE html>
<html lang="id">
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
            font-size: 1.5rem;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            cursor: pointer;
            transition: opacity 0.3s;
        }

        .logo:hover {
            opacity: 0.8;
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

        @yield('extra-styles')
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">TelcoApp</a>
            
            <ul class="nav-menu">
                @if(Route::currentRouteName() === 'home')
                    <!-- SPA Mode: Show section links -->
                    <li><a href="#home" class="nav-link active">Beranda</a></li>
                    <li><a href="#paket-data" class="nav-link">Paket Data</a></li>
                    <li><a href="#tentang" class="nav-link">Tentang</a></li>
                @else
                    <!-- Normal Mode: Show route links -->
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('paket-data.index') }}">Paket Data</a></li>
                    <li><a href="{{ route('about') }}">Tentang</a></li>
                    
                    @auth
                        <li><a href="{{ route('dashboard') }}" @if(Route::currentRouteName() === 'dashboard') class="active" @endif>Dashboard</a></li>
                    @endauth
                @endif
            </ul>

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

    @yield('content')

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            const navMenu = document.querySelector('.nav-menu');
            navMenu.style.display = navMenu.style.display === 'flex' ? 'none' : 'flex';
        });

        // SPA Navigation - Smooth scroll for anchor links
        @if(Route::currentRouteName() === 'home')
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    const targetSection = document.getElementById(targetId);
                    
                    if (targetSection) {
                        targetSection.scrollIntoView({ behavior: 'smooth' });
                        updateActiveNavLink();
                    }
                });
            });

            // Update active link based on scroll position
            window.addEventListener('scroll', updateActiveNavLink);

            function updateActiveNavLink() {
                let current = 'home';
                const sections = document.querySelectorAll('section[id]');
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    if (window.pageYOffset >= sectionTop - 100) {
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
</html>
