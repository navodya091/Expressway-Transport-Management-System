<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            DB::table('buses')->insert([
                'driver_id' => $i,
                'bus_attribute_id' => $i,
                'bus_number' => $faker->unique()->regexify('[A-Z0-9]{7}'),
                'Status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

