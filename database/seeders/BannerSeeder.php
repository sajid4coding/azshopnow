<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'customer_login_banner' => null,
            'vendor_login_banner' => null,
            'shop_page_banner' => null,
            'cart_page_banner' => null,
            'created_at' => now()
        ]);
    }
}
