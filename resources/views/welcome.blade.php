@extends('layouts.app')

@section('title', 'Beranda')
@section('bg-color', 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)')

@section('extra-styles')
    <style>
        html {
            scroll-behavior: smooth;
        }

        .nav-menu a.nav-link {
            cursor: pointer;
        }

        .nav-menu a.nav-link.active {
            color: #667eea;
            background: rgba(102, 126, 234, 0.15);
            font-weight: 600;
        }

        /* Section Styles */
        section {
            scroll-margin-top: 80px;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 5rem 2rem;
            text-align: center;
            color: white;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero p {
            font-size: 1.3rem;
            opacity: 0.95;
            margin-bottom: 2rem;
        }

        /* Carousel Styles */
        .carousel-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 3rem 2rem;
        }

        .carousel-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        .carousel-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .carousel-title h2 {
            font-size: 2.5rem;
            color: white;
            margin-bottom: 0.5rem;
        }

        .carousel-title p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
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

        /* Paket Data Section */
        .paket-data-section {
            background: white;
            padding: 4rem 2rem;
        }

        .paket-data-header {
            text-align: center;
            max-width: 1200px;
            margin: 0 auto 3rem;
        }

        .paket-data-header h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .paket-data-header p {
            color: #666;
            font-size: 1.1rem;
        }

        /* Paket Grid Cards */
        .paket-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .paket-grid-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            border: 1px solid #eee;
        }

        .paket-grid-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .paket-grid-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .paket-grid-header h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .paket-grid-icon {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .paket-grid-body {
            padding: 2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .paket-quota {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 1rem;
        }

        .paket-price {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .paket-price .period {
            font-size: 0.85rem;
            color: #999;
            font-weight: normal;
        }

        .paket-features {
            list-style: none;
            margin-bottom: 2rem;
            flex-grow: 1;
        }

        .paket-features li {
            padding: 0.6rem 0;
            border-bottom: 1px solid #eee;
            color: #666;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }

        .paket-features li:last-child {
            border-bottom: none;
        }

        .paket-features li:before {
            content: "✓";
            color: #667eea;
            font-weight: bold;
            margin-right: 0.8rem;
            font-size: 1rem;
        }

        .paket-grid-footer {
            padding: 0 2rem 2rem 2rem;
            margin-top: auto;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: block;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            width: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Tentang Section */
        .tentang-section {
            padding: 4rem 2rem;
            background: white;
        }

        .tentang-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .tentang-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .tentang-header h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .tentang-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .tentang-card {
            padding: 2rem;
            background: #f8f9ff;
            border-radius: 15px;
            border-left: 4px solid #667eea;
        }

        .tentang-card h3 {
            color: #667eea;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .tentang-card p {
            color: #666;
            line-height: 1.8;
        }

        .tentang-features {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 3rem 2rem;
            border-radius: 15px;
            color: white;
        }

        .tentang-features h3 {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 2rem;
        }

        .tentang-features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .tentang-feature-item {
            text-align: center;
        }

        .tentang-feature-item-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .tentang-feature-item h4 {
            margin-bottom: 0.5rem;
        }

        .tentang-feature-item p {
            font-size: 0.95rem;
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

            .tentang-grid {
                grid-template-columns: 1fr;
            }

            .tentang-features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Paket Data Terbaik untuk Kebutuhan Anda</h1>
            <p>Nikmati internet cepat dengan harga terjangkau</p>
        </div>
    </section>

    <!-- Carousel Section -->
    <section class="carousel-section" id="carousel">
        <div class="carousel-container">
            <div class="carousel-title">
                <h2>Paket Unggulan Kami</h2>
                <p>Geser untuk melihat lebih banyak paket menarik</p>
            </div>
            
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
        </div>
    </section>

    <!-- Paket Data Section -->
    <section class="paket-data-section" id="paket-data">
        <div class="paket-data-header">
            <h2>Semua Paket Data Kami</h2>
            <p>Pilih paket yang sesuai dengan kebutuhan Anda</p>
        </div>

        <div class="paket-grid">
            <!-- Card 1 -->
            <div class="paket-grid-card">
                <div class="paket-grid-header">
                    <div class="paket-grid-icon">⚡</div>
                    <h3>Freedom Unlimited</h3>
                </div>
                <div class="paket-grid-body">
                    <div class="paket-quota">Unlimited</div>
                    <div class="paket-price">Rp 150.000 <span class="period">/bulan</span></div>
                    <ul class="paket-features">
                        <li>Internet tanpa batas</li>
                        <li>Kecepatan hingga 10 Mbps</li>
                        <li>Gratis nelpon 100 menit</li>
                        <li>Bonus streaming musik</li>
                    </ul>
                    <div class="paket-grid-footer">
                        <button class="btn-primary">Beli Sekarang</button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="paket-grid-card">
                <div class="paket-grid-header">
                    <div class="paket-grid-icon">📶</div>
                    <h3>Super 50GB</h3>
                </div>
                <div class="paket-grid-body">
                    <div class="paket-quota">50 GB</div>
                    <div class="paket-price">Rp 85.000 <span class="period">/bulan</span></div>
                    <ul class="paket-features">
                        <li>50GB kuota internet</li>
                        <li>Bonus streaming 10GB</li>
                        <li>Gratis SMS unlimited</li>
                        <li>Masa aktif 30 hari</li>
                    </ul>
                    <div class="paket-grid-footer">
                        <button class="btn-primary">Beli Sekarang</button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="paket-grid-card">
                <div class="paket-grid-header">
                    <div class="paket-grid-icon">📱</div>
                    <h3>Smart 25GB</h3>
                </div>
                <div class="paket-grid-body">
                    <div class="paket-quota">25 GB</div>
                    <div class="paket-price">Rp 50.000 <span class="period">/bulan</span></div>
                    <ul class="paket-features">
                        <li>25GB kuota internet</li>
                        <li>Bonus 5GB kuota malam</li>
                        <li>Gratis nelpon 50 menit</li>
                        <li>Cocok untuk pelajar</li>
                    </ul>
                    <div class="paket-grid-footer">
                        <button class="btn-primary">Beli Sekarang</button>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="paket-grid-card">
                <div class="paket-grid-header">
                    <div class="paket-grid-icon">🌐</div>
                    <h3>Hemat 10GB</h3>
                </div>
                <div class="paket-grid-body">
                    <div class="paket-quota">10 GB</div>
                    <div class="paket-price">Rp 30.000 <span class="period">/bulan</span></div>
                    <ul class="paket-features">
                        <li>10GB kuota internet</li>
                        <li>Bonus 2GB kuota malam</li>
                        <li>Masa aktif 30 hari</li>
                        <li>Harga paling terjangkau</li>
                    </ul>
                    <div class="paket-grid-footer">
                        <button class="btn-primary">Beli Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section class="tentang-section" id="tentang">
        <div class="tentang-container">
            <div class="tentang-header">
                <h2>Tentang TelcoApp</h2>
            </div>

            <div class="tentang-grid">
                <div class="tentang-card">
                    <h3>🌟 Apa itu TelcoApp?</h3>
                    <p>Platform terpercaya untuk pembelian paket data internet dengan harga terjangkau dan proses yang mudah. Kami berkomitmen memberikan layanan terbaik dengan dukungan pelanggan 24/7.</p>
                </div>

                <div class="tentang-card">
                    <h3>💡 Visi Kami</h3>
                    <p>Menjadi penyedia layanan paket data terdepan yang memberikan akses internet berkualitas tinggi kepada seluruh masyarakat Indonesia dengan harga yang kompetitif dan terjangkau.</p>
                </div>

                <div class="tentang-card">
                    <h3>🎯 Misi Kami</h3>
                    <p>Memberikan solusi konektivitas internet yang inovatif, aman, dan terpercaya dengan fokus pada kepuasan pelanggan, transparansi harga, dan layanan purna jual yang responsif.</p>
                </div>
            </div>

            <div class="tentang-features">
                <h3>✨ Keunggulan Kami</h3>
                <div class="tentang-features-grid">
                    <div class="tentang-feature-item">
                        <div class="tentang-feature-item-icon">💰</div>
                        <h4>Harga Terjangkau</h4>
                        <p>Paket data dengan harga kompetitif dan terbaik di kelasnya</p>
                    </div>
                    <div class="tentang-feature-item">
                        <div class="tentang-feature-item-icon">⚡</div>
                        <h4>Proses Cepat</h4>
                        <p>Aktivasi instan dan mudah melalui platform online kami</p>
                    </div>
                    <div class="tentang-feature-item">
                        <div class="tentang-feature-item-icon">🔒</div>
                        <h4>Aman & Terpercaya</h4>
                        <p>Transaksi aman dengan enkripsi tingkat bank</p>
                    </div>
                    <div class="tentang-feature-item">
                        <div class="tentang-feature-item-icon">📱</div>
                        <h4>Fleksibel</h4>
                        <p>Berbagai pilihan paket sesuai kebutuhan Anda</p>
                    </div>
                </div>
            </div>
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
@endsection