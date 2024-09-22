<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Method for checkout page
    public function checkout()
    {
        return view('product.checkout');
    }

    // Method for single product page
    public function singleProduct() // masukin $id
    {
        // Fetch product details using the $id
//        $product = Product::find($id);
//        return view('product.single-product', compact('product'));

        return view('product.single-product');
    }

    // Method for cart page
    public function cart()
    {
        return view('product.cart');
    }
}
