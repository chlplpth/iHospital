<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diagnosisRecord extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'diagnosisRecord';

    // -------- relationship ------------
    public function appointment(){
        return $this->belongsTo('App\appointment');
    }

    public function doctor(){
        return $this->hasManyThrough('App\appointment', 'App\doctor');
    }

    public function patient(){
        return $this->hasManyThrough('App\appointment'. 'App\patient');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'diseaseCode',
        'doctorAdvice',
        'diagnosisDetail',
        'physicalRecordId'];

    //------------------   function -------------------------

    public static function viewDiagnosisHistoryPatient($input)
    {

        $diagnosisRecords = diagnosisRecord::join('appointment','diagnosisRecord.appointmentId','=','appointment.appointmentId')
                                           ->where('patientId',$input['patientId'])
                                           ->get();

        return $diagnosisRecords;
    }

    public static function viewDiagnosisHistoryDoctor($input)
    {

        $diagnosisRecords = diagnosisRecord::join('appointment','diagnosisRecord.appointmentId','=','appointment.appointmentId')
                                           ->join('schedule','appointment.scheduleId','=','schedule.scheduleId')
                                           ->join('scheduleLog','schedule.scheduleLogId','=','scheduleLog.scheduleLogId')
                                           ->where('doctorId',$input['doctorId'])
                                           ->get();

        return $diagnosisRecords;
    }
}
}
