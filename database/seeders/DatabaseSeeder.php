<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
  

   public function run(): void
    {
        // 1. Membuat Akun Admin
        User::create([
            'name' => 'Admin OnyX',
            'email' => 'admin@onyx.com',
            'password' => Hash::make('password123'), // Password admin
            'role' => 'admin',
        ]);

        // 2. Membuat Kategori Parts dan Pre-Build
        $categories = [
            'CPU', 'RAM', 'Motherboard', 'VGA', 'Fan', 'Casing', 'Pre-Build'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category) // Mengubah 'Pre-Build' menjadi 'pre-build'
            ]);
        }
    }
}
