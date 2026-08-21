<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - OnyX</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 h-screen flex items-center justify-center font-sans text-slate-200">
    <div class="bg-slate-800 p-8 rounded-lg shadow-xl w-full max-w-md border border-slate-700">
        <h2 class="text-3xl font-bold mb-6 text-center text-white">Daftar <span class="text-blue-500">OnyX</span></h2>
        
        <!-- BAGIAN TAMBAHAN: Menampilkan Pesan Error Validasi -->
        @if ($errors->any())
            <div class="bg-red-500/10 border border-red-500 text-red-500 p-4 rounded-md mb-6 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 text-sm">Nama Lengkap</label>
                <!-- TAMBAHAN: value="{{ old('name') }}" agar ketikan tidak hilang -->
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full p-3 rounded bg-slate-700 border border-slate-600 focus:outline-none focus:border-blue-500 text-white">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full p-3 rounded bg-slate-700 border border-slate-600 focus:outline-none focus:border-blue-500 text-white">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm">Password</label>
                <input type="password" name="password" required class="w-full p-3 rounded bg-slate-700 border border-slate-600 focus:outline-none focus:border-blue-500 text-white">
                <p class="text-xs text-slate-400 mt-1">Minimal 8 karakter.</p>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="w-full p-3 rounded bg-slate-700 border border-slate-600 focus:outline-none focus:border-blue-500 text-white">
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition duration-200">
                Register
            </button>
        </form>
        <p class="mt-4 text-center text-sm">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-400 hover:underline">Login di sini</a>
        </p>
    </div>
</body>
</html>