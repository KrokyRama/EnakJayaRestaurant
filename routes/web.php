<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/admin', [HomeController::class, 'admin'])->name('admin');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/shop', [HomeController::class, 'shop']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('singleProduct');

// CART
// Route untuk menambahkan item ke cart
Route::post('/cart', [ProductController::class, 'addToCart'])->name('addToCart');
// Route untuk menampilkan halaman cart
Route::get('/cart', [ProductController::class, 'showCart'])->name('cart');
// Route untuk menghapus item dari cart
Route::post('/remove-from-cart', [ProductController::class, 'removeFromCart'])->name('remove.from.cart');
// Diskon
Route::post('/cart/discount', [ProductController::class, 'applyDiscount'])->name('cart.discount');

Route::get('/admin/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/admin/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
Route::post('/contact', [ContactController::class, 'store'])->name('contacts.store');