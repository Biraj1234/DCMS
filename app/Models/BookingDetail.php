<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $table='booking_details';
    protected $fillable=['booking_id','costume_id','quantity','price','total_price','size'];

    function booking(){
        $this->belongsTo(Booking::class,'booking_id');
    }

}
