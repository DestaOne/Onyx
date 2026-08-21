<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'price', 'stock', 'image'];

    public function category()
    {
        // Sebuah produk pasti milik satu kategori (Inverse One to Many)
        return $this->belongsTo(Category::class);
    }
}
