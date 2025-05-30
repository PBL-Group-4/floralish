<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Http\Request;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Location routes
Route::get('/lokasi', function () {
    return view('lokasi');
})->name('lokasi.index');

Route::get('/lokasi/{location}', [ProductController::class, 'showByLocation'])
    ->where('location', 'jakarta|bandung|batam|surabaya|medan|padang|palembang|pekanbaru|pontianak|kupang|ambon|manado|makassar|banjarmasin|samarinda')
    ->name('lokasi.show');

// Route untuk halaman dengan navbar
Route::get('/navbar', [NavbarController::class, 'index'])->name('navbar.index');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.authenticate');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// About
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Contact
Route::get('/contact', function () {
    return view('Tugas.contact');
})->name('contact');

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|max:255',
        'category' => 'required|in:wedding,birthday,graduation,other',
        'budget' => 'required|in:under_200k,200k_500k,500k_1m,above_1m',
        'message' => 'required|min:10'
    ]);

    // Di sini Anda bisa menambahkan logika untuk menyimpan pesan ke database
    // atau mengirim email notifikasi

    return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim! Kami akan segera menghubungi Anda.');
})->name('contact.submit');

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

        // Order Management Routes
        Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders.index');
        Route::get('/orders/{order}', [AdminController::class, 'showOrder'])->name('admin.orders.show');
        Route::patch('/orders/{order}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.update-status');
        Route::delete('/orders/{order}', [AdminController::class, 'destroyOrder'])->name('admin.orders.destroy');
        Route::get('/orders/{order}/print-shipping-label', [AdminController::class, 'printShippingLabel'])->name('admin.orders.print-shipping-label');

        // User Management Routes
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index');
        Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
        Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
        Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
        Route::get('/users/{id}', [AdminController::class, 'showUser'])->name('admin.users.show');

        // Settings Route
        Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');

        // Notification routes
        Route::get('/notifications', [App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('admin.notifications.index');
        Route::post('/notifications/mark-all-read', [App\Http\Controllers\Admin\NotificationController::class, 'markAllAsRead'])->name('admin.notifications.mark-all-read');
        Route::post('/notifications/{notification}/mark-read', [App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('admin.notifications.mark-read');
    });
});

// Public routes untuk produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Routes yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout/{productId}', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/success', [OrderController::class, 'success'])->name('orders.success');
    
    // Profile Routes
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::put('/profile/settings', [ProfileController::class, 'updateSettings'])->name('profile.settings.update');
    Route::put('/profile/settings/password', [ProfileController::class, 'updatePassword'])->name('profile.settings.update-password');
    Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
    Route::get('/profile/orders/{order}/print-receipt', [ProfileController::class, 'printReceipt'])->name('profile.orders.print-receipt');

    // Rating routes (memerlukan auth)
    Route::post('/products/{product}/rate', [RatingController::class, 'store'])->name('products.rate');
    Route::delete('/products/{product}/rate', [RatingController::class, 'destroy'])->name('products.rate.destroy');
});

// WhatsApp Route
Route::get('/whatsapp/send', [WhatsAppController::class, 'send'])->name('whatsapp.send')->middleware('auth');
