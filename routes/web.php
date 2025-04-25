<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/produk', [ProductController::class, 'index']);
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('home', function () {
    return view('home');
});