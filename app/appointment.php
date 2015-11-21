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
        'date',
        'time',
        'symptom'];

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
                                   ->join('users','appointment.doctorId','=','users.userId')
                                   ->join('hospitalStaff','appointment.doctorId','=','hospitalStaff.userId')
                                   ->join('department','hospitalStaff.departmentId','=','department.departmentId')
                                   ->get();

        return $appointments;
    }
}
	
    