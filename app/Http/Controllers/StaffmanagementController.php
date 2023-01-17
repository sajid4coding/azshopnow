<?php

namespace App\Http\Controllers;

use App\Mail\adminNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class StaffmanagementController extends Controller
{
    public function vendorAddStaff()
    {
        if(auth()->user()->role =='vendor'){
            $vendorLists=User::where('role','staff')->where('vendor_id',auth()->id())->where('status','active')->latest()->get();
            $roles=Role::where('name', 'LIKE', 'vendor-%')->get();
            $permissions=Permission::where('name', 'LIKE', 'vendor-%')->get();
        }else{
            $vendorLists=User::where('role','staff')->where('vendor_id',auth()->user()->vendor_id)->where('status','active')->latest()->get();
            $roles=Role::where('name', 'LIKE', 'vendor-%')->get();
            $permissions=Permission::where('name', 'LIKE', 'vendor-%')->get();
        }
        return view('vendor.staffmanagement.vendorAddStaff',compact('permissions','roles','vendorLists'));
    }
    // public function vendorStaffPermission ()
    // {
    //     $permissions=Permission::where('name', 'LIKE', 'vendor-%')->get();
    //     return view('vendor.staffmanagement.vendorStaffPermission ',compact('permissions'));
    // }
    // public function vendorStaffPermission_Post (Request $request)
    // {
    //     $request->validate([
    //         "*"=>'required'
    //     ]);
    //     Permission::create([
    //         'name' => 'vendor-'.$request->name,
    //     ]);
    //     return back()->with('success','New Permission added successfully');
    // }
    // public function vendorStaffPermissionDelete ($id)
    // {
    //     Permission::findOrFail($id)->delete();
    //     return back()->with('success','Permission deleted successfully');
    // }
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
    public function vendorAddStaff_delete ($id){
        User::find($id)->delete();
        return back()->with('success','Staff deleted successfully');
    }

    public function vendorAddStaff_post(Request $request)
    {
        $request->validate([
            '*'=> 'required',
        ]);
       $password = Str::upper(Str::random(8));
        $userId=User::insertGetId([
            'name'=>$request->name,
            'vendor_id'=>auth()->id(),
            'email'=>$request->email,
            'password'=>bcrypt($password),
            'email_verified_at'=>now(),
            'role'=>'staff',
            'status'=>'active',
            'dashboard_access'=>'active'
        ]);
            $role=Role::findById($request->role);
            $role->givePermissionTo($request->permission);
            $user= User::find($userId);
            $user->assignRole($request->role);
            Mail::to($request->email)->send(new adminNotification($request->name,$request->email,$password));
        return back()->with('success','Staff added successfully!');
    }
}
