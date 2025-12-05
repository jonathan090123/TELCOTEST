<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - TelcoApp</title>

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

</html>
