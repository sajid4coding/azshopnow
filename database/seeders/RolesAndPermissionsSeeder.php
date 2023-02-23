<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'admin-General Settings']);
        Permission::create(['name' => 'admin-Pages']);
        Permission::create(['name' => 'admin-Product Management']);
        Permission::create(['name' => 'admin-Product Campaign']);
        Permission::create(['name' => 'admin-Product Catalog']);
        Permission::create(['name' => 'admin-Product Discussion']);
        Permission::create(['name' => 'admin-Order Management']);
        Permission::create(['name' => 'admin-Earnings']);
        Permission::create(['name' => 'admin-Shipping']);
        Permission::create(['name' => 'admin-Packaging']);
        Permission::create(['name' => 'admin-Customer Management']);
        Permission::create(['name' => 'admin-Vendor Management']);
        Permission::create(['name' => 'admin-staff Management']);
        Permission::create(['name' => 'admin-Newsletter Management']);
        Permission::create(['name' => 'admin-Admin Management']);
        Permission::create(['name' => 'admin-delivery boy Management']);
        Permission::create(['name' => 'admin-announcement Management']);
        Permission::create(['name' => 'admin-Blog Management']);
        Permission::create(['name' => 'admin-Product Return']);

        //For Vendor
        Permission::create(['name' => 'vendor-order']);
        Permission::create(['name' => 'vendor-earning']);
        Permission::create(['name' => 'vendor-wallet']);
        Permission::create(['name' => 'vendor-product management']);
        Permission::create(['name' => 'vendor-staff management']);
        Permission::create(['name' => 'vendor-coupon']);
        Permission::create(['name' => 'vendor-setting']);
        Permission::create(['name' => 'vendor-profile']);

        // create roles and assign created permissions

        // this can be done as separate statements
        Role::create(['name' => 'admin-Sr. Staff']);
        Role::create(['name' => 'admin-Jr. Staff']);
        Role::create(['name' => 'vendor']);
        // $role->givePermissionTo('edit articles');

        // or may be done by chaining
        // $role = Role::create(['name' => 'moderator'])
        //     ->givePermissionTo(['publish articles', 'unpublish articles']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
        $user= User::find(1);
        $user->assignRole($role);
    }
}
