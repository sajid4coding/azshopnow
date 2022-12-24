<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public function relationwithproduct(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function relationwithinventory(){
        return $this->hasOne(Inventory::class, 'id', 'inventory_id');
    }
}
