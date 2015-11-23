<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DiagnoseRequest extends Request
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
            'disid' => 'required|alpha_num',
            'disname' => 'required|alpha_num',
            'description' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'disid.required' => 'กรุณาระบุรหัสโรค',
            'disid.alpha_num' => 'รหัสโรคต้องเป็นตัวอักษรหรือตัวเลขเท่านั้น',
            'disname.required' => 'กรุณาระบุชื่อโรค',
            'disname.alpha_num' => 'ชื่อโรคต้องเป็นตัวอักษรหรือตัวเลขเท่านั้น',
            'description.required' => 'กรุณาระบุรายละเอียดการตรวจ',
        ];
    }
}
