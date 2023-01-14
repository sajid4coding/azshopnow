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
        Permission::create(['name' => 'General Settings']);
        Permission::create(['name' => 'Pages']);
        Permission::create(['name' => 'Product Management']);
        Permission::create(['name' => 'Product Campaign']);
        Permission::create(['name' => 'Product Catalog']);
        Permission::create(['name' => 'Product Discussion']);
        Permission::create(['name' => 'Order Management']);
        Permission::create(['name' => 'Earnings']);
        Permission::create(['name' => 'Packaging']);
        Permission::create(['name' => 'Customer Management']);
        Permission::create(['name' => 'Vendor Management']);
        Permission::create(['name' => 'Newsletter Management']);
        Permission::create(['name' => 'Admin Management']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'Jr. Staff']);
        $role = Role::create(['name' => 'Sr. Staff']);
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
