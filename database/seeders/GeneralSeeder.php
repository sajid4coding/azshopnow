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
            'website_title' => null,
            'copyright_text' => null,
            'capcha_status' => null,
            'twak_io_status' => null,
            'twak_io_id' => null,
            'header_logo' => 'header_logo.png',
            'footer_logo' => 'footer_logo.png',
            'invoice_logo' => 'invoice_logo.png',
            'favicon_logo' => 'favicon_logo.png',
            'dashboard_logo' => 'dashboard_logo.png',
            'dashboard_favicon_logo' => 'dashboard_favicon_logo.png',
            'created_at' => now()
        ]);
    }
}
