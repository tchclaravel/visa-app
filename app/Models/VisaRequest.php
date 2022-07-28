<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaRequest extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'country_id',
        'city_id',
        'visa_type',
        'expected_date',
        'travelers_number',
        'interview_place',
        'request_status',
        'appointment',
        'payment_method',
        'request_number',
        'is_complete',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function visa(){
        return $this->belongsTo(Visa::class , 'visa_type');
    }



    

}
