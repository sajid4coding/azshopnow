<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.announcement.index',[
            'announcements' => Announcement::all(),
            'all_seller' => User::where('role', 'vendor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.announcement.create',[
            'all_seller' => User::where('role', 'vendor')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->specific_seller){
            foreach ($request->specific_seller as $seller) {
                Announcement::insert([
                    'title' => $request->title,
                    'description' => $request->description,
                    'vendor_type' => $request->drone,
                    'specific_seller' => $seller,
                    'status' => 'publish',
                    'created_at' => now()
                ]);
            }
        }else{
            Announcement::insert([
                'title' => $request->title,
                'description' => $request->description,
                'vendor_type' => $request->drone,
                'status' => 'publish',
                'created_at' => now()
            ]);
        }
        return redirect('announcement')->with('announcement_created', 'Announcement Publish');
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
        //
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
        Announcement::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'vendor_type' => $request->drone,
            'status' => $request->status,
        ]);
        return back()->with('announcement_updated', 'Announcement Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Announcement::find($id)->delete();
        return back()->with('announcement_delete', 'Announcement Delete');
    }

    public function vendor_announcement()
    {
        // 'announcements' => Announcement::where([
        //     'vendor_type'=> 'All Seller',
        //     'status' => 'publish',
        // ])->orWhere([
        //     'vendor_type' => 'Specific Seller',
        //     'specific_seller' => auth()->id(),
        //     'status' => 'publish',
        // ])->get()

        return view('vendor.announcement.announcement',[
            'announcements' => Announcement::where('status', 'publish',)->get(),

            'announcement_count' => Announcement::where([
                'vendor_type'=> 'All Seller',
                'status' => 'publish',
            ])->orWhere([
                'specific_seller' => auth()->id(),
                'status' => 'publish',
            ])->count()
        ]);
    }
    public function vendor_details_announcement($id)
    {
        return view('vendor.announcement.details',[
            'announcement' => Announcement::find($id)
        ]);
    }
}
