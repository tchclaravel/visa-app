<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'visa_type',
        'visa_price'
    ];


    public function country(){
        return $this->belongsTo(Country::class);
    }


}
