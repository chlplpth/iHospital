<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class physicalRecordController extends Controller
{
    //
    public function showPatient($userId)
    {
    	$patient = user::where('userId', $userId)->first();
    	return view('nurse.recordPatientGeneralDetail2')->with('patient', $patient);
    }
}
