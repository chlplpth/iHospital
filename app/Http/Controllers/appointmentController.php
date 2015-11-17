<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class appointmentController extends Controller
{
    //store to database
    public function createAppointment(Request $request)
    {
    	$appointment = new appointment($request->all());
    	Auth::user()->appointment()->save($article);

    	return redirect('appointment');
    }

    public function viewAppointmentPatient(Request $request)
    {
        $patient = $request->patientId;

        $appointments = App\appointment::where('patentId', $patient)
               //->orderBy('name', 'desc')
               //->take(10)
               ->get();

    }

    public function delayAppointment(Request $request)
    {
        $appointment = App\Appointment::find($request->appointmentId);
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->doctorId = $request->doctorId;
        $appointment->save();
        
    }

    public function cancelAppointment(Request $request)
    {
    	
    }
}
