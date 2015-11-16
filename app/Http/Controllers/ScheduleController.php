<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ScheduleController extends Controller
{
    public function testDatabase(){
    	if(DB::connection()->getDatabaseName())
		{
		   echo "Connected sucessfully to database ".DB::connection()->getDatabaseName().".";
		}
    }
}
