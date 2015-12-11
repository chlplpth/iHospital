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


    //-------------------------------  accessors -------------------------------

    public function getHeightAttribute($value)
    {
        return $value . ' เซนติเมตร';
    }

    public function getWeightAttribute($value)
    {
        return $value . ' กิโลกรัม';
    }

    public function getHeartRateAttribute($value)
    {
        return $value . ' ครั้งต่อนาที';
    }

    public function bloodPresure()
    {
        return $this->sysBlood . '/' . $this->diBlood . ' มิลลิเมตรปรอท';
    }

    public static function createNewPhysRecord($input, $nurseId)
    {
        $input['nurseId'] = $nurseId;
        $physRecord = physicalRecord::create($input);
    }

    public static function recordPatientGeneralDetail2($input)
    {
        $patientId = $input['patient'];
        $appointment = appointment::where('patientId',$patientId)->first();
        // $input['appointmentId'] = $appointment->appointmentId; 
        $input['nurseId'] = 16;
        $input['appointmentId'] = 12;
        // $physicalRecord = physicalRecord::create($input);
        // return $physicalRecord;
    }
}
