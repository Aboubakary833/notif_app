<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            "name" => "Raymond Doe",
            "email" => "raymonddoe@gmail.com",
            "phone" => fake()->phoneNumber(),
            "password" => bcrypt("user@1234"),
            "role" => 1
        ]);

        $admin->markEmailAsVerified();
    }
}
