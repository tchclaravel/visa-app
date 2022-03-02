<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // LOGIN PAGE
    public function login(){
        return view('client.user.login');
    }

    // PROFILE PAGE
    public function profile(){
        return view('client.user.profile');
    }
    



}
