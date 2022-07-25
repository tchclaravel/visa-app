<?php

namespace App\Http\Controllers\Admin\VisaRequest;

use App\Http\Controllers\Controller;
use App\Models\Traveler;
use Illuminate\Http\Request;
use App\Models\VisaRequest;

class AdminVisaRequestController extends Controller
{
    
    public function index(){
        $orders = VisaRequest::latest()->paginate(10);
        return view('admin.visa-request.index' , compact('orders'));
    }

    public function showDetail($id){
        $request = VisaRequest::findOrFail($id);
        $travelers = Traveler::where('request_id' , $id)->get();
        return view('admin.visa-request.show' , compact('request' , 'travelers'));

    }

}
