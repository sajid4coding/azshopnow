<?php

namespace App\Models;

use Faker\Core\Color;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intervention\Image\Size;

class Order_Detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function relationwithproduct(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function relationwithsize(){
        return $this->hasOne(AttributeSize::class, 'id', 'size_id');
    }
    public function relationwithcolor(){
        return $this->hasOne(AttributeColor::class, 'id', 'color_id');
    }
}
