<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_colors')->insert([
            'vendor_id' => 3,
            'color_name' => 'black',
            'color' => '#000000',
            'created_at' => now()
        ]);
        DB::table('attribute_colors')->insert([
            'vendor_id' => 3,
            'color_name' => 'white',
            'color' => '#FFFFFF',
            'created_at' => now()
        ]);
    }
}
