<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class userController extends Controller
{
   
    public function registerPatient(Request $request)
    {
    	$idNo = $request->idNo;
    	
    }
    public function viewProfile(Request $request)
    {
    		
    }
    public function viewPatientProfile(Request $request)
    {
    	$patient = App/patient::find($request->userId);
    	return view(patient.profile,compact($patient));	
    }
    public function editPatientProfile(Request $request)
    {
    		
    }
    public function getDoctorList(Request $request)
    {
    		
    }
    public function searchDoctor(Request $request)
    {
    		
    }
    public function searchPatient(Request $request)
    {
    		
    }
    public function viewDoctorProfile(Request $request)
    {
    		
    }
    public function addPatient(Request $request)
    {
    		
    }
    public function addHospitalStaff(Request $request)
    {
    		
    }
}
