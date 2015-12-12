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
use App\patient;
use App\schedule;
use App\department;
use App\doctor;
use App\scheduleLog;

class appointmentController extends Controller
{

    // ==================================================================================================
    // ============================================ PATIENT =============================================
    // ==================================================================================================

    // ------------------------------- create new appointment -------------------------------

    // show department details for makeing a new appointment
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

    // show information about to-be appointment
    public function confirmAppointmentShow(Request $request)
    {
        $input = $request->all();
        $patient = patient::where('userId', Auth::user()->userId)->first();
        $schedule = schedule::where('scheduleId', $input['scheduleId'])->first();
        return view('patient.confirmAppointment')
                ->with('patient', $patient)
                ->with('schedule', $schedule)
                ->with('symptom', $input['symptom']);
    }

    //user enter confirm and store data of appointment in database
    public function createAppointmentStore(Request $request)
    {
        $input = $request->all();
        $input['patientId'] = Auth::user()->userId;
        $appointments = appointment::createAppointment($input);
        // // $this->confirmAppointmentEmail();
        return redirect('/');
    }

    // ------------------------------- show current appointment and manage -------------------------------

    // show all appointments
    public function viewPatientAppointment(Request $request)
    {
        if(Auth::user()->userType == "patient")
            $patientId = Auth::user()->userId;
        else $patientId = $request->patient;
        
        $patient = patient::where('userId', $patientId)->first();
        $appointments = $patient->appointmentSorted();
        return view('patient.patientAppointmentSchedule')->with('appointments', $appointments);
    }

    // show information about the appointment which will be delayed
    public function delayAppointmentShow(Request $request)
    {
        $appId = $request['appointmentId'];
        $appointment = appointment::where('appointmentId', $appId)->first();
        return view('patient.rescheduleAppointment')->with('appointment', $appointment);
    } 

    // show available schedules for changing appointment date
    public function delayAppointmentRequest(Request $request)
    {
        $oldDate = $request['date'];
        $input = $request;
        $appointment = appointment::getAppointmentDetail($input['appointmentId']);
        $newAppointments = schedule::requestDate($input);
        $formattedDate = '';
        if($request['date'] != '')
        {
            $formattedDate = schedule::formatDiagDate($input['date']);
        }
        
        return view('patient.rescheduleAppointment')
                ->with('appointment', $appointment)
                ->with('newAppointments', $newAppointments)
                ->with('requestedDate', $oldDate)
                ->with('formattedDate', $formattedDate);
    } 

    // show information before confirm new date for existing appointment
    public function confirmReAppointment(Request $request)
    {
        $input = $request;
        $appointment = appointment::where('appointmentId', $input['appointmentId'])->first();
        $schedule = schedule::where('scheduleId', $input['scheduleId'])->first();
        return view('patient.confirmReAppointment')
                ->with('appointment', $appointment)
                ->with('schedule', $schedule);
    }

    // change appointment's date (in real database)
    public function delayAppointmentStore(Request $request)
    {
        $input = $request->all();
        $appointment = appointment::delayAppointment($input);
        return redirect('/patientAppointmentSchedule');
    }

    // show information of the appointment which will be deleted
    public function cancelAppointmentShow(Request $request)
    {
        $appId = $request['appointmentId'];
        $appointment = appointment::where('appointmentId',$appId)->first();
        // DB::table('appointment')->where('appointmentId', $appId)->delete();
        return view('patient.cancelAppointment')->with('appointment', $appointment);
    }

    // cancel an appointment
    public function cancelAppointmentStore(Request $request)
    {
        $appId = $request['appointmentId'];
        $appointment = appointment::where('appointmentId',$appId)->first();
        $appointment->delete();
        return redirect('patientAppointmentSchedule');
    }

    // ==================================================================================================
    // ============================================ STAFF =============================================
    // ==================================================================================================

    public function createAppointmentByStaffShow($patientId)
    {
        $patient = patient::where('userId', $patientId)->first();
        $department = department::all();
        $depList = array();
        $depList['0'] = 'ไม่ระบุ';
        foreach($department as $item)
        {
            $depList[$item['departmentId']] = $item['departmentName'];
        }

        $doctor = department::getDoctorArray();
        return view('staff.createAppointmentForPatient2')
                    ->with('patient', $patient)
                    ->with('department', $depList)
                    ->with('doctor', $doctor);
    }

    public function createAppointmentStaffRequest(Request $request)
    {
        $input = $request->all();
        if($input['departmentId'] == '0')
        {
            return redirect('createAppointmentForPatient');
        }
        
        $walkin = 0;
        if(isset($input['walkin']))
        {
            $walkin = 1;
        }

        $patient = patient::where('userId', $input['patientId'])->first();
        $appointments = schedule::requestDate($input);
        return view('staff.createAppointmentForPatient2')
                    ->with('patient', $patient)
                    ->with('appointments', $appointments)
                    ->with('symptom', $input['symptom'])
                    ->with('walkin', $walkin);
    }

    public function confirmAppointmentByStaffShow(Request $request)
    {
        $input = $request->all();
        $schedule = schedule::where('scheduleId', $input['scheduleId'])->first();
        $patient = patient::where('userId', $input['patientId'])->first();
        return view('staff.confirmAppointmentForPatient')
                ->with('schedule', $schedule)
                ->with('patient', $patient)
                ->with('symptom', $input['symptom'])
                ->with('walkin', $input['walkin']);
    }

    public function createAppointmentByStaffStore(Request $request)
    {
        $input = $request->all();
        $appointments = appointment::createAppointmentStaff($input, Auth::user()->userid, $input['symptom'], $input['walkin']);
        return redirect('/createAppointmentForPatient');
    }

    public function manageAppointmentShow($patientId)
    {
        $patient = patient::where('userId', $patientId)->first();
        $appointments = $patient->appointmentSorted();
        return view('staff.manageAppointmentForPatient2')
                    ->with('patient', $patient)
                    ->with('appointments', $appointments);
    }

    // ==================================================================================================

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

    
    

    
}
