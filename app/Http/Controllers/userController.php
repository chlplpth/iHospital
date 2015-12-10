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
use App\department;
use App\staff;
use App\appointment;

use Hash;

class userController extends Controller
{
   
    // ==================================================================================================
    // ============================================ GENERAL =============================================
    // ==================================================================================================

    // ------------------------------- register -------------------------------
    
    // check whether a patient is an old or new patient
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

    // register for old patient (who's already has his/her own info in the database)
    public function registerOldPatient(Request $request)
    {
        $input = $request->all();
        $citizenNo = $input['citizenNo'];
        $patient = patient::where('citizenNo', $citizenNo)->first();

        $userId = $patient['userId'];
        User::where('userId',$userId)->update(array(
                'email'         => $input['email'],
                'username'     => $input['username'],
                'password'      => Hash::make($input['password'])
            ));

        return redirect('/');
    }

    // register for new patient
    public function registerNewPatient(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request['password']);
        $user = User::create($input);

        $patient = $input;
        $addressSet = array($input['addressNo'], $input['moo'], $input['street'], $input['subdistrict'], $input['district'], $input['province'], $input['zipcode']);
        $patient['address'] = join(',,', $addressSet);
        $patient['drugAllergy'] = join(", ", $input['drugAllergy']);
        $patient['userId'] = $user->userId;
        $patient['hospitalNo'] = patient::getNewHospitalNo();
        $patient = patient::create($patient);

        return redirect('/');
    }    

    // ==================================================================================================
    // ============================================ PATIENT =============================================
    // ==================================================================================================

    // ------------------------------- patient's profile -------------------------------

    //user == patient  view own profile 
    public function viewMyProfilePatient(Request $request)
    {
        $userId = Auth::user()->userId;
        $user = user::where('userId', $userId)->first();
        $address = $user->patient->addressDetail();
        return view('patient.patientProfile')->with('user', $user)->with('address', $address);
    }

    //user == patient  edit own profile
    public function editMyProfilePatientShow(Request $request)
    {
        $userId = Auth::user()->userId;
        $patient = patient::where('userId', $userId)->first();
        $address = $patient->addressDetail();
        return view('patient.editProfile')->with('patient', $patient)->with('address', $address);
    }

    public function editMyProfilePatientStore(Request $request)
    {
        $input = $request->all();
        $input['userId'] = Auth::user()->userId;
        patient::editPatientProfile($input);
        return redirect('/');
    }

    // ------------------------------- search doctors -------------------------------
    
    // show department's details & list all doctors in hospital
    public function searchDoctorShow()
    {
        $departments = department::getDepartmentArray();
        $doctor = doctor::doctorSortByName()->get();
        return view('patient.doctorList')
                ->with('departments', $departments)
                ->with('doctors', $doctor);
    }

    //search doctor that have name or surname contain that request string
    public function searchDoctor(Request $request)
    {
        $input = $request;
        $department = $request->input('department');
        $docQuery = $request->input('doctor');
        
        $doctors = doctor::searchDoctor($department, $docQuery);
        $departments = department::getDepartmentArray();
       
        return view('patient.doctorList')
                ->with('doctors',$doctors)
                ->with('departments', $departments)
                ->with('queryName', $input['doctor'])
                ->with('queryDepartment', $input['department']);
    }

    // ==================================================================================================
    // ============================================ DOCTOR =============================================
    // ==================================================================================================

    public function showDoctorProfile()
    {
        $doctor = doctor::where('userId', Auth::user()->userId)->first();
        $departments = department::getDepartmentArray();
        return view('doctor.doctorProfile')
                ->with('doctor', $doctor)
                ->with('departments', $departments);
    }

    public function editDoctorProfile(Request $request)
    {
        $input = $request;
        $doctor = doctor::where('userId', Auth::user()->userId)->first();
        $doctor->editDoctorProfile($input);
        return redirect('doctorProfile');
    }

    public function showPatientProfileToDoctor($patientId)
    {
        $patient = patient::where('userId', $patientId)->first();
        $appointments = appointment::getRecordedAppointments($patientId);
        return view('doctor.patientProfileByDoctor')
                ->with('patient', $patient)
                ->with('appointments', $appointments);
    }

    
    
    public function searchPatient(Request $request)
    {
    	$keyword = $request->input('patient');
        $users = patient::searchPatient($keyword);

        // if(sizeof($users)==0) echo "not found";
        // else echo"found";

    }

    public function searchStaff(Request $request)
    {
        $keyword = $request->input('staff');
        $users = hospitalStaff::searchStaff($keyword);
        return view('staff.manageStaffSearch')->with('staff',$users);
    }

    public function editStaff(Request $request)
    {
        $input = $request->all();
        $staffId = $request->staffId;

        $users = hospitalStaff::editStaff($input,$staffId);
        
        return view('staff.manageStaffByStaff')->with('staff',$users);
    }

    public function deleteStaff(Request $request)
    {
        $keyword = $request->deleteStaff;
        $users = hospitalStaff::deleteStaff($keyword);

        //return redirect('staff.manageStaffByStaff');
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
        return redirect('/');
    }

    public function addHospitalStaffByAdminShow()
    {
        $department = department::all();
        $depList = array();
        foreach($department as $item)
        {
            $depList[$item['departmentId']] = $item['departmentName'];
        }
        return view('admin/addStaffByAdmin')->with('department', $depList);
    }

    public function addHospitalStaffByAdminStore(Request $request)
    {
        $input = $request->all();
        $user = User::create($input);

        $hospitalStaff = $input;
        $hospitalStaff['userId'] = $user->userId;
        $hospitalStaff = hospitalStaff::create($hospitalStaff); 
        if($input['userType']=="doctor")
        {
            $doctor = $input;
            $doctor['userId'] = $user->userId;
            $doctor = doctor::create($doctor); 
        }

        if($input['userType']=="staff")
        {
            $staff = $input;
            $staff['userId'] = $user->userId;
            $staff = staff::create($staff);
        }

        // send set password e-mail
        return redirect('/');
    }

    public function addHospitalStaffShow()
    {  
        $department = department::all();
        $depList = array();
        foreach($department as $item)
        {
            $depList[$item['departmentId']] = $item['departmentName'];
        }
        return view('staff/addStaffByStaff')->with('department', $depList);
    }


    public function addHospitalStaffStore(Request $request)
    {
    	$input = $request->all();
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

        if($input['userType']=="staff")
        {
            $staff = $input;
            $staff['userId'] = $user->userId;
            $staff = staff::create($staff);
        }

        // send set password e-mail
        return redirect('/');
    }
}
