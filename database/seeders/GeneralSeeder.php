<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generals')->insert([
            'website_title' => 'Az Shop',
            'seller_commission' => 20,
            'minimum_amount_withdraw' => 50,
            'copyright_text' => null,
            'capcha_status' => null,
            'twak_io_status' => null,
            'twak_io_id' => null,
            'email' => "info@gmail.com",
            'phone_number' => "+990 (22) 0123665",
            'teliphone' => "+990 (22) 0123665",
            'address' => "1/2 Kala Vabhon",
            'created_at' => now()
        ]);
    }
}
