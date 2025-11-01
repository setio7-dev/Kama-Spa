<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::insert([
            [
                "name" => "Admin",
                "email" => "admin@gmail.com",
                "password" => Hash::make("admin123"),
                "role" => "admin"
            ],
            [
                "name" => "Pimpinan",
                "email" => "pimpinan@gmail.com",
                "password" => Hash::make("pimpinan123"),
                "role" => "leader"
            ],
            [
                "name" => "Keuangan",
                "email" => "keuangan@gmail.com",
                "password" => Hash::make("keuangan123"),
                "role" => "accounting"
            ],            
        ]);
    }
}
