<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReport extends Model
{
    use HasFactory;


    public function relationwithproduct(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
