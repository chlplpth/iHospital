<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddStaffByAdminRequest extends Request
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
            'name' => 'required',
            'surname' => 'required',
            'username' => 'required',
              
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณาระบุรหัสยา',
            'surname.required' => 'กรุณาระบุชื่อยา',
            'username.required' => 'กรุณาระบุรายละเอียดยา',
            
        ];
    }
}
