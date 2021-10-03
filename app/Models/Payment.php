<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payments';
    protected $fillable=['customer_id','payment_date','amount','created_at','updated_at'];

    function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

}


