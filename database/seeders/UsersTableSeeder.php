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
        
        
            $usersData =     [
            [
                'user_type_id' => 1,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '918563713v',
                'first_name' => 'Amal',
                'last_name' => 'Samaraweera',
                'email' => 'amal1@expressway.com', // Generates a unique email
                'phone' => '0715810878',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 2,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '928563713v',
                'first_name' => 'Gayan',
                'last_name' => 'Sanjeewa',
                'email' => 'gayan2@expressway.com', // Generates a unique email
                'phone' => '0745810878',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 3,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '938463713v',
                'first_name' => 'Sameera',
                'last_name' => 'Samarawickrama',
                'email' => 'sameera3@expressway.com', // Generates a unique email
                'phone' => '0775710878',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 5,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '908563713v',
                'first_name' => 'Isira',
                'last_name' => 'Samaraweera',
                'email' => 'isira4@expressway.com', // Generates a unique email
                'phone' => '0775810478',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 5,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '838563713v',
                'first_name' => 'Chathura',
                'last_name' => 'Herath',
                'email' => 'chathura25@expressway.com', // Generates a unique email
                'phone' => '0775110878',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 5,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '938543713v',
                'first_name' => 'Gayan',
                'last_name' => 'Kavinda',
                'email' => 'gayan569@expressway.com', // Generates a unique email
                'phone' => '0775819878',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 4,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '938563793v',
                'first_name' => 'Saman',
                'last_name' => 'Kumara',
                'email' => 'saman5891@expressway.com', // Generates a unique email
                'phone' => '0775810278',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 4,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '938563723v',
                'first_name' => 'Sahan',
                'last_name' => 'Senadheera',
                'email' => 'sahan256@expressway.com', // Generates a unique email
                'phone' => '0775800878',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 4,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '9385637125v',
                'first_name' => 'Amal',
                'last_name' => 'Krishantha',
                'email' => 'krishantha545@expressway.com', // Generates a unique email
                'phone' => '0770810878',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 4,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '938563712v',
                'first_name' => 'Sumudu',
                'last_name' => 'Gunathunga',
                'email' => 'gunathunga@expressway.com', // Generates a unique email
                'phone' => '0775810821',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 4,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '938525713v',
                'first_name' => 'Gihan',
                'last_name' => 'Fernando',
                'email' => 'gihan123@expressway.com', // Generates a unique email
                'phone' => '0775810879',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 4,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '9385643713v',
                'first_name' => 'Jehan',
                'last_name' => 'Adhikari',
                'email' => 'jehan123@expressway.com', // Generates a unique email
                'phone' => '0775810875',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 4,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '9385639713v',
                'first_name' => 'Akila',
                'last_name' => 'Wijethunga',
                'email' => 'akila123@expressway.com', // Generates a unique email
                'phone' => '0775815878',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 4,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '938163713v',
                'first_name' => 'Mayum',
                'last_name' => 'Sameera',
                'email' => 'mayum2569@expressway.com', // Generates a unique email
                'phone' => '0775812878',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 4,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '918563793v',
                'first_name' => 'Mayura',
                'last_name' => 'Bndara',
                'email' => 'bandara45@expressway.com', // Generates a unique email
                'phone' => '0776810878',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_type_id' => 4,
                'password' => Hash::make(Str::random(8)), // You can customize the password as needed
                'nic' => '938561456v',
                'first_name' => 'Kavidu',
                'last_name' => 'Madushan',
                'email' => 'Madushan1@expressway.com', // Generates a unique email
                'phone' => '0772810878',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        
        // Insert all the users' data into the 'users' table
        DB::table('users')->insert($usersData);
    }

}
