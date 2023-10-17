<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        

        // Create additional users with random user types
        $this->createUsers(1, 1); // User type 1 (1 users)
        $this->createUsers(2, 1); // User type 2 (1 users)
       
        $this->createUsers(3, 1); // User type 3 should have 1 records
        $this->createUsers(4, 100);// User type 4 should have 100 records
        $this->createUsers(5, 50); // Random user types (50 users)
    }

    private function createUsers($userType, $count)
    {
        for ($i = 1; $i <= $count; $i++) {
            $nic = $this->generateUniqueNIC();

            DB::table('users')->insert([
                'user_type_id' => $userType,
                'password' => Hash::make('password'), // You can customize the password as needed
                'nic' => $nic,
                'first_name' => Str::random(8, 'alpha'),
                'last_name' => Str::random(8, 'alpha'),
                'email' => Str::random(8) . '@example.com', // Generates a unique email
                'phone' => $this->generateUniquePhoneNumber(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function generateUniqueNIC()
    {
        // Generate a random valid NIC format (for example)
        return rand(100000000, 999999999) . 'V';
    }

    private function generateUniquePhoneNumber()
    {
        // Generate a unique phone number
        return '07' . str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT);
    }
}
