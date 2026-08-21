<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - OnyX</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-50 flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col hidden md:flex z-50 shadow-xl">
        <div class="h-16 flex items-center justify-center border-b border-slate-800">
            <a href="{{ url('/') }}" class="text-2xl font-light tracking-widest">
                Ony<span class="font-extrabold text-blue-500">X</span> <span class="text-xs ml-1 text-slate-400">ADMIN</span>
            </a>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
            <!-- Menu Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 text-slate-300 hover:text-white rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            
            <!-- Menu Daftar Produk (Ini yang sebelumnya terlewat) -->
            <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 text-slate-300 hover:text-white rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                Daftar Produk
            </a>

            <!-- Menu Tambah Produk -->
            <a href="{{ route('admin.products.create') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-800 text-slate-300 hover:text-white rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Produk
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800">
            <p class="text-sm text-slate-400 mb-2">Login: {{ Auth::user()->name }}</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-slate-800 hover:bg-red-600 text-white py-2 rounded-lg transition text-sm flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- KONTEN UTAMA DINAMIS -->
    <main class="flex-1 overflow-y-auto bg-slate-50 p-8 relative">
        @yield('content')
    </main>

</body>
</html>