@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Edit Produk</h2>
        <a href="{{ route('admin.products.index') }}" class="text-slate-500 hover:text-slate-800 text-sm">Kembali</a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 text-red-500 p-4 rounded mb-6">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Wajib untuk edit data di Laravel -->
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-2">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="w-full p-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:outline-none">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-2">Kategori</label>
            <select name="category_id" required class="w-full p-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:outline-none bg-white">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" required class="w-full p-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Stok</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required class="w-full p-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:outline-none">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-2">Deskripsi Produk</label>
            <textarea name="description" rows="4" required class="w-full p-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:outline-none">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-8 p-4 border border-slate-200 rounded-lg bg-slate-50">
            <label class="block text-sm font-medium text-slate-700 mb-2">Gambar Produk (Kosongkan jika tidak ingin mengganti)</label>
            @if($product->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/'.$product->image) }}" class="h-24 w-24 object-cover rounded-md border border-slate-300">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full p-2 text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-xl transition duration-200">
            Update Produk
        </button>
    </form>
</div>
@endsection