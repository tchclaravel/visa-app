<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\MessageMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function sendMessage(Request $request){
        
        Validator::make($request->all() , [
            'name'   => 'required',
            'email'  => 'required',
            'phone'  => 'required|numeric',
            'message'  => 'required',
        ],[
            'name.required' => 'يرجى تعبئة حقل الأسم',
            'email.required' => 'يرجى تعبئة حقل الإيميل',
            'phone.required' => 'يرجى تعبئة حقل رقم الجوال',
            'phone.numeric' => 'يرجى تعبئة حقل رقم الجوال بالأرقام فقط',
            'message.required' => 'يرجى تعبئة حقل الموضوع',

        ])->validate();

        $last_number = 1;

        if(Contact::all()->count() > 0){
            // Counter to serialize message number
            $last_message = DB::table('contacts')->latest()->first();
            $last_number = $last_message->number+1;

        }


        Contact::create([
            'number' => $last_number,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        //  Send mail to admin
        Mail::send('client.email.contact', array(
            // 'subject' => $subject,
            'number' => $last_number,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->message,
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('visaapp@admin.com', 'Admin')->subject('إستفسار رقم');
        });

        return redirect()->route('client.home')->with('success' , 'تم إرسال الرسالة بنجاح');

    }


}
