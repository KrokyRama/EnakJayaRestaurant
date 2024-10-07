<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MemberController;



Route::get('/', [HomeController::class, 'index']);
Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
Route::get('/member', [MemberController::class, 'member'])->name('member');
Route::post('/member/update-profile', [MemberController::class, 'updateProfile'])
    ->name('member.updateProfile')
    ->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

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

// Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store'])->name('contacts.store');

Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('processCheckout');



Route::get('/admintransaksi', function () {
    return view('admin.admintransaksi');
});
Route::get('/adminpelanggan', function () {
    return view('admin.adminpelanggan');
});
Route::get('/adminmenu', function () {
    return view('admin.adminmenu');
});
Route::get('/adminmeja', function () {
    return view('admin.adminmeja');
});
Route::get('/adminsaran', [ContactController::class, 'index']);

// Route untuk edit dan hapus menu
Route::resource('menu', MenuController::class);
Route::get('/adminmenu', [MenuController::class, 'index'])->name('menu.index');

// Route untuk menampilkan data meja
Route::get('/adminmeja', [TableController::class, 'index'])->name('meja.index');
// Route untuk menampilkan form edit meja
Route::get('/adminmeja/edit/{id}', [TableController::class, 'edit'])->name('meja.edit');
// Route untuk memperbarui data meja
Route::put('/adminmeja/update/{id}', [TableController::class, 'update'])->name('meja.update');

// Tambahkan rute untuk data pelanggan
Route::get('/adminpelanggan', [CustomerController::class, 'index']);

Route::get('/admintransaksi', [OrderController::class, 'index'])->name('transaksi.index');
// Route untuk menampilkan form edit transaksi
Route::get('/admintransaksi/{id}/edit', [OrderController::class, 'edit'])->name('transaksi.edit');
// Route untuk memperbarui transaksi
Route::put('/admintransaksi/{id}', [OrderController::class, 'update'])->name('transaksi.update');
