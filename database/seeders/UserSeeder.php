<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Jesmary Carneiro',
            'email' => 'jesmary885@gmail.com',
            'password' => bcrypt('123456789')
        ]);
    }
}
