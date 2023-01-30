<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'blog_title' => "About - 'AZ Shop Now'",
            'description' => 'Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.',
            'category' => 'AZ Shop Now',
            'blog_photo' => NULL,
            'status' => 'published',
            'Meta_Tag_Title' => 'Health and Beauty',
            'Meta_Tag_Description' => 'Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.',
            'Meta_Tag_Keywords'=>'',
            'created_at' => now()
        ]);
        DB::table('blogs')->insert([
            'blog_title' => "About - 'Seller Commission'",
            'description' => 'Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.',
            'category' => 'AZ Shop Now',
            'blog_photo' => NULL,
            'status' => 'published',
            'Meta_Tag_Title' => "About - 'Seller Commission'",
            'Meta_Tag_Description' => 'Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.',
            'Meta_Tag_Keywords'=>'',
            'created_at' => now()
        ]);
        DB::table('blogs')->insert([
            'blog_title' => "About - 'Seller Subscription'",
            'description' => 'Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.',
            'category' => 'AZ Shop Now',
            'blog_photo' => NULL,
            'status' => 'published',
            'Meta_Tag_Title' => "About - 'Seller Subscription'",
            'Meta_Tag_Description' => 'Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.',
            'Meta_Tag_Keywords'=>'',
            'created_at' => now()
        ]);
    }
}
