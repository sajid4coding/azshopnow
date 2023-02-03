<?php

namespace App\Http\Controllers;

use App\Mail\AdminProductNotification;
use App\Models\ProductGallery;
use App\Models\Product;
use App\Models\User;
use App\Notifications\ProductNotification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Faker\Core\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
       if(auth()->user()->role == 'vendor'){
            $products= Product::where('vendor_id',auth()->id())->get();
       }else{
            $products= Product::where('vendor_id',auth()->user()->vendor_id)->get();
       }
        return view('vendor.product.list.list',compact('products'));
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
            'thumbnail'=>'required | image',
        ]);

        if(auth()->user()->role =='vendor'){
            $product= Product::create([
                'product_title'=>$request->product_title,
                'product_price'=>$request->product_price,
                'discount_price'=>$request->discount_price,
                'parent_category_slug'=>$request->parent_category,
                'sub_category_id'=>$request->subcategory,
                'vendor_id'=>auth()->id(),
                'shop_name'=>auth()->user()->shop_name,
                'sku'=>$request->sku,
                'tag'=>$request->product_tag,
                'short_description'=>$request->short_description,
                'description'=>$request->description,
                'meta_title'=>$request->meta_title,
                'meta_description'=>$request->meta_description,
                'meta_tag'=>$request->meta_tag,
            ]);

            if($request->hasFile('thumbnail')){
                $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('thumbnail')->getClientOriginalExtension();
                $img = Image::make($request->file('thumbnail'))->resize(566, 570);
                $img->save(base_path('public/uploads/product_photo/'.$photo), 70);
                Product::find($product->id)->update([
                    'thumbnail'=>$photo,
                ]);
            }

            $gelleries = $request->file('gellery');
            if($gelleries){
                foreach($gelleries as $gellery){
                    $gellery_photo= Carbon::now()->format('Y').rand(1,9999).".".$gellery->getClientOriginalExtension();
                    $gellery_img = Image::make($gellery)->resize(566, 570);
                    $gellery_img->save(base_path('public/uploads/product_gellery_photo/'.$gellery_photo), 70);
                    ProductGallery::insert([
                        'product_id' => $product->id,
                        'product_gallery' => $gellery_photo,
                        'created_at' => now()
                    ]);
                }
            }
        }else{
            $product= Product::create([
                'product_title'=>$request->product_title,
                'product_price'=>$request->product_price,
                'discount_price'=>$request->discount_price,
                'parent_category_slug'=>$request->parent_category,
                'sub_category_id'=>$request->subcategory,
                'vendor_id'=>auth()->user()->vendor_id,
                'shop_name'=>staff(auth()->user()->vendor_id)->shop_name,
                'sku'=>$request->sku,
                'tag'=>$request->product_tag,
                'short_description'=>$request->short_description,
                'description'=>$request->description,
                'meta_title'=>$request->meta_title,
                'meta_description'=>$request->meta_description,
                'meta_tag'=>$request->meta_tag,
            ]);

            if($request->hasFile('thumbnail')){
                $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('thumbnail')->getClientOriginalExtension();
                $img = Image::make($request->file('thumbnail'))->resize(566, 570);
                $img->save(base_path('public/uploads/product_photo/'.$photo), 70);
                Product::find($product->id)->update([
                    'thumbnail'=>$photo,
                ]);
            }

            $gelleries = $request->file('gellery');
            if($gelleries){
                foreach($gelleries as $gellery){
                    $gellery_photo= Carbon::now()->format('Y').rand(1,9999).".".$gellery->getClientOriginalExtension();
                    $gellery_img = Image::make($gellery)->resize(566, 570);
                    $gellery_img->save(base_path('public/uploads/product_gellery_photo/'.$gellery_photo), 70);
                    ProductGallery::insert([
                        'product_id' => $product->id,
                        'product_gallery' => $gellery_photo,
                        'created_at' => now()
                    ]);
                }
            }
        }
        $admins=User::where('role','admin')->get();
        foreach($admins as $admin){
            $admin->notify(new ProductNotification($product));
        }

        //mail notification
        $admins= User::where('role','admin')->latest()->get();
        foreach($admins as $admin){
            $email=$admin->email;
            $roleID=DB::table('model_has_roles')->where('model_id',$admin->id)->first()->role_id;
            // $roleID=DB::table('roles')->where('id',$roleID)->first()->name;
            $permissionsId=DB::table('role_has_permissions')->where('role_id',$roleID)->get();
            foreach ($permissionsId as $permission) {
                if(DB::table('permissions')->where('id',$permission->permission_id)->first()->name == 'admin-Product Management'){
                //    if($email != 'admin@azshopnow.com'){
                    Mail::to($email)->send(new AdminProductNotification($request->product_title));
                //    }
                }
            }
        }

        return redirect("inventory/$product->id")->with('product_add_success','Product added Successfully added.');

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
        $products=Product::findOrFail($id);
        $productGalleries= ProductGallery::where('product_id',$id)->get();
        return view('vendor.product.list.edit',compact('products','productGalleries'));
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
        // return $galleryProductId=ProductGallery::where('product_id',$id)->exists();
        if(auth()->user()->role == 'vendor'){
            Product::find($id)->update([
                'product_title'=>$request->product_title,
                'product_price'=>$request->product_price,
                'discount_price'=>$request->discount_price,
                'parent_category_slug'=>$request->parent_category,
                'sub_category_id'=>$request->subcategory,
                'vendor_id'=>auth()->id(),
                'shop_name'=>auth()->user()->shop_name,
                'sku'=>$request->sku,
                'tag'=>$request->product_tag,
                'short_description'=>$request->short_description,
                'description'=>$request->description,
                'vendorProductStatus'=>$request->vendorProductStatus,
                'meta_title'=>$request->meta_title,
                'meta_description'=>$request->meta_description,
                'meta_tag'=>$request->meta_tag,
            ]);
            if($request->hasFile('thumbnail')){
               $thumbnailPhoto=Product::find($id)->thumbnail;
                unlink(base_path('public/uploads/product_photo/'.$thumbnailPhoto));
                $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('thumbnail')->getClientOriginalExtension();
                $img = Image::make($request->file('thumbnail'))->resize(566, 570);
                $img->save(base_path('public/uploads/product_photo/'.$photo), 70);
                Product::find($id)->update([
                    'thumbnail'=>$photo,
                ]);
            }
            $gelleries = $request->file('gellery');
            if($gelleries){
                foreach($gelleries as $gellery){
                    $gellery_photo= Carbon::now()->format('Y').rand(1,9999).".".$gellery->getClientOriginalExtension();
                    $gellery_img = Image::make($gellery)->resize(566, 570);
                    $gellery_img->save(base_path('public/uploads/product_gellery_photo/'.$gellery_photo), 70);
                    ProductGallery::insert([
                        'product_id' => $id,
                        'product_gallery' => $gellery_photo,
                        'created_at' => now()
                    ]);
                }
            }
        }else{
            Product::find($id)->update([
                'product_title'=>$request->product_title,
                'product_price'=>$request->product_price,
                'discount_price'=>$request->discount_price,
                'parent_category_slug'=>$request->parent_category,
                'sub_category_id'=>$request->subcategory,
                'vendor_id'=>auth()->user()->vendor_id,
                'shop_name'=>staff(auth()->user()->vendor_id)->shop_name,
                'sku'=>$request->sku,
                'tag'=>$request->product_tag,
                'short_description'=>$request->short_description,
                'description'=>$request->description,
                'vendorProductStatus'=>$request->vendorProductStatus,
                'meta_title'=>$request->meta_title,
                'meta_description'=>$request->meta_description,
                'meta_tag'=>$request->meta_tag,
            ]);
            if($request->hasFile('thumbnail')){
               $thumbnailPhoto=Product::find($id)->thumbnail;
                unlink(base_path('public/uploads/product_photo/'.$thumbnailPhoto));
                $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('thumbnail')->getClientOriginalExtension();
                $img = Image::make($request->file('thumbnail'))->resize(566, 570);
                $img->save(base_path('public/uploads/product_photo/'.$photo), 70);
                Product::find($id)->update([
                    'thumbnail'=>$photo,
                ]);
            }
            $gelleries = $request->file('gellery');
            if($gelleries){
                foreach($gelleries as $gellery){
                    $gellery_photo= Carbon::now()->format('Y').rand(1,9999).".".$gellery->getClientOriginalExtension();
                    $gellery_img = Image::make($gellery)->resize(566, 570);
                    $gellery_img->save(base_path('public/uploads/product_gellery_photo/'.$gellery_photo), 70);
                    ProductGallery::insert([
                        'product_id' => $id,
                        'product_gallery' => $gellery_photo,
                        'created_at' => now()
                    ]);
                }
            }
        }

        return redirect(route('product.index'))->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back()->with('success','Product deleted successfully.');
    }
    public function galleryImgDelete ($id)
    {
        $galleryImage=ProductGallery::findOrFail($id)->product_gallery;
        unlink(base_path('public/uploads/product_gellery_photo/'.$galleryImage));
        ProductGallery::findOrFail($id)->delete();
        return back()->with('success','Gallery image deleted successfully.');
    }



}
