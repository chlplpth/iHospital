<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\doctor;
use App\patient;
use App\hospitalStaff;
use App\user;

use Hash;

class userController extends Controller
{
   
    // check whether a patient is old or new patient
    public function checkPatientStatus(Request $request)
    {
        $patient = patient::where('citizenNo', $request['citizenNo'])->first();
        if($patient != null)
        {
            $userStatus = 'old';
        }
        else
        {
            $userStatus = 'new';
        }
        return view('general.register')->with('userStatus', $userStatus)->with('citizenNo', $request['citizenNo']);
    }

    public function registerOldPatient(Request $request)
    {
    	$input = $request->all();
        $citizenNo = $input['citizenNo'];
    	$patient = patient::where('citizenNo', $citizenNo)->first();

        $userId = $patient['userId'];
    	User::where('userId',$userId)->update(array(
                'username'     => $input['username'],
                'password'      => Hash::make($input['password'])
            ));

    	return redirect('/');
    }

    public function registerNewPatient(Request $request)
    {
    	
        $input = $request->all();
        //$input['password'] = Hash::make($request['password']);
        $user = User::create($input);

        $patient = $input;
        //$addressSet = array($input['addressNo'], $input['moo'], $input['street'], $input['subdistrict'], $input['district'], $input['province'], $input['zipcode']);
        //$patient['address'] = join(',,', $addressSet);
        $patient['userId'] = $user->userId;
        $patient = patient::create($patient);

        echo "patient added";

    	//return view('register.success',compact($user));
    }

    //user == patient  view own profile 
    public function viewMyProfilePatient(Request $request)
    {
        $userId = Auth::user()->userId;
        // $patient = patient::viewPatientProfile($userId);
        $user = user::where('userId', $userId)->first();
        $address = $user->patient->addressDetail();
        return view('patient.patientProfile')->with('user', $user)->with('address', $address);
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
    	$input = $request->all();
        $patient = patient::editPatientProfile($input);
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

    // manual add by staff no username no password
    public function addPatient(Request $request)
    {	
    	$user = new user($request->all());
    	$user->userType	= 'patient';
    	$user->save();

        patient::createNewPatient($user->userId, $request->all());
        // return redirect('/');
    }


    public function addHospitalStaff(Request $request)
    {
    	$input = $request->all();
        //$input['password'] = Hash::make($request['password']);
        $user = User::create($input);

        $hospitalStaff = $input;
        //$addressSet = array($input['addressNo'], $input['moo'], $input['street'], $input['subdistrict'], $input['district'], $input['province'], $input['zipcode']);
        //$patient['address'] = join(',,', $addressSet);
        $hospitalStaff['userId'] = $user->userId;
        //$hospitalStaff['staffId'] = Auth::user['userId'];
        $hospitalStaff = hospitalStaff::create($hospitalStaff);	
        if($input['userType']=="doctor")
        {
            $doctor = $input;
            $doctor['userId'] = $user->userId;
            $doctor = doctor::create($doctor); 
        }
    }
}
