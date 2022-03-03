<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelerController extends Controller
{

    // Step two => Traveler Form
    public function travelerForm(Request $request){

        print_r($request->session()->get('visa_request'));

        print_r($request->session()->get('step_number'));

        return view('client.steps.traveler_form');
    }



}
