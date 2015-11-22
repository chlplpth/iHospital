<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\diagnosisRecord;
use App\physicalRecord;
use App\medicinePrescription;

class diagnosisRecordController extends Controller
{
    public function recordDiagnosis(Request $request)
	{
		$input = $request->all();
        $diagnosisRecord = new diagnosisRecord($input);
        $diagnosisRecord->save();

        //return redirect('diagnosisRecord');
    }

    //add by nurse
    public function recordPatiantGeneralDetail(Request $request)
    {
    	$input = $request->all();
        $physicalRecord = new physicalRecord($input);

    	//return redirect('physicalRecord');
    }
    

    public function recordPrescriptionHistory(Request $request)
    {
        $input = $request->all();
        $prescription = new prescription($input);
    }

    public function addMedicineInPrescription(Request $request)
    {
        $input = $request->all();
        $medicine = medicinePrescription::addMedicine($input);
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

    //click from user profile-> diagnosisHistory to view detail
    public function viewDiagnosisResult(Request $request)
    {
    	$input = $request->all();
        $diagnosisRecord = diagnosisRecord::find($input['diagRecordId']);

    	//return view('diagnosisRecord',compact($diagnosisRecord));
    }
}
