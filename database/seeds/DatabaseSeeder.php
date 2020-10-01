<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(PemilikSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(TypeSeeder::class);
    }
}
