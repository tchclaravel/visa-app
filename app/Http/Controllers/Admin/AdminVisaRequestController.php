<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminVisaRequestController extends Controller
{
    
    public function index(){
        return view('admin.visa-request.index');
    }

}
