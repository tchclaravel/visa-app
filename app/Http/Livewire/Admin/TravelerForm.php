<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\TravelerRequest;
use App\Models\Passport;
use App\Models\Traveler;
use App\Models\VisaRequest;
use App\Rules\EnglishOnly;
use App\Rules\UniquePassport;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
    public $social_status = '';
    public $gender;
    public $address;
    public $tr_num = 1;

    public $sudia_cities = array(
        'Riyadh' => 'الرياض',
        'Jeddah' => 'جدة',
        'Abha' => 'ابها',
        'Dammam' => 'الدمام',
        'Tabuk' => 'تبوك',
        'Mecca' => 'مكة',
        'Buraydah' => 'بريدة',
        'Jizan' => 'جيزان',
        'Medina' => 'المدينة',
        'Dhahran' => 'الظهران',
        'Al Jawf' => 'الجوف',
        'Khamis Mushayt' => 'خميس مشيط',
        'Al Bahah' => 'الباحة',
        'Diriyah' => 'الدرعية',
        'Dawadmi' => 'الدوادمي',
        'Jubail' => 'الجبيل',
        'Khafji' => 'الخفجي',
        'Khobar' => 'الخبر',
        'Al Majma’ah' => 'المجمعة',
        'Al-Mubarraz' => 'المبرز',
        'Muzahmiyya' => 'المزاحمية',
        'Najran' => 'نجران',
        'Hofuf' => 'الهفوف',
        'Hafr Al-Batin' => 'حفر الباطن',
        'Qatif' => 'القطيف',
        'Taif' => 'الطائف',
        'Tanomah' => 'تنومه',
        'Al-Ula' => 'العلا',
        'Unaizah' => 'عنيزة',
        'Al Qunfudhah' => 'القنفذة',
        'Yanbu' => 'ينبع',
        'Ar Rass' => 'الرس',
        'Al-Gwei’iyyah' => 'القويعية',
        'Hautat Sudair' => 'حوطة سدير',
        'Al-Hareeq' => 'الحريق',
        'Hotat Bani Tamim' => 'حوطة بني تميم',
        'Al-Namas' => 'النماص',
        'Qadeimah' => 'القدية',
        'Ras Tanura' => 'راس تنورة',
        'Sakakah' => 'سكاكا',
        'Sharurah' => 'شرورة',
        'Shaqraa' => 'شقراء',
        'Uyun AlJiwa' => 'عيون الجواء',
        'Wadi Al-Dawasir' => 'وادي الدواسر',
        'Zulfi' => 'الزلفي',
        'Al Bukayriyah' => 'البكيرية',
        'Baljurashi' => 'بلجرشي',
        'Bisha' => 'بيشة',
    );

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
            'passport_number' => ['required' , new UniquePassport(),'unique:travelers'], 
            'passport_issuance' => 'required', 
            'passport_expiry' => 'required',
            'gender' => 'required',
            'social_status' => $this->soicalTraveler(),
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
        'gender.required' => 'يرجى تعبئة حقل النوع',
        'social_status.required' => 'يرجى تعبئة حقل الحالة الإجتماعية ',
        'address.required' => 'يرجى تعبئة حقل المدينة التي تقيم بها',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.admin.traveler-form');
    }


    public function submitForm(){

        $order_id = session()->get('order_id');

        $traveler = $this->validate();

        $traveler['fname']              = strtoupper($this->fname) ;
        $traveler['lname']              = strtoupper($this->lname) ;
        $traveler['passport_number']    = $this->passport_number ;
        $traveler['passport_issuance']  = $this->passport_issuance ;
        $traveler['passport_expiry']    = $this->passport_expiry ;
        $traveler['gender']             = $this->gender ;
        $traveler['social_status']      = $this->social_status ;
        $traveler['address']            = $this->address ;

        $traveler_new = Traveler::findOrFail(session()->get('traveler_id'));

        $traveler_new->update($traveler);
        $traveler_new->passport->update(['status' => 1]);

        // Check if order has no passport not fill
        $passports = Passport::where('request_id' , $order_id)->where('status' , 0)->first();

        // dd($passports);
        if(is_null($passports)){
            // Update Request Status for move to compeleted requests
            VisaRequest::where('id' , $order_id)->update(['is_complete' => 1]);
        }

        $notification = ['alert-type' => 'success' , 'message' => 'تمت تعبئة بيانات المسافر بنجاح'];

        Session::forget('traveler_id');
        Session::forget('order_id');

        return redirect()->route('admin.requests.uncomplete-request' , $order_id)->with($notification);
        
    }


}
