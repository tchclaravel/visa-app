<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisaRequest extends FormRequest
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
            'country_id' => 'required',
            'city_id' => 'required',
            'visa_type' => 'required',
            'travelers_number' => 'required',
            'expected_date' => 'required',
            'interview_place' => 'required',
            'phone' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'country_id.required' => 'يرجى تعبئة حقل السفارة',
            'city_id.required' => 'يرجى تعبئة حقل الوجهة',
            'visa_type.required' => 'يرجى تعبئة حقل نوع التأشيرة ',
            'travelers_number.required' => 'يرجى تعبئة حقل عدد المسافرين',
            'expected_date.required' => 'يرجى تعبئة حقل تاريخ السفر',
            'interview_place.required' => 'يرجى تعبئة حقل مكان المقابلة',
            'phone.required' => 'يرجى تعبئة حقل رقم الجوال',
        ];
    }


}
