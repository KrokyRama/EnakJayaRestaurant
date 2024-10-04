<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;


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
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
