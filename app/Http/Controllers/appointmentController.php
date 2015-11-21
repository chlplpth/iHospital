<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class appointmentController extends Controller
{
    public function home()
    {
        return view('index');
    }

    // user fill form and return available date for make appointment
    public function createAppointmentRequest(Request $request)
    {
        $date = $request->date;
        $department = $request->departmentId;
        $doctor = $request->doctorId;

        if(doctor!=null)
        {
            $availableDate = App\schedule::where('doctorId',$doctor)
                                         ->where('date',$date)
                                         ->get();
        }
        else
        {
            $availableDate = App\schedule::where('departmentId',$department)
                                         ->where('date',$date)
                                         ->get();
        }
        
        return view('appointment.availableDate',compact($availableDate));
    }   

    // show everything user fill in confirmation page
    public function createAppointmentConfirm(Request $request)
    {

        return view('appointment.confirm',compact($request));
    }

    //user enter confirm and store data of appointment in database
    public function createAppointmentStore(Request $request)
    {
        $appointment = new appointment($request->all());
        Auth::user()->appointment()->save($appointment);

        return redirect('appointment');
    }

    public function viewAppointmentPatient(Request $request)
    {
        $patient = $request->patientId

        $appointments = App\appointment::where('patientId', $patient)
               //->orderBy('name', 'desc')
               //->take(10)
               ->get();

        return view('appointment.all',compact(appointments);
    }

    public function delayAppointmentRequest(Request $request)
    {
        $appointment = App\Appointment::find($request->appointmentId);
        $date = $appointment->date;
        $department = $appointment->departmentId;
        $doctor = $appointment->doctorId;

        if($doctor!=null)
        {
            $availableDate = App\schedule::where('doctorId',$doctor)
                                         ->where('date',$date)
                                         ->get();
        }
        else
        {
            $availableDate = App\schedule::where('departmentId',$department)
                                         ->where('date',$date)
                                         ->get();
        }
        
        return view('appointment.availableDate',compact($availableDate));
    }

    public function delayAppointmentStore(Request $request)
    {
        $appointment = App\Appointment::find($request->appointmentId);
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->doctorId = $request->doctorId;
        $appointment->save();
        return redirect('appointment');
    }

    public function cancelAppointment(Request $request)
    {
        
    }
}
