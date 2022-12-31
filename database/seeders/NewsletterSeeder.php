<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('newsletters')->insert([

            'email' => 'sanju@azshopnow.com',
            'status' => 'subscribes',
            'created_at' => now(),

        ]);
        DB::table('newsletters')->insert([
            'email' => 'sanju2@azshopnow.com',
            'status' => 'subscribes',
            'created_at' => now(),

        ]);
    }
}
