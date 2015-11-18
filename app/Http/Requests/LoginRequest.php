<?php

namespace App\Http\Requests;

use Validator;
use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required|exists:users,username',
            'password' => 'required|' . ('matchUsername:' . $this->input('username')),
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'กรุณากรอกชื่อผู้ใช้งาน',
            'username.exists' => 'ไม่มีชื่อผู้ใช้งานดังกล่าวในระบบ',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.match_username' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
        ];
    }
}
