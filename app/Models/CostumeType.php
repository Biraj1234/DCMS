<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostumeType extends Model
{
    protected $table='costume_types';
    protected $fillable=['name','status','created_by','updated_by'];

    function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}


