<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class SubCategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('sub_categories')->insert([
            'parent_category_id' => 2,
            'category_name' => "Cameras",
            'slug' => 'cameras',
            'description' => 'You’ll find exactly what you’re looking for with our huge range of cameras.',
            'thumbnail' => '20229485.png',
            'status' => 'published',
            'created_at' => now()
        ]);
           DB::table('sub_categories')->insert([
            'parent_category_id' =>8,
            'category_name' => "Cameras",
            'slug' => 'cameras',
            'description' => 'You’ll find exactly what you’re looking for with our huge range of cameras.',
            'thumbnail' => '20229270.jpg',
            'status' => 'published',
            'created_at' => now()
        ]);
           DB::table('sub_categories')->insert([
            'parent_category_id' => 4,
            'category_name' => "Cameras",
            'slug' => 'cameras',
            'description' => 'You’ll find exactly what you’re looking for with our huge range of cameras.',
            'thumbnail' => '20226238.jpg',
            'status' => 'published',
            'created_at' => now()
        ]);
           DB::table('sub_categories')->insert([
            'parent_category_id' =>3,
            'category_name' => "Cameras",
            'slug' => 'cameras',
            'description' => 'You’ll find exactly what you’re looking for with our huge range of cameras.',
            'thumbnail' => '20225002.jpg',
            'status' => 'published',
            'created_at' => now()
        ]);
           DB::table('sub_categories')->insert([
            'parent_category_id' => 5,
            'category_name' => "Cameras",
            'slug' => 'cameras',
            'description' => 'You’ll find exactly what you’re looking for with our huge range of cameras.',
            'thumbnail' => '20222892.png',
            'status' => 'published',
            'created_at' => now()
        ]);
    }
}
