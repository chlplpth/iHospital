<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\patient;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
}
