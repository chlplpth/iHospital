<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DoctorListRequest extends Request
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
            'department' => 'in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21',
            'sub' =>    'required_if:name,required | 
                            required_if:department.in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณาระบุชื่อแพทย์',
            'department.in' => 'กรุณาระบุแผนก',
        ];
    }
}
