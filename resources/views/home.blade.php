@extends('layouts.app')

@section('title', 'Beranda')
@section('bg-color', 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)')

@section('extra-styles')
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
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

        .btn-carousel {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
            font-size: 1rem;
        }

        .btn-carousel:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
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
@endsection

@section('content')
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
                @if(isset($paketData) && $paketData->count() > 0)
                    @foreach($paketData as $paket)
                        <div class="carousel-slide">
                            <div class="product-card">
                                <div class="product-info">
                                    <h2>{{ $paket->nama }}</h2>
                                    <div class="product-data">{{ $paket->kuota }}</div>
                                    <div class="product-price">Rp {{ number_format($paket->harga, 0, ',', '.') }} <span>/{{ $paket->masa_aktif }} hari</span></div>
                                    <ul class="product-features">
                                        @if($paket->deskripsi)
                                            <li>{{ Str::limit($paket->deskripsi, 120) }}</li>
                                        @else
                                            <li>Paket data sesuai kebutuhan Anda</li>
                                        @endif
                                    </ul>
                                    @auth
                                        <a href="{{ route('paket-data.beli', $paket->id) }}" class="btn-carousel">Beli Sekarang</a>
                                    @else
                                        <a href="{{ route('paket-data.show', $paket->id) }}" class="btn-carousel">Lihat Detail</a>
                                    @endauth
                                </div>
                                <div class="product-visual">
                                    <div class="product-icon">📱</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- fallback to static slides if $paketData not provided -->
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
                                <button class="btn-carousel">Beli Sekarang</button>
                            </div>
                            <div class="product-visual">
                                <div class="product-icon">⚡</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            @if(isset($paketData) && $paketData->count() > 0)
                @for ($i = 0; $i < $paketData->count(); $i++)
                    <button class="indicator @if($i == 0) active @endif" onclick="goToSlide({{ $i }})"></button>
                @endfor
            @else
                <button class="indicator active" onclick="goToSlide(0)"></button>
                <button class="indicator" onclick="goToSlide(1)"></button>
                <button class="indicator" onclick="goToSlide(2)"></button>
                <button class="indicator" onclick="goToSlide(3)"></button>
            @endif
        </div>
    </section>

    <script>
        let currentSlide = 0;
        const totalSlides = {{ isset($paketData) ? $paketData->count() : 4 }};

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
    </script>
@endsection
