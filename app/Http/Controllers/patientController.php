<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Carbon;

class patientController extends Controller
{
    public function show($hospitalNo){
    	$patient = patient::findOrFail($hospitalNo);
    	return view('patient.profile',compact('patient');
    }

    //store patient from create new patient to database
    public function store(){
    	$input = Request::all();
    	$input['timestamp'] = Carbon::now();
    	Patient::create($input);

    	return redirect('');
    }
}
