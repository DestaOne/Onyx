<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController
{
    // 1. Menampilkan halaman keranjang
    public function index()
    {
        // Ambil data keranjang milik user yang sedang login beserta data produknya
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();
        
        // Hitung total harga
        $totalPrice = 0;
        foreach ($carts as $cart) {
            $totalPrice += $cart->product->price * $cart->quantity;
        }

        return view('cart', compact('carts', 'totalPrice'));
    }

    // 2. Menambah produk ke keranjang
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $user_id = Auth::id();
        $product_id = $request->product_id;

        // Cek apakah produk ini sudah ada di keranjang user
        $existingCart = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($existingCart) {
            // Jika sudah ada, cukup tambahkan quantity-nya
            $existingCart->increment('quantity');
        } else {
            // Jika belum ada, buat baris baru di tabel carts
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => 1,
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // 3. Menghapus produk dari keranjang
    public function remove($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cart->delete();

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }
}