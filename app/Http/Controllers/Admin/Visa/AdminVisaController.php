<?php

namespace App\Http\Controllers\Admin\Visa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Visa;
use Illuminate\Support\Facades\Validator;
use App\Rules\EnglishOnly;

class AdminVisaController extends Controller
{
    
    public function index(){

        $countries = Country::all();
        $countries->pluck('country_name_ar' , 'id');

        $visas = Visa::all();

        return view('admin.visa.index' , compact('countries' , 'visas'));
    }


    public function store(Request $request){

        Validator::make($request->all() , [
            'country_id'   => 'required',
            'visa_type'    => 'required',
            'visa_price' => 'required',
        ],[
            'country_id.required' => 'يرجى تحديد السفارة',
            'visa_type.required' => 'يرجى تحديد نوع التأشيرة',
            'visa_price.required' => 'يرجى إدخال سعر التأشيرة',

        ])->validate();

        // Check if this visa already exist
        $visa = Visa::where('country_id' , $request->country_id)->where('visa_type' , $request->visa_type)->first();

        if($visa){
            $notification = ['alert-type' => 'warning' , 'message' => ' هذه التأشيرة موجوده بالفعل '];

            return redirect()->back()->with($notification);
        }

        Visa::create($request->all());

        $notification = ['alert-type' => 'success' , 'message' => 'تمت إضافة التأشيرة بنجاح'];


        return redirect()->back()->with($notification);

    }


    public function delete($id)
    {
        $visa = Visa::findOrFail($id);
        $visa->delete();

        $notification = ['alert-type' => 'success' , 'message' => 'تم حذف التأشيرة بنجاح'];

        return redirect()->back()->with($notification);


    }


}
