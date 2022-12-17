<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];

    public function relationwithuser(){
        return $this->hasOne(User::class, 'id', 'vendor_id');
    }
    public function relationwithcategory(){
        return $this->hasOne(Category::class, 'id', 'parent_category_id');
    }

    public function relationwith_subcategory(){
        return $this->hasOne(SubCategory::class, 'id', 'sub_category_id');
    }

    public function relationwith_review(){
        return $this->hasOne(ProductReview::class, 'product_id', 'id');
    }
    public function relationwith_vendor_review(){
        return $this->hasOne(ProductReview::class, 'vendor_id', 'id');
    }
}
