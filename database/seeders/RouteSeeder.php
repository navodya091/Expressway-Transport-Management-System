<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Route;

class RouteSeeder extends Seeder
{
    public function run()
    {

        Route::create([
            'route_number' => 'Route A ',
            'description' => 'Multiple Trips Per day',
            'start_point_outbound' => 'GAMPAHA',
            'end_point_outbound' => 'NITTABUWA',
            'start_point_inbound' => 'NITTABUWA',
            'end_point_inbound' => 'GAMPAHA',
            'status' => 1, 
        ],
        [
            'route_number' => 'Route B ',
            'description' => 'Two Trips Per day',
            'start_point_outbound' => 'COLOMBO',
            'end_point_outbound' => 'MATARA',
            'start_point_inbound' => 'MATARA',
            'end_point_inbound' => 'COLOMBO',
            'status' => 1, 
        ],[
            'route_number' => 'Route C ',
            'description' => 'One Trip Per day',
            'start_point_outbound' => 'COLOMBO',
            'end_point_outbound' => 'MATARA',
            'start_point_inbound' => 'MATARA',
            'end_point_inbound' => 'COLOMBO',
            'status' => 1, 
        ]);

    }
}
