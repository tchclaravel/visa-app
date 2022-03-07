<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    // HOME PAGE
    public function home(){

        Session::forget('travelers');
        Session::forget('step_number');
        Session::forget('visa_request');
        Session::forget('current_traveler');

        // session('travelers')->unset();
        // session('step_number')->unset();
        // session('visa_request')->unset();
        
        return view('client.home');
    }
    
    
}
