<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "AZ Shop Now",
            'email' => 'admin@azshopnow.com',
            'role' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
            'created_at' => now(),
            'password' => Hash::make('123456789'),
        ]);
        DB::table('users')->insert([
            'name' => "AZ Shop Now Customer",
            'email' => 'customer@azshopnow.com',
            'role' => 'customer',
            'status' => 'active',
            'email_verified_at' => now(),
            'created_at' => now(),
            'password' => Hash::make('123456789'),
        ]);
        DB::table('users')->insert([
            'name' => "AZ Shop Now Vendor",
            'email' => 'vendor@azshopnow.com',
            'shop_name' => 'AZ Shop Now',
            'role' => 'vendor',
            'status' => 'active',
            'email_verified_at' => now(),
            'created_at' => now(),
            'password' => Hash::make('123456789'),
        ]);
    }
}
