<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/produk', [ProductController::class, 'index']);
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('home', function () {
    return view('home');
});

// Route untuk halaman dengan navbar
Route::get('/navbar', [NavbarController::class, 'index'])->name('navbar.index');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.authenticate');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.authenticate');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    // Routes yang memerlukan autentikasi admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });
});