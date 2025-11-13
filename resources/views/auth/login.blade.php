<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TelcoApp</title>
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
            </div>
        </div>

        <div class="back-home">
            <a href="{{ route('home') }}">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>
