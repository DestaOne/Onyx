@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 lg:px-12 py-12">
    
    <!-- Judul Kategori -->
    <div class="mb-10">
        <h2 class="text-4xl font-bold text-slate-800 tracking-tight">{{ $category->name }}</h2>
        <div class="h-1 w-20 bg-blue-500 mt-2 rounded-full"></div>
    </div>

    <!-- Grid Card Produk -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        
        @forelse($products as $product)
            <!-- Pembungkus Card dengan Alpine.js (x-data="open: false") -->
            <div x-data="{ open: false }">
                
                <!-- Card Utama (Bisa Diklik) -->
                <div @click="open = true" class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl transition duration-300 group flex flex-col h-full cursor-pointer">
                    
                    <!-- Gambar Dummy -->
                    <div class="h-48 bg-slate-100 flex items-center justify-center overflow-hidden relative">
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="object-cover h-full w-full group-hover:scale-105 transition duration-500">
                        @else
                            <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                        @endif
                    </div>

                    <!-- Info Produk Singkat -->
                    <div class="p-6 flex flex-col flex-grow text-left">
                        <h3 class="text-lg font-semibold text-slate-800 mb-1 group-hover:text-blue-600 transition">{{ $product->name }}</h3>
                        <p class="text-sm text-slate-500 mb-4 line-clamp-2">{{ $product->description }}</p>
                        <div class="mt-auto flex items-center justify-between">
                            <span class="text-xl font-bold text-slate-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            
                            @auth
                                <!-- Form Tambah ke Keranjang -->
                                <!-- @click.stop mencegah klik tombol ini ikut membuka modal -->
                               <form action="{{ route('cart.add') }}" method="POST" @click.stop>
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    
                                    <!-- UBAH TYPE INI MENJADI SUBMIT -->
                                    <button type="submit" class="w-10 h-10 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center hover:bg-blue-600 hover:text-white transition duration-300 shadow-sm">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- MODAL DETAIL PRODUK (MUNCUL SAAT CARD DIKLIK) -->
                <div x-show="open" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center px-4">
                    
                    <!-- Latar Belakang Gelap (Klik untuk menutup) -->
                    <div x-show="open" 
                         x-transition.opacity.duration.300ms 
                         @click="open = false" 
                         class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

                    <!-- Kotak Card Detail di Tengah -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-90 translate-y-4"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-90 translate-y-4"
                         class="relative bg-white rounded-3xl shadow-2xl w-full max-w-3xl z-[101] overflow-hidden flex flex-col md:flex-row">
                        
                        <!-- Tombol Close (X) -->
                        <button @click="open = false" class="absolute top-4 right-4 bg-white/80 backdrop-blur rounded-full p-2 text-slate-400 hover:text-red-500 hover:bg-slate-100 transition z-10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>

                        <!-- Sisi Kiri Modal: Gambar -->
                        <div class="md:w-1/2 bg-slate-50 flex items-center justify-center p-8 min-h-[300px]">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="object-contain h-full w-full">
                            @else
                                <svg class="w-32 h-32 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                            @endif
                        </div>

                        <!-- Sisi Kanan Modal: Detail Lengkap -->
                        <div class="md:w-1/2 p-8 flex flex-col justify-center">
                            <span class="text-sm font-semibold text-blue-500 uppercase tracking-wider mb-2">{{ $category->name }}</span>
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
                                    <!-- Tombol Tambah Keranjang Versi Modal -->
                                    <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        
                                        <!-- UBAH TYPE INI MENJADI SUBMIT -->
                                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl flex items-center justify-center space-x-2 transition duration-300 shadow-lg shadow-blue-500/30 hover:-translate-y-1">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                            <span>Tambah ke Keranjang</span>
                                        </button>
                                    </form>
                                                                    @else
                                    <!-- Jika Belum Login, Arahkan ke Halaman Login -->
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
            <div class="col-span-full py-20 text-center">
                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                <h3 class="text-xl font-medium text-slate-600">Belum ada produk di kategori ini.</h3>
                <p class="text-slate-400 mt-2">Admin akan segera menambahkannya.</p>
            </div>
        @endforelse

    </div>
</div>
@endsection