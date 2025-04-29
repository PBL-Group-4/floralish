<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\AuthController;

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

// Lokasi
Route::get('/lokasi', function () {
    return view('lokasi');
});