<?php

namespace App\Http\Controllers;

use App\Models\VendorShipping;
use Illuminate\Http\Request;

class VendorShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.shipping.shipping',[
            'shippings' => VendorShipping::where('vendor_id', auth()->id())->get()
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
        VendorShipping::insert([
            'vendor_id' => auth()->id(),
            'shipping_name' => $request->shipping_name,
            'shipping_cost' => $request->shipping_cost,
            'created_at' => now()
        ]);
        return back()->with('create_success', 'Shipping Created');;
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
        return view('vendor.shipping.edit-shipping',[
            'shipping_data' => VendorShipping::find($id)
        ]);
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
        $request->validate([
            '*' => 'required'
        ]);
        VendorShipping::find($id)->update([
            'shipping_name' => $request->shipping_name,
            'shipping_cost' => $request->shipping_cost,
        ]);
        return redirect('vendor-shipping')->with('update_success', 'Shipping Updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VendorShipping::find($id)->delete();
        return back()->with('delete_success', 'Shipping Deleted');;;
    }
}
