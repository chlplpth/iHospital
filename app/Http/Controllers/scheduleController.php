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

    public function editDoctorSchedule(Request $request)
    {
        $input = $request->all();
        $doctorId = Auth::user()->userId;
        schedule::updateSchedule($input['hiddenDate'], 'morning', $input['hiddenMr'], $doctorId);
        schedule::updateSchedule($input['hiddenDate'], 'afternoon', $input['hiddenAf'], $doctorId);
        return redirect('/doctorScheduleByDoctor');
    }
}
