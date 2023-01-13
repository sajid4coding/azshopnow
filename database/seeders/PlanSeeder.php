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
            'stripe_plan' => 'price_1MP9GYDy8yREP5Q9hu3sWmrq',
            'price' => 1,
            'description' => 'Basic',
            'created_at' => now()

        ]);
        DB::table('plans')->insert([
            'name' => 'Premium',
            'slug' => 'premium',
            'stripe_plan' => 'price_1MN277Dy8yREP5Q9T2EUmcvD',
            'price' => 29,
            'description' => 'Premium',
            'created_at' => now()
        ]);
        DB::table('plans')->insert([
            'name' => 'Az Shop',
            'slug' => 'azshop',
            'stripe_plan' => 'price_1MP9EQDy8yREP5Q9oZtkUXHu',
            'price' => 49,
            'description' => 'Az Shop',
            'created_at' => now()
        ]);
    }
}
