<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RecordPatientGeneralDetailRequest extends Request
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
            'hospitalId' => 'digits:8|required',
            'weight' => 'required|numeric|min:1|max:1000',
            'height' => 'required|numeric|min:1|max:300',
            'highBP' => 'required|numeric|min:1|max:300',
            'lowBP' => 'required|numeric|min:1|max:300',
            'heartBeat' => 'required|numeric|min:1|max:300',
            'symptom' => 'required',
            
              
        ];
    }

    public function messages()
    {
        return [
            'hospitalId.digits' => 'รหัสผู้ป่วยต้องมีตัวเลขจำนวน 8 ตัว',
            'hospitalId.required' => 'กรุณาระบุรหัสผู้ป่วย',
            'weight.required' => 'กรุณาระบุน้ำหนัก',
            'weight.numeric' => 'น้ำหนักต้องเป็นตัวเลขเท่านั้น',
            'weight.min' => 'น้ำหนักต้องมีค่าตั้งแต่ 1 ถึง 1000',
            'weight.max' => 'น้ำหนักต้องมีค่าตั้งแต่ 1 ถึง 1000',
            'height.required' => 'กรุณาระบุส่วนสูง',
            'height.numeric' => 'ส่วนสูงต้องเป็นตัวเลขเท่านั้น',
            'height.min' => 'ส่วนสูงต้องมีค่าตั้งแต่ 1 ถึง 1000',
            'height.max' => 'ส่วนสูงต้องมีค่าตั้งแต่ 1 ถึง 300',
            'highBP.required' => 'กรุณาระบุความดันโลหิตซีสโทลิค',
            'highBP.numeric' => 'ความดันโลหิตซีสโทลิคต้องเป็นตัวเลขเท่านั้น',
            'highBP.min' => 'ความดันโลหิตซีสโทลิคต้องมีค่าตั้งแต่ 1 ถึง 1000',
            'highBP.max' => 'ความดันโลหิตซีสโทลิคต้องมีค่าตั้งแต่ 1 ถึง 300',
            'lowBP.required' => 'กรุณาระบุความดันโลหิตไดแอสโทลิค',
            'lowBP.numeric' => 'ความดันโลหิตไดแอสโทลิคต้องเป็นตัวเลขเท่านั้น',
            'lowBP.min' => 'ความดันโลหิตไดแอสโทลิคต้องมีค่าตั้งแต่ 1 ถึง 1000',
            'lowBP.max' => 'ความดันโลหิตไดแอสโทลิคต้องมีค่าตั้งแต่ 1 ถึง 300',
            'heartBeat.required' => 'กรุณาระบุอัตราการเต้นหัวใจ',
            'heartBeat.numeric' => 'อัตราการเต้นหัวใจต้องเป็นตัวเลขเท่านั้น',
            'heartBeat.min' => 'อัตราการเต้นหัวใจต้องมีค่าตั้งแต่ 1 ถึง 1000',
            'heartBeat.max' => 'อัตราการเต้นหัวใจต้องมีค่าตั้งแต่ 1 ถึง 300',
            'symptom.required' => 'กรุณาระบุอาการการเบื้องตัน',
            
        ];
    }
}
