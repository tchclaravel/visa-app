<?php

namespace App\Custom;

use App\Models\User;
use App\Models\VisaRequest;

class MyHelpers{

    public static function uniqueAccountNumber(){
        do{
            $code = random_int(100000 , 999999);
        }while(User::where('account_id' , $code)->first());

        return $code;
    } 


    public static function uniqueRequestNumber(){
        do{
            $code = random_int(10000000 , 99999999);
        }while(VisaRequest::where('request_number' , $code)->first());

        return $code;
    } 

}