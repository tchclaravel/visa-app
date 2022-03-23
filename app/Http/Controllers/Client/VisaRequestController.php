<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisaRequest;
use App\Models\Traveler;
use App\Models\VisaRequest as ModelsVisaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class VisaRequestController extends Controller
{  

    // Step one => Request Form
    public function requestForm(){

        // Reset all sessions
        Session::forget('travelers');
        Session::forget('step_number');
        Session::forget('visa_request');
        Session::forget('current_traveler');
        Session::forget('paid');
        Session::forget('appointment');
        Session::forget('request_number');

        return view('client.steps.request_form');
    }
    
    // Step three => Appointment Form
    public function appointmentForm(){

        if(session()->get('step_number') != 2){
            return redirect()->route('client.step_one');
        }

        echo "<pre>";
        print_r(session()->all());
        echo "</pre>";
        
        return view('client.steps.appointment_payment');
    }
   
    // Request sent page
    public function requestSent(){

        echo "<pre>";
        print_r(session()->all());
        echo "</pre>";

        if(session()->get('paid') == true){
            return view('client.steps.request_sent');
        }

        return redirect()->route('client.step_one');
    }


    // Show request details
    public function showRequest($id){
        $request = ModelsVisaRequest::findOrFail($id);
        // We Stop here [we need create foreign key in travelers refer to request ]
        // $travelers = Traveler::
        
        if(!$request){
            return redirect()->route('client.home');
        }

        return view('client.user.request_detail' , compact('request'));
    }


}
