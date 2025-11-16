<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TelcoApp - Paket Data Terbaik</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
            position: relative;
        }

        .nav-menu a:hover {
            color: #667eea;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #667eea;
            transition: width 0.3s;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .nav-icons {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: #333;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .icon-btn:hover {
            color: #667eea;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
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

        /* Hero Section */
        .hero {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 2rem;
            text-align: center;
            color: white;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        /* Carousel Styles */
        .carousel-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            position: relative;
        }

        .carousel {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-slide {
            min-width: 100%;
            padding: 3rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .product-info h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .product-data {
            font-size: 4rem;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .product-price {
            font-size: 2rem;
            color: #333;
            margin-bottom: 2rem;
        }

        .product-price span {
            font-size: 1rem;
            color: #666;
        }

        .product-features {
            list-style: none;
            margin-bottom: 2rem;
        }

        .product-features li {
            padding: 0.8rem 0;
            border-bottom: 1px solid #eee;
            color: #666;
            display: flex;
            align-items: center;
        }

        .product-features li:before {
            content: "✓";
            color: #667eea;
            font-weight: bold;
            margin-right: 0.5rem;
            font-size: 1.2rem;
        }

        .product-visual {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-icon {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 5rem;
            color: white;
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
            z-index: 10;
            color: #667eea;
        }

        .carousel-btn:hover {
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .carousel-btn.prev {
            left: 1rem;
        }

        .carousel-btn.next {
            right: 1rem;
        }

        .carousel-indicators {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .indicator.active {
            background: white;
            width: 30px;
            border-radius: 6px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .product-card {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .product-data {
                font-size: 3rem;
            }

            .carousel-btn {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">TelcoApp</div>
            
            <ul class="nav-menu">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('paket-data.index') }}">Paket Data</a></li>
                <li><a href="{{ route('about') }}">Tentang</a></li>
        
            </ul>

            <div class="nav-icons">
                @auth
                    <a href="{{ route('dashboard') }}" class="icon-btn" title="Dashboard">📊</a>
                    <a href="{{ route('profile.index') }}" class="icon-btn" title="Profile">👤</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-primary" style="padding: 0.6rem 1.5rem;">Logout</button>
                    </form>
                @else
                    <button class="icon-btn">🔍</button>
                    <a href="{{ route('login') }}" class="btn-primary">Login</a>
                @endauth
            </div>

            <button class="mobile-menu-btn">☰</button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Paket Data Terbaik untuk Kebutuhan Anda</h1>
        <p>Nikmati internet cepat dengan harga terjangkau</p>
    </section>

    <!-- Carousel Section -->
    <section class="carousel-container">
        <div class="carousel">
            <button class="carousel-btn prev" onclick="changeSlide(-1)">‹</button>
            <button class="carousel-btn next" onclick="changeSlide(1)">›</button>
            
            <div class="carousel-track" id="carouselTrack">
                <!-- Slide 1 -->
                <div class="carousel-slide">
                    <div class="product-card">
                        <div class="product-info">
                            <h2>Paket Freedom Unlimited</h2>
                            <div class="product-data">Unlimited</div>
                            <div class="product-price">Rp 150.000 <span>/bulan</span></div>
                            <ul class="product-features">
                                <li>Internet tanpa batas</li>
                                <li>Kecepatan hingga 10 Mbps</li>
                                <li>Gratis nelpon 100 menit</li>
                                <li>Bonus streaming musik</li>
                            </ul>
                            <button class="btn-primary">Beli Sekarang</button>
                        </div>
                        <div class="product-visual">
                            <div class="product-icon">⚡</div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-slide">
                    <div class="product-card">
                        <div class="product-info">
                            <h2>Paket Super 50GB</h2>
                            <div class="product-data">50 GB</div>
                            <div class="product-price">Rp 85.000 <span>/bulan</span></div>
                            <ul class="product-features">
                                <li>50GB kuota internet</li>
                                <li>Bonus streaming 10GB</li>
                                <li>Gratis SMS unlimited</li>
                                <li>Masa aktif 30 hari</li>
                            </ul>
                            <button class="btn-primary">Beli Sekarang</button>
                        </div>
                        <div class="product-visual">
                            <div class="product-icon">📶</div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-slide">
                    <div class="product-card">
                        <div class="product-info">
                            <h2>Paket Smart 25GB</h2>
                            <div class="product-data">25 GB</div>
                            <div class="product-price">Rp 50.000 <span>/bulan</span></div>
                            <ul class="product-features">
                                <li>25GB kuota internet</li>
                                <li>Bonus 5GB kuota malam</li>
                                <li>Gratis nelpon 50 menit</li>
                                <li>Cocok untuk pelajar</li>
                            </ul>
                            <button class="btn-primary">Beli Sekarang</button>
                        </div>
                        <div class="product-visual">
                            <div class="product-icon">📱</div>
                        </div>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="carousel-slide">
                    <div class="product-card">
                        <div class="product-info">
                            <h2>Paket Hemat 10GB</h2>
                            <div class="product-data">10 GB</div>
                            <div class="product-price">Rp 30.000 <span>/bulan</span></div>
                            <ul class="product-features">
                                <li>10GB kuota internet</li>
                                <li>Bonus 2GB kuota malam</li>
                                <li>Masa aktif 30 hari</li>
                                <li>Harga paling terjangkau</li>
                            </ul>
                            <button class="btn-primary">Beli Sekarang</button>
                        </div>
                        <div class="product-visual">
                            <div class="product-icon">🌐</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button class="indicator active" onclick="goToSlide(0)"></button>
            <button class="indicator" onclick="goToSlide(1)"></button>
            <button class="indicator" onclick="goToSlide(2)"></button>
            <button class="indicator" onclick="goToSlide(3)"></button>
        </div>
    </section>

    <script>
        let currentSlide = 0;
        const totalSlides = 4;

        function changeSlide(direction) {
            currentSlide += direction;
            
            if (currentSlide < 0) {
                currentSlide = totalSlides - 1;
            } else if (currentSlide >= totalSlides) {
                currentSlide = 0;
            }
            
            updateCarousel();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateCarousel();
        }

        function updateCarousel() {
            const track = document.getElementById('carouselTrack');
            const indicators = document.querySelectorAll('.indicator');
            
            track.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            indicators.forEach((indicator, index) => {
                if (index === currentSlide) {
                    indicator.classList.add('active');
                } else {
                    indicator.classList.remove('active');
                }
            });
        }

        // Auto slide every 5 seconds
        setInterval(() => {
            changeSlide(1);
        }, 5000);
    </script>
</body>
</html>