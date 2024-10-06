<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Ambil semua data pelanggan dari database
        $customers = Customer::all();

        // Kembalikan view dengan data pelanggan
        return view('admin.adminpelanggan', compact('customers'));
    }
}
