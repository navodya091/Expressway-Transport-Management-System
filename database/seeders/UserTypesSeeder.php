<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            [
                'id' => 1,
                'user_type' => 'Owner',
            ],
            [
                'id' => 2,
                'user_type' => 'IT Admin',
            ],
            [
                'id' => 3,
                'user_type' => 'Manager',
            ],
            [
                'id' => 4,
                'user_type' => 'Driver',
            ],
            [
                'id' => 5,
                'user_type' => 'Data Entry User',
            ],
        ]);
    }
}

