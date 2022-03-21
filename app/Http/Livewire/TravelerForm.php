<?php

namespace App\Http\Livewire;

use App\Http\Requests\TravelerRequest;
use App\Rules\EnglishOnly;
use App\Rules\UniquePassport;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule as ValidationRule;
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

    public $tr_num = 1;


    // protected $rules = [

    // ];

    public function rules(){
        return [
            'fname' => ['required' , new EnglishOnly()],
            'lname' => ['required' , new EnglishOnly()],
            'passport_number' => ['required' , 'unique:travelers' , new UniquePassport()], 
            'passport_issuance' => 'required', 
            'passport_expiry' => 'required',
            'gender' => 'required',
            'social_status' => 'required', 
            'address' => 'required'
        ];
    }

    protected $messages = [
        'fname.required' => 'يرجى تعبئة حقل الأسم الأول',
        'lname.required' => 'يرجى تعبئة حقل أسم العائلة',
        'passport_number.required' => 'يرجى تعبئة حقل رقم الجواز',
        'passport_number.unique' => 'رقم الجواز الذي أدخلته موجود في سجلاتنا',
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

    public function render()
    {
        return view('livewire.traveler-form');
    }


    public function submitForm(){

        $traveler = $this->validate();

        $traveler['fname']              = $this->fname ;
        $traveler['lname']              = $this->lname ;
        $traveler['passport_number']    = $this->passport_number ;
        $traveler['passport_issuance']  = $this->passport_issuance ;
        $traveler['passport_expiry']    = $this->passport_expiry ;
        $traveler['gender']             = $this->gender ;
        $traveler['social_status']      = $this->social_status ;
        $traveler['address']            = $this->address ;

        session()->put('current_traveler' , 1);

        // Fetch number of tarvelers from previous session
        $travelers_number = session()->get('visa_request.travelers_number');

        /* 
            Check if number of tarvelers > 1 
            [case:true => store travelers data in indexed session]
            [case:flase => just put data as normal array] 
        */
        if($travelers_number > 1){
            // push new traveler
            session()->push('travelers' , $traveler);
            // decrement number of travelers
            session()->decrement('visa_request.travelers_number');

            // dynamic way to get current traveler number to display in traveler form
            $this->tr_num = sizeof(session()->get('travelers')) + 1;
            session()->now('current_traveler', $this->tr_num);

            // $this->reset();
            // return redirect()->back()->with('current_traveler');
            // return redirect()->back()->with('current_traveler');
            return redirect(request()->header('Referer'));



        }else{
            session()->push('travelers' , $traveler);
            // Store step number
            session()->put('step_number' , 2);
            return redirect()->route('client.step_three');
        }
    }


}
