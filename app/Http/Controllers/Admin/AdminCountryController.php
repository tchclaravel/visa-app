<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Rules\EnglishOnly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCountryController extends Controller
{
    
    public function index(){
        return view('admin.country.index');
    }

    public function store(Request $request){

        Validator::make($request->all() , [
            'country_name' => ['required' , 'unique:countries' , new EnglishOnly ],
            'country_name_ar' => ['required'],
        ],[
            'country_name.required' => 'يرجى تعبئة الحقل الأول',
            'country_name.unique' => 'تمت إضافة هذه السفارة من قبل',
            'country_name_ar.required' => 'يرجى تعبئة الحقل الثاني',

        ])->validate();

        Country::create($request->all());

        $notification = ['alert-type' => 'success' , 'message' => 'تمت إضافة السفارة بنجاح'];


        return redirect()->back()->with($notification);

    }


}
