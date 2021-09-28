<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $table='booking_details';
    protected $fillable=['costume_id','quantity','price','total_price','size'];

    function costume(){
        return $this->belongsTo(Costume::class,'costume_id');
    }
}
