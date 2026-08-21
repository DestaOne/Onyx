<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [FrontController::class, 'home'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/parts/{slug}', [FrontController::class, 'parts']);
Route::get('/pre-build', [FrontController::class, 'prebuild']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Route Keranjang (Hanya bisa diakses jika login)
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function () {
    
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // CRUD Produk
    Route::get('/products', [AdminController::class, 'index'])->name('admin.products.index'); // Halaman List Produk
    Route::get('/products/create', [AdminController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [AdminController::class, 'store'])->name('admin.products.store');
    
    Route::get('/products/{id}/edit', [AdminController::class, 'edit'])->name('admin.products.edit'); // Halaman Edit
    Route::put('/products/{id}', [AdminController::class, 'update'])->name('admin.products.update'); // Proses Edit (Gunakan PUT)
    Route::delete('/products/{id}', [AdminController::class, 'destroy'])->name('admin.products.destroy'); // Proses Delete
});