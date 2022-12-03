<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $guarded = [];

    function relationwithsize(){
        return $this->hasOne(AttributeSize::class, 'id', 'size');
    }
    function relationwithcolor(){
        return $this->hasOne(AttributeColor::class, 'id', 'color');
    }
}
