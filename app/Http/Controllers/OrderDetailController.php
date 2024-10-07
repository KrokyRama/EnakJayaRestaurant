<?php
namespace App\Http\Controllers;

use App\Models\OrderDetail;  // Nama model yang benar
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        // Ambil semua data detail order beserta relasi menu
        $orderDetails = OrderDetail::with('menu')->get();

        // Kirim data ke view adminorderdetail.blade.php
        return view('admin.adminorderdetail', compact('orderDetails'));
    }
}
