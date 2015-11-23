<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\patient;
use App\User;
use App\doctor;

class appointment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'appointment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patientId',
        'staffId',
        'scheduleId',
        'symptom',
        'walkIn'];

    //relationship

    public function patient()
    {
        return $this->belongsTo('App\Patient','patientId');
    }
    public function doctor()
    {
        return $this->belongsTo('App\Doctor','doctorId');
    }
    public function diagnosisRecord()
    {
        return $this->belongsTo('App\DiagnosisRecord','diagRecordId');
    }

    //-------------------------------  function --------------------------

    public static function viewPatientAppointment($patientId)
    {
        $appointments = appointment::where('patientId',$patientId)
                                   ->join('schedule','schedule.scheduleId','=','appointment.scheduleId')
                                   ->join('scheduleLog','scheduleLog.scheduleLogId','=','schedule.scheduleLogId')
                                   ->join('users','scheduleLog.doctorId','=','users.userId')
                                   ->join('hospitalStaff','scheduleLog.doctorId','=','hospitalStaff.userId')
                                   ->join('department','hospitalStaff.departmentId','=','department.departmentId')
                                   ->first();

        return $appointments;
    }

    public static function viewDoctorAppointment($doctorId)
    {
        $appointments = doctor::where('doctor.userId',$doctorId)
                                   ->join('scheduleLog','doctor.userId','=','scheduleLog.doctorId')
                                   ->join('schedule','scheduleLog.scheduleLogId','=','schedule.scheduleLogId')
                                   ->join('appointment','schedule.scheduleId','=','appointment.scheduleId')
                                   ->join('users','appointment.patientId','=','users.userId')
                                   ->get();

        return $appointments;
    }

    public static function createAppointment($input)
    {
        $appointment = new appointment($input);
        $appointment ->save();

        //Auth::user()->appointment()->save($appointment);
        return $appointment;
    }

    public static function delayAppointment($request)
    {
        $appointmentId = $request['appointmentId'];
        

        appointment::where('appointmentId',$appointmentId)->update(array(
                'scheduleId'     => $request['scheduleId']
            ));

        $appointment = appointment::where('appointmentId',$appointmentId)->first();
        return $appointment;

    }
}
	
    