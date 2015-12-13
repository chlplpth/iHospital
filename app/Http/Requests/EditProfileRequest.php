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
            'zipcode' => 'digits:5|required',
            'district' => 'required|alpha',
            'subdistrict' => 'required|alpha',
            'addressNo' => 'required',
            'name' => 'required|alpha',
            'surname' => 'required|alpha',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณากรอกชื่อจริง',
            'name.alpha' => 'ชื่อจริง ต้องประกอบด้วยตัวอักษรเท่านั้น',
            'surname.required' => 'กรุณากรอกนามสกุล',
            'surname.alpha' => 'นามสกุล ้องประกอบด้วยตัวอักษรเท่านั้น',
            'addressNo.required' => 'กรุณากรอกบ้านเลขที่',
            'subdistrict.alpha' => 'แขวง/ตำบลต้องประกอบด้วยตัวอักษรเท่านั้น',
            'subdistrict.required' => 'กรุณากรอกแขวง/ตำบล',
            'district.alpha' => 'เขต/อำเภอต้องประกอบด้วยตัวอักษรเท่านั้น',
            'district.required' => 'กรุณากรอกเขต/อำเภอ',
            'zipcode.digits' => 'รหัสไปรษณีย์ต้องประกอบด้วยตัวเลข 5 ตัว',
            'zipcode.required' => 'กรุณากรอกรหัสไปรษณีย์',
            'telMobile.digits' => 'เบอร์โทรศัพท์มือถือต้องประกอบด้วยตัวเลข 10 ตัว',
            'telHome.digits' => 'เบอร์โทรศัพท์บ้านต้องประกอบด้วยตัวเลข 9 ตัว',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            

        ];
    }
}
