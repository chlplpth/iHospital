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

    //-------------------------------  scope --------------------------

    public function scopeHasPhysicalRecord($query)
    {
        return $query->has('physicalRecord');
    }

    public function scopeHasDiagnosisRecord($query)
    {
        return $query->has('diagnosisRecord');
    }

    //-------------------------------  function --------------------------

    public static function getRecordedAppointments($patientId)
    {
        return appointment::where('patientId', $patientId)
                            ->hasPhysicalRecord()
                            ->hasDiagnosisRecord()
                            ->get();
    }

    public static function toBeRecordedPhys($patientId)
    {
        $apps = appointment::where('patientId', $patientId)
                            ->join('schedule', 'appointment.scheduleId', '=', 'schedule.scheduleId')
                            ->where('schedule.diagDate', '>', Carbon::now())
                            ->orderBy('diagDate', 'asc')
                            ->orderBy('diagTime', 'asc')
                            ->get();

        foreach($apps as $a)
        {
            if($a->physicalRecord()->count() == 0)
            {
                return $a;
            }
        }

        return null;
    }

    public static function toBeRecordedDiag($patientId)
    {
        $apps = appointment::where('patientId', $patientId)
                            ->join('schedule', 'appointment.scheduleId', '=', 'schedule.scheduleId')
                            ->where('schedule.diagDate', '>', Carbon::now())
                            ->hasPhysicalRecord()
                            ->orderBy('diagDate', 'asc')
                            ->orderBy('diagTime', 'asc')
                            ->get();

        foreach($apps as $a)
        {
            if($a->diagnosisRecord()->count() == 0)
            {
                return $a;
            }
        }

        return null;
    }

    public static function toBePrescribe($patientId)
    {
        $app = appointment::join('prescription', 'appointment.appointmentId', '=', 'prescription.appointmentId')
                            ->join('schedule', 'appointment.scheduleId', '=', 'schedule.scheduleId')
                            ->where('appointment.patientId', '=', $patientId)
                            ->where('schedule.diagDate', '>', Carbon::now())
                            ->whereNull('prescription.pharmacistId')
                            ->orderBy('diagDate', 'asc')
                            ->orderBy('diagTime', 'asc')
                            ->first();
        return $app;
    }

    public static function newAppointmentByDoctor($input, $doctorId, $patientId)
    {
        $newDiagDate = scheduleLog::changeDateFormat($input['nextAppDate']);
        $schedule = schedule::join('scheduleLog', 'schedule.scheduleLogId', '=', 'scheduleLog.scheduleLogId')
                            ->where('scheduleLog.doctorId', $doctorId)
                            ->where('schedule.diagDate', $newDiagDate)
                            ->where('schedule.diagTime', $input['nextAppTime'])
                            ->first();
        
        if($schedule != null)
        {
            $appointment = new appointment;
            $appointment->patientId = $patientId;
            $appointment->scheduleId = $schedule->scheduleId;
            $appointment->symptom = $input['nextAppDetail'];
            $appointment->save();
        }
        return $schedule;
    }

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
	
    