<?php
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

 function category()
 {
    return Category::where('status','published')->get();
 }
 function categoryProductCount($categorySlug)
 {
    return Product::where('parent_category_slug',$categorySlug)->where('status', 'published')->count();
 }
 function shopName($user_id)
 {
    return User::find($user_id);
 }


?>
