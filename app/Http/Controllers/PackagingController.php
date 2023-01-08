<?php

namespace App\Http\Controllers;

use App\Models\Packaging;
use App\Models\General;
use Illuminate\Http\Request;

class PackagingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packagings=Packaging::latest()->get();
        $general = General::find(1);
        return view('dashboard.packing.index',compact('packagings','general'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.packing.create',[
            'general' => General::find(1),
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
        $request->validate([
            'packaging_name' => 'required',
            'cost' => 'required',
            'packaging_name' => 'unique:packagings,packaging_name'
        ]);
        Packaging::insert([
            'packaging_name'=>$request->packaging_name,
            'cost'=>$request->cost,
            'created_at'=>now(),
        ]);
        return redirect('packaging')->with('success','New product packaging added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Packaging  $packaging
     * @return \Illuminate\Http\Response
     */
    public function show(Packaging $packaging)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Packaging  $packaging
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packaging=Packaging::findOrFail($id);
      $general = General::find(1);
        return view('dashboard.packing.edit',compact('packaging','general'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Packaging  $packaging
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Packaging::findOrFail($id)->update([
            'packaging_name'=>$request->packaging_name,
            'cost'=>$request->cost,
        ]);
        return redirect('packaging')->with('success','Product packaging updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Packaging  $packaging
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Packaging::find($id)->delete();
        return back()->with('success','Product packaging deleted successfully.');
    }
}
