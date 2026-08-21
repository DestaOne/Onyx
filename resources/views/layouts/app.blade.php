<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnyX - Toko Komputer</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen antialiased">

    <!-- NAVBAR DISESUAIKAN DENGAN TEMA LOGIN (SLATE & BLUE) -->
    <nav class="fixed w-full z-50 bg-slate-900/90 backdrop-blur-md border-b border-slate-700/50 text-white transition-all duration-300">
        <div class="container mx-auto px-6 lg:px-12 py-4 flex justify-between items-center">
            
            <!-- Logo (Aksen biru) -->
            <a href="{{ url('/') }}" class="text-3xl font-light tracking-widest hover:scale-105 transition duration-300">
                Ony<span class="font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-200">X</span>
            </a>

            <!-- Menu Tengah -->
            <div class="hidden md:flex space-x-10 items-center text-sm uppercase tracking-wider font-medium text-slate-300">
                <a href="{{ url('/') }}" class="hover:text-blue-400 transition duration-300 relative group">
                    Home
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-500 transition-all group-hover:w-full"></span>
                </a>
                
                <!-- Dropdown Parts -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="hover:text-blue-400 transition duration-300 flex items-center group">
                        Parts 
                        <svg class="w-4 h-4 ml-1 opacity-70 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <!-- Menu Dropdown dengan warna Slate -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         @click.away="open = false" 
                         style="display: none;" 
                         class="absolute left-0 mt-4 w-56 bg-slate-800 text-slate-200 rounded-xl shadow-2xl border border-slate-700 z-50 overflow-hidden">
                        @php
                            $categories = \App\Models\Category::where('slug', '!=', 'pre-build')->get();
                        @endphp
                        <div class="py-2">
                            @foreach($categories as $category)
                                <a href="{{ url('/parts/'.$category->slug) }}" class="block px-5 py-2.5 text-sm font-medium hover:bg-slate-700 hover:text-blue-400 transition">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <a href="{{ url('/pre-build') }}" class="hover:text-blue-400 transition duration-300 relative group">
                    Pre-Build
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-500 transition-all group-hover:w-full"></span>
                </a>
                <a href="{{ url('/contact') }}" class="hover:text-blue-400 transition duration-300 relative group">
                    Contact
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-500 transition-all group-hover:w-full"></span>
                </a>
            </div>

            <!-- Menu Kanan -->
            <div class="flex items-center space-x-6">
                @guest
                    <!-- Tombol Login disamakan dengan warna form login -->
                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full text-sm font-semibold tracking-wide transition duration-300 shadow-lg hover:shadow-blue-500/30">Login</a>
                @else
                    <!-- Ikon Keranjang dengan Badge Notifikasi -->
                    <a href="{{ url('/cart') }}" class="relative text-slate-300 hover:text-blue-400 transition duration-300 hover:scale-110 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        
                        <!-- Logika menghitung isi keranjang -->
                        @php
                            $cartCount = Auth::user()->carts()->sum('quantity');
                        @endphp
                        
                        <!-- Badge hanya muncul jika keranjang tidak kosong -->
                        @if($cartCount > 0)
                            <span class="absolute -top-1 -right-2 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full border border-slate-900">
                                {{ $cartCount > 99 ? '99+' : $cartCount }}
                            </span>
                        @endif
                    </a>

                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center space-x-2 text-sm font-medium text-slate-300 hover:text-blue-400 transition group">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 opacity-70 group-hover:opacity-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <!-- Dropdown Profil warna Slate -->
                        <div x-show="open" @click.away="open = false" style="display: none;" class="absolute right-0 mt-4 w-48 bg-slate-800 rounded-xl shadow-2xl border border-slate-700 z-50 overflow-hidden">
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ url('/admin/dashboard') }}" class="block px-5 py-3 text-sm text-slate-200 hover:bg-slate-700 hover:text-blue-400 transition border-b border-slate-700">Dashboard Admin</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-5 py-3 text-sm font-medium text-red-400 hover:bg-slate-700 hover:text-red-300 transition">Logout</button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <!-- KONTEN -->
    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    <!-- FOOTER DIUBAH KE SLATE -->
    <footer class="bg-slate-900 text-slate-400 text-center py-8 mt-auto border-t border-slate-800">
        <p class="text-sm tracking-wide">&copy; {{ date('Y') }} <span class="text-white font-semibold">OnyX</span>. All rights reserved.</p>
    </footer>

</body>
</html>