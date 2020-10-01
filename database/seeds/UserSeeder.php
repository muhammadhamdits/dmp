<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Muhammad Hamdi',
            'email' => 'muhammadhamdi702@gmail.com',
            'phone_number' => '082385424220',
            'address' => 'Piai nan xx',
            'username' => 'muhammadhamdits',
            'password' => bcrypt('muhammadhamdits'),
        ]);
    }
}
