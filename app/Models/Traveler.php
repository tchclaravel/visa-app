<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traveler extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'passport_id',
        'fname',
        'lname',
        'passport_number', 
        'passport_issuance', 
        'passport_expiry',
        'gender',
        'social_status', 
        'address',
    ];


    public function request(){
        return $this->belongsTo(VisaRequest::class , 'request_id');
    }

    public function passport(){
        return $this->belongsTo(Passport::class , 'passport_id');
    }


    

}
