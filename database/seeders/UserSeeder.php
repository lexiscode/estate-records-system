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
        $user = new User();

        $user->name = 'Lexis';
        $user->email = 'admin@gmail.com';
        $user->password = '$2y$10$Pilm5U8WjTYLRLZJVxLLG.ig3Wau7AruM5W.VjmBU.dfhojVjOh9O';

        $user->save();
    }
}
