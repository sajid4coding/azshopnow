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
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'vendorProductStatus' => 'published',
        ]);
        DB::table('products')->insert([
            'product_title' => "Pant",
            'product_price' => 150,
            'discount_price' => 120,
            'parent_category_slug' => 'men',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'vendorProductStatus' => 'published',
        ]);
        DB::table('products')->insert([
            'product_title' => "Shoe",
            'product_price' => 80,
            'parent_category_slug' => 'men',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'vendorProductStatus' => 'published',
        ]);
        DB::table('products')->insert([
            'product_title' => "Abaya-Khimar",
            'product_price' => 180,
            'parent_category_slug' => 'women',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'vendorProductStatus' => 'published',
        ]);
        DB::table('products')->insert([
            'product_title' => "Mobile",
            'product_price' => 280,
            'parent_category_slug' => 'smartphone-and-table',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'vendorProductStatus' => 'published',
        ]);
        DB::table('products')->insert([
            'product_title' => "Table",
            'product_price' => 180,
            'parent_category_slug' => 'furniture',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'vendorProductStatus' => 'published',
        ]);
        DB::table('products')->insert([
            'product_title' => "School Bag",
            'product_price' => 80,
            'parent_category_slug' => 'bags-and-shoe',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'vendorProductStatus' => 'published',
        ]);
        DB::table('products')->insert([
            'product_title' => "Power Oil",
            'product_price' => 150,
            'parent_category_slug' => 'automotive-and-motorcycle',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'vendorProductStatus' => 'published',
        ]);
        DB::table('products')->insert([
            'product_title' => "Shampoo",
            'product_price' => 50,
            'parent_category_slug' => 'wohealth-and-beautymen',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'vendorProductStatus' => 'published',
        ]);
        DB::table('products')->insert([
            'product_title' => "LED Light",
            'product_price' => 50,
            'parent_category_slug' => 'electronics',
            'vendor_id' => 3,
            'shop_name' => 'AZ Shop Now',
            'sku' => 226699,
            'status' => 'published',
            'short_description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'description' => 'Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas! Outdoor learning ideas and nature activities for kids of all ages; including fun outside activities, nature crafts, and nature study ideas!',
            'vendorProductStatus' => 'published',
        ]);
    }
}
