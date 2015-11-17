<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class diagnosisRecordController extends Controller
{
    public function recordDiagnosis(Request $request)
	{
		$diagnosisRecord = new diagnosisRecord($request->all());
		$diagnosisRecord->doctorId = Auth::user()->userId;
        $diagnosisRecord->save();

        return redirect('diagnosisRecord');
    }

    //add by nurse
    public function recordPatiantGeneralDetail(Request $request)
    {
    	$physicalRecord = new physicalRecord($request->all());
    	$diagnosisRecord->nurseId = Auth::user()->userId;

    	return redirect('physicalRecord');
    }
    

    public function recordPrescriptionHistory(Request $request){

    }
    
    //if doctor  -> view own history , other send doctorId to rq
    public function viewDiagnosisHistoryDoctor(Request $request)
    {
    	$userType = Auth::user()->userType;
    	if(userType == 'doctor') 
    		$doctor = Auth::user->userId;
    	else
    		$doctor = $request->doctorId;

    	$diagnosisHistory = App\diagnosisRecord::where('doctorId',$doctor)->get();

    	return view('doctor.diagnosisHistory',compact($diagnosisHistory);
    }
    
    public function viewDiagnosisHistoryPatient(Request $request)
    {
    	$userType = Auth::user()->userType;
    	if(userType == 'patient') 
    		$patient = Auth::user->userId;
    	else
    		$patient = $request->doctorId;

    	$diagnosisHistory = App\diagnosisRecord::where('patientId',$patient)->get();

    	return view('patient.diagnosisHistory',compact($diagnosisHistory);
    }

    //click from user profile-> diagnosisHistory to view detail
    public function viewDiagnosisResult(Request $request)
    {
    	$diagnosisRecord = App\diagnosisRecord::find($request->diagRecordId);

    	return view('diagnosisRecord',compact($diagnosisRecord));
    }
}
