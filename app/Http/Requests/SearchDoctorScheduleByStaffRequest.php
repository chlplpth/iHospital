<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SearchDoctorScheduleByStaffRequest extends Request
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
            'keyword' => 'required|alpha_num',
            

        ];
    }

    public function messages()
    {
        return [
            'keyword.required' => 'กรุณาระบุชื่อหรือรหัสแพทย์',
            'keyword.alpha_num' => 'รหัสแพทย์ต้องเป็นตัวอักษรหรือตัวเลขเท่านั้น',
        ];
    }
}
