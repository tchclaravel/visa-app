<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{

    // BANK TRANSFER PAGE
    public function bank(){
        return view('client.steps.bank_transfer');
    }
    

}
