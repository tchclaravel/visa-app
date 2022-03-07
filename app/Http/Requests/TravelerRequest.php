<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fname' => 'required',
            'lname' => 'required',
            'passport_number' => 'required', 
            'passport_issuance' => 'required', 
            'passport_expiry' => 'required',
            'gender' => 'required',
            'social_status' => 'required', 
            'address' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'fname.required' => 'يرجى تعبئة حقل الأسم الأول',
            'lname.required' => 'يرجى تعبئة حقل أسم العائلة',
            'passport_number.required' => 'يرجى تعبئة حقل رقم الجواز',
            'passport_issuance.required' => 'يرجى تعبئة حقل تاريخ إستخراج الجواز',
            'passport_expiry.required' => 'يرجى تعبئة حقل تاريخ إنتهاء الجواز',
            'gender.required' => 'يرُجى تعبئة حقل النوع',
            'social_status.required' => 'يرجى تعبئة حقل الحالة الإجتماعية ',
            'address.required' => 'يرجى تعبئة حقل المدينة التي تقيم بها',
        ];
    }

}
