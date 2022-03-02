<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelerController extends Controller
{

    // Step two => Traveler Form
    public function travelerForm(){
        return view('client.steps.traveler_form');
    }



}
