<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Passport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Image;

class PassportController extends Controller
{
    
    // Step to choice way to fill traveler form
    public function choiceStep(){
        
        if(session()->get('step_number') != 1){
            return redirect()->route('client.step_one');
        }

        return view('client.steps.choice_step');
    }


    // Passport form
    public function passportForm(){

        if(session()->get('step_number') != 1){
            return redirect()->route('client.step_one');
        }
        
        $passports = session()->get('visa_request.travelers_number');

        // dd($passports);
        return view('client.steps.passport_form' , compact('passports'));
    }


    public function sendPassport(Request $request){

        $passports_num = session()->get('visa_request.travelers_number');

        $validation = []; // validation rules
        $messages = []; // Custoum message

        for($i=1; $i<= $passports_num; $i++){
           $validation['passport'.$i] = 'required|mimes:jpg,png,jpeg';
           $messages['passport'.$i.'.required'] = 'يرجى إرفاق جواز المسافر ('.$i.')';
           $messages['passport'.$i.'.mimes'] = 'يجب ان تكون صيغة الملف PNG,JPG,JPEG';
        }

        Validator::make($request->all() , $validation , $messages)->validate();

        // Move file to path & store path in array
        for($i=1; $i<= $passports_num; $i++){
            if($file = $request->file('passport'.$i)){
                $file_name = uniqid() . '.' . $file->getClientOriginalExtension();           
                Image::make($file)->resize(650,450)->save('images/passports/' . $file_name);
                $path_name = 'images/passports/' . $file_name;
                $passports['photo'.$i] = $path_name;              
            }
        }

        // Store path in session
        session()->put('passports',$passports);
        session()->put('step_number',2);
        session()->put('travelers', null);
        return redirect()->route('client.step_three');


        
    }
    







}
