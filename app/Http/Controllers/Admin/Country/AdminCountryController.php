<?php

namespace App\Http\Controllers\Admin\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Rules\EnglishOnly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCountryController extends Controller
{
    
    public function index(){
        $countries = Country::all();
        return view('admin.country.index', compact('countries'));
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


    public function search(Request $request){

        $results = Country::where('country_name_ar' , 'LIKE' , '%'.$request->input.'%')
                ->orWhere('country_name' , 'LIKE' , '%'.$request->input.'%')->get();

        return view('admin.country.search' , compact('results' , 'request'));
    }



    public function delete($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        $notification = ['alert-type' => 'success' , 'message' => 'تم حذف السفارة بنجاح'];

        return redirect()->back()->with($notification);

    }


}
