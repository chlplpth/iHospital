<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddStaffByStaffRequest extends Request
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
            'name' => 'required|alpha',
            'surname' => 'required|alpha',
            'username' => 'required|alpha_num',
            'email' => 'required|email',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณาระบุชื่อ',
            'name.alpha' => 'ชื่อต้องเป็นตัวอักษรเท่านั้น',
            'surname.required' => 'กรุณาระบุนามสกุล',
            'surname.alpha' => 'นามสกุลต้องเป็นตัวอักษรเท่านั้น',
            'username.required' => 'กรุณาระบุชื่อผู้ใช้',
            'username.alpha_num' => 'ชื่อผู้ใช้ต้องเป็นตัวอักษรและตัวเลขเท่านั้น',
            'email.required' => 'กรุณาระบุอีเมล',
            'email.email' => 'รูปแบบของอีเมลไม่ถูกต้อง',
            
        ];
    }
}
