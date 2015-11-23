<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAppointmentForPatientRequest extends Request
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
            
            'id' => 'required|numeric',
            'date' => 'required',            
            'symptom' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'กรุณาระบุรหัสประจำตัวผู้ป่วย',
            'id.numeric' => 'รหัสประจำตัวผู้ป่วยต้องเป็นตัวเลขเท่านั้น',
            'date.required' => 'กรุณาระบุวันนัด',
            'symptom.required' => 'กรุณาระบุอาการเบื้องต้น',
        ];
    }
}
