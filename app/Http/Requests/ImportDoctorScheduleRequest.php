<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ImportDoctorScheduleRequest extends Request
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
            'keyword' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
              
        ];
    }

    public function messages()
    {
        return [
            'keyword.required' => 'กรุณาระบุชื่อหรือรหัสแพทย์',
            'startDate.required' => 'กรุณาระบุวันเริ่มต้น',
            'endDate.required' => 'กรุณาระบุวันสิ้นสุด',
            
        ];
    }
}
