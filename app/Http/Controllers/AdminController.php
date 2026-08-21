<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminController
{
    public function dashboard()
    {
        
        $totalProducts = \App\Models\Product::count();
        
      
        $penghasilanBulanIni = 0;
        
    
        $produkTerjual = 0;

        return view('admin.dashboard', compact('totalProducts', 'penghasilanBulanIni', 'produkTerjual'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Memproses data form dan menyimpan gambar
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimal 2MB
        ]);

        $data = $request->all();

        // 2. Upload Gambar
        if ($request->hasFile('image')) {
            // Gambar akan disimpan di folder storage/app/public/products
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // 3. Simpan ke Database
        \App\Models\Product::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Produk baru berhasil ditambahkan!');
    }

    public function index(Request $request)
    {
       
        $categories = \App\Models\Category::all();

       
        $query = \App\Models\Product::with('category')->latest();

       
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        
        $products = $query->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    // Menampilkan form edit produk (Update - Tampilan)
    public function edit($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Memproses data edit produk (Update - Proses)
    public function update(Request $request, $id)
    {
        $product = \App\Models\Product::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Image boleh kosong saat edit
        ]);

        $data = $request->except(['image']);

        // Jika admin mengupload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari folder storage (jika ada)
            if ($product->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($product->image);
            }
            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk (Delete)
    public function destroy($id)
    {
        $product = \App\Models\Product::findOrFail($id);

        // Hapus gambar dari server agar tidak memenuhi memori
        if ($product->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->image)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}