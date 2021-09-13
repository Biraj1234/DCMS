<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table='sizes';
    protected $fillable=['name','short_form','status','created_by','updated_by'];

    function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}


