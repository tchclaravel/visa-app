<?php

namespace App\Http\Livewire\Client;

use App\Http\Requests\TravelerRequest;
use App\Models\PassportCity;
use App\Rules\EnglishOnly;
use App\Rules\UniquePassport;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class TravelerForm extends Component
{

    use WithFileUploads;

    public $fname;
    public $lname;
    public $passport_number;
    public $passport_issuance;
    public $passport_expiry;
    public $social_status = '';
    public $gender;
    public $address_id;
    public $passport;
    public $tr_num = 1;
    public $passport_cities;


    public function mount(){
        $this->passport_cities = PassportCity::all();
    }


    public function soicalTraveler(){
        if(session()->get('current_traveler') == 1){
            return 'required';
        }else{
            return '';
        }
    }


    public function rules(){
        return [
            'fname' => ['required' , new EnglishOnly()],
            'lname' => ['required' , new EnglishOnly()],
            'passport_number' => ['required' , new UniquePassport() , 'unique:travelers'], 
            'passport_issuance' => 'required', 
            'passport_expiry' => 'required',
            'gender' => 'required',
            'social_status' => $this->soicalTraveler(),
            'address_id' => 'required',
            'passport' => 'required|mimes:jpg,png,jpeg'
        ];
    }


    protected $messages = [
        'fname.required' => 'يرجى تعبئة حقل الأسم الأول',
        'lname.required' => 'يرجى تعبئة حقل أسم العائلة',
        'passport_number.required' => 'يرجى تعبئة حقل رقم الجواز',
        'passport_number.unique' => 'رقم الجواز الذي أدخلته موجود في سجلاتنا',
        'passport_issuance.required' => 'يرجى تعبئة حقل تاريخ إستخراج الجواز',
        'passport_expiry.required' => 'يرجى تعبئة حقل تاريخ إنتهاء الجواز',
        'gender.required' => 'يرجى تعبئة حقل النوع',
        'social_status.required' => 'يرجى تعبئة حقل الحالة الإجتماعية ',
        'address_id.required' => 'يرجى تعبئة حقل المدينة التي تقيم بها',
        'passport.required' => 'يرجى إرفاق صورة الجواز',
        'passport.mimes' => 'يجب ان تكون صيغة الملف PNG,JPG,JPEG',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        return view('livewire.client.traveler-form');
    }


    public function submitForm(){

        $traveler = $this->validate();

        session()->put('current_traveler' , 1);

        if($file = $this->passport){
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();           
            Image::make($file)->resize(650,450)->save('images/passports/' . $file_name);
            $path_name = 'images/passports/' . $file_name;
            session()->push('passports' , $path_name);
        }


        // Fetch number of tarvelers from previous session
        $travelers_number = session()->get('visa_request.travelers_number');

        /* 
            Check if number of tarvelers > 1 
            [case:true => store travelers data in indexed session]
            [case:flase => just put data as normal array] 
        */
        if($travelers_number > 1){
            // push new traveler
            session()->push('travelers' , Arr::except($traveler , ['passport']));
            // decrement number of travelers
            session()->decrement('visa_request.travelers_number');

            // dynamic way to get current traveler number to display in traveler form
            $this->tr_num = sizeof(session()->get('travelers')) + 1;
            session()->now('current_traveler', $this->tr_num);
            return redirect(request()->header('Referer'));



        }else{
            session()->push('travelers' , Arr::except($traveler , ['passport']));
            // Store step number
            session()->put('step_number' , 2);
            return redirect()->route('client.step_three');
        }
    }


}
