<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "John Doe",
                "email" => "johndoe@gmail.com",
            ],
            [
                "name" => "Tim Doe",
                "email" => "timdoe@gmail.com",
            ],
        ];

        foreach ($users as $userData)
        {
            $user = User::create([
                ...$userData,
                "phone" => fake()->phoneNumber(),
                "password" => bcrypt("user@1234"),
            ]);
            $user->markEmailAsVerified();
        }
    }
}
