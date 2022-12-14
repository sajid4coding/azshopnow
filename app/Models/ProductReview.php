<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    public function relationwithuser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
