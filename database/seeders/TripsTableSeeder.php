<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trip; // Import the Trip model

class TripsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            Trip::create([
                'route_id' => rand(1, 20), //Assign a random route_id
                'direction' => 'Direction ' . $i,
                'departure_time' => now(), // Use the current time as an example
                'arrival_time' => now()->addHour(), // Add an hour to the current time
                
            ]);
        }
    }
}
