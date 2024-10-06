<?php

namespace App\Http\Controllers;

use App\Models\Menu; // Import model Menu
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Fungsi untuk menampilkan data menu
    public function index()
    {
        $menus = Menu::all(); // Mengambil semua data menu
        return view('admin.adminmenu', compact('menus')); // Mengirim data ke view
    }

    // Menampilkan form edit menu
    public function edit($id)
    {   
        $menu = Menu::findOrFail($id); // Mengambil menu berdasarkan ID
        return view('admin.editMenu', compact('menu')); // Mengirim data menu ke view edit
    }

    // Memperbarui data menu
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id); // Mengambil menu berdasarkan ID

        // Validasi input
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048', // Foto bersifat opsional
        ]);

        // Update data menu
        $menu->nama_menu = $request->nama_menu;
        $menu->kategori = $request->kategori;
        $menu->price = $request->price;
        $menu->stok = $request->stok;
        $menu->deskripsi = $request->deskripsi;

        // Jika ada foto baru, simpan dan update path-nya
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($menu->foto && file_exists(public_path($menu->foto))) {
                unlink(public_path($menu->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/products/'), $filename);
            
            // Simpan dengan jalur penuh 'assets/img/products/'
            $menu->foto = 'assets/img/products/' . $filename;
        }

        $menu->save(); // Simpan perubahan

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui');
    }

    // Menampilkan form untuk membuat menu baru
    public function create()
    {
        return view('admin.createMenu'); // Ganti dengan nama view Anda untuk menambah menu
    }

    // Menyimpan menu baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048', // Foto bersifat opsional
        ]);

        // Membuat instance baru dari model Menu
        $menu = new Menu();
        $menu->nama_menu = $request->nama_menu;
        $menu->kategori = $request->kategori;
        $menu->price = $request->price;
        $menu->stok = $request->stok;
        $menu->deskripsi = $request->deskripsi;

        // Jika ada foto, simpan dan update path-nya
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/products/'), $filename);
            
            // Simpan dengan jalur penuh 'assets/img/products/'
            $menu->foto = 'assets/img/products/' . $filename;
        }

        $menu->save(); // Simpan menu baru

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
    }

    // Menghapus menu
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id); // Mengambil menu berdasarkan ID

        // Hapus foto dari server jika ada
        if ($menu->foto) {
            $filePath = public_path($menu->foto);
            if (file_exists($filePath)) {
                unlink($filePath); // Menghapus file foto
            }
        }

        $menu->delete(); // Menghapus data menu dari database

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus');
    }
}
