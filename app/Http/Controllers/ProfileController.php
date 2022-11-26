<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use  Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function admin_profile()
    {
        return view('dashboard.profile.adminprofile');

    }
    public function admin_profile_setting()
    {
        return view('dashboard.profile.profilesetting');

    }
    public function admin_password_change (Request $request)
    {
        $request->validate([
            'current_password'=>'required',
            'password'=>['required', 'confirmed','different:current_password', Password::min(8)],
            'password_confirmation'=>'required',
        ]);
            if (Hash::check($request->current_password, auth()->user()->password)){
                User::find(auth()->id())->update([
                    'password'=>bcrypt($request->password),
                ]);
                return back()->with('success','Password Changed Successfully ');
            }
            else{
                return back()->withErrors('Your provided current password does not matched!');
            };

    }
    public function admin_profile_setting_edit(Request $request)
    {
        User::find(auth()->id())->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
        ]);
        if ($request->hasFile('profile_photo') ) {
            $request->validate([
                'profile_photo'=>'image',
            ]);
            $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('profile_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('profile_photo'))->resize(300, 200);
            $img->save(base_path('public/uploads/profile_photo/'.$photo), 60);
            User::find(auth()->id())->update([
                'profile_photo'=>$photo,
            ]);
        }
        return back();
    }

    // public function edit(Request $request)
    // {
    //     return view('profile.edit', [
    //         'user' => $request->user(),
    //     ]);
    // }

    // /**
    //  * Update the user's profile information.
    //  *
    //  * @param  \App\Http\Requests\ProfileUpdateRequest  $request
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function update(ProfileUpdateRequest $request)
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    // /**
    //  * Delete the user's account.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function destroy(Request $request)
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current-password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
}
