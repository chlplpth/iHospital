<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\patient;
use App\appointment;

class physicalRecord extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'physicalRecord';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nurseId',
        'appointmentId',
        'weight',
        'height',
        'sysBlood',
        'diBlood',
        'heartRate'];


    public static function recordPatientGeneralDetail($input)
    {
        $keyword = $input['patient'];
        $patient = patient::searchPatient($keyword)->first();
        return $patient;
    }

    public static function recordPatientGeneralDetail2($input)
    {
        $patientId = $input['patient'];
        $appointment = appointment::where('patientId',$patientId)->first();
        $input['appointmentId'] = $appointment->appointmentId; 
        $input['nurseId'] = 5;
        $physicalRecord = physicalRecord::create($input);
        return $physicalRecord;
    }
}
