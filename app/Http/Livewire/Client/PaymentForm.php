<?php

namespace App\Http\Livewire\Client;
use App\Custom\MyHelpers;
use App\Models\Traveler;
use App\Models\VisaRequest;
use App\Models\User;

use Livewire\Component;

class PaymentForm extends Component
{
    public $payment_method;
    public $appointment;

    public $rules = [
        'appointment' => 'required',
        'payment_method' => 'required',
    ];

    public $messages = [
        'appointment.required' => 'يرجى تعبئة حقل الموعد',
        'payment_method.required' => 'يرجى تعبئة حقل وسيلة الدفع',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.client.payment-form');
    }


    public function storePayment(){
        $this->validate();

        $appointment['appointment'] = $this->appointment;
        $appointment['payment_method'] = $this->payment_method;

        // Store appointment data in session
        session()->put('appointment' , $appointment);
        session()->put('step_number' , 3);

        if($this->payment_method == 'transfer'){
            return redirect()->route('client.bank');
        }elseif($this->payment_method == 'e-payment'){
            return redirect()->route('client.e-payment');
        }else{
            session()->put('paid' , true);
            // Save Data in database
            MyHelpers::createData();
            return redirect()->route('client.request_sent');
        }

    }

}
