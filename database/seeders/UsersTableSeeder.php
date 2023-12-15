<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan data manual untuk waiter
        User::create([
            'username' => 'waiter',
            'password' => Hash::make('pass'),
            'profile_name' => 'RPL KELOMPOK 2',
            'role' => 'waiter',
        ]);

        // Tambahkan data manual untuk manager
        User::create([
            'username' => 'manager',
            'password' => Hash::make('pass'),
            'profile_name' => 'DANIEL SENGKEY',
            'role' => 'manager',
        ]);

        // Tambahkan data manual lainnya jika diperlukan

        // Contoh untuk menambahkan multiple data sekaligus
        // User::insert([
        //     [
        //         'username' => 'username1',
        //         'password' => Hash::make('password1'),
        //         'profile_name' => 'Profile Name 1',
        //         'role' => 'customer',
        //     ],
        //     [
        //         'username' => 'username2',
        //         'password' => Hash::make('password2'),
        //         'profile_name' => 'Profile Name 2',
        //         'role' => 'customer',
        //     ],
        // ]);

        // Tambahkan seeder lain jika diperlukan
    }
}
