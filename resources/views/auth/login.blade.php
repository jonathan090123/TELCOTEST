<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TelcoApp</title>

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

</html>
