<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traveler extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'passport_number', 
        'passport_issuance', 
        'passport_expiry',
        'gender',
        'social_status', 
        'address'
    ];


    

}
