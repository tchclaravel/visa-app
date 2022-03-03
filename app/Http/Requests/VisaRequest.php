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
        // [
        //     'name.required' => 'Name is required',
        // ]
        // ;
    }


    public function messages()
    {
        return [
            'country_id.required' => 'حقل السفارة يجب أن لا يكون فارغاً',
            'city_id.required' => 'حقل الوجهة يجب أن لا يكون فارغاً',
            'visa_type.required' => 'حقل نوع التأشيرة يجب أن لا يكون فارغاً',
            'travelers_number.required' => 'حقل عدد المسافرين يجب أن لا يكون فارغاً',
            'expected_date.required' => 'حقل تاريخ السفر يجب أن لا يكون فارغاً',
            'interview_place.required' => 'حقل مكان المقابلة يجب أن لا يكون فارغاً',
            'phone.required' => 'حقل رقم الجوال يجب أن لا يكون فارغاً',
        ];
    }


}
