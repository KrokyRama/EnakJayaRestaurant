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
        return response()->json($contacts); // mengirim data dalam format JSON
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

    // Fungsi untuk menghapus pesan
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json(['success' => 'Pesan berhasil dihapus']);
    }

    // Fungsi untuk mengedit pesan
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return response()->json(['success' => 'Pesan berhasil diupdate']);
    }
}
