<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\patient;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\appointment;
use App\prescription;

use Carbon;

class patientController extends Controller
{
    public function show($hospitalNo){
    	$patient = patient::findOrFail($hospitalNo);
    	return view('patient.profile',compact('patient'));
    }

    //store patient from create new patient to database
    public function store(Request $request){
    	$input = $request->all();
    	// $input['timestamp'] = Carbon::now();
    	// Patient::create($input);
        Patient::createNewPatient($input);
    	return redirect('');
    }

    public function showPrescription(Request $request)
    {
        $userId = $request['userId'];
        $prescription = users::where('userId',$userId)
                        ->join('appointment','users.userId','=','appointment.patientId')
                        ->join('prescription','appointment.appointmentId','=','prescription.appointmentId')
                        ->last();

        //return view('pharmacist.recordPrescriptionHistory',compact('prescription'));
    }
}
