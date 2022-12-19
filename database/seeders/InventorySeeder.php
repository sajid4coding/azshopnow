<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventories')->insert([
            'product_id' => 1,
            'vendor_id' => 3,
            'size' => 1,
            'color' => 1,
            'quantity' => 30,
            'price' => 200,
            'created_at' => now()
        ]);
        DB::table('inventories')->insert([
            'product_id' => 1,
            'vendor_id' => 3,
            'size' => 2,
            'color' => 2,
            'quantity' => 30,
            'price' => 200,
            'created_at' => now()
        ]);
        DB::table('inventories')->insert([
            'product_id' => 1,
            'vendor_id' => 3,
            'size' => 3,
            'color' => 1,
            'quantity' => 30,
            'price' => 200,
            'created_at' => now()
        ]);
        DB::table('inventories')->insert([
            'product_id' => 5,
            'vendor_id' => 3,
            'quantity' => 30,
            'created_at' => now()
        ]);
        DB::table('inventories')->insert([
            'product_id' => 7,
            'vendor_id' => 3,
            'size' => 2,
            'color' => 1,
            'quantity' => 30,
            'price' => 200,
            'created_at' => now()
        ]);
        DB::table('inventories')->insert([
            'product_id' => 7,
            'vendor_id' => 3,
            'size' => 2,
            'color' => 2,
            'quantity' => 30,
            'price' => 200,
            'created_at' => now()
        ]);
        DB::table('inventories')->insert([
            'product_id' => 7,
            'vendor_id' => 3,
            'size' => 1,
            'color' => 1,
            'quantity' => 30,
            'price' => 200,
            'created_at' => now()
        ]);
        DB::table('inventories')->insert([
            'product_id' => 3,
            'vendor_id' => 3,
            'size' => 1,
            'color' => 2,
            'quantity' => 30,
            'price' => 200,
            'created_at' => now()
        ]);
    }
}
