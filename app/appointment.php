<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\patient;
use App\User;
use App\doctor;
use Carbon\Carbon;

class appointment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'appointment';
    protected $primaryKey = 'appointmentId';

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

    //-------------------------------  relationship -------------------------------

    public function patient()
    {
        return $this->belongsTo('App\patient','patientId', 'userId');
    }
    public function schedule()
    {
        return $this->belongsTo('App\schedule', 'scheduleId', 'scheduleId');
    }
    public function doctor()
    {
        return $this->schedule->scheduleLog->doctor;
    }
    // public function doctor()
    // {
    //     return $this->belongsTo('App\Doctor','doctorId');
    // }
    public function diagnosisRecord()
    {
        return $this->hasOne('App\diagnosisRecord', 'appointmentId', 'appointmentId');
    }

    public function physicalRecord()
    {
        return $this->hasOne('App\physicalRecord', 'appointmentId', 'appointmentId');
    }

    public function prescription()
    {
        return $this->hasOne('App\prescription', 'appointmentId', 'appointmentId');
    }

    public function department()
    {
        return $this->doctor()->department();
    }

    //-------------------------------  attributes -------------------------------

    public function diagDate()
    {
        return $this->schedule->diagDate;
    }

    public function diagTime()
    {
        return $this->schedule->diagTime;
    }

    //-------------------------------  function --------------------------

    public static function viewPatientAppointment($patientId)
    {
        $appointments = appointment::where('patientId',$patientId)
                                   ->join('schedule','schedule.scheduleId','=','appointment.scheduleId')
                                   ->where('schedule.diagDate', '>', Carbon::now())
                                   ->join('scheduleLog','scheduleLog.scheduleLogId','=','schedule.scheduleLogId')
                                   ->join('users','scheduleLog.doctorId','=','users.userId')
                                   ->join('hospitalStaff','scheduleLog.doctorId','=','hospitalStaff.userId')
                                   ->join('department','hospitalStaff.departmentId','=','department.departmentId')
                                   ->orderBy('schedule.diagDate', 'asc')
                                   ->orderBy('schedule.diagTime', 'asc')
                                   ->get();

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

    public static function getAppointmentDetail($appId)
    {
        $appointment = appointment::where('appointment.appointmentId', $appId)
                            ->join('schedule', 'appointment.scheduleId', '=', 'schedule.scheduleId')
                            ->join('scheduleLog', 'schedule.scheduleLogId', '=', 'scheduleLog.scheduleLogId')
                            ->join('hospitalStaff', 'scheduleLog.doctorId', '=', 'hospitalStaff.userId')
                            ->join('department', 'hospitalStaff.departmentId', '=', 'department.departmentId')
                            ->join('users', 'hospitalStaff.userId', '=', 'users.userId')
                            ->first();
        return $appointment;
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
        $appointment = appointment::where('appointmentId',$appointmentId)->first();
        $appointment->scheduleId = $request['scheduleId'];
        $appointment->save();

        // appointment::where('appointmentId',$appointmentId)->update(array(
        //         'scheduleId'     => $request['scheduleId']
        //     ));

        return $appointment;

    }
}
	
    