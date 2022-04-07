<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminAppointmentController extends Controller
{

    public function store(Request $request){

        Validator::make($request->all() , [
            'title' => 'required',
        ],[
            'title.required' => 'يرجى تعبئة حقل صيغة الموعد',

        ])->validate();

        Appointment::create($request->all());

        $notification = ['alert-type' => 'success' , 'message' => 'تمت إضافة صيغة الموعد بنجاح'];


        return redirect()->back()->with($notification);

    }


    public function delete($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        $notification = ['alert-type' => 'success' , 'message' => 'تم حذف صيغة الموعد بنجاح'];

        return redirect()->route('admin.settings')->with($notification);


    }

    

}
