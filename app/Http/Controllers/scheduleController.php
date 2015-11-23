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
}
