<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VisaRequestController extends Controller
{  

    // Step one => Request Form
    public function requestForm(){

        // Reset all sessions
        Session::forget('travelers');
        Session::forget('step_number');
        Session::forget('visa_request');
        Session::forget('current_traveler');

        return view('client.steps.request_form');
    }
    
    // Step three => Appointment Form
    public function appointmentForm(Request $request){

        if($request->session()->get('step_number') != 2){
            return redirect()->route('client.step_one');
        }

        echo "<pre>";
        print_r(session()->all());
        echo "</pre>";
        
        return view('client.steps.appointment_payment');
    }

   
    // Request sent page
    public function requestSent(){
        return view('client.steps.request_sent');
    }


    // Show request details
    public function showRequest(){
        return view('client.user.request_detail');
    }


}
