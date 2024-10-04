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

    // Method for cart page
    public function cart()
    {
        return view('product.cart');
    }

}
