<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\adminNotification;
use App\Models\General;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminmanagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superAdmin= User::where('role','admin')->first();
        $editors= User::where('role','admin')->latest()->get();
        $general = General::find(1);
        $roles=Role::where('name','LIKE','admin-%')->where('name','NOT LIKE','vendor')->get();
        $permissions=Permission::where('name','LIKE','admin-%')->get();
        return view('dashboard.usersManagement.admin.allAdminList', compact('superAdmin','editors','general','roles','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*'=> 'required',
        ]);
       $password = Str::upper(Str::random(8));
        $userId=User::insertGetId([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($password),
            'email_verified_at'=>now(),
            'role'=>'admin',
            'status'=>'active',
        ]);
            $role=Role::findById($request->role);
            $role->givePermissionTo([$request->permission]);
            $user= User::find($userId);
            $user->assignRole($request->role);
            Mail::to($request->email)->send(new adminNotification($request->name,$request->email,$password));
        return back()->with('success','Member added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editor=User::findOrFail($id);
        $general = General::find(1);

        return view('dashboard.usersManagement.admin.adminAction', compact('editor','general'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        if ($user->status=='active') {
          $user->status='deactive';
        //   Mail::to($user->email)->send(new VendorBan($user->name,$user->email,$user->shop_name));
        }else{
          $user->status='active';
        //   Mail::to($user->email)->send(new VendorActivation($user->name,$user->email,$user->shop_name));
        }
        $user->save();
        return redirect('/adminmanagement')->with('success','Editor profile status changed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('success','User deleted successfully.');
    }
}
