<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\Visa;
use Illuminate\Support\Arr;
use Livewire\Component;

class VisaRequestForm extends Component
{

    // All fields
    // public $user_id;    
    public $country_id;          
    public $city_id;         
    public $visa_type;         
    public $expected_date;         
    public $travelers_number;        
    public $interview_place;       
    public $request_status;        
    public $appointment;       
    public $payment_method;            
    public $request_number;
    public $phone;
    
    public $cities = [];
    public $visas = [];


    public $rules = [
        'country_id' => 'required',
        'city_id' => 'required',
        'visa_type' => 'required',
        'travelers_number' => 'required',
        'expected_date' => 'required',
        'interview_place' => 'required',
    ];

    protected $messages = [
        'country_id.required' => 'يرجى تعبئة حقل السفارة',
        'city_id.required' => 'يرجى تعبئة حقل الوجهة',
        'visa_type.required' => 'يرجى تعبئة حقل نوع التأشيرة ',
        'travelers_number.required' => 'يرجى تعبئة حقل عدد المسافرين',
        'expected_date.required' => 'يرجى تعبئة حقل تاريخ السفر',
        'interview_place.required' => 'يرجى تعبئة حقل مكان المقابلة',
        'phone.required' => 'يرجى تعبئة حقل رقم الجوال',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        if(!empty($this->country_id)){
            $this->cities = City::where('country_id' , $this->country_id)->get();
        }

        if(!empty($this->country_id)){
            $this->visas = Visa::where('country_id' , $this->country_id)->get();
        }

        return view('livewire.visa-request-form')->withCountries(Country::orderBy('country_name')->get());
    }


    public function storeRequest(){

        $visa_request = $this->validate();

        $visa_request['country_id']       = $this->country_id ;
        $visa_request['city_id']          = $this->city_id ;
        $visa_request['visa_type']        = $this->visa_type ;
        $visa_request['expected_date']    = $this->expected_date ;
        $visa_request['travelers_number'] = $this->travelers_number ;
        $visa_request['interview_place']  = $this->interview_place ;
        $visa_request['phone']            = $this->phone;


        /* 
            Check if number of travelers == 1 
            [case:true => not need to multi step traveler form]
            [case:flase => start to excute mutli step traveler form] 
        */

        if($visa_request['travelers_number'] == 1){
            session()->put('visa_request' , Arr::except($visa_request , 'travelers_number'));
            // update step number in session
            session()->put('step_number' , 1);
            return redirect()->route('client.step_two');
        }

        session()->put('visa_request' , $visa_request);
        // update step number in session
        session()->put('step_number' , 1);
        return redirect()->route('client.step_two');

    }


    // Store request data
    // public function storeRequest(VisaRequest $request){

    //     dd($request->all());
    //     /* 
    //         Check if number of travelers == 1 
    //         [case:true => not need to multi step traveler form]
    //         [case:flase => start to excute mutli step traveler form] 
    //     */
    //     if($request->travelers_number == 1){
    //         $request->session()->put('visa_request' , $request->except('travelers_number'));
    //         // update step number in session
    //         $request->session()->put('step_number' , 1);
    //         return redirect()->route('client.step_two');
    //     }

    //     $request->session()->put('visa_request' , $request->all());
    //     // update step number in session
    //     $request->session()->put('step_number' , 1);
    //     return redirect()->route('client.step_two');

    // }




}
