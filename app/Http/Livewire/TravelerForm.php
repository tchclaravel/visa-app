<?php

namespace App\Http\Livewire;

use App\Http\Requests\TravelerRequest;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class TravelerForm extends Component
{

    public $fname;
    public $lname;
    public $passport_number;
    public $passport_issuance;
    public $passport_expiry;
    public $social_status;
    public $gender;
    public $address;


    protected $rules = [
        'fname' => 'required|min:3',
        'lname' => 'required',
        'passport_number' => 'required', 
        'passport_issuance' => 'required', 
        'passport_expiry' => 'required',
        'gender' => 'required',
        'social_status' => 'required', 
        'address' => 'required'
    ];

    protected $messages = [
        'fname.required' => 'يرجى تعبئة حقل الأسم الأول',
        'lname.required' => 'يرجى تعبئة حقل أسم العائلة',
        'passport_number.required' => 'يرجى تعبئة حقل رقم الجواز',
        'passport_issuance.required' => 'يرجى تعبئة حقل تاريخ إستخراج الجواز',
        'passport_expiry.required' => 'يرجى تعبئة حقل تاريخ إنتهاء الجواز',
        'gender.required' => 'يرُجى تعبئة حقل النوع',
        'social_status.required' => 'يرجى تعبئة حقل الحالة الإجتماعية ',
        'address.required' => 'يرجى تعبئة حقل المدينة التي تقيم بها',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm(){

        Validator::make([$this->fname,$this->lname] , [
            'fname' => ['required' , Rule::notIn(['A','B','C','D','E','F','G','H','I','J','K','L','N','M','O','P','Q','R','S','T','U','V','W','X','Y','Z'])],
            'Lname' => ['required' , Rule::notIn(['A','B','C','D','E','F','G','H','I','J','K','L','N','M','O','P','Q','R','S','T','U','V','W','X','Y','Z'])],
        ]);

        $traveler = $this->validate();

        $traveler['fname']              = $this->fname ;
        $traveler['lname']              = $this->lname ;
        $traveler['passport_number']    = $this->passport_number ;
        $traveler['passport_issuance']  = $this->passport_issuance ;
        $traveler['passport_expiry']    = $this->passport_expiry ;
        $traveler['gender']             = $this->gender ;
        $traveler['social_status']      = $this->social_status ;
        $traveler['address']            = $this->address ;

        // $request->session()->put('current_traveler' , 1);

        // // Fetch number of tarvelers from previous session
        // $travelers_number = $request->session()->get('visa_request.travelers_number');

        // /* 
        //     Check if number of tarvelers > 1 
        //     [case:true => store travelers data in indexed session]
        //     [case:flase => just put data as normal array] 
        // */
        // if($travelers_number > 1){
        //     // push new traveler
        //     $request->session()->push('travelers' , $request->all());
        //     // decrement number of travelers
        //     $request->session()->decrement('visa_request.travelers_number');

        //     // dynamic way to get current traveler number to display in traveler form
        //     $tr_num = sizeof($request->session()->get('travelers')) + 1;
        //     $request->session()->now('current_traveler', $tr_num);

        //     return redirect()->back()->with('current_traveler');

        // }else{
        //     $request->session()->push('travelers' , $request->all());
        //     // Store step number
        //     $request->session()->put('step_number' , 2);
        //     return redirect()->route('client.step_three');
        // }
    }



    public function render()
    {
        return view('livewire.traveler-form');
    }


}