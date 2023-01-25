<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "AZ Shop Now",
            'email' => 'admin@azshopnow.com',
            'role' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
            'created_at' => now(),
            'password' => Hash::make('123456789'),
        ]);
        DB::table('users')->insert([
            'name' => "AZ Shop Now Customer",
            'email' => 'customer@azshopnow.com',
            'role' => 'customer',
            'status' => 'active',
            'email_verified_at' => now(),
            'created_at' => now(),
            'password' => Hash::make('123456789'),
        ]);
        DB::table('users')->insert([
            'name' => "AZ Shop Now Vendor",
            'email' => 'vendor@azshopnow.com',
            'shop_name' => 'AZ Shop Now',
            'role' => 'vendor',
            'status' => 'active',
            'email_verified_at' => Carbon::yesterday(),
            'created_at' => Carbon::yesterday(),
            'password' => Hash::make('123456789'),
        ]);
        // $role = Role::where('name','vendor')->first();
        // $role->givePermissionTo(Permission::where('name','LIKE','vendor-%')->get());
        // $user= User::find(3);
        // $user->assignRole($role);

    }
}
