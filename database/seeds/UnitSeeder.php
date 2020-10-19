<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Unit::create(['name' => 'Ons']);
        App\Unit::create(['name' => 'Kg']);
        App\Unit::create(['name' => 'Pcs']);
        App\Unit::create(['name' => 'Liter']);
        App\Unit::create(['name' => 'Pak']);
        App\Unit::create(['name' => 'Kardus']);
    }
}
