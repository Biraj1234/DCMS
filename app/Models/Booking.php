<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table='booking';
    protected $fillable=['customer_id','order_code','booking_date','price','total_price','order_status'];

    function bookingDetail(){
        $this->belongsTo(Booking::class);
}
}
