<?php

namespace App\Http\Controllers;

use App\Models\Contact; // pastikan model sudah dibuat
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Fungsi untuk mengambil semua data kontak dari database
    public function index()
    {
    $contacts = Contact::all(); // mengambil semua data
    return view('admin.adminsaran', compact('contacts')); // mengirim data ke view
    }


    // Fungsi untuk menyimpan pesan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Membuat pesan baru
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json(['success' => 'Pesan berhasil disimpan']);
    }
}
