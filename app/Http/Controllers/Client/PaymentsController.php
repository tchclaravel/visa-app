<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{

    // BANK TRANSFER PAGE
    public function bank(){

        echo "<pre>";
        print_r(session()->all());
        echo "</pre>";

        if(session()->get('step_number') != 3){
            return redirect()->route('client.step_one');
        }

        $banks = Bank::all();

        return view('client.steps.bank_transfer' , compact('banks'));
    }


    public function ePayment(){

        echo "<pre>";
        print_r(session()->all());
        echo "</pre>";

        if(session()->get('step_number') != 3){
            return redirect()->route('client.step_one');
        }
        return view('client.steps.e-payment');
    }
    

}
