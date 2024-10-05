<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Method untuk menampilkan halaman checkout
    public function showCheckout()
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;
        $takeAwayFee = 3000; // Biaya takeaway tetap
        $discount = session()->get('discount', 0);
        $discountedAmount = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        if ($discount > 0) {
            $discountedAmount = ($discount / 100) * $subtotal;
        }

        $total = $subtotal - $discountedAmount + $takeAwayFee;

        return view('product.checkout', compact('cart', 'subtotal', 'discountedAmount', 'total'));
    }

    public function processCheckout(Request $request)
    {
        // Ambil data dari session cart
        $cart = session()->get('cart', []);

        // Jika cart kosong, kembalikan ke halaman shop
        if (empty($cart)) {
            return redirect('shop')->with('error', 'Your cart is empty!');
        }

        // Jika user login, gunakan data user
        if (Auth::check()) {
            $customer = Customer::where('email', Auth::user()->email)->first();;
        } else {
            // Jika user tidak login (guest checkout)
            $customer = Customer::create([
                'nama' => 'Guest',
                'email' => null,
                'nomor_telepon' => null,
                'gender' => null,
            ]);
        }

        // Save the order
        $order = Order::create([
            'customer_id' => $customer->customer_id,
            'meja_id' => $request->service_option === 'dinein' ? $request->table_option : null,
            'jenis_pesanan' => $request->service_option,
            'status_pesanan' => 0,
            'order_date' => now(),
        ]);

        // Save order details
        foreach ($cart as $id => $details) {
            OrderDetail::create([
                'order_id' => $order->order_id,
                'menu_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }

        // Save payment
        $payment = Payment::create([
            'order_id' => $order->order_id,
            'metode_pembayaran' => $request->payment_option,
            'status_pembayaran' => 0,
            'payment_date' => now(),
        ]);

        // Kosongkan keranjang belanja setelah checkout
        session()->forget('cart');
        session()->forget('discount');

        return redirect()->to('/')->with('success', 'Your order has been processed successfully!');
    }

}
