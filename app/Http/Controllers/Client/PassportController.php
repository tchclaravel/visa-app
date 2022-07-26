<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PassportController extends Controller
{
    
    // Step to choice way to fill traveler form
    public function choiceStep(){
        return view('client.steps.choice_step');
    }


    // Passport form
    public function passportForm(){
        $passports = session()->get('visa_request.travelers_number');

        // dd($passports);

        return view('client.steps.passport_form' , compact('passports'));
    }


    // Validation thow passport field
    public function passportValidation(){
        $passports = session()->get('visa_request.travelers_number');

        for($i=1; $i<= $passports; $i++){
           echo "'passport".$i."'" . "=>" . "'required'" . ",";
        }

    }



    public function sendPassport(Request $request){

        // $this->passportValidation();

        Validator::make($request->all() , [
            // 'required',
            $this->passportValidation() => 'required'
        ])->validate();

        
    }
    







}
