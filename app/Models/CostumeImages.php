<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostumeImages extends Model
{
    protected $table='costume_images';
    protected $fillable=['name','costume_id'];
}
