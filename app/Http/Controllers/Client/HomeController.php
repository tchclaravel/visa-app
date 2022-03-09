<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    // HOME PAGE
    public function home(){

        // session('travelers')->unset();
        // session('step_number')->unset();
        // session('visa_request')->unset();
        
        return view('client.home');
    }
    
    
}
