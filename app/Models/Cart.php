<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded= [];

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
