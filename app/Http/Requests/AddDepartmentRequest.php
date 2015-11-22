<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddDepartmentRequest extends Request
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
            'department' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'department.required' => 'กรุณาระบุชื่อแผนกที่ต้องการเพิ่ม',
            
        ];
    }
}
