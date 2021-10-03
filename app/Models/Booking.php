<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table='booking';
    protected $fillable=['customer_id','order_code','booking_date','order_status','created_at','updated_at','costume_id','quantity','size','price','total_price'];



    function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    function costume(){
        return $this->belongsTo(Costume::class,'costume_id');
    }



}
