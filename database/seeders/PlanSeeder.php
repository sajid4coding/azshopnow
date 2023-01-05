<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([

            'name' => 'Basic',
            'slug' => 'basic',
            'stripe_plan' => 'price_1MKObsDy8yREP5Q9IbTWQolo',
            'price' => 0,
            'description' => 'Basic',
            'created_at' => now()

        ]);
        DB::table('plans')->insert([

            'name' => 'Premium',
            'slug' => 'premium',
            'stripe_plan' => 'price_1MKOdHDy8yREP5Q93o6gsMCd',
            'price' => 29,
            'description' => 'Premium',
            'created_at' => now()
        ]);
    }
}
