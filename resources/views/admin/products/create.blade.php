@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
    <h2 class="text-2xl font-bold text-slate-800 mb-6">Tambah Produk Baru</h2>

    @if ($errors->any())
        <div class="bg-red-50 text-red-500 p-4 rounded mb-6">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Ingat: enctype="multipart/form-data" wajib ada jika form mengandung upload file! -->
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-2">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full p-3 rounded-lg border border-slate-300 focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-2">Kategori</label>
            <select name="category_id" required class="w-full p-3 rounded-lg border border-slate-300 focus:outline-none focus:border-blue-500 bg-white">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price') }}" required class="w-full p-3 rounded-lg border border-slate-300 focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Stok Awal</label>
                <input type="number" name="stock" value="{{ old('stock') }}" required class="w-full p-3 rounded-lg border border-slate-300 focus:outline-none focus:border-blue-500">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-2">Deskripsi Produk</label>
            <textarea name="description" rows="4" required class="w-full p-3 rounded-lg border border-slate-300 focus:outline-none focus:border-blue-500">{{ old('description') }}</textarea>
        </div>

        <div class="mb-8">
            <label class="block text-sm font-medium text-slate-700 mb-2">Gambar Produk</label>
            <input type="file" name="image" accept="image/*" required class="w-full p-2 border border-slate-300 rounded-lg text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-xl transition duration-200">
            Simpan Produk
        </button>
    </form>
</div>
@endsection