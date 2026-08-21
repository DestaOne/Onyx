@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 lg:px-12 py-12">
    <div class="mb-10">
        <h2 class="text-4xl font-bold text-slate-800 tracking-tight">Keranjang Belanja</h2>
        <div class="h-1 w-20 bg-blue-500 mt-2 rounded-full"></div>
    </div>

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- List Barang di Kiri -->
        <div class="lg:w-2/3">
            @forelse($carts as $cart)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-4 flex items-center gap-6">
                    <!-- Gambar -->
                    <div class="w-24 h-24 bg-slate-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        @if($cart->product->image)
                            <img src="{{ asset('storage/'.$cart->product->image) }}" alt="Produk" class="object-cover h-full w-full rounded-xl">
                        @else
                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                        @endif
                    </div>

                    <!-- Info Produk & Quantity -->
                    <div class="flex-grow">
                        <h4 class="text-lg font-semibold text-slate-800">{{ $cart->product->name }}</h4>
                        <p class="text-sm text-slate-500 mb-2">Rp {{ number_format($cart->product->price, 0, ',', '.') }}</p>
                        <span class="inline-block px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">Qty: {{ $cart->quantity }}</span>
                    </div>

                    <!-- Total Harga per Item & Tombol Hapus -->
                    <div class="text-right flex flex-col items-end gap-3">
                        <span class="text-lg font-bold text-slate-900">Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</span>
                        <form action="{{ route('cart.remove', $cart->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-medium flex items-center gap-1 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-12 text-center">
                    <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <h3 class="text-xl font-medium text-slate-600 mb-2">Keranjang Anda masih kosong</h3>
                    <a href="{{ url('/parts/cpu') }}" class="text-blue-600 hover:underline">Mulai belanja sekarang</a>
                </div>
            @endforelse
        </div>

        <!-- Ringkasan Belanja di Kanan -->
        <div class="lg:w-1/3">
            <div class="bg-slate-900 text-white rounded-3xl shadow-xl p-8 sticky top-24">
                <h3 class="text-xl font-semibold mb-6 border-b border-slate-700 pb-4">Ringkasan Belanja</h3>
                
                <div class="flex justify-between items-center mb-4 text-slate-300">
                    <span>Total Items</span>
                    <span>{{ $carts->sum('quantity') }}</span>
                </div>
                
                <div class="flex justify-between items-center mb-8 border-t border-slate-700 pt-4">
                    <span class="text-lg font-medium">Total Tagihan</span>
                    <span class="text-2xl font-extrabold text-blue-400">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                </div>

                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl transition duration-300 shadow-lg shadow-blue-500/30 {{ $carts->count() == 0 ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $carts->count() == 0 ? 'disabled' : '' }}>
                    Lanjut Pembayaran
                </button>
            </div>
        </div>

    </div>
</div>
@endsection