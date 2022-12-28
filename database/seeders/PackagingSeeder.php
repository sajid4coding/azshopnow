<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackagingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packagings')->insert([
            'packaging_name' => 'Default Packing',
            'cost' => 0,
            'created_at' => now()
        ]);
        DB::table('packagings')->insert([
            'packaging_name' => 'Gift Packing',
            'cost' => 15,
            'created_at' => now()
        ]);
        DB::table('packagings')->insert([
            'packaging_name' => 'Large Box',
            'cost' => 2,
            'created_at' => now()
        ]);
    }
}
