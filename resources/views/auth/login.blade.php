<!DOCTYPE html>
<html lang="id">
<<<<<<< HEAD

=======
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TelcoApp</title>
<<<<<<< HEAD

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-b from-gray-100 to-white px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 animate-fadeSlideIn">

        <div class="flex flex-col items-center mb-6">
            <i data-lucide="radio" class="w-12 h-12 text-blue-500 mb-3"></i>
            <h1 class="text-3xl font-bold text-blue-500">TelcoApp</h1>
            <p class="text-gray-600 text-center mt-2">
                Silakan masuk untuk mengakses akun Anda.
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

        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="nomor_hp" class="block mb-1 font-semibold text-gray-700">No. Hp</label>
                <input type="text" id="nomor_hp" name="nomor_hp" placeholder="cth: 0813xxxxxx"
                    value="{{ old('nomor_hp') }}" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-700 outline-none">
            </div>

            <div>
                <label for="password" class="block mb-1 font-semibold text-gray-700">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi Anda" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-700 outline-none">
            </div>

            <label class="flex items-center gap-2 text-gray-600 select-none">
                <input type="checkbox" id="remember" name="remember" class="w-4 h-4">
                <span>Ingat saya</span>
            </label>

            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-blue-400 cursor-pointer text-white font-semibold py-3 rounded-xl flex items-center justify-center gap-2 transition shadow-md">
                <i data-lucide="log-in" class="w-5 h-5"></i>
                Masuk
            </button>

            <a href="{{ url('/') }}"
                class="w-full mt-2 block text-center border border-gray-300 text-gray-700 font-semibold py-3 rounded-xl
          hover:bg-gray-100 transition flex items-center justify-center gap-2">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
                Kembali ke Beranda
            </a>
        </form>

        <p class="text-center text-gray-600 mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-700 font-semibold hover:underline">Daftar</a>
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

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 750px; /* dari 450px → 750px */
            overflow: hidden;
            display: flex;
            flex-direction: row; /* bikin lebih lebar horizontal */
        }

        /* bagian kiri (judul & deskripsi) */
        .login-header {
            flex: 1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px 30px;
        }

        .login-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .login-header p {
            opacity: 0.9;
            text-align: center;
            line-height: 1.4;
        }

        /* bagian kanan (form) */
        .login-body {
            flex: 1.2;
            padding: 60px 50px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1.05rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-check input {
            margin-right: 8px;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .form-check label {
            cursor: pointer;
            font-size: 0.95rem;
            color: #666;
        }

        .btn-primary {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
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

        .login-footer {
            text-align: center;
            margin-top: 25px;
        }

        .login-footer p {
            color: #666;
            margin-bottom: 8px;
        }

        .login-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .back-home {
            text-align: center;
            margin-top: 30px;
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
            font-size: 0.85rem;
            margin-top: 5px;
        }

        /* Responsif untuk HP dan tablet */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 90%;
            }

            .login-body {
                padding: 40px 25px;
            }

            .login-header {
                padding: 35px 25px;
            }

            .login-header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div>
        <div class="login-container">
            <div class="login-header">
                <h1>🔐 Login</h1>
                <p>Masuk ke akun TelcoApp Anda<br>dan nikmati layanan terbaik kami.</p>
            </div>

            <div class="login-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Oops!</strong> Ada kesalahan:
                        <ul style="margin: 10px 0 0 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    
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

                    <div class="form-check">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Ingat saya</label>
                    </div>

                    <button type="submit" class="btn-primary">
                        Masuk Sekarang
                    </button>
                </form>

                <div class="login-footer">
                    <p>Belum punya akun?</p>
                    <a href="{{ route('register') }}">Daftar Sekarang</a>
                </div>

                <!-- Dummy Accounts Info -->
                <div style="margin-top: 2rem; padding: 1.5rem; background: #f0f4ff; border-left: 4px solid #667eea; border-radius: 8px; font-size: 0.85rem; color: #555;">
                    <strong style="color: #667eea; display: block; margin-bottom: 0.8rem;">📝 Akun Demo untuk Testing:</strong>
                    
                    <p style="margin-bottom: 0.8rem;">
                        <strong>Admin:</strong><br>
                        Email: admin@telcoapp.com<br>
                        Password: password123
                    </p>
                    
                    <p style="margin-bottom: 0;">
                        <strong>Customer:</strong><br>
                        Email: user@telcoapp.com<br>
                        Password: password123
                    </p>
                </div>
            </div>
        </div>

        
    </div>
</body>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
</html>
