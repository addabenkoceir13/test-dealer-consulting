<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            "email_verified_at" =>now(),
            'password' => 123456789,
            'role' => 'admin',
            'remember_token' => Str::random(20),
        ]);

        User::create([
            'name' => "User#01",
            'email' => "user01@gmail.com",
            "email_verified_at" =>now(),
            'password' => 123456789,
            'role' => 'user',
            'remember_token' => Str::random(20),
        ]);

        User::create([
            'name' => "user#02",
            'email' => "user02@gmail.com",
            "email_verified_at" =>now(),
            'password' => 123456789,
            'role' => 'user',
            'remember_token' => Str::random(20),
        ]);
    }
}
