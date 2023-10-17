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
                'userType' => 'Owner',
            ],
            [
                'id' => 2,
                'userType' => 'IT Admin',
            ],
            [
                'id' => 3,
                'userType' => 'Manager',
            ],
            [
                'id' => 4,
                'userType' => 'Driver',
            ],
            [
                'id' => 5,
                'userType' => 'Data Entry User',
            ],
        ]);
    }
}

