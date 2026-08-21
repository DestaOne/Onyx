@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-slate-800">Ringkasan Laporan</h1>
        <a href="{{ url('/') }}" target="_blank" class="text-blue-600 hover:underline text-sm font-medium">Lihat Website &rarr;</a>
    </div>

    <!-- Menampilkan pesan sukses setelah menambah produk -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 border-l-4 border-l-blue-500">
            <h3 class="text-slate-500 text-sm font-medium mb-2">Penghasilan Bulan Ini</h3>
            <p class="text-3xl font-extrabold text-slate-900">Rp {{ number_format($penghasilanBulanIni, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 border-l-4 border-l-green-500">
            <h3 class="text-slate-500 text-sm font-medium mb-2">Produk Terjual</h3>
            <p class="text-3xl font-extrabold text-slate-900">{{ $produkTerjual }} <span class="text-sm font-normal text-slate-400">Item</span></p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 border-l-4 border-l-purple-500">
            <h3 class="text-slate-500 text-sm font-medium mb-2">Total Katalog Produk</h3>
            <p class="text-3xl font-extrabold text-slate-900">{{ $totalProducts }} <span class="text-sm font-normal text-slate-400">Tersedia</span></p>
        </div>
    </div>
@endsection