<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAppointmentRequest extends Request
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
            
            'symptom' => 'required',
            

        ];
    }

    public function messages()
    {
        return [
            'symptom.required' => 'กรุณาระบุอาการเบื้องต้น',
            
        ];
    }
}
