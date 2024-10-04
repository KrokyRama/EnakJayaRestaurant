<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('menu')->insert([
            ['menu_id' => 1, 'nama_menu' => 'Air Mineral', 'kategori' => 'Minuman', 'price' => 5000.00, 'foto' => 'assets/img/menu/air mineral.jpg', 'deskripsi' => 'Air mineral segar dalam kemasan.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 2, 'nama_menu' => 'Es Campur', 'kategori' => 'Minuman', 'price' => 15000.00, 'foto' => 'assets/img/menuimage/es campur.jpg', 'deskripsi' => 'Es campur dengan berbagai campuran buah dan topping.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 3, 'nama_menu' => 'Es Kelapa Muda', 'kategori' => 'Minuman', 'price' => 10000.00, 'foto' => 'assets/img/menuimage/es kelapa muda.png', 'deskripsi' => 'Minuman kelapa muda segar.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 4, 'nama_menu' => 'Es Teh', 'kategori' => 'Minuman', 'price' => 5000.00, 'foto' => 'assets/img/menuimage/es teh.jpg', 'deskripsi' => 'Teh manis dingin.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 5, 'nama_menu' => 'Iga Sapi Penyet', 'kategori' => 'Makanan', 'price' => 30000.00, 'foto' => 'assets/img/menuimage/iga sapi penyet.jpg', 'deskripsi' => 'Iga sapi dengan sambal penyet.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 6, 'nama_menu' => 'Kentang Goreng', 'kategori' => 'Makanan', 'price' => 15000.00, 'foto' => 'assets/img/menuimage/kentang goreng.jpg', 'deskripsi' => 'Kentang goreng renyah.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 7, 'nama_menu' => 'Kopi Susu', 'kategori' => 'Minuman', 'price' => 12000.00, 'foto' => 'assets/img/menuimage/kopi susu.jpg', 'deskripsi' => 'Kopi dengan tambahan susu.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 8, 'nama_menu' => 'Lemon Tea', 'kategori' => 'Minuman', 'price' => 10000.00, 'foto' => 'assets/img/menuimage/lemon tea.jpeg', 'deskripsi' => 'Minuman teh lemon segar.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 9, 'nama_menu' => 'Lumpia', 'kategori' => 'Makanan', 'price' => 12000.00, 'foto' => 'assets/img/menuimage/lumpia.jpg', 'deskripsi' => 'Lumpia dengan isi sayuran dan daging.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 10, 'nama_menu' => 'Nasi Goreng Jawa', 'kategori' => 'Makanan', 'price' => 20000.00, 'foto' => 'assets/img/menuimage/nasi goreng jawa.jpg', 'deskripsi' => 'Nasi goreng khas Jawa.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 11, 'nama_menu' => 'Nasi Gudeg', 'kategori' => 'Makanan', 'price' => 25000.00, 'foto' => 'assets/img/menuimage/nasi gudeg.jpg', 'deskripsi' => 'Gudeg dengan nasi dan lauk.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 12, 'nama_menu' => 'Nasi Pecel', 'kategori' => 'Makanan', 'price' => 15000.00, 'foto' => 'assets/img/menuimage/nasi pecel.jpg', 'deskripsi' => 'Nasi dengan sayuran pecel.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 13, 'nama_menu' => 'Nasi Rawon', 'kategori' => 'Makanan', 'price' => 30000.00, 'foto' => 'assets/img/menuimage/nasi rawon.jpg', 'deskripsi' => 'Rawon khas Jawa Timur.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 14, 'nama_menu' => 'Pisang Goreng', 'kategori' => 'Makanan', 'price' => 8000.00, 'foto' => 'assets/img/menuimage/pisang goreng.jpg', 'deskripsi' => 'Pisang goreng manis.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 15, 'nama_menu' => 'Wedang Jahe', 'kategori' => 'Minuman', 'price' => 8000.00, 'foto' => 'assets/img/menuimage/wedang jahe.jpg', 'deskripsi' => 'Minuman jahe hangat.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 16, 'nama_menu' => 'Ronde', 'kategori' => 'Minuman', 'price' => 12000.00, 'foto' => 'assets/img/menuimage/ronde.jpg', 'deskripsi' => 'Minuman ronde hangat.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 17, 'nama_menu' => 'Soda Gembira', 'kategori' => 'Minuman', 'price' => 12000.00, 'foto' => 'assets/img/menuimage/soda gembira.jpg', 'deskripsi' => 'Soda dengan susu dan sirup manis.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 18, 'nama_menu' => 'Soto Kudus', 'kategori' => 'Makanan', 'price' => 20000.00, 'foto' => 'assets/img/menuimage/soto kudus.jpg', 'deskripsi' => 'Soto khas Kudus.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 19, 'nama_menu' => 'Tahu Crispy', 'kategori' => 'Makanan', 'price' => 10000.00, 'foto' => 'assets/img/menuimage/tahu crispy.jpg', 'deskripsi' => 'Tahu goreng crispy.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
            ['menu_id' => 20, 'nama_menu' => 'Tempe Mendoan', 'kategori' => 'Makanan', 'price' => 10000.00, 'foto' => 'assets/img/menuimage/tempe mendoan.jpg', 'deskripsi' => 'Tempe goreng mendoan.', 'created_at' => now(), 'updated_at' => now(), 'stok' => 10],
        ]);
    }
}
