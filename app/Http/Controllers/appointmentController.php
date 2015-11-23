<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use App\appointment;
use App\schedule;
use App\department;
use App\doctor;

class appointmentController extends Controller
{
    public function home()
    {
        return view('index');
    }

    // user fill form and return available date for make appointment
    public function createAppointmentRequest(Request $request)
    {
        $input = $request->all();
        if($input['departmentId'] == '0')
        {
            return redirect('createAppointment');
        }
        $appointments = schedule::requestDate($input);
        return view('patient.createAppointment')->with('appointments', $appointments)->with('symptom', $input['symptom']);
    }   

    //user enter confirm and store data of appointment in database
    public function createAppointmentStore(Request $request)
    {
        $input = $request->all();
        $input['patientId'] = Auth::user()->userId;
        $appointments = appointment::createAppointment($input);
        return redirect('/');
    }

    public function delayAppointmentRequest(Request $request)
    {
        
        $input = $request->all();
        $schedules = schedule::requestDate($input);

        if(sizeof($schedules)==0) echo "not found";

    }   

    public function delayAppointmentStore(Request $request)
    {
        $input = $request->all();
        $appointment = appointment::delayAppointment($input);
    }

    public function viewPatientAppointment(Request $request)
    {
        if(Auth::user()->userType == "patient")
            $patientId = Auth::user()->userId;
        else $patientId = $request->patient;
        
        $appointments = appointment::viewPatientAppointment($patientId);
        return view('patient.patientAppointmentSchedule')->with('appointments', $appointments);
    }

    public function viewDoctorAppointment(Request $request)
    {
        // if(Auth::user()->userType == "doctor")
        //     $doctorId = Auth::user()->userId;
        // else $doctorId = $request->doctor;

        $doctorId = $request->doctor;
        
        $appointments = appointment::viewDoctorAppointment($doctorId);
        
    }

    
    public function cancelAppointment(Request $request)
    {
        $appointmentId = $request->appointmentId;
        $appointment = appointment::where('appointmentId',$appointmentId)->first();
        $appointment ->delete(); 
    }

    public function createAppointmentShow()
    {
        // department name
        $department = department::all();
        $depList = array();
        $depList['0'] = 'ไม่ระบุ';
        foreach($department as $item)
        {
            $depList[$item['departmentId']] = $item['departmentName'];
        }

        $doctor = department::getDoctorArray();

        return view('patient/createAppointment')->with('department', $depList)->with('doctor', $doctor);
    }
}
