<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\medicine;
use App\diagnosisRecord;

class medicineController extends Controller
{
    public function addMedicine(Request $request)
    {
    	$input = $request->all();
    	medicine::create($input);
    	return redirect('/');
    }

    public function searchMedicine(Request $request)
    {
    	$id = $request->diagnosisRecord;
        $diagnosisRecord = diagnosisRecord::where('diagRecordId',$id)
                                         ->join('appointment','diagnosisRecord.appointmentId','=','appointment.appointmentId')
                                         ->join('users','appointment.patientId','=','users.userId')
                                         ->join('patient','users.userId','=','patient.userId')
                                         ->first();


        $keyword = $request->medicineId;
    	$medicine = medicine::where('medicineId', 'like', '%'.$keyword.'%')
                         ->orwhere('medicineName', 'like', '%'.$keyword.'%')
                     	 ->first();

    	return view('doctor.diagMedicineResult')->with('medicine',$medicine)->with('diagnosisRecord',$diagnosisRecord);
    }
}
