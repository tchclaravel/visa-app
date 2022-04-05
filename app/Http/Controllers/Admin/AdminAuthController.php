<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    
    public function loginForm()
    {   
        return view('admin.login');
    }


    public function login(Request $request){

        Validator::make($request->all() , [
            'username'   => 'required',
            'password'    => 'required',
        ],[
            'username.required' => ' يرجى إدخال اسم المستخدم ',
            'password.required' => ' يرجى إدخال كلمة المرور ',

        ])->validate();

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::guard('admin')->attempt($credentials)){
            $notification = ['alert-type' => 'success' , 'message' => 'تم تسجيل الدخول بنجاح '];

            return redirect()->route('admin.index')->with($notification);
        }else{
            $notification = ['alert-type' => 'error' , 'message' => ' بيانات تسجيل الدخول غير صحيحة '];
            return redirect()->route('admin.login')->with($notification);
        }
        
    }


    public function logout()
    {
        Auth::guard('admin')->logout();

        $notification = ['alert-type' => 'success' , 'message' => ' تم تسجيل الخروج بنجاح '];

        return redirect()->route('admin.login')->with($notification);
    }


}
