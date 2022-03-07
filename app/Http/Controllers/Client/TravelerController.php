<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelerRequest;
use Illuminate\Http\Request;

class TravelerController extends Controller
{


    public $tr_num = 1; // store current traveler number


    // Step two => Traveler Form
    public function travelerForm(Request $request){

        // Prevent access step tow directly
        if(url()->previous() != '\step-1'){
            return redirect()->route('client.home');
        }

        // Check if start storing travelers data
        if($request->session()->has('travelers')){
            $tr_num = sizeof($request->session()->get('travelers')) + 1;
        }else{
            $tr_num = 1;
        }

        // create session to store current traveler number
        $request->session()->put('current_traveler' , $tr_num);

        echo "<pre>";
        print_r(session()->all());
        echo "</pre>";

        return view('client.steps.traveler_form');
    }



    public function storeTraveler(TravelerRequest $request){

        // Store step number
        $request->session()->put('step_number' , 2);

        $request->session()->put('current_traveler' , 1);

        // Fetch number of tarvelers from previous session
        $travelers_number = $request->session()->get('visa_request.travelers_number');


        /* 
            Check if number of tarvelers > 1 
            [case:true => store travelers data in indexed session]
            [case:flase => just put data as normal array] 
        */
        if($travelers_number > 1){
            // push new traveler
            $request->session()->push('travelers' , $request->all());
            // decrement number of travelers
            $request->session()->decrement('visa_request.travelers_number');

            // dynamic way to get current traveler number to display in traveler form
            $tr_num = sizeof($request->session()->get('travelers')) + 1;
            $request->session()->now('current_traveler', $tr_num);

            return redirect()->back()->with('current_traveler');

        }else{
            $request->session()->put('travelers' , $request->all());
            return redirect()->route('client.step_three');
        }

    }



}
