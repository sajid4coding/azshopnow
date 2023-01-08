<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogoSeeder extends Seeder
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
            'header_logo' => null,
            'footer_logo' => null,
            'invoice_logo' => null,
            'favicon_logo' => null,
            'dashboard_logo' => null,
            'dashboard_favicon_logo' => null,
            'created_at' => now()
        ]);
    }
}
