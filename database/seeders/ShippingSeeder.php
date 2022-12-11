<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shippings')->insert([
            'shipping_name' => "Inside City",
            'cost' => 60,
            'created_at' => now()
        ]);
        DB::table('shippings')->insert([
            'shipping_name' => "Outside City",
            'cost' => 120,
            'created_at' => now()
        ]);
    }
}
