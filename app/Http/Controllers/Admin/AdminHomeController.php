<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Models\Visa;
use App\Models\VisaRequest;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    
    public function index(){
        $orders = VisaRequest::all()->count();
        $countries = Country::all()->count();
        $cities = City::all()->count();
        $visas = Visa::all()->count();
        $users = User::all()->count();

        return view('admin.home' , compact('orders' , 'countries' , 'cities' , 'visas' , 'users'));
    }

}
