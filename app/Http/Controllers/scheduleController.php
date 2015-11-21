<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\schedule;
use App\scheduleLog;

class scheduleController extends Controller
{
    public function importSchedule(Request $request)
    {
    	$input = $request->all();
    	$scheduleLog = scheduleLog::importSchedule($input);


    	if(sizeof($scheduleLog)==0)
    		echo "fail";
    	else echo "added";
    }
}
