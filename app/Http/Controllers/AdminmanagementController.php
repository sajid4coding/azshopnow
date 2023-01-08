<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\adminNotification;

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
        $editors= User::where('role','editor')->latest()->get();
        $general = General::find(1);
        return view('dashboard.usersManagement.admin.allAdminList', compact('superAdmin','editors','general'));
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
            'email'
        ]);
       $password = Str::upper(Str::random(8));
        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($password),
            'role'=>'editor',
            'status'=>'active',
            'email_verified_at'=>Carbon::now(),
            'created_at'=>Carbon::now(),
        ]);
        Mail::to('patoarimdriaz@gmail.com')->send(new adminNotification($request->name,$request->email,$password));
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
