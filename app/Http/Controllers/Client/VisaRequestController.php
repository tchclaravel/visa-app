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

        $request->session()->put('visa_request' , $request->all());
        $request->session()->put('step_number' , 1);

        return redirect()->route('client.step_two');

    }
    
    // Step three => Appointment Form
    public function appointmentForm(){
        return view('client.steps.appointment_payment');
    }
   
    // REQUEST  SENT PAGE
    public function requestSent(){
        return view('client.steps.request_sent');
    }

    // Show request details
    public function showRequest(){
        return view('client.user.request_detail');
    }


}
