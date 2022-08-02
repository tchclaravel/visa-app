<?php

namespace App\Http\Controllers\Admin\VisaRequest;

use App\Http\Controllers\Controller;
use App\Models\Traveler;
use App\Models\VisaRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminGeneratePdf extends Controller
{
    
    public function insurance($request_number , $traveler_id){
        $order = VisaRequest::where('request_number' , $request_number)->first();
        $traveler = Traveler::where('id' , $traveler_id)->first();
        $contract_id = rand(10000 , 99999) . rand(1000 , 9999);
        $membership_number = rand(1000 , 9999) . rand(1000 , 9999);
        $dob = rand(1970,1990);

        $ex_date = Carbon::parse($order->expected_date)->addMonth();

        return view('admin.visa-request.pdf.insurance' , compact('order' , 'traveler' , 'contract_id' , 'membership_number' , 'dob' , 'ex_date'));
    }


    public function booking($request_number , $traveler_id){
        $order = VisaRequest::where('request_number' , $request_number)->first();
        $traveler = Traveler::where('id' , $traveler_id)->first();
        $seconde_traveler = Traveler::where('request_id' , $order->id)->where('id' , '!=' , $traveler->id)->first();

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

        return view('admin.visa-request.pdf.booking' , compact('order' , 'traveler' , 'nights' , 'check_out' , 'price_eur' , 'price_sar' , 'total_eur' , 'total_sar' , 'final_sar' , 'seconde_traveler'));
    }




    public function ticket($request_number , $traveler_id){
        $order = VisaRequest::where('request_number' , $request_number)->first();
        $traveler = Traveler::where('id' , $traveler_id)->first();

        $ticket_number = rand(100 , 999).' '.rand(10000 , 99999). rand(10000 , 99999);

        $attendance_time = rand(00 , 23);

        // Calculate Departure time
        switch ($attendance_time) {
            case 21:
                $departure_time = 00;
                break;
            case 22:
                $departure_time = 01;
                break;
            case 23:
                $departure_time = 02;
                break;

            default:
                $departure_time = $attendance_time + 3;
                break;
        }

        // Calculate Arrival time 
        switch ($departure_time) {
            case 22:
                $arrival_time = 00;
                break;
            case 23:
                $arrival_time = 01;
                break;

            case 24:
                $arrival_time = 02;
                break;

            default:
                $arrival_time = $departure_time + 2;
                break;
        }

        // Add 0 left time to become awesome
        if($attendance_time < 10){
            $attendance_time = '0'.$attendance_time;
        }

        if($departure_time < 10){
            $departure_time = '0'.$departure_time;
        }

        if($arrival_time < 10){
            $arrival_time = '0'.$arrival_time;
        }


        // leg 2 
        $leg2 = Carbon::parse($order->expected_date)->addDays(2);
        $leg3 = Carbon::parse($order->expected_date)->addWeeks(2);



        return view('admin.visa-request.pdf.ticket' , compact(
            'order' ,
            'traveler' ,
            'ticket_number' ,
            'attendance_time' ,
            'departure_time' ,
            'arrival_time' ,
            'leg2',
            'leg3'
        ));


    }



}
