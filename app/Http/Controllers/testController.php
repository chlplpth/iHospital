<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\patient;
use App\appointment;
use App\doctor;
use App\schedule;
use App\department;

class testController extends Controller
{
    public function testfunc()
    {
    	echo '<!DOCTYPE html> <meta charset="utf-8">';
    	$pp = patient::where('userId', 3)->first();
    	$app = appointment::where('appointmentId', 1)->first();
    	$doc = doctor::where('userId', 4)->first();
    	$schedule = schedule::where('scheduleId', 1)->first();
    	$dep = department::where('departmentId', 2)->first();
    	// $doc->getScheduleInRange(2015, 12);
    	$results = $doc->getDiagStats(2015, 12);

    	foreach($results as $date)
    	{
    		echo $date['date'] . ' ' . $date['morning'] . ' ' . $date['afternoon'] . ' ' . $date['sum'] . '<br>';
    	}
    	// return view('testSearch')->with('patient', $pp)->with('ap', $app)->with('doctor', $doc)->with('sc', $schedule)->with('idd', $schedule->scheduleId)->with('department', $dep);
    }
}
