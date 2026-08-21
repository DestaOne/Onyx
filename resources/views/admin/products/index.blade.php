@extends('layouts.admin')

@section('content')
<div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
    
    <!-- Header & Tombol Tambah -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Daftar Produk</h2>
        <a href="{{ route('admin.products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition text-center shrink-0">
            + Tambah Produk
        </a>
    </div>

    <!-- FITUR BARU: Baris Filter Kategori -->
    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 mb-6 flex flex-col sm:flex-row items-center justify-between gap-4">
        <span class="text-sm font-medium text-slate-600">
            Menampilkan: <span class="text-blue-600 font-bold">{{ $products->count() }}</span> Produk
        </span>
        
        <form action="{{ route('admin.products.index') }}" method="GET" class="w-full sm:w-auto">
            <select name="category" onchange="this.form.submit()" class="w-full sm:w-64 p-2.5 border border-slate-300 rounded-lg text-sm focus:border-blue-500 focus:outline-none bg-white cursor-pointer shadow-sm">
                <option value="">-- Semua Kategori --</option>
                @foreach($categories as $category)
                    <!-- Mengecek apakah kategori ini sedang dipilih di URL -->
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                         {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Produk -->
    <div class="overflow-x-auto border border-slate-100 rounded-xl">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-500 text-sm border-b border-slate-200">
                    <th class="p-4 font-medium">Gambar</th>
                    <th class="p-4 font-medium">Nama Produk</th>
                    <th class="p-4 font-medium">Kategori</th>
                    <th class="p-4 font-medium">Harga</th>
                    <th class="p-4 font-medium">Stok</th>
                    <th class="p-4 font-medium text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition">
                        <td class="p-4">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" class="w-16 h-16 object-cover rounded-lg border border-slate-200 shadow-sm">
                            @else
                                <div class="w-16 h-16 bg-slate-200 rounded-lg flex items-center justify-center text-slate-400 text-xs shadow-sm">No Image</div>
                            @endif
                        </td>
                        <td class="p-4 font-medium text-slate-800">{{ $product->name }}</td>
                        <td class="p-4">
                            <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-xs font-semibold tracking-wide">
                                {{ $product->category->name }}
                            </span>
                        </td>
                        <td class="p-4 text-slate-800 font-medium">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="p-4 text-slate-500">{{ $product->stock }}</td>
                        <td class="p-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="p-2 bg-yellow-100 text-yellow-600 hover:bg-yellow-200 rounded-lg transition" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-100 text-red-600 hover:bg-red-200 rounded-lg transition" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-12 text-center text-slate-500">
                            <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            Tidak ada produk yang ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection