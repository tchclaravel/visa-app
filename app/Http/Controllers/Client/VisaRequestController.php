<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisaRequest;
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


    public function storeAppointment(Request $request){

        Validator::make($request->all() , [
            'appointment' => 'required',
            'payment_method' => 'required',
        ],[
            'appointment.required' => 'يرجى تعبئة حقل الموعد',
            'payment_method.required' => 'يرجى تعبئة حقل وسيلة الدفع',
        ])->validate();

        $appointment['appointment'] = $request->appointment;
        $appointment['payment_method'] = $request->payment_method;

        // Store appointment data in session
        session()->put('appointment' , $appointment);
        session()->put('step_number' , 3);

        if($request->payment_method == 2){
            return redirect()->route('client.bank');
        }elseif($request->payment_method == 3){
            return redirect()->route('client.e-payment');
        }else{
            session()->put('paid' , true);
            return redirect()->route('client.request_sent');
        }


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
    public function showRequest(){
        return view('client.user.request_detail');
    }


}
