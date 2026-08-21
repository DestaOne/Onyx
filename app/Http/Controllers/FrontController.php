<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontController
{
    

public function home()
    {
       
        $latestProducts = Product::with('category')->latest()->take(8)->get();
        
        return view('home', compact('latestProducts'));
    }
    public function parts($slug)
    {
        // Cari kategori berdasarkan slug, jika tidak ketemu akan error 404
        $category = Category::where('slug', $slug)->firstOrFail();
        
       
        $products = $category->products;

        return view('products.index', compact('category', 'products'));
    }

    
    public function prebuild()
    {
        $category = Category::where('slug', 'pre-build')->firstOrFail();
        $products = $category->products;

        return view('products.index', compact('category', 'products'));
    }
}