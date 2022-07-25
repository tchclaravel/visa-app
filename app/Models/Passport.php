<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    use HasFactory;

    protected $fillable = ['request_id' , 'photo'];

    public function request(){
        return $this->belongsTo(VisaRequest::class , 'request_id');
    }


}
