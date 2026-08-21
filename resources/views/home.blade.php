@extends('layouts.app')

@section('content')
<!-- HERO SECTION (Jarak atas diperkecil) -->
<div class="relative bg-white pt-10 pb-20 lg:pt-16 lg:pb-32 overflow-hidden">
    
    <div class="absolute top-0 right-0 -mr-32 -mt-32 w-96 h-96 rounded-full bg-slate-200 opacity-60 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -ml-32 -mb-32 w-80 h-80 rounded-full bg-blue-100 opacity-60 blur-3xl"></div>

    
    <div class="container mx-auto px-6 lg:px-24 relative z-10 flex flex-col lg:flex-row items-center gap-12 lg:gap-8">
        
        
        <div class="w-full lg:w-1/2">
            <h1 class="text-5xl lg:text-7xl font-light text-slate-900 leading-tight mb-6 tracking-tight">
                PC Impian <br>
                <span class="font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-slate-800 to-blue-600">OnyX</span> Tujuan
            </h1>
            <p class="text-lg lg:text-2xl text-slate-500 font-light mt-6 leading-relaxed max-w-xl">
                Rakit PC impian mu atau pilih PC rakitan yang siap dipakai. <br>
                <span class="font-medium text-slate-800">Semua di harga terbaik!</span>
            </p>
            
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="{{ url('/parts/cpu') }}" class="px-8 py-3.5 bg-blue-600 text-white rounded-full font-medium tracking-wide hover:bg-blue-700 transition duration-300 shadow-lg hover:shadow-blue-500/30 hover:-translate-y-0.5">
                    Mulai Merakit
                </a>
                <a href="{{ url('/pre-build') }}" class="px-8 py-3.5 bg-white text-slate-800 border border-slate-300 rounded-full font-medium tracking-wide hover:bg-slate-50 transition duration-300 shadow-sm hover:shadow-md hover:-translate-y-0.5">
                    Lihat Pre-Build
                </a>
            </div>
        </div>

       
        <div class="w-full lg:w-1/2 mt-10 lg:mt-0">
           
            <div class="relative w-full aspect-video lg:aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl border-4 border-white group">
                
                
                <img src="{{ asset('images/setup.jpg') }}" 
                     alt="PC Setup OnyX" 
                     class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700">
                     
            </div>
        </div>

    </div>
</div>

<!-- KOMPONEN SECTION (Background diubah ke Slate-900) -->
<div class="bg-slate-900 py-24 text-white relative border-t border-slate-800">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
            
            <!-- Card 1 -->
            <div class="group flex flex-col items-center p-8 rounded-3xl hover:bg-slate-800 transition duration-500 cursor-pointer border border-transparent hover:border-slate-700">
                <div class="w-32 h-32 mb-8 p-6 rounded-full bg-slate-800 group-hover:scale-110 group-hover:bg-blue-500/20 transition duration-500 text-slate-300 group-hover:text-blue-400">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                </div>
                <h3 class="text-3xl font-light tracking-wide group-hover:text-blue-400 transition duration-300">Komponen Terlengkap</h3>
                <p class="text-slate-400 mt-4 text-sm font-light opacity-0 group-hover:opacity-100 transition duration-500 translate-y-2 group-hover:translate-y-0">Temukan part PC terbaik</p>
            </div>

            <!-- Card 2 -->
            <div class="group flex flex-col items-center p-8 rounded-3xl hover:bg-slate-800 transition duration-500 cursor-pointer border border-transparent hover:border-slate-700">
                <div class="w-32 h-32 mb-8 p-6 rounded-full bg-slate-800 group-hover:scale-110 group-hover:bg-blue-500/20 transition duration-500 text-slate-300 group-hover:text-blue-400">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                </div>
                <h3 class="text-3xl font-light tracking-wide group-hover:text-blue-400 transition duration-300">Kualitas Terbaik</h3>
                <p class="text-slate-400 mt-4 text-sm font-light opacity-0 group-hover:opacity-100 transition duration-500 translate-y-2 group-hover:translate-y-0">Kualitas terjamin 100%</p>
            </div>

            <!-- Card 3 -->
            <div class="group flex flex-col items-center p-8 rounded-3xl hover:bg-slate-800 transition duration-500 cursor-pointer border border-transparent hover:border-slate-700">
                <div class="w-32 h-32 mb-8 p-6 rounded-full bg-slate-800 group-hover:scale-110 group-hover:bg-blue-500/20 transition duration-500 text-slate-300 group-hover:text-blue-400">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                </div>
                <h3 class="text-3xl font-light tracking-wide group-hover:text-blue-400 transition duration-300">Harga Paling Murah</h3>
                <p class="text-slate-400 mt-4 text-sm font-light opacity-0 group-hover:opacity-100 transition duration-500 translate-y-2 group-hover:translate-y-0">Harga pas di kantong</p>
            </div>

        </div>
    </div>
</div>

