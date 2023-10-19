<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BusesTableSeeder::class, 
            UsersTableSeeder::class,
            BusAttributesSeeder::class,
            RouteSeeder::class,
            TripsTableSeeder::class,
            UserTypesSeeder::class
        ]);
    }
}
