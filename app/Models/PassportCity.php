<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassportCity extends Model
{
    use HasFactory;

    protected $fillable = ['city_name_ar' , 'city_name_en'];
}
