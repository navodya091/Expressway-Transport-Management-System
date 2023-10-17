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
        for ($i = 1; $i <= 100; $i++) {
            DB::table('bus_attributes')->insert([
                'BusID' => $i,
                'YearOfManufacture' => rand(2000, 2023),
                'Manufacturer' => 'Manufacturer ' . $i,
                'SeatingCapacity' => rand(30, 60),
                'FuelType' => (rand(0, 1) == 0) ? 'diesel' : 'super diesel',
                'AC' => (rand(0, 1) == 0) ? true : false,
                'InsuranceExpireDate' => now()->addDays(rand(1, 365)),
            ]);
        }
    }
}
