<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    function relationshipwith_parent_category(){
        return $this->hasOne(Category::class, 'id', 'parent_category_id');
    }
}
