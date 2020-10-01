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
        App\Unit::create([
            'name' => 'Kg'
        ]);
        App\Unit::create([
            'name' => 'L'
        ]);
        App\Unit::create([
            'name' => 'Lusin'
        ]);
    }
}
