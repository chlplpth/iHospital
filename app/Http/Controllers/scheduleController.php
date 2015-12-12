<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;	
use App\doctor;
use App\schedule;
use App\scheduleLog;

class scheduleController extends Controller
{
    public function importScheduleShow($userId)
    {
    	$doctor = doctor::viewDoctorProfile($userId);
		return view('staff.importDoctorSchedule')->with('doctor', $doctor);
    }

    public function importScheduleStore(Request $request)
    {
    	$input = $request->all();
    	$input['staffId'] = Auth::user()->userId;
    	$scheduleLog = scheduleLog::importSchedule($input);
    }

    public function doctorScheduleByStaff($patientId)
    {
        return view('staff.doctorScheduleByStaff');
    }

    public function showScheduleDoctor()
    {
        $userId = Auth::user()->userId;
        $dt = schedule::getDateTimeToCalendar($userId);
        return view('doctor.doctorScheduleByDoctor')
                ->with('calendar2', $dt);
    }

    public function updateScheduleDoctor(Request $request)
    {
        // $input = $request;
        // echo $input['hiddenDate'] . '<br>';
        // echo $input['hiddenMr'] . '<br>';
        // echo $input['hiddenAf'] . '<br>';
    }
}
