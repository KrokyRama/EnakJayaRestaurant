<?php

namespace Database\Seeders;

use App\Models\Table;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('abc123'),
            'role' => 'admin',
        ]);

        $mejas = [
            ['kapasitas' => 4, 'status_meja' => 0],
            ['kapasitas' => 2, 'status_meja' => 0],
            ['kapasitas' => 2, 'status_meja' => 0],
            ['kapasitas' => 4, 'status_meja' => 0],
            ['kapasitas' => 6, 'status_meja' => 0],
        ];

        foreach ($mejas as $meja) {
            Table::create($meja);
        }



    }
}
