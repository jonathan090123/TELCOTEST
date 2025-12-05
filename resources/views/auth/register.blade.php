<!DOCTYPE html>
<html lang="id">
<<<<<<< HEAD

=======
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - TelcoApp</title>
<<<<<<< HEAD

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-b from-gray-100 to-white">

    <div class="w-full max-w-3xl bg-white rounded-2xl shadow-xl p-8 animate-fadeSlideIn">

        <div class="flex flex-col items-center mb-6">
            <h1 class="text-3xl font-bold text-blue-500">Buat Akun</h1>
            <p class="text-gray-600 text-center mt-2">
                Daftar sekarang untuk mulai menggunakan TelcoApp.
            </p>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 rounded-xl bg-green-50 border border-green-200 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700">
                <strong>Oops!</strong> Ada kesalahan:
                <ul class="list-disc ml-5 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block mb-1 font-semibold text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" name="name" placeholder="Nama lengkap Anda"
                        value="{{ old('name') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-700 outline-none">
                </div>

                <div>
                    <label for="email" class="block mb-1 font-semibold text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="nama@email.com"
                        value="{{ old('email') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-700 outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="nomor_hp" class="block mb-1 font-semibold text-gray-700">No. Hp</label>
                    <input type="text" id="nomor_hp" name="nomor_hp" placeholder="08xxxxxxxxxx"
                        value="{{ old('nomor_hp') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-700 outline-none">
                </div>

                <div>
                    <label for="password" class="block mb-1 font-semibold text-gray-700">Kata Sandi</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-700 outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="password_confirmation" class="block mb-1 font-semibold text-gray-700">Konfirmasi Kata
                        Sandi</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="••••••••" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-700 outline-none">
                </div>

                <div></div>
            </div>

            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-blue-400 cursor-pointer text-white font-semibold py-3 rounded-xl flex items-center justify-center gap-2 transition shadow-md">
                <i data-lucide="user-plus" class="w-5 h-5"></i>
                Daftar Sekarang
            </button>

            <a href="{{ url('/') }}"
                class="w-full mt-2 block text-center border border-gray-300 text-gray-700 font-semibold py-3 rounded-xl
          hover:bg-gray-100 transition flex items-center justify-center gap-2">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
                Kembali ke Beranda
            </a>

        </form>


        <p class="text-center text-gray-600 mt-6">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-700 font-semibold hover:underline">Masuk</a>
        </p>

    </div>

</body>

=======
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .register-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 750px;
            overflow: hidden;
            display: flex;
            flex-direction: row;
        }

        .register-header {
            flex: 1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px 30px;
        }

        .register-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .register-header p {
            opacity: 0.9;
            text-align: center;
            line-height: 1.4;
        }

        .register-body {
            flex: 1.2;
            padding: 60px 50px;
            max-height: 600px;
            overflow-y: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn-primary {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-top: 10px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .alert {
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background: #fee;
            border: 1px solid #fcc;
            color: #c33;
        }

        .alert-success {
            background: #efe;
            border: 1px solid #cfc;
            color: #3c3;
        }

        .register-footer {
            text-align: center;
            margin-top: 15px;
        }

        .register-footer p {
            color: #666;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .register-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .register-footer a:hover {
            text-decoration: underline;
        }

        .back-home {
            text-align: center;
            margin-top: 20px;
        }

        .back-home a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .back-home a:hover {
            text-decoration: underline;
        }

        .error-text {
            color: #c33;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
                max-width: 90%;
            }

            .register-body {
                padding: 30px 20px;
                max-height: none;
            }

            .register-header {
                padding: 30px 20px;
            }

            .register-header h1 {
                font-size: 1.8rem;
            }

            .form-control {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div>
        <div class="register-container">
            <div class="register-header">
                <h1>📝 Daftar</h1>
                <p>Buat akun TelcoApp Anda<br>dan mulai nikmati layanan kami.</p>
            </div>

            <div class="register-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Oops!</strong> Ada kesalahan:
                        <ul style="margin: 10px 0 0 20px; font-size: 0.9rem;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="name" 
                            name="name" 
                            placeholder="Nama lengkap Anda"
                            value="{{ old('name') }}"
                            required
                        >
                        @error('name')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="email" 
                            class="form-control" 
                            id="email" 
                            name="email" 
                            placeholder="nama@email.com"
                            value="{{ old('email') }}"
                            required
                        >
                        @error('email')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input 
                            type="tel" 
                            class="form-control" 
                            id="phone" 
                            name="phone" 
                            placeholder="08xxxxxxxxxx"
                            value="{{ old('phone') }}"
                            required
                        >
                        @error('phone')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input 
                            type="password" 
                            class="form-control" 
                            id="password" 
                            name="password" 
                            placeholder="••••••••"
                            required
                        >
                        @error('password')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input 
                            type="password" 
                            class="form-control" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            placeholder="••••••••"
                            required
                        >
                        @error('password_confirmation')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn-primary">
                        Daftar Sekarang
                    </button>
                </form>

                <div class="register-footer">
                    <p>Sudah punya akun?</p>
                    <a href="{{ route('login') }}">Masuk Sekarang</a>
                </div>
            </div>
        </div>

        
    </div>
</body>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
</html>
