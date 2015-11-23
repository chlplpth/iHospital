<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SearchPatientProfileByDoctorRequest extends Request
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
            'patient' => 'required|alpha_num',
            

        ];
    }

    public function messages()
    {
        return [
            'patient.required' => 'กรุณาระบุชื่อหรือรหัสผู้ป่วย',
            'patient.alpha_num' => 'รหัสผู้ป่วยต้องเป็นตัวอักษรหรือตัวเลขเท่านั้น',
        ];
    }
}
