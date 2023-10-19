<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('bus_attributes')->insert([
                'bus_id' => $i,
                'year_of_manufacture' => rand(2000, 2023),
                'manufacturer' => 'Manufacturer ' . $i,
                'seating_capacity' => rand(30, 60),
                'fuel_type' => (rand(0, 1) == 0) ? 'diesel' : 'super diesel',
                'aC' => (rand(0, 1) == 0) ? true : false,
                'insurance_expireDate' => now()->addDays(rand(1, 365)),
            ]);
        }
    }
}
