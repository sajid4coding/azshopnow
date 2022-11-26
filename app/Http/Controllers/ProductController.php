<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'product_title'=>'required',
            'product_price'=>'required',
            'parent_category'=>'required',
            'thumbnail'=>'required | mimes:jpg,png,jpeg ',
        ]);

        $product= Product::create([
            'product_title'=>$request->product_title,
            'product_price'=>$request->product_price,
            'discount_price'=>$request->discount_price,
            'parent_category_id'=>$request->parent_category,
            'vendor_id'=>auth()->id(),
            'shop_name'=>auth()->user()->shop_name,
            'description'=>$request->description,
            'status'=>'published',
        ]);

        $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('thumbnail')->getClientOriginalExtension();
        $img = Image::make($request->file('thumbnail'))->resize(207, 232);
        $img->save(base_path('public/uploads/product_photo/'.$photo), 70);
        Product::find($product->id)->update([
            'thumbnail'=>$photo,
        ]);
         if ($request->hasFile('gellery') ) {
                $request->validate([
                    'gellery'=>'mimes:jpg,png,jpeg ',
                ]);
                $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('gellery')->getClientOriginalExtension();
                $img = Image::make($request->file('gellery'))->resize(207, 232);
                $img->save(base_path('public/uploads/product_photo/'.$photo), 70);
                Product::find($product->id)->update([
                    'gellery'=>$photo,
                ]);
        }
        return redirect('/vendor/dashboard/#productSection');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
