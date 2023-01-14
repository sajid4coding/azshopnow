<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StaffmanagementController extends Controller
{
    public function vendorAddStaff()
    {
        $roles=Role::where('name', 'LIKE', 'vendor-%')->get();
        $permissions=Permission::where('name', 'LIKE', 'vendor-%')->get();
        return view('vendor.staffmanagement.vendorAddStaff',compact('permissions','roles'));
    }
    public function vendorStaffPermission ()
    {
        $permissions=Permission::where('name', 'LIKE', 'vendor-%')->get();
        return view('vendor.staffmanagement.vendorStaffPermission ',compact('permissions'));
    }
    public function vendorStaffPermission_Post (Request $request)
    {
        $request->validate([
            "*"=>'required'
        ]);
        Permission::create([
            'name' => 'vendor-'.$request->name,
        ]);
        return back()->with('success','New Permission added successfully');
    }
    public function vendorStaffPermissionDelete ($id)
    {
        Permission::findOrFail($id)->delete();
        return back()->with('success','Permission deleted successfully');
    }
    public function vendorStaffRole ()
    {
        $roles=Role::where('name', 'LIKE', 'vendor-%')->get();
        return view('vendor.staffmanagement.vendorStaffRole ',compact('roles'));
    }
    public function vendorStaffRole_Post(Request $request)
    {
        $request->validate([
            "*"=>'required'
        ]);
        Role::create([
            'name' => 'vendor-'.$request->name,
        ]);
        return back()->with('success','Role added successfully');
    }
    public function vendorStaffRoleDelete ($id){
        Role::find($id)->delete();
        return back()->with('success','Role deleted successfully');
    }
}
