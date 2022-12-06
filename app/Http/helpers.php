<?php

use App\Models\Cart;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\User;

 function cart()
 {
    return Cart::where('user_id',auth()->id())->count();
 }
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

 function cart_total($product_id, $quantity)
 {
    $price = Product::find($product_id)->discount_price;
    if($price){
        $price = Product::find($product_id)->discount_price;
    }else{
        $price = Product::find($product_id)->product_price;
    }

    return $price*$quantity;
 }

function get_inventory($product_id, $size_id, $color_id){
    if($size_id || $color_id) {
        return Inventory::where([
            'product_id' => $product_id,
            'size' => $size_id,
            'color' => $color_id
        ])->first()->quantity;
    }elseif($size_id){
        return Inventory::where([
            'product_id' => $product_id,
            'size' => $size_id,
            'color' => NULL
        ])->first()->quantity;
    }elseif($color_id){
        return Inventory::where([
            'product_id' => $product_id,
            'size' => NULL,
            'color' => $color_id
        ])->first()->quantity;
    }else{
        return Inventory::where([
            'product_id' => $product_id,
            'size' => NULL,
            'color' => NULL
        ])->first()->quantity;
    }
};
