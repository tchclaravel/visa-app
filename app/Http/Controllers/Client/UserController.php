<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VisaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    // LOGIN PAGE
    public function loginForm(){
        return view('client.user.login');
    }


    public function login(Request $request){

        // dd($request->account_id);

        $validator = Validator::make($request->all(), [
            'account_id' => 'required',
        ],[
            'account_id.required' => 'يرجى تعبئة حقل رقم الحساب'
        ])->validated();

        $account = User::where('account_id' , $request->account_id)->first();

        if($account){
            Auth::login($account);
            return redirect()->route('user.profile');       
        }

        return redirect()->route('user.login')->with('error' , 'رقم الحساب الذي ادخلته غير موجود');       

    }

    // PROFILE PAGE
    public function profile(){
        $requests = VisaRequest::where('user_id' , Auth::user()->id)->get();
        return view('client.user.profile' , compact('requests'));
    }


    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('user.login');
    }
    



}
