<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_sizes')->insert([
            'vendor_id' => 3,
            'size' => 'S',
            'created_at' => now()
        ]);
        DB::table('attribute_sizes')->insert([
            'vendor_id' => 3,
            'size' => 'M',
            'created_at' => now()
        ]);
        DB::table('attribute_sizes')->insert([
            'vendor_id' => 3,
            'size' => 'L',
            'created_at' => now()
        ]);
        DB::table('attribute_sizes')->insert([
            'vendor_id' => 3,
            'size' => 'XL',
            'created_at' => now()
        ]);
        DB::table('attribute_sizes')->insert([
            'vendor_id' => 3,
            'size' => 'XXL',
            'created_at' => now()
        ]);
    }
}
