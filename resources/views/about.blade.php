@extends('layouts.app')

@section('title', 'Tentang Kami')
@section('bg-color', 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)')

@section('extra-styles')
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .page-title {
            color: white;
            font-size: 3rem;
            margin-bottom: 2rem;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .about-content {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            margin-bottom: 2rem;
        }

        .about-section {
            margin-bottom: 2rem;
        }

        .about-section h2 {
            color: #667eea;
            font-size: 1.8rem;
            margin-bottom: 1rem;
            border-bottom: 3px solid #764ba2;
            padding-bottom: 0.5rem;
        }

        .about-section p {
            color: #555;
            line-height: 1.8;
            font-size: 1.05rem;
            margin-bottom: 1rem;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .feature-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-card h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .feature-card p {
            color: rgba(255, 255, 255, 0.9);
        }

        .back-link {
            text-align: center;
            margin-top: 2rem;
        }

        .back-link a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: text-decoration 0.3s;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .about-content {
                padding: 2rem 1.5rem;
            }

            .about-section h2 {
                font-size: 1.4rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h1 class="page-title">Tentang TelcoApp</h1>

        <div class="about-content">
            <div class="about-section">
                <h2>🌟 Apa itu TelcoApp?</h2>
                <p>
<<<<<<< HEAD
                    TelcoApp adalah platform terpercaya untuk pembelian paket data internet dengan harga terjangkau dan proses yang mudah.
=======
                    TelcoApp adalah platform terpercaya untuk pembelian paket data internet dengan harga terjangkau dan proses yang mudah. 
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
                    Kami berkomitmen memberikan layanan terbaik dengan dukungan pelanggan 24/7.
                </p>
            </div>

            <div class="about-section">
                <h2>💡 Visi Kami</h2>
                <p>
<<<<<<< HEAD
                    Menjadi penyedia layanan paket data terdepan yang memberikan akses internet berkualitas tinggi kepada seluruh masyarakat
=======
                    Menjadi penyedia layanan paket data terdepan yang memberikan akses internet berkualitas tinggi kepada seluruh masyarakat 
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
                    Indonesia dengan harga yang kompetitif dan terjangkau.
                </p>
            </div>

            <div class="about-section">
                <h2>🎯 Misi Kami</h2>
                <p>
<<<<<<< HEAD
                    Memberikan solusi konektivitas internet yang inovatif, aman, dan terpercaya dengan fokus pada kepuasan pelanggan,
=======
                    Memberikan solusi konektivitas internet yang inovatif, aman, dan terpercaya dengan fokus pada kepuasan pelanggan, 
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
                    transparansi harga, dan layanan purna jual yang responsif.
                </p>
            </div>

            <div class="about-section">
                <h2>✨ Keunggulan Kami</h2>
                <div class="features">
                    <div class="feature-card">
                        <h3>💰 Harga Terjangkau</h3>
                        <p>Paket data dengan harga kompetitif dan terbaik di kelasnya</p>
                    </div>
                    <div class="feature-card">
                        <h3>⚡ Proses Cepat</h3>
                        <p>Aktivasi instan dan mudah melalui platform online kami</p>
                    </div>
                    <div class="feature-card">
                        <h3>🔒 Aman & Terpercaya</h3>
                        <p>Transaksi aman dengan enkripsi tingkat bank</p>
                    </div>
                    <div class="feature-card">
                        <h3>📱 Fleksibel</h3>
                        <p>Berbagai pilihan paket sesuai kebutuhan Anda</p>
                    </div>
                </div>
            </div>

            <div class="about-section">
                <h2>📞 Hubungi Kami</h2>
                <p>
                    Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi kami:<br>
                    <strong>Email:</strong> support@telcoapp.com<br>
                    <strong>Telepon:</strong> +62 821-XXXX-XXXX<br>
                    <strong>WhatsApp:</strong> +62 821-XXXX-XXXX
                </p>
            </div>
        </div>

        <div class="back-link">
            <a href="{{ route('home') }}">← Kembali ke Beranda</a>
        </div>
    </div>
@endsection
