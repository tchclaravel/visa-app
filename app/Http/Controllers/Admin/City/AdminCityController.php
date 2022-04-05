<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\EnglishOnly;

class AdminCityController extends Controller
{
    
    public function index(){

        // Fetch For Select Options
        $countries = Country::all();
        $countries->pluck('country_name_ar' , 'id');

        $cities = City::latest()->paginate(10);
        return view('admin.city.index' , compact('countries' , 'cities'));
    }


    public function store(Request $request){

        Validator::make($request->all() , [
            'country_id'   => 'required',
            'city_name'    => ['required' , new EnglishOnly ],
            'city_name_ar' => 'required',
        ],[
            'country_id.required' => 'يرجى تعبئة الحقل الأول',
            'city_name.required' => 'يرجى تعبئة الحقل الثاني',
            'city_name_ar.required' => 'يرجى تعبئة الحقل الثالث',

        ])->validate();

        $city = City::where('country_id' , $request->country_id)->where('city_name' , $request->city_name)->first();

        if($city){
            $notification = ['alert-type' => 'warning' , 'message' => ' هذه المدينة موجودة بالفعل '];
            return redirect()->back()->with($notification);
        }

        City::create($request->all());

        $notification = ['alert-type' => 'success' , 'message' => 'تمت إضافة الوجهة بنجاح'];


        return redirect()->back()->with($notification);

    }


    
    public function search(Request $request){

        $results = City::where('city_name_ar' , 'LIKE' , '%'.$request->input.'%')
                ->orWhere('city_name' , 'LIKE' , '%'.$request->input.'%')->get();

        return view('admin.city.search' , compact('results' , 'request'));
    }


    public function delete($id)
    {
        $country = City::findOrFail($id);
        $country->delete();

        $notification = ['alert-type' => 'success' , 'message' => 'تم حذف الوجهة بنجاح'];

        return redirect()->back()->with($notification);


    }


}
