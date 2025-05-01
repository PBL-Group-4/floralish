<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;




Route::get('/produk', [ProductController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
Route::get('home', function () {
    return view('home');
});

Route::get('produk', function () {
    return view('produk');
});

// Route untuk halaman dengan navbar
Route::get('/navbar', [NavbarController::class, 'index'])->name('navbar.index');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.authenticate');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Lokasi
Route::get('/lokasi', function () {
    return view('lokasi');
});

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.authenticate');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    // Admin Register Routes
    Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register'])->name('admin.register.store');
    
    // Routes yang memerlukan autentikasi admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Product Management Routes
        Route::get('/products', [AdminController::class, 'products'])->name('admin.products.index');
        Route::get('/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
        Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
        Route::get('/products/{product}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
        Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
        Route::delete('/products/{product}', [AdminController::class, 'destroyProduct'])->name('admin.products.destroy');

        // User Management Routes
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index');
        Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
        Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
        Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
        Route::get('/users/{id}', [AdminController::class, 'showUser'])->name('admin.users.show');

        // Settings Route
        Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    });
    
    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
});