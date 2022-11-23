<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use  Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.category.category',[
            'categories' => Category::find(auth()->id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.addcategory');
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
            'category_name'=>'required',
            'status'=>'required',
        ]);

        if($request->category_slug){
            $category_slug = $request->category_slug;
        }else{
            $category_slug = $request->category_name;
        }

        Category::insert([
            'category_name'=> $request->category_name,
            'slug'=> Str::slug($category_slug, '-'),
            'description'=> $request->category_description,
            'status'=> $request->status,
            'created_at' => now()
        ]);

        if ($request->hasFile('category_photo') ) {
            $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('category_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('category_photo'))->resize(300, 300);
            $img->save(base_path('public/uploads/category_photo/'.$photo), 60);
            Category::where([
                'category_name' => $request->category_name,
                'description' => $request->category_description,
            ])->update([
                'thumbnail'=>$photo
            ]);
        }

        return redirect('category');
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
        return view('dashboard.category.editcategory',[
            'category' => Category::find($id)
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
        Category::find($id)->update([
            'category_name' => $request->category_name,
            'slug' => $request->slug,
            'description' => $request->description,
            'thumbnail' => $request->thumbnail,
            'status' => $request->status
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect('category');
    }
}
