<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Mail;
use DB;
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
        $this->confirmAppointmentEmail();
        return redirect('/');
    }

    public function confirmAppointmentEmail()
    {
        $data = [
        'name'=>'KamKam',
        'surname'=>'DekDee',
        'HN'=>'HN-00000000',
        'date'=>'1/1/58',
        'time'=>'9.00 น.',
        'doctor'=>'Dr.KamDekDee',
        'department'=>'computer',
        'place'=>'ตึก 4 ชั้น 17',
        'tel'=>'(+66) 0-2218-6956-7',
        'remark'=>'-',
        'link'=>'www.google.com',
        'email'=>'tonkung49031@gmail.com'
        ];

        Mail::send('emails.confirmAppointmentEmail', $data, function ($message) use ($data) {
            $message->from('ihospital.se@gmail.com', 'iHospital');
            $message->to($data['email']);
            $message->subject('[iHosptal] You \'ve made an appointment!');
        });
        return "success";
    }

    public function delayAppointmentShow($appId)
    {
        $appointment = appointment::getAppointmentDetail($appId);
        return view('patient.rescheduleAppointment')->with('appointment', $appointment);
    }  

    public function delayAppointmentRequest(Request $request)
    {
        $input = $request;
        $appointment = appointment::getAppointmentDetail($input['appointmentId']);
        $newAppointments = schedule::requestDate($input);
        return view('patient.rescheduleAppointment')->with('appointment', $appointment)->with('newAppointments', $newAppointments);
    } 

    public function delayAppointmentStore(Request $request)
    {
        $input = $request->all();
        $appointment = appointment::delayAppointment($input);
        return redirect('/patientAppointmentSchedule');
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

    public function createAppointmentStaff($userId)
    {
        $patient = users::where('userId', $userId)->first();
        return view('staff.createAppointmentForPatient2')->with('patient', $patient);
    }

    
    public function cancelAppointment($appId)
    {
        $appointment = appointment::where('appointmentId',$appId)->first();
        DB::table('appointment')->where('appointmentId', $appId)->delete();
        return redirect('/patientAppointmentSchedule');
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
