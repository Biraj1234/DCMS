<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table='booking';
    protected $fillable=['customer_id','order_code','booking_date','price','total_price','order_status','booking_details_id'];

    function bookingDetail(){
        return $this->belongsTo(BookingDetail::class,'booking_details_id');
    }

    function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }


}
