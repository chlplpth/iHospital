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
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'telMobile.digits' => 'เบอร์โทรศัพท์มือถือต้องประกอบด้วยตัวเลข 10 ตัว',
        ];
    }
}
