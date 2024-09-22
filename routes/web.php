<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [HomeController::class, 'login']);

Route::get('/shop', [HomeController::class, 'shop']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
//Route::get('/product/{id}', [ProductController::class, 'singleProduct'])->name('singleProduct');
Route::get('/product', [ProductController::class, 'singleProduct'])->name('singleProduct');
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
