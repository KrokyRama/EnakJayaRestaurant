<?php

namespace App\Http\Controllers;

use App\Models\Table; // Import model Table
use Illuminate\Http\Request;

class TableController extends Controller
{
    // Menampilkan data meja
    public function index()
    {
        $tables = Table::all(); // Mengambil semua data meja
        return view('admin.adminmeja', compact('tables')); // Mengirim data ke view
    }

    // Menampilkan form edit meja
    public function edit($id)
    {
        $table = Table::findOrFail($id); // Mengambil meja berdasarkan ID
        return view('admin.editMeja', compact('table')); // Mengirim data meja ke view edit
    }

    // Memperbarui data meja
    public function update(Request $request, $id)
    {
        $table = Table::findOrFail($id); // Mengambil meja berdasarkan ID

        // Validasi input
        $request->validate([
            'kapasitas' => 'required|string|max:255',
            'status_meja' => 'required|integer',
        ]);

        // Update data meja
        $table->kapasitas = $request->kapasitas;
        $table->status_meja = $request->status_meja;
        $table->save(); // Simpan perubahan

        return redirect()->route('meja.index')->with('success', 'Meja berhasil diperbarui');
    }
}

