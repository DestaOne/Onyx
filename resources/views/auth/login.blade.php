<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - OnyX</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 h-screen flex items-center justify-center font-sans text-slate-200">
    <div class="bg-slate-800 p-8 rounded-lg shadow-xl w-full max-w-md border border-slate-700">
        <h2 class="text-3xl font-bold mb-6 text-center text-white">Login <span class="text-blue-500">OnyX</span></h2>
        
        <!-- Menampilkan pesan error jika login gagal -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf <!-- Token keamanan wajib dari Laravel -->
            <div class="mb-4">
                <label class="block mb-2 text-sm">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full p-3 rounded bg-slate-700 border border-slate-600 focus:outline-none focus:border-blue-500 text-white">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm">Password</label>
                <input type="password" name="password" required class="w-full p-3 rounded bg-slate-700 border border-slate-600 focus:outline-none focus:border-blue-500 text-white">
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition duration-200">
                Login
            </button>
        </form>
        <p class="mt-4 text-center text-sm">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-400 hover:underline">Daftar di sini</a>
        </p>
    </div>
</body>
</html>