@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Beli ' . $paket->product_name)

@section('extra-styles')
    <style>
        /* reset page-specific background so layout.app navbar and page style show consistently */
        body { background: inherit; }
=======
@section('title', 'Beli ' . $paket->nama)

@section('extra-styles')
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
            padding: 2rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            margin-bottom: 2rem;
            font-weight: 600;
        }

        .purchase-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .card-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .card-body {
            padding: 2rem;
        }

        .order-summary {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .order-summary h3 {
            color: #333;
            margin-bottom: 1rem;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 0.8rem 0;
            border-bottom: 1px solid #e9ecef;
        }

        .summary-item:last-child {
            border-bottom: none;
            font-weight: bold;
            font-size: 1.2rem;
            color: #667eea;
            padding-top: 1rem;
            margin-top: 0.5rem;
            border-top: 2px solid #667eea;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .payment-option {
            position: relative;
        }

        .payment-option input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .payment-option label {
            display: block;
            padding: 1.5rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
        }

        .payment-option input[type="radio"]:checked + label {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .payment-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .alert-error {
            background: #fee;
            border: 1px solid #fcc;
            color: #c33;
        }

        .info-box {
            background: #e7f3ff;
            border-left: 4px solid #667eea;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        .info-box h4 {
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .info-box p {
            color: #666;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .payment-methods {
                grid-template-columns: 1fr 1fr;
            }
        }
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
    </style>
@endsection

@section('content')
<<<<<<< HEAD
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">

        {{-- Header (match dashboard) --}}
        <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-xl sm:rounded-2xl p-4 sm:p-6 lg:p-8 shadow-lg sm:shadow-xl flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 lg:gap-6">
            <div class="w-full lg:w-auto">
                <h1 class="text-2xl sm:text-3xl font-bold flex items-center gap-2 flex-wrap">🛒 Beli — {{ $paket->product_name }}</h1>
                <p class="text-white/90 mt-1 text-sm sm:text-base">Operator: <strong>{{ $paket->operator }}</strong> · Kategori: <strong>{{ $paket->ml_category }}</strong></p>
            </div>

            <div class="text-right lg:ml-auto">
                <div class="text-xs sm:text-sm opacity-90">Total Pembayaran</div>
                <div class="text-2xl sm:text-3xl font-extrabold mt-1">Rp {{ number_format($paket->price, 0, ',', '.') }}</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 mt-6 sm:mt-8">
            {{-- Deskripsi paket --}}
            <div class="lg:col-span-2 bg-white rounded-lg sm:rounded-xl p-4 sm:p-6 shadow-md border border-gray-100">
                <h2 class="text-base sm:text-lg font-semibold text-indigo-600">{{ $paket->product_name }}</h2>
                <div class="text-xl sm:text-2xl font-bold text-gray-800 mt-2 sm:mt-3">Rp {{ number_format($paket->price, 0, ',', '.') }}</div>
                @if($paket->description)
                    <p class="text-gray-500 text-xs sm:text-sm mt-3 leading-relaxed">{{ $paket->description }}</p>
                @endif

                <div class="mt-4 sm:mt-6 grid grid-cols-2 gap-3 sm:gap-4">
                    <div class="bg-gray-50 p-3 sm:p-4 rounded-md">
                        <div class="text-xs sm:text-sm text-gray-500">Kategori</div>
                        <div class="font-semibold text-sm sm:text-base">{{ $paket->ml_category ?? '-' }}</div>
                    </div>
                    <div class="bg-gray-50 p-3 sm:p-4 rounded-md">
                        <div class="text-xs sm:text-sm text-gray-500">Operator</div>
                        <div class="font-semibold text-sm sm:text-base">{{ $paket->operator }}</div>
                    </div>
                </div>
            </div>

            {{-- Form Pembelian --}}
            <div class="bg-white rounded-lg sm:rounded-xl p-4 sm:p-6 shadow-md border border-gray-100">
                @if($errors->any())
                    <div class="mb-4 p-3 rounded-md bg-red-50 text-red-700 text-sm">
                        <strong>Ada kesalahan:</strong>
                        <ul class="mt-2 list-disc list-inside text-xs sm:text-sm">
=======
        <a href="{{ route('paket-data.show', $paket->id) }}" class="back-link">
            ← Kembali
        </a>

        <div class="purchase-card">
            <div class="card-header">
                <h1>🛒 Checkout Pembelian</h1>
                <p>Lengkapi data untuk menyelesaikan pembelian</p>
            </div>

            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-error">
                        <strong>Oops!</strong> Ada kesalahan:
                        <ul style="margin: 10px 0 0 20px;">
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

<<<<<<< HEAD
                <div class="mb-4 p-3 rounded-md bg-blue-50 text-blue-700 text-xs sm:text-sm">
                    Paket akan otomatis aktif setelah pembayaran dikonfirmasi.
                </div>

                <form action="{{ route('customer.transaksi.store', $paket->id) }}" method="POST">
                    @csrf

                    <label class="block text-xs sm:text-sm font-medium text-gray-700">Nomor HP Tujuan</label>
                    <input type="tel" name="nomor_hp" required
                           value="{{ old('nomor_hp', Auth::user()->phone_number ?? '') }}"
                           class="mt-1 mb-3 sm:mb-4 block w-full rounded-md border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">

                    <label class="block text-xs sm:text-sm font-medium text-gray-700">Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="mt-1 mb-3 sm:mb-4 block w-full rounded-md border-gray-200 text-sm">
                        <option value="transfer">Transfer Bank</option>
                        <option value="gopay">GoPay</option>
                        <option value="ovo">OVO</option>
                        <option value="dana">DANA</option>
                    </select>

                    <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold py-2 sm:py-2.5 rounded-lg shadow hover:shadow-lg transition text-sm sm:text-base">💳 Bayar Sekarang</button>
=======
                <!-- Order Summary -->
                <div class="order-summary">
                    <h3>📋 Ringkasan Pesanan</h3>
                    <div class="summary-item">
                        <span>Paket</span>
                        <strong>{{ $paket->nama }}</strong>
                    </div>
                    <div class="summary-item">
                        <span>Kuota</span>
                        <strong>{{ $paket->kuota }}</strong>
                    </div>
                    <div class="summary-item">
                        <span>Masa Aktif</span>
                        <strong>{{ $paket->masa_aktif }} hari</strong>
                    </div>
                    <div class="summary-item">
                        <span>Total Pembayaran</span>
                        <strong>Rp {{ number_format($paket->harga, 0, ',', '.') }}</strong>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="info-box">
                    <h4>ℹ️ Informasi Penting</h4>
                    <p>
                        Paket akan otomatis aktif setelah pembayaran dikonfirmasi. 
                        Silakan lakukan pembayaran sesuai metode yang dipilih.
                    </p>
                </div>

                <!-- Purchase Form -->
                <form action="{{ route('paket-data.beli.proses', $paket->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nomor_hp">Nomor HP Tujuan</label>
                        <input 
                            type="tel" 
                            class="form-control" 
                            id="nomor_hp" 
                            name="nomor_hp" 
                            placeholder="08xxxxxxxxxx"
                            value="{{ old('nomor_hp', $user->phone) }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label>Pilih Metode Pembayaran</label>
                        <div class="payment-methods">
                            <div class="payment-option">
                                <input type="radio" name="metode_pembayaran" id="transfer" value="transfer" checked>
                                <label for="transfer">
                                    <div class="payment-icon">🏦</div>
                                    Transfer Bank
                                </label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" name="metode_pembayaran" id="gopay" value="gopay">
                                <label for="gopay">
                                    <div class="payment-icon">💚</div>
                                    GoPay
                                </label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" name="metode_pembayaran" id="ovo" value="ovo">
                                <label for="ovo">
                                    <div class="payment-icon">💜</div>
                                    OVO
                                </label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" name="metode_pembayaran" id="dana" value="dana">
                                <label for="dana">
                                    <div class="payment-icon">💙</div>
                                    DANA
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">
                        💳 Proses Pembayaran
                    </button>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
                </form>
            </div>
        </div>
    </div>
@endsection
<<<<<<< HEAD
@endsection
=======
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
