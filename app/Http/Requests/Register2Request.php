<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Register2Request extends Request
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
            'dateOfBirth' => 'required',
            'address' => 'required',
            'moo' => 'required|numeric',
            'street' => 'required',
            'subdistrict' => 'required',
            'district' => 'required',
            'zipcode' => 'required|digits:5',
            'telHome' => 'digits9',
            'telMobile' => 'digits10',
            'email' => 'email',
            'username' => 'required|alpha_num',            
            'password' => 'required|alpha_num',
            'repassword' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณาระบุชื่อ',
            'name.alpha' => 'ชื่อต้องเป็นตัวอักษรเท่านั้น',
            'surname.required' => 'กรุณาระบุนาม',
            'surname.alpha' => 'นามสกุลต้องเป็นตัวอักษรเท่านั้น',
            'dateOfBirth.required' => 'กรุณากรอกวัน/เดือน/ปีเกิด',
            'address.required' => 'กรุณาระบุเลขที่บ้าน',
            'moo.required' => 'กรุณาระบุหมู่',
            'moo.numeric' => 'หมู่ต้องเป็นตัวเลขเท่านั้น',
            'street.required' => 'กรุณาระบุถนน',
            'subdistrict.required' => 'กรุณาระบุแขวง/ตำบล',
            'district.required' => 'กรุณาระบุเขต/อำเภอ',
            'zipcode.required' => 'กรุณาระบุรหัสไปรษณีย์',
            'zipcode.digits' => 'รหัสไปรษณีย์ต้องตัวเลขจำนวน 5 ตัว',
            'telHome.digits' => 'เบอร์โทรศัพท์บ้านต้องมีตัวเลขจำนวน 9 ตัว',
            'telMobile.digits' => 'เบอร์โทรศัพท์มือถือต้องมีตัวเลขจำนวน 9 ตัว',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'username.required' => 'กรุณาระบุชื่อผู้ใช้',
            'username.alpha' => 'ชื่อผู้ใช้ต้องเป็นตัวอักษรหรือตัวเลขเท่านั้น',
            'password.required' => 'กรุณาระบุรหัสผ่าน',
            'password.alpha' => 'รหัสผ่านต้องเป็นตัวอักษรหรือตัวเลขเท่านั้น',
            'repassword:same' => 'รหัสผ่านไม่ตรงกัน กรุณาระบุยืนยันรหัสผ่านอีกครั้ง'
        ];
    }
}
