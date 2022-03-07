<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisaRequest;
use Illuminate\Http\Request;

class VisaRequestController extends Controller
{  

    // Step one => Request Form
    public function requestForm(){
        return view('client.steps.request_form');
    }

    // Store request data
    public function storeRequest(VisaRequest $request){

        // Save step number in session
        $request->session()->put('step_number' , 1);

        /* 
           Check if number of travelers == 1 
           [case:true => not need to multi step traveler form]
           [case:flase => start to excute mutli step traveler form] 
        */
        if($request->travelers_number == 1){
            $request->session()->put('visa_request' , $request->except('travelers_number'));
            return redirect()->route('client.step_two');
        }

        $request->session()->put('visa_request' , $request->all());
        return redirect()->route('client.step_two');

    }
    
    // Step three => Appointment Form
    public function appointmentForm(){

        // Prevent access step three directly
        if(url()->previous() != '\step-2'){
            return redirect()->route('client.home');
        }
        
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
