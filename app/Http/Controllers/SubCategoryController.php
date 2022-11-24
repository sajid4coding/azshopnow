<?php

namespace App\Http\Controllers;

use App\Models\{SubCategory, Category};
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.category.subcategory.subcategory',[
            'subcategories' => SubCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.subcategory.addsubcategory', [
            'categories' => Category::all()
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
            'sub_category_name' => 'required',
            'parent_category_id' => 'required',
            'status' => 'required'
        ]);

        if($request->category_slug){
            $sub_category_slug = $request->slug;
        }else{
            $sub_category_slug = $request->slug;
        }

        SubCategory::insert([
            'parent_category_id' => $request->parent_category,
            'category_name' => $request->sub_category_name,
            'slug' => Str::slug($sub_category_slug, '-'),
            'description' => $request->description,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);

        if($request->hasFile('sub_category_photo') ) {
            $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('sub_category_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('sub_category_photo'))->resize(300, 300);
            $img->save(base_path('public/uploads/category_photo/sub_category_photo/'.$photo), 60);
            SubCategory::where([
                'category_name' => $request->sub_category_name,
                'description' => $request->description,
            ])->update([
                'thumbnail'=>$photo
            ]);
        }

        return redirect('subcategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory, $id)
    {
        return view('dashboard.category.subcategory.editsubcategory',[
            'subcategory' => SubCategory::find($id),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory, $id)
    {
        if($request->hasFile('sub_category_photo') ) {
            $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('sub_category_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('sub_category_photo'))->resize(300, 300);
            $img->save(base_path('public/uploads/category_photo/sub_category_photo/'.$photo), 60);
            SubCategory::where([
                'category_name' => $request->sub_category_name,
                'description' => $request->description,
            ])->update([
                'thumbnail'=>$photo
            ]);
        }
        
        SubCategory::find($id)->update([
            'parent_category_id' => $request->parent_category,
            'category_name' => $request->category_name,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory, $id)
    {
        SubCategory::find($id)->delete();
        return redirect('subcategory');
    }
}
