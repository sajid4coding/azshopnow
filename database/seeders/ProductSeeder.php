<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('products')->insert([
           'product_title' => 'I-phone',
           'product_price' => 3000,
           'discount_price' => 5000,
           'parent_category_id' => 5,
           'parent_category_slug' => 'cameras',
           'vendor_id' => 1,
           'shop_name' =>'sagor_shop',
           'status' => 'published',
           'description' =>'Our Phone and tablets include all the big bran...',
           'thumbnail' => '20222892.png',
           'created_at' => now()
        ]);
           DB::table('products')->insert([
           'product_title' => 'Mac-book',
           'product_price' => 3000,
           'discount_price' => 4000,
           'parent_category_id' => 5,
           'parent_category_slug' => 'cameras',
           'vendor_id' => 1,
           'shop_name' =>'sagor_shop',
           'status' => 'published',
           'description' =>'Our Phone and tablets include all the big bran...',
           'thumbnail' => '20225002.jpg',
           'created_at' => now()
        ]);
           DB::table('products')->insert([
           'product_title' => 'Mobile-phone',
           'product_price' => 3000,
           'discount_price' => 6000,
           'parent_category_id' => 5,
           'parent_category_slug' => 'cameras',
           'vendor_id' => 1,
           'shop_name' =>'sagor_shop',
           'status' => 'published',
           'description' =>'Our Phone and tablets include all the big bran...',
           'thumbnail' => '20226238.jpg',
           'created_at' => now()
        ]);
           DB::table('products')->insert([
           'product_title' => 'banana-phone',
           'product_price' => 5000,
           'discount_price' => 7000,
           'parent_category_id' => 5,
           'parent_category_slug' => 'cameras',
           'vendor_id' => 1,
           'shop_name' =>'sagor_shop',
           'status' => 'published',
           'description' =>'Our Phone and tablets include all the big bran...',
           'thumbnail' => '20229270.jpg',
           'created_at' => now()
        ]);
           DB::table('products')->insert([
           'product_title' => 'orange-phone',
           'product_price' => 8000,
           'discount_price' => 3000,
           'parent_category_id' => 5,
           'parent_category_slug' => 'cameras',
           'vendor_id' => 1,
           'shop_name' =>'sagor_shop',
           'status' => 'published',
           'description' =>'Our Phone and tablets include all the big bran...',
           'thumbnail' => '20229485.png',
           'created_at' => now()
        ]);
           DB::table('products')->insert([
           'product_title' => 'apple-phone',
           'product_price' => 8000,
           'discount_price' => 2000,
           'parent_category_id' => 3,
           'parent_category_slug' => 'headphones',
           'vendor_id' => 1,
           'shop_name' =>'sagor_shop',
           'status' => 'published',
           'description' =>'Our Phone and tablets include all the big bran...',
           'thumbnail' => '20222815.jpg',
           'created_at' => now()
        ]);

    }
}
