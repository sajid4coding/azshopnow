<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blog_Category;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Svg\Tag\Rect;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::all();
        return view('dashboard.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Blog_Category::where('status','published')->get();
        return view('dashboard.blog.create',compact('categories'));
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
            'blog_photo'=>'image',
            'blog_title'=>'required',
            'description'=>'required',
       ]);
       $blogId=Blog::insertGetId([
        'blog_title'=> $request->blog_title,
        'description'=> $request->description,
        'category'=> $request->category,
        'status'=> $request->status,
        'Meta_Tag_Title'=> $request->Meta_Tag_Title,
        'Meta_Tag_Description'=> $request->Meta_Tag_Description,
        'Meta_Tag_Keywords'=> $request->Meta_Tag_Keywords,
        'created_at' => now()
    ]);

    if ($request->hasFile('blog_photo') ) {
        $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('blog_photo')->getClientOriginalExtension();
        $img = Image::make($request->file('blog_photo'))->resize(422, 269);
        $img->save(base_path('public/uploads/blog_photo/'.$photo), 70);
        Blog::find($blogId)->update([
            'blog_photo'=>$photo
        ]);
    }
    return redirect(route('blog.index'))->with('success','New Blog added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog=Blog::FindOrFail($id);
        $categories=Blog_Category::all();
        return view('dashboard.blog.edit',compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Blog::findOrFail($id)->update([
            'blog_title'=> $request->blog_title,
            'description'=> $request->description,
            'category'=> $request->category,
            'status'=> $request->status,
            'Meta_Tag_Title'=> $request->Meta_Tag_Title,
            'Meta_Tag_Description'=> $request->Meta_Tag_Description,
            'Meta_Tag_Keywords'=> $request->Meta_Tag_Keywords,
            'created_at' => now()
        ]);

        if ($request->hasFile('blog_photo') ) {
            $blogPhoto=Blog::findOrFail($id)->blog_photo;
            if($blogPhoto){
                unlink(base_path('public/uploads/blog_photo/'.$blogPhoto));
            }
            $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('blog_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('blog_photo'))->resize(422, 269);
            $img->save(base_path('public/uploads/blog_photo/'.$photo), 70);
            Blog::find($id)->update([
                'blog_photo'=>$photo
            ]);
        }

        return redirect(route('blog.index'))->with('success','Blog edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        return back()->with('success','Blog Deleted Successfully');
    }
    public function blogCategoryAdd()
    {
        $categories=Blog_Category::all();
       return view('dashboard.blog.categoryList',compact('categories'));
    }
    public function blogCategoryPost(Request $request)
    {
       $request->validate([
        '*'=>'required',
       ]);
       Blog_Category::insert([
        'category_name'=>$request->category_name,
        'status'=>'published',
        'created_at'=>now(),
       ]);
       return back()->with('success','Blog Category Added Successfully');
    }
    public function blogCategoryedit($id){
        $category=Blog_Category::findOrFail($id);
        return view('dashboard.blog.categoryEdit',compact('category'));
    }
    public function blogCategoryDelete ($id){
        Blog_Category::find($id)->delete();
        return back()->with('success','Blog Category Deleted Successfully');
    }
    public function blogCategoryeditPost (Request $request, $id){
        Blog_Category::find($id)->update([
            'category_name'=>$request->category_name,
            'status'=>$request->status,
        ]);
        return redirect(route('blog.category.add'))->with('success','Blog Category Deleted Successfully');
    }
}

