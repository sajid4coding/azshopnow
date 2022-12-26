<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    function relationwith_orderinvoice(){
        return $this->hasOne(Order_Detail::class, 'invoice_id', 'id');
    }
    function relationwithuser(){
        return $this->hasOne(User::class, 'id', 'vendor_id');
    }
    function relationwithCustomerUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    // function relationwithuser(){
    //     return $this->hasMany(User::class, 'id');
    // }
}
