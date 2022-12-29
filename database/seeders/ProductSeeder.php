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
            'product_title' => "Shirt",
            'product_price' => 250,
            'parent_category_slug' => 'men',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'super-deals',
            'status' => 'published',
            'tag' => 'T-shirt ,Polo T-shirt',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Pant",
            'product_price' => 150,
            'discount_price' => 120,
            'parent_category_slug' => 'men',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'super-deals',
            'tag' => 'Under World, Boxer, half Pant',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Shoe",
            'product_price' => 80,
            'parent_category_slug' => 'men',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'super-deals',
            'tag' => 'Juta ,Sandle, shoe',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Abaya-Khimar",
            'product_price' => 180,
            'parent_category_slug' => 'women',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'super-deals',
            'tag' => 'Irani borka , Khimar, abaya',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Mobile",
            'product_price' => 280,
            'parent_category_slug' => 'smartphone-and-table',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'super-deals',
            'tag' => 'Apple, Sony, infinix, Nokia',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Table",
            'product_price' => 180,
            'parent_category_slug' => 'furniture',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'super-deals',
            'tag' => 'Gamming Table, Wood table ',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "School Bag",
            'product_price' => 80,
            'parent_category_slug' => 'bags-and-shoe',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'super-deals',
            'tag' => 'Children bag, office bag',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Power Oil",
            'product_price' => 150,
            'parent_category_slug' => 'automotive-and-motorcycle',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'super-deals',
            'tag' => 'mobile, gear oil',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Shampoo",
            'product_price' => 50,
            'parent_category_slug' => 'wohealth-and-beautymen',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'super-deals',
            'tag' => 'sunsilik, clear men, body shapoo',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "LED Light",
            'product_price' => 50,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'super-deals',
            'tag' => 'Tube light, table lamp',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Table Lamp",
            'product_price' => 50,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'treanding',
            'tag' => 'Tube light, table lamp',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Keyboar and Monus",
            'product_price' => 50,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'treanding',
            'tag' => 'Tube light, table lamp',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Air Condition",
            'product_price' => 500,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'treanding',
            'tag' => 'Tube light, table lamp',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Table Fan",
            'product_price' => 50,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'treanding',
            'tag' => 'Tube light, table lamp',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Monitor",
            'product_price' => 50,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'treanding',
            'tag' => 'Tube light, table lamp',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Asus Monitor",
            'product_price' => 50,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'flash-sale',
            'tag' => 'Tube light, table lamp',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Television",
            'product_price' => 200,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'flash-sale',
            'tag' => 'Tube light, table lamp',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Play Station4",
            'product_price' => 500,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'flash-sale',
            'tag' => 'Tube light, table lamp',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Play Station %",
            'product_price' => 700,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'flash-sale',
            'tag' => 'Tube light, table lamp',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Laptop",
            'product_price' => 900,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'flash-sale',
            'tag' => 'Tube light, table lamp',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
        DB::table('products')->insert([
            'product_title' => "Asus Monitor",
            'product_price' => 50,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'campaign'=>'flash-sale',
            'tag' => 'Tube light, table lamp',
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'thumbnail' => 'default.png',
            'vendorProductStatus' => 'published',
            'created_at' => now(),
        ]);
    }
}
