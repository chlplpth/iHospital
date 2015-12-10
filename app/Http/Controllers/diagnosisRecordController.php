<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\diagnosisRecord;
use App\physicalRecord;
use App\medicinePrescription;
use App\appointment;
use App\prescription;

class diagnosisRecordController extends Controller
{
    public function recordDiagnosis(Request $request)
	{
		$input = $request->all();
        //add appointmentId
        
        $input['appointmentId'] =3;
        //$diagnosisRecord = diagnosisRecord::create($input);
        $diagnosisRecord = diagnosisRecord::where('diagRecordId',1)
                                         ->join('appointment','diagnosisRecord.appointmentId','=','appointment.appointmentId')
                                         ->join('users','appointment.patientId','=','users.userId')
                                         ->join('patient','users.userId','=','patient.userId')
                                         ->first();
        //$prescription = prescription::create($input['appointmentId']);

        return view('doctor.diagnoseNoMedicine')->with('diagnosisRecord',$diagnosisRecord);
    }

    //add by nurse
    public function recordPatientGeneralDetail(Request $request)
    {
    	$input = $request->all();
        $patient = physicalRecord::recordPatientGeneralDetail($input);

    	return view('nurse\recordPatientGeneralDetail2')->with('patient',$patient);
    }

    public function recordPatientGeneralDetail2(Request $request)
    {
        $input = $request->all();
        $physicalRecord = physicalRecord::recordPatientGeneralDetail2($input);

        return redirect('/');
    }
    

    public function recordPrescriptionHistory(Request $request)
    {
        $input = $request->all();
        $prescription = new prescription($input);
    }

    
    //if doctor  -> view own history , other send doctorId to rq
    public function viewDiagnosisHistoryDoctor(Request $request)
    {
    	
    }
    
    public function viewDiagnosisHistoryPatient(Request $request)
    {
    	$input = $request->all();
        $diagnosisRecords = diagnosisRecord::viewDiagnosisHistoryPatient($input);
    }

    public function showDiagnosisRecordList()
    {
        $patientId = Auth::user()->userId;
        $appointments = appointment::getRecordedAppointments($patientId);
        return view('patient.diagnosisRecord')
                ->with('appointments', $appointments);
    }

    public function showDiagnosisRecord($appId)
    {
        $appointment = appointment::where('appointmentId', $appId)->first();
        $phys = $appointment->physicalRecord;
        $diag = $appointment->diagnosisRecord;
        $prescription = $appointment->prescription;
        return view('patient.diagnosisRecord2')
                ->with('app', $appointment)
                ->with('phys', $phys)
                ->with('diag', $diag)
                ->with('prescription', $prescription);
    }

    //click from user profile-> diagnosisHistory to view detail
    public function viewDiagnosisResult(Request $request)
    {
    	$input = $request->all();
        $diagnosisRecord = diagnosisRecord::find($input['diagRecordId']);

    	//return view('diagnosisRecord',compact($diagnosisRecord));
    }

    public function addMedicineToPrescription(Request $request)
    {
        
        $input = $request->all();

        $id = $request->diagnosisRecord;
        $diagnosisRecord = diagnosisRecord::where('diagRecordId',$id)
                                         ->join('appointment','diagnosisRecord.appointmentId','=','appointment.appointmentId')
                                         ->join('users','appointment.patientId','=','users.userId')
                                         ->join('patient','users.userId','=','patient.userId')
                                         ->first();

        $medicine = medicinePrescription::addMedicineToPrescription($input);
        return view('doctor.diagMedicine')->with('medicine',$medicine)->with('diagnosisRecord',$diagnosisRecord);
    }
}
