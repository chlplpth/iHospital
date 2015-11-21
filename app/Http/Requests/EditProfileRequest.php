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
            'name.required' => 'กรุณากรอก ชื่อจริง',
            'name.alpha' => 'ชื่อจริง ต้องประกอบด้วยตัวอักษรเท่านั้น',
            'lastname.required' => 'กรุณากรอก นามสกุล',
            'lastname.alpha' => 'นามสกุล ต้องประกอบด้วยตัวอักษรเท่านั้น',
            'address1.required' => 'กรุณากรอก บ้านเลขที่',
            'address4.alpha' => 'แขวง/ตำบล ต้องประกอบด้วยตัวอักษรเท่านั้น',
            'address4.required' => 'กรุณากรอก แขวง/ตำบล',
            'address5.alpha' => 'เขต/อำเภอ ต้องประกอบด้วยตัวอักษรเท่านั้น',
            'address5.required' => 'กรุณากรอก เขต/อำเภอ',
            'address7.digits' => 'รหัสไปรษณีย์ ต้องประกอบด้วยตัวเลข 5 ตัว',
            'address7.required' => 'กรุณากรอก รหัสไปรษณีย์',
            'telMobile.digits' => 'เบอร์โทรศัพท์มือถือ ต้องประกอบด้วยตัวเลข 10 ตัว',
            'telHome.digits' => 'เบอร์โทรศัพท์บ้าน ต้องประกอบด้วยตัวเลข 9 ตัว',
            'email.email' => 'รูปแบบอีเมล ไม่ถูกต้อง',
            

        ];
    }
}
