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
            'category_name' => "Health and Beauty",
            'slug' => 'health and beauty',
            'description' => 'Use these category-specific fields for health & beauty products in your catalog.',
            'thumbnail' => '20227906.png',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Smartphone & Table",
            'slug' => 'smartphone & table',
            'description' => 'A mobile device is a general term for any type of handheld computer. These devices are designed to be extremely portable, and they can often fit in your hand.',
            'thumbnail' => '20225805.png',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Automotive & Motorcycle",
            'slug' => 'automotive & motorcycle',
            'description' => 'The six main types of motorcycles are generally recognized as standard, cruiser, touring, sports, off-road, and dual-purpose.',
            'thumbnail' => '20225806.png',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Furniture",
            'slug' => 'furniture',
            'description' => 'Editors choices · Sofas · Armchairs · Chairs · Tables · Bookcases · Highboards · Beds · Wardrobes.',
            'thumbnail' => '20228208.png',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Sport & Outdoors",
            'slug' => 'sport & outdoors',
            'description' => 'Explore a huge selection of sports and outdoor products great prices, including hundreds of thousands that are eligible for Prime Shipping.',
            'thumbnail' => '20224180.png',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Electronics",
            'slug' => 'electronics',
            'description' => 'Electronics is the study and use of electrical devices that operate at relatively low.',
            'thumbnail' => '20223267.png',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Bags & shoe",
            'slug' => 'bags & shoe',
            'description' => 'In the combination of bags and shoes, to find the right balance, you must first decide on which of the two elements we want attention to be...',
            'thumbnail' => '20224623.png',
            'status' => 'unpublished',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Accessories",
            'slug' => 'accessories',
            'description' => 'A. Fashion Accessories for Women · Handbags · Glasses · Wallets · Jackets · Shoes · Boots · Hats.',
            'thumbnail' => '20228252.png',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Outdoor and Nature",
            'slug' => 'outdoor and nature',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => '20228818.png',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Men",
            'slug' => 'men',
            'description' => 'For adult male humans, see Category Men.',
            'thumbnail' => '2022423.png',
            'status' => 'published',
            'created_at' => now()
        ]);
        DB::table('categories')->insert([
            'category_name' => "Women",
            'slug' => 'women',
            'description' => 'A woman is an adult female human.',
            'thumbnail' => '2022491.png',
            'status' => 'published',
            'created_at' => now()
        ]);
    }
}
