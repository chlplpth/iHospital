<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class appointmentController extends Controller
{
    //store to database
    public function createAppointment()
    {
    	$appointment = new appointment($request->all());
    	Auth::user()->appointment()->save($article);

    	return redirect('appointment');
    }

    public function viewAppointmentPatient()
    {


    }

    public function delayAppointment()
    {

    }

    public function cancelAppointment()
    {
    	
    }
}
