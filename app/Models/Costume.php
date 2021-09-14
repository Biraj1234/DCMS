<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costume extends Model
{
    protected $table='costumes';
    protected $fillable=['name','rental_amount','size_id','costume_type_id','photo','created_by','updated_by','status','gender','feature_costume','slider_costume','top_costume'];

    function size()
    {
        return $this->belongsTo(Size::class);
    }

    function costumeType()
    {
        return $this->belongsTo(CostumeType::class);
    }

    function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by');
    }

}
