<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => "Computers",
            'slug' => 'computers',
            'description' => 'Our computers and tablets include all the big bran...',
            'thumbnail' => '20227906.gif',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Watches",
            'slug' => 'watches',
            'description' => 'Our range of watches are perfect whether you’re lo...',
            'thumbnail' => '20226848.gif',
            'status' => 'unpublished',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Headphones",
            'slug' => 'headphones',
            'description' => 'Our big range of headphones makes it easy to upgra...',
            'thumbnail' => '20225805.gif',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Footwear",
            'slug' => 'footwear',
            'description' => 'Whatever your activity needs are, we’ve got you co...',
            'thumbnail' => '20228208.gif',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Cameras",
            'slug' => 'cameras',
            'description' => 'You’ll find exactly what you’re looking for with our huge range of cameras.',
            'thumbnail' => '20224180.gif',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Shirts",
            'slug' => 'shirts',
            'description' => 'Any occasion, any time, we have everything you’ll ever need.',
            'thumbnail' => '20223267.gif',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Household",
            'slug' => 'household',
            'description' => 'Spice up your home decor with our wide selection.',
            'thumbnail' => '20224623.gif',
            'status' => 'unpublished',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Toys",
            'slug' => 'toys',
            'description' => 'Get the perfect gift for the little ones.',
            'thumbnail' => '20228252.gif',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Handbags",
            'slug' => 'handbags',
            'description' => 'Great fashion, great selections, great prices',
            'thumbnail' => '20224278.gif',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Sandals",
            'slug' => 'sandals',
            'description' => 'In season summer footwear with a huge range of options',
            'thumbnail' => '20228818.gif',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Men",
            'slug' => 'men',
            'description' => 'For adult male humans, see Category Men.',
            'thumbnail' => '2022423.gif',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Women",
            'slug' => 'women',
            'description' => 'A woman is an adult female human.',
            'thumbnail' => '2022491.gif',
            'status' => 'published',
            'created_at' => now()
        ]);
    }
}