<!-- REKOMENDASI PRODUK SECTION (CAROUSEL) -->
<div class="bg-slate-50 py-24 border-t border-slate-200">
    <div class="container mx-auto px-6 lg:px-12">
        
        <div class="flex justify-between items-end mb-10">
            <div>
                <h2 class="text-4xl font-bold text-slate-800 tracking-tight">Rekomendasi Produk</h2>
                <div class="h-1 w-20 bg-blue-500 mt-2 rounded-full"></div>
            </div>
            <a href="{{ url('/parts/cpu') }}" class="text-blue-600 hover:underline font-medium hidden sm:block">Lihat Katalog &rarr;</a>
        </div>

        <style>
            .hide-scroll::-webkit-scrollbar { display: none; }
            .hide-scroll { -ms-overflow-style: none; scrollbar-width: none; }
        </style>

        <div class="flex overflow-x-auto gap-6 pb-8 snap-x snap-mandatory scroll-smooth hide-scroll">
            
            @forelse($latestProducts as $product)
                <!-- PEMBUNGKUS ALPINE JS (x-data ditambahkan di sini) -->
                <div x-data="{ open: false }" class="snap-start shrink-0 w-72">
                    
                    <!-- Card Utama (Bisa Diklik untuk buka Modal) -->
                    <div @click="open = true" class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl transition duration-300 group flex flex-col h-full cursor-pointer relative">
                        
                        <div class="h-48 bg-slate-100 flex items-center justify-center overflow-hidden relative">
                            <span class="absolute top-3 left-3 bg-slate-900/80 backdrop-blur text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider z-10">
                                {{ $product->category->name }}
                            </span>

                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="object-cover h-full w-full group-hover:scale-105 transition duration-500">
                            @else
                                <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                            @endif
                        </div>

                        <div class="p-6 flex flex-col flex-grow text-left">
                            <h3 class="text-lg font-semibold text-slate-800 mb-1 group-hover:text-blue-600 transition truncate" title="{{ $product->name }}">{{ $product->name }}</h3>
                            <p class="text-sm text-slate-500 mb-4 line-clamp-2">{{ $product->description }}</p>
                            <div class="mt-auto flex items-center justify-between">
                                <span class="text-xl font-bold text-slate-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                
                                @auth
                                    <!-- Tambahkan @click.stop agar tombol ini tidak ikut membuka modal -->
                                    <form action="{{ route('cart.add') }}" method="POST" @click.stop>
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition duration-300 shadow-sm">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>

                    <!-- MODAL DETAIL PRODUK (Muncul saat Card diklik) -->
                    <div x-show="open" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center px-4">
                        
                        <!-- Latar Gelap -->
                        <div x-show="open" 
                             x-transition.opacity.duration.300ms 
                             @click="open = false" 
                             class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

                        <!-- Kotak Modal -->
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-90 translate-y-4"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-90 translate-y-4"
                             class="relative bg-white rounded-3xl shadow-2xl w-full max-w-3xl z-[101] overflow-hidden flex flex-col md:flex-row whitespace-normal">
                            
                            <button @click="open = false" class="absolute top-4 right-4 bg-white/80 backdrop-blur rounded-full p-2 text-slate-400 hover:text-red-500 hover:bg-slate-100 transition z-10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>

                            <div class="md:w-1/2 bg-slate-50 flex items-center justify-center p-8 min-h-[300px]">
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="object-contain h-full w-full">
                                @else
                                    <svg class="w-32 h-32 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                                @endif
                            </div>

                            <div class="md:w-1/2 p-8 flex flex-col justify-center text-left">
                                <span class="text-sm font-semibold text-blue-500 uppercase tracking-wider mb-2">{{ $product->category->name }}</span>
                                <h3 class="text-3xl font-bold text-slate-800 mb-4">{{ $product->name }}</h3>
                                <p class="text-slate-600 mb-6 leading-relaxed">{{ $product->description }}</p>
                                
                                <div class="flex items-center space-x-4 mb-8">
                                    <span class="px-3 py-1 bg-slate-100 text-slate-600 text-sm font-medium rounded-full">
                                        Stok: {{ $product->stock }}
                                    </span>
                                </div>

                                <div class="mt-auto">
                                    <span class="block text-sm text-slate-500 mb-1">Harga</span>
                                    <span class="text-3xl font-extrabold text-slate-900 mb-6 block">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    
                                    @auth
                                        <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl flex items-center justify-center space-x-2 transition duration-300 shadow-lg shadow-blue-500/30 hover:-translate-y-1">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                                <span>Tambah ke Keranjang</span>
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-semibold py-3 px-6 rounded-xl flex items-center justify-center transition duration-300 text-center">
                                            Login untuk Membeli
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- AKHIR MODAL -->

                </div>
            @empty
                <div class="w-full text-center py-12 text-slate-500">
                    Belum ada produk yang ditambahkan.
                </div>
            @endforelse

        </div>
    </div>
</div>
@endsection