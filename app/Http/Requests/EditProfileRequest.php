<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditProfileRequest extends Request
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
            'email' => 'email',
            'telMobile' => 'digits:10',
            'telHome' => 'digits:9',
            'address7' => 'digits:5|required',
            'address5' => 'required|alpha',
            'address4' => 'required|alpha',
            'address1' => 'required',
            'name' => 'required|alpha',
            'lastname' => 'required|alpha',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณากรอกชื่อจริง',
            'name.alpha' => 'ชื่อจริง ต้องประกอบด้วยตัวอักษรเท่านั้น',
            'lastname.required' => 'กรุณากรอกนามสกุล',
            'lastname.alpha' => 'นามสกุล ้องประกอบด้วยตัวอักษรเท่านั้น',
            'address1.required' => 'กรุณากรอกบ้านเลขที่',
            'address4.alpha' => 'แขวง/ตำบลต้องประกอบด้วยตัวอักษรเท่านั้น',
            'address4.required' => 'กรุณากรอกแขวง/ตำบล',
            'address5.alpha' => 'เขต/อำเภอต้องประกอบด้วยตัวอักษรเท่านั้น',
            'address5.required' => 'กรุณากรอกเขต/อำเภอ',
            'address7.digits' => 'รหัสไปรษณีย์ต้องประกอบด้วยตัวเลข 5 ตัว',
            'address7.required' => 'กรุณากรอกรหัสไปรษณีย์',
            'telMobile.digits' => 'เบอร์โทรศัพท์มือถือต้องประกอบด้วยตัวเลข 10 ตัว',
            'telHome.digits' => 'เบอร์โทรศัพท์บ้านต้องประกอบด้วยตัวเลข 9 ตัว',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            

        ];
    }
}
