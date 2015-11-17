<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class userController extends Controller
{
   
    public function registerOldPatient(Request $request)
    {
    	$idNo = $request->idNo;
    	$patient = App/user::where('idNo',$idNo)	->get();
    	$user = App/user::find($patient->userId);
    	$user->username = $request->username;
    	$user->password = $request->password;
    	$user->save();

    	return view('register.success',compact($user));
    }

    public function registerNewPatient(Request $request)
    {
    	$user = new user($request->all());
    	$user->userType	= 'patient';
    	$user->save();
    	$patient = new patient($request->all());
        $patient->userId = $user->userId;
        $patient->save();

    	return view('register.success',compact($user));
    }

    //return profile of user that log in
    public function viewProfile(Request $request)
    {
    	$patient = Auth::user();
    	return view('user.profile',compact($user));
    }

    public function viewPatientProfile(Request $request)
    {
    	$patient = App/patient::find($request->userId);
    	return view('patient.profile',compact($patient));	
    }

    public function editPatientProfile(Request $request)
    {
    	if(Auth::user()->userType = staff)
    		$patient = App/patient::find($request->userId);
    	//if user is patient -> no form to fill patientId -> use directly from log in
    	else if(Auth::user()->userType = patient)
    		$patient = Auth::user();

    	$patient->email 		= $request->email;
    	$patient->address 		= $request->address;
    	$patient->allergyRecord	= $request->allergyRecord;
    	$patient->save();

    	return view('patient.profile',compact($patient));
    }
    
    //get list of doctor in department
    public function getDoctorList(Request $request)
    {
    	$department = $request->departmentId;
    	$doctors = App\doctor::where('departmentId', $departmant)
               //->orderBy('name', 'desc')
               //->take(10)
               ->get();	
        return view('department.doctorList',compact($doctors));
    }

    //search doctor that have name or surname contain that request string
    public function searchDoctor(Request $request)
    {
    	$keyword = $request->doctor;
    	$doctors = App\doctor::where('name', 'like', '%{$keyword}%')
    						 ->orwhere('surname', 'like', '%{$keyword}%')
				             //->orderBy('name', 'desc')
				             //->take(10)
				             ->get();	
		return view('doctor.search',compact($doctors));
    }
    
    public function searchPatient(Request $request)
    {
    	$keyword = $request->patient;
    	$patients = App\patient::where('name', 'like', '%{$keyword}%')
    						 ->orwhere('surname', 'like', '%{$keyword}%')
				             //->orderBy('name', 'desc')
				             //->take(10)
				             ->get();	
		return view('patient.search',compact($patiens));
    }
    
    public function viewDoctorProfile(Request $request)
    {
    	$doctor = App\doctor::find($request->doctorId);

    	return view('Doctor.profile',compact($doctor));
    }

    //manual add by staff   no username no password
    public function addPatient(Request $request)
    {	
    	$user = new user($request->all());
    	$user->userType	= 'patient';
    	$user->save();

    	$patient = new patient($request->all());
        $patient->userId = $user->userId;
        $patient->save();

        return redirect('patient');
    }


    public function addHospitalStaff(Request $request)
    {
    	$hospitalStaff = new hospitalStaff($request->all());
    	$hospitalStaff->save();

        return redirect('hospitalStaff');	
    }
}
