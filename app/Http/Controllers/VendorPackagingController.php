<?php

namespace App\Http\Controllers;

use App\Models\VendorPackaging;
use Illuminate\Http\Request;

class VendorPackagingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.packaging.packaging',[
            'packaging_lists' => VendorPackaging::where('vendor_id', auth()->id())->get()
        ]);
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
            '*' => 'required'
        ]);
        VendorPackaging::insert([
            'vendor_id' => auth()->id(),
            'packaging_name' => $request->packaging_name,
            'packaging_cost' => $request->packaging_cost,
            'created_at' => now()
        ]);
        return back()->with('create_success', 'Packaging Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VendorPackaging  $vendorPackaging
     * @return \Illuminate\Http\Response
     */
    public function show(VendorPackaging $vendorPackaging)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VendorPackaging  $vendorPackaging
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('vendor.packaging.edit-packaging',[
            'packaging_data' => VendorPackaging::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VendorPackaging  $vendorPackaging
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            '*' => 'required'
        ]);
        VendorPackaging::find($id)->update([
            'packaging_name' => $request->packaging_name,
            'packaging_cost' => $request->packaging_cost,
        ]);
        return redirect('vendor-packaging')->with('update_success', 'Packaging Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VendorPackaging  $vendorPackaging
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VendorPackaging::find($id)->delete();
        return back()->with('delete_success', 'Packaging Deleted');;
    }
}
