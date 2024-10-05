<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;

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

        // Jika item sudah ada di cart, maka tambahkan quantity
        if (isset($cart[$request->menu_id])) {
            $cart[$request->menu_id]['quantity']++;
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
        $discount = session()->get('discount', 0);
//        $discount = 10;
        $discountedAmount = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        if ($discount > 0) {
            $discountedAmount = ($discount / 100) * $subtotal;
        }

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
    public function applyDiscount(Request $request)
    {
        $discount = 10; // contoh diskon 10%
        session()->put('discount', $discount);

        return redirect()->back()->with('success', 'Discount applied!');
    }




}
