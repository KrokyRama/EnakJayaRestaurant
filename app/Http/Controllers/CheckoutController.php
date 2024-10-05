<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // Validate the request (add any fields as required)
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|email',
            'nomor_telepon' => 'required|string|max:15',
            'meja_id' => 'nullable|integer', // In case of dine-in
        ]);

        // Check if the user is logged in
        if (Auth::check()) {
            // If logged in, use the user details
            $user = Auth::user();
        } else {
            // If not logged in, create a new customer entry (guest checkout)
            $customer = Customer::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'nomor_telepon' => $request->nomor_telepon,
                'gender' => $request->gender, // Make sure to include gender if needed
            ]);
        }

        // Create the order
        $order = Order::create([
            'meja_id' => $request->meja_id, // Or null if takeaway
            'customer_id' => $customer->customer_id ?? null, // Use guest's customer_id or null
            'order_date' => now(),
            'jenis_pesanan' => 'takeaway', // Or dine-in, based on your flow
            'status_pesanan' => 'pending', // Set status as per your requirement
        ]);

        // Store each cart item as order details
        $cart = session()->get('cart', []);
        foreach ($cart as $id => $item) {
            OrderDetail::create([
                'order_id' => $order->order_id,
                'menu_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Clear the cart after checkout
        session()->forget('cart');

        // Redirect to confirmation page or thank you page
        return redirect()->route('checkout.success')->with('success', 'Thank you for your order!');
    }
}
