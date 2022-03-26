<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCityController extends Controller
{
    
    public function index(){
        return view('admin.city.index');
    }


}
