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

        if($request->session()->get('step_number') != 1){
            return redirect()->route('client.step_one');
        }

        // Check if start storing travelers data
        if($request->session()->has('travelers')){
            $tr_num = sizeof($request->session()->get('travelers')) + 1;
        }else{
            $tr_num = 1;
        }

        // create session to store current traveler number
        $request->session()->put('current_traveler' , $tr_num);
        
        return view('client.steps.traveler_form');
    }


}
