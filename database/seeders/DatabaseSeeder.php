<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'username' => 'Admin SPA',
            'email' => 'admin@gmail.com',
            'number_phone' => '08123854674',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);
    }
}
