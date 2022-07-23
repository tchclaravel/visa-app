<?php

namespace App\Http\Controllers\Admin\VisaRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisaRequest;

class AdminVisaRequestController extends Controller
{
    
    public function index(){
        $orders = VisaRequest::latest()->paginate(10);;
        return view('admin.visa-request.index' , compact('orders'));
    }

}
