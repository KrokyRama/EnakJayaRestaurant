<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Voucher;

class ProductController extends Controller
{
    // Method for checkout page
    public function checkout()
    {
        return view('product.checkout');
    }

    // Method for single product page
    public function show($id)
    {
        $product = Menu::findOrFail($id);
        $rmenus = Menu::where('menu_id', '!=', $id)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        return view('product.single-product', compact('product', 'rmenus'));

    }

    // untuk shop
    public function shop()
    {
        $allmenus = Menu::all();
        return view('home.shop', compact('allmenus'));
    }

    // Method untuk cart page
    // Menambahkan item ke cart
    public function addToCart(Request $request)
    {
        $product = Menu::findOrFail($request->menu_id);

        $cart = session()->get('cart', []);

        $quantity = $request->quantity ?? 1;

        // Cek apakah stok mencukupi
        if ($quantity > $product->stok) {
            return redirect()->back()->with('errorstok', 'Jumlah pembelian melebihi stok yang tersedia!');
        }

        // Jika item sudah ada di cart, maka tambahkan quantity
        if (isset($cart[$request->menu_id])) {
         $totalquantity = $cart[$request->menu_id]['quantity'] + $quantity;
            if ($totalquantity > $product->stok) {
                return redirect()->back()->with('errorstok', 'Jumlah pembelian melebihi stok yang tersedia!');
            }
            $cart[$request->menu_id]['quantity'] += $quantity;
        } else {
            // Menambahkan item ke cart
            $cart[$request->menu_id] = [
                "name" => $product->nama_menu,
                "quantity" => $quantity,
                "price" => $product->price,
                "photo" => $product->foto
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }


    // Menampilkan halaman cart
    public function showCart()
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        // Cek apakah ada voucher yang digunakan dan simpan diskon di session
        $discountedAmount = 0;
        if (session()->has('voucher')) {
            $voucher = session()->get('voucher');
            $discountedAmount = ($voucher['diskon'] / 100) * $subtotal; // Menghitung diskon berdasarkan persentase
        }

        // Total setelah diskon
        $total = $subtotal - $discountedAmount;

        return view('product.cart', compact('cart', 'subtotal', 'discountedAmount', 'total'));
    }





    // hapus item dari cart
    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Menu removed from cart successfully!');
        }
    }

    // Menambahkan diskon
    public function applyVoucher(Request $request)
    {
        // Ambil kode voucher dari input
        $voucherCode = $request->input('voucher_code');

        // Cari voucher di database
        $voucher = Voucher::where('voucher_code', $voucherCode)->first();

        // Cek apakah voucher valid
        if (!$voucher) {
            return redirect()->back()->with('error', 'Kode voucher tidak valid.');
        }

        // Cek apakah voucher masih berlaku
        if ($voucher->status !== 'aktif' || $voucher->tanggal_berlaku > now() || $voucher->tanggal_kadaluarsa < now()) {
            return redirect()->back()->with('error', 'Voucher sudah kedaluwarsa atau belum berlaku.');
        }

        // Cek apakah voucher hanya bisa digunakan oleh customer tertentu berdasarkan email
        $customer = Customer::where('email', Auth::user()->email)->firstOrFail();

        if ($voucher->customer_id !== null && $voucher->customer_id !== $customer->id) {
            return redirect()->back()->with('error', 'Voucher tidak dapat digunakan oleh akun ini.');
        }

        // Simpan diskon di session agar bisa digunakan di checkout
        session()->put('voucher', [
            'kode' => $voucher->voucher_code,
            'diskon' => $voucher->discount,  // Misal diskon dalam persen atau jumlah tertentu
        ]);
        return redirect()->back()->with('success', 'Voucher berhasil diterapkan!');
    }


}
