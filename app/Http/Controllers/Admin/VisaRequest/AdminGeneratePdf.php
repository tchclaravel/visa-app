<?php

namespace App\Http\Controllers\Admin\VisaRequest;

use App\Http\Controllers\Controller;
use App\Models\Traveler;
use App\Models\VisaRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminGeneratePdf extends Controller
{
    
    public function insurance($request_number){

        $order = VisaRequest::where('request_number' , $request_number)->first();
        $traveler = Traveler::where('request_id' , $order->id)->first();
        $contract_id = rand(10000 , 99999) . rand(1000 , 9999);
        $membership_number = rand(1000 , 9999) . rand(1000 , 9999);
        $dob = rand(1970,1990);

        return view('admin.visa-request.pdf.insurance' , compact('order' , 'traveler' , 'contract_id' , 'membership_number' , 'dob'));
    }


    public function booking($request_number){
        $order = VisaRequest::where('request_number' , $request_number)->first();
        $traveler = Traveler::where('request_id' , $order->id)->first();

        $check_out = Carbon::parse($order->expected_date)->addWeeks(2);

        $nights = rand(7 , 21);

        // Price
        $eur = $nights * 250;
        $sar = $eur * 3.76;

        $price_eur = number_format($eur);
        $price_sar = number_format($sar);

        // Price After Tax
        $tax_eur = $eur + 120;
        $tax_sar = $sar + 997;
        $tax_final_sar = $tax_sar + 515;

        $total_eur = number_format($tax_eur);
        $total_sar = number_format($tax_sar);
        $final_sar =  number_format($tax_final_sar);

        return view('admin.visa-request.pdf.booking' , compact('order' , 'traveler' , 'nights' , 'check_out' , 'price_eur' , 'price_sar' , 'total_eur' , 'total_sar' , 'final_sar'));
    }


    public function ticket($request_number){
        $order = VisaRequest::where('request_number' , $request_number)->first();
        $traveler = Traveler::where('request_id' , $order->id)->first();

        $ticket_number = rand(100 , 999).' '.rand(10000 , 99999). rand(10000 , 99999);

        return view('admin.visa-request.pdf.ticket' , compact('order' , 'traveler' , 'ticket_number'));
    }



}
