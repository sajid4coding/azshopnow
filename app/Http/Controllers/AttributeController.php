<?php

namespace App\Http\Controllers;

use App\Models\{AttributeSize, AttributeColor, General};
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'vendor'){
            return view('vendor.product.attribute.index', [
                'attributesizes' => AttributeSize::where('vendor_id', auth()->id())->get(),
                'attributecolors' => AttributeColor::where('vendor_id', auth()->id())->get(),
                'general' => General::find(1),

            ]);
        }else{
            return view('vendor.product.attribute.index', [
                'attributesizes' => AttributeSize::where('vendor_id', auth()->user()->vendor_id)->get(),
                'attributecolors' => AttributeColor::where('vendor_id', auth()->user()->vendor_id)->get(),
                'general' => General::find(1),

            ]);
        }
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
            'size' => 'required'
        ]);
        if(auth()->user()->role == 'vendor'){
            AttributeSize::insert([
                'vendor_id' => auth()->id(),
                'size' => $request->size,
                'created_at' => now()
            ]);
        }else{
            AttributeSize::insert([
                'vendor_id' => auth()->user()->vendor_id,
                'size' => $request->size,
                'created_at' => now()
            ]);
        }
        return back()->with('size_success_message', 'Size Added Successfully');
    }

    public function store_color(Request $request)
    {
        $request->validate([
            'color_name' => 'required',
            'color' => 'required',
        ]);
        if(auth()->user()->role =='vendor'){
            AttributeColor::insert([
                'vendor_id' => auth()->id(),
                'color_name' => $request->color_name,
                'color' => $request->color,
                'created_at' => now()
            ]);
        }else{
            AttributeColor::insert([
                'vendor_id' => auth()->user()->vendor_id,
                'color_name' => $request->color_name,
                'color' => $request->color,
                'created_at' => now()
            ]);
        }
        return back()->with('color_success_message', '+Color Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttributeColor  $AttributeColor
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeColor $AttributeColor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributeColor  $AttributeColor
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeColor $AttributeColor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttributeColor  $AttributeColor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeColor $AttributeColor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeColor  $AttributeColor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AttributeSize::find($id)->delete();
        return back();
    }
    public function destroy_color($id)
    {
        AttributeColor::find($id)->delete();
        return back();
    }
}
