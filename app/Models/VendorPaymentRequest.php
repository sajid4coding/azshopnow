<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorPaymentRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function relationwithuser(){
        return $this->hasOne(User::class, 'id', 'vendor_id');
    }

    public function relationwithinvoice(){
        return $this->hasOne(Invoice::class, 'id', 'invoice_id');
    }
}
