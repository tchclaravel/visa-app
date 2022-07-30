<?php

namespace App\Http\Controllers\Admin\VisaRequest;

use App\Http\Controllers\Controller;
use App\Models\Passport;
use App\Models\Traveler;
use Illuminate\Http\Request;
use App\Models\VisaRequest;
use Illuminate\Support\Facades\Session;

class AdminVisaRequestController extends Controller
{
    
    public function index(){
        $orders = VisaRequest::where('is_complete' , 1)->paginate(10);
        return view('admin.visa-request.index' , compact('orders'));
    }

    public function showDetail($id){
        $request = VisaRequest::findOrFail($id);
        $travelers = Traveler::where('request_id' , $id)->get();
        return view('admin.visa-request.show' , compact('request' , 'travelers'));
    }

    public function unComplete(){
        $orders = VisaRequest::where('is_complete' , 0)->paginate(10);
        $passports = Passport::all();
        return view('admin.visa-request.uncomplete' , compact('orders' , 'passports'));
    }

    public function unCompleteRequest($order_id){

        $order = VisaRequest::findOrFail($order_id);
        $passports = Passport::where('request_id' , $order_id)->get();

        if($order->is_complete == 1){
            $notification = ['alert-type' => 'success' , 'message' => 'تمت تعبئة بيانات الطلب بنجاح'];
            return redirect()->route('admin.requests')->with($notification);
        }

        session()->put('order_id' , $order_id);

        return view('admin.visa-request.uncomplete-request' , compact('order', 'passports'));
    }



    public function travelerForm($traveler_id){
        echo "<pre>";
        print_r(session()->all());
        echo "</pre>";
        // $request = VisaRequest::findOrFail($order_id);

        session()->put('traveler_id' , $traveler_id);

        return view('admin.visa-request.traveler-form');
    }

    

}
