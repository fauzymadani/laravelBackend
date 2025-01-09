<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'tipe_user' => 'Admin',
            'nama' => 'John Doe',
            'alamat' => 'Jl. Merdeka No.1',
            'telpon' => '081234567890',
            'username' => 'admin',
            'password' => bcrypt('password123'),
        ]);

        User::create([
            'tipe_user' => 'Gudang',
            'nama' => 'Jane Smith',
            'alamat' => 'Jl. Mawar No.2',
            'telpon' => '081987654321',
            'username' => 'gudang',
            'password' => bcrypt('password456'),
        ]);
    }
}
