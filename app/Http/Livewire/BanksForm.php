<?php

namespace App\Http\Livewire;

use App\Custom\MyHelpers;
use App\Models\Bank;
use App\Models\Traveler;
use App\Models\User;
use App\Models\VisaRequest;
use Livewire\Component;

class BanksForm extends Component
{

    public $bank;

    public $info;

    public $banks = [];

    protected $rules = [
        'bank' => 'required',
    ];
    
    public $messages = [
        'bank.required' => 'يرجى إختيار أحد البنوك التالية'
    ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function render()
    {     
        if(!empty($this->bank)){
            $this->info = Bank::where('id' , $this->bank)->first();
        }

        // Hide information place when not select option
        if($this->bank == null){
            $this->info = null;
        }

        return view('livewire.banks-form' , [$this->banks = Bank::all()]);
    }


    public function storeBank(){

        $this->validate();
        session()->put('paid' , true);
        // Get all data from session & save it in database
        $visa_request = session()->get('visa_request');
        $appointment = session()->get('appointment');

        // Create new account
        $user = new User();
        $user->account_id = MyHelpers::uniqueAccountNumber();
        $user->phone = $visa_request['phone'];
        $user->save();


        // Create visa request
        // From visa request session
        $request = new VisaRequest();
        $request->user_id = $user->id;
        $request->country_id = $visa_request['country_id'];
        $request->city_id = $visa_request['city_id'];
        $request->visa_type = $visa_request['visa_type'];
        $request->expected_date = $visa_request['expected_date'];
        $request->travelers_number = sizeof(session()->get('travelers'));
        $request->interview_place = $visa_request['interview_place'];
        // From Appointment session
        $request->appointment = $appointment['appointment'];
        $request->payment_method = $appointment['payment_method'];

        $request->request_number = MyHelpers::uniqueRequestNumber();
        $request->request_status = 0;
        $request->created_at = now();
        $request->save();

        // Create travelers
        $travelers = session()->get('travelers');

        foreach($travelers as $row){
            $traveler = new Traveler();
            $traveler->fname = $row['fname'];
            $traveler->lname = $row['lname'];
            $traveler->passport_number = $row['passport_number'];
            $traveler->passport_issuance = $row['passport_issuance'];
            $traveler->passport_expiry = $row['passport_expiry'];
            $traveler->gender = $row['gender'];
            $traveler->social_status = $row['social_status'];
            $traveler->address = $row['address'];
            $traveler->created_at = now();
            $traveler->save();
        }
        
        return redirect()->route('client.request_sent')->with('request_number', $request->request_number);
    }


}
