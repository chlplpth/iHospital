<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\doctor;
use App\patient;
use App\user;

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

    //user == patient  view own profile 
    public function viewMyProfilePatient(Request $request)
    {
        $userId = Auth::user()->userId;
        $patient = patient::viewPatientProfile($userId);
        
        if(sizeof($patient)==0) echo "not found";
        else echo $patient->name;

    	
    }


    //user == other  view patient profile
    public function viewPatientProfile(Request $request)
    {
    	$userId = $request->input('userId');
        $patient = patient::viewPatientProfile($userId);
        
        if(sizeof($patient)==0) echo "not found";
        else echo $patient->name;
    		
    }

    //user type is not patient    edit by other
    public function editPatientProfile(Request $request)
    {
    	
        $patient = patient::editPatientProfile($request);
        echo "update";

    	//return view('patient.profile',compact($patient));
    }
    
    //get list of doctor in department
    public function getDoctorList(Request $request)
    {
    	$department = $request->departmentId;
    	$doctors = doctor::getDoctorList($department);

        //if(sizeof($doctors)==0) echo "not found";
        //else echo"found";
        
    }

    //search doctor that have name or surname contain that request string
    public function searchDoctor(Request $request)
    {
    	$department = $request->input('department');
        $doctor = $request->input('doctor');
        $users = doctor::searchDoctor($department, $doctor);

        // if(sizeof($users)==0) echo "not found";
        // else echo"found";
		//return view('doctor.search',compact($doctors));
    }
    
    public function searchPatient(Request $request)
    {
    	$keyword = $request->input('patient');
        $users = patient::searchPatient($keyword);

        // if(sizeof($users)==0) echo "not found";
        // else echo"found";

    }
    
    public function viewDoctorProfile(Request $request)
    {
    	
        $doctorId = $request->doctorId;
        $doctor = doctor::viewDoctorProfile($doctorId);

        // if(sizeof($doctor)==0) echo "not found";
        // else echo $doctor->departmentId;

    	
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
