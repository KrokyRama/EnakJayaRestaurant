<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer', 'payment'])->get();
        return view('admin.admintransaksi', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::with(['customer', 'payment'])->findOrFail($id);
        return view('admin.editTransaksi', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::with('payment')->findOrFail($id);

        // Validasi data
        $request->validate([
            'metode_pembayaran' => 'required|string|max:255',
            'status_pembayaran' => 'required|boolean',
            'status_pesanan' => 'required|boolean',
        ]);

        // Update order
        $order->update([
            'status_pesanan' => $request->status_pesanan,
        ]);

        // Update pembayaran
        $order->payment->update([
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }
}
