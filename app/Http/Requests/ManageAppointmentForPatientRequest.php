<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ManageAppointmentForPatientRequest extends Request
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
            'nameOrId' => 'required|alpha_num',
            

        ];
    }

    public function messages()
    {
        return [
            'nameOrId.required' => 'กรุณาระบุชื่อหรือรหัสผู้ป่วย',
            'nameOrId.alpha_num' => 'ชื่อหรือรหัสผู้ป่วยต้องเป็นตัวอักษรหรือตัวเลขเท่านั้น',
            
        ];
    }
}
