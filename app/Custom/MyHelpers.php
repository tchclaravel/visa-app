<?php

namespace App\Custom;

use App\Models\Passport;
use App\Models\User;
use App\Models\VisaRequest;
use App\Models\Traveler;
use Illuminate\Support\Facades\Auth;

class MyHelpers{


    public static function uniqueAccountNumber(){
        do{
            $code = random_int(10000000 , 99999999);
        }while(User::where('account_id' , $code)->first());

        return $code;
    } 


    public static function uniqueRequestNumber(){
        do{
            $code = random_int(100000 , 999999);
        }while(VisaRequest::where('request_number' , $code)->first());

        return $code;
    } 


    public static function setTravelerNum(){

        $passports = session()->get('passports');
        $travelers = session()->get('travelers');

        if(is_null($travelers)){
            return sizeof($passports);
        }else{
            return sizeof($travelers);
        }

    }



    public static function createData(){
        
        // Get all data from session & save it in database
        $visa_request = session()->get('visa_request');
        $appointment = session()->get('appointment');

        // Create travelers
        $travelers = session()->get('travelers');


        $user = '';
        if(Auth::check()){
            $user = Auth::user();
        }else{
            // Create new account
            $user = new User();
            $user->account_id = MyHelpers::uniqueAccountNumber();
            $user->phone = $visa_request['phone'];
            $user->save();
        }

        Auth::login($user);


        // Create visa request
        // From visa request session
        $request = new VisaRequest();
        $request->user_id = $user->id;
        $request->country_id = $visa_request['country_id'];
        $request->city_id = $visa_request['city_id'];
        $request->visa_type = $visa_request['visa_type'];
        $request->expected_date = $visa_request['expected_date'];
        $request->travelers_number = MyHelpers::setTravelerNum();
        $request->total_price = $visa_request['total_price'];
        $request->interview_place = $visa_request['interview_place'];
        // From Appointment session
        $request->appointment = $appointment['appointment'];
        // $request->appointment = $appointment['appointment'];

        $request->payment_method = $appointment['payment_method'];

        $request_number = MyHelpers::uniqueRequestNumber();
        session()->put('request_number' , $request_number);
        $request->request_number = $request_number;
        $request->request_status = 'pending';
        $request->created_at = now();
        if(is_null($travelers)){
            $request->is_complete = 0;
        }
        $request->save();

        // Passport images paths
        $passports = session()->get('passports');

        // Create Passports
        // if(is_null($travelers)){

        //     for($i = 1; $i <= $visa_request['travelers_number']; $i++){
        //         $passport = new Passport();
        //         $passport->request_id = $request->id;
        //         $passport->photo = $passports['photo'.$i];
        //         $passport->status = 0;
        //         $passport->created_at = now();
        //         $passport->save();
        //     }

        // }

        // Send Passports Or Create Travalers Data depend on value of travelers session
        if(is_null($travelers)){
            for($i = 1; $i <= $visa_request['travelers_number']; $i++){

                // Create Traveler Passport
                $passport = new Passport();
                $passport->request_id = $request->id;
                $passport->photo = $passports['photo'.$i];
                $passport->status = 0;
                $passport->created_at = now();
                $passport->save();

                // Create Traveler Data
                $traveler = new Traveler();
                $traveler->request_id = $request->id;
                $traveler->passport_id = $passport->id;
                $traveler->fname = 'fname_traveler'.$i;
                $traveler->lname = 'lname_traveler'.$i;
                $traveler->passport_number = '012345678912345';
                $traveler->passport_issuance = now();
                $traveler->passport_expiry = now();
                $traveler->gender = '---';
                $traveler->social_status = '---';
                $traveler->address = '---';
                $traveler->created_at = now();
                $traveler->save();
            }
        }else{

            $i = 0;
            foreach($travelers as $row){

                // Create Traveler Passport
                // $passport = new Passport();
                // $passport->request_id = $request->id;
                // $passport->photo = $passports[$i++];
                // $passport->status = 1;
                // $passport->created_at = now();
                // $passport->save();
                // Create Traveler Data
                $traveler = new Traveler();
                $traveler->request_id = $request->id;
                $traveler->passport_id = null;
                $traveler->fname = strtoupper($row['fname']);
                $traveler->lname = strtoupper($row['lname']);
                $traveler->passport_number = $row['passport_number'];
                $traveler->passport_issuance = $row['passport_issuance'];
                $traveler->passport_expiry = $row['passport_expiry'];
                $traveler->gender = $row['gender'];
                $traveler->social_status = $row['social_status'];
                $traveler->address = $row['address'];
                $traveler->created_at = now();
                $traveler->save();
            }
        }
                
    }

}