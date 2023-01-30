<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            CategorySeeder::class,
            ShippingSeeder::class,
            BannerSeeder::class,
            ProductSeeder::class,
            SizeSeeder::class,
            ColorSeeder::class,
            InventorySeeder::class,
            PackagingSeeder::class,
            NewsletterSeeder::class,
            PlanSeeder::class,
            RolesAndPermissionsSeeder::class,
            GeneralSeeder::class,
            BlogcategorySeeder::class,
            BlogSeeder::class,
        ]);
    }
}
