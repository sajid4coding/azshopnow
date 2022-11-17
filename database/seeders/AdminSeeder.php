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
            'email_verified_at' => now(),
            'created_at' => now(),
            'password' => Hash::make('123456789'),
        ]);
    }
}
