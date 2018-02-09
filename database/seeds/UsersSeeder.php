<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrator')->insert([
            'email' => 'administrator@ep.xyz',
            'first_name' => 'Administrator First',
            'last_name' => 'Administrator Last',
            'password' => Hash::make('password123'),
        ]);

        DB::table('seller')->insert([
            'email' => 'seller@ep.xyz',
            'first_name' => 'Seller First',
            'last_name' => 'Seller Last',
            'activated' => true,
            'password' => Hash::make('password123'),
        ]);

        DB::table('customer')->insert([
            'email' => 'customer@ep.xyz',
            'first_name' => 'Customer First',
            'last_name' => 'Customer Last',
            'home_address' => 'Customer Home Address',
            'phone_number' => 'Customer Phone Number',
            'activated' => true,
            'password' => Hash::make('password123'),
        ]);
    }
}
