<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NavbarController;

Route::get('/produk', [ProductController::class, 'index']);
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('home', function () {
    return view('home');
});

// Route untuk halaman dengan navbar
Route::get('/navbar', [NavbarController::class, 'index'])->name('navbar.index');