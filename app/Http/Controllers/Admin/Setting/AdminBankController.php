<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminBankController extends Controller
{

    public function store(Request $request){

        Validator::make($request->all() , [
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required|numeric',
            'iban' => 'required',
        ],[
            'bank_name.required' => 'يرجى تعبئة حقل اسم البنك',
            'account_name.required' => 'يرجى تعبئة حقل اسم الحساب',
            'account_number.required' => 'يرجى تعبئة حقل رقم الحساب',
            'account_number.numeric' => 'حقل رقم الحساب يتكون من ارقام فقط',
            'iban.required' => 'يرجى تعبئة حقل الآيبان',

        ])->validate();

        Bank::create($request->all());

        $notification = ['alert-type' => 'success' , 'message' => 'تمت إضافة معلومات البنك بنجاح'];


        return redirect()->back()->with($notification);

    }


    public function delete($id)
    {
        $bank = Bank::findOrFail($id);
        $bank->delete();

        $notification = ['alert-type' => 'success' , 'message' => 'تم حذف معلومات البنك بنجاح'];

        return redirect()->back()->with($notification);


    }



}
