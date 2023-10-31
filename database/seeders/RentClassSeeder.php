<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\RentClass::create([
            'type' => 'Regular',
            'cost' => '200000',
        ]);

        \App\Models\RentClass::create([
            'type' => 'Luxury',
            'cost' => '1000000',
        ]);

        \App\Models\RentClass::create([
            'type' => 'Truck',
            'cost' => '500000',
        ]);

        \App\Models\RentClass::create([
            'type' => 'All In One',
            'cost' => '800000',
        ]);
    }
}
