<?php

namespace App;

use App\schedule;
use Illuminate\Database\Eloquent\Model;

class scheduleLog extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'scheduleLog';
    protected $primaryKey = 'scheduleLogId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctorId',
        'staffId',
        'startDate',
        'endDate',
        'diagDateList'];


    //-------------------------------  relationship -------------------------------

    public function doctor()
    {
        return $this->belongsTo('App\doctor', 'doctorId', 'userId');
    }

    //---------------------------------  function ---------------------------------

    public static function newInstantScheduleLog($diagDate, $doctorId)
    {
        $slog = new scheduleLog;
        $slog->doctorId = $doctorId;
        $slog->startDate = $diagDate;
        $slog->endDate = $diagDate;
        $slog->diagDateList = '00000000000000';
        $slog->save();
        return $slog;
    }

    public static function importSchedule($request)
    {
        $morning = $afternoon = '0000000';
        if(isset($request['m']))
        {
            $morning = scheduleLog::getDiagDateString($request['m']);
        }
        if(isset($request['a']))
        {
            $afternoon = scheduleLog::getDiagDateString($request['a']);
        }
        $request['diagDateList'] = $morning . $afternoon;

        $request['startDate'] = scheduleLog::changeDateFormat($request['startDate']);
        $request['endDate'] = scheduleLog::changeDateFormat($request['endDate']);

        $scheduleLog = new scheduleLog($request);
        $scheduleLog -> save();
        $scheduleLog->createSchedule();

        return $scheduleLog;
    }

    public static function changeDateFormat($date)
    {
        $tmp = explode('/', $date);
        $newYear = intval($tmp[2]) - 543;
        return $newYear . '-' . $tmp[1] . '-' . $tmp[0];
    }

    public static function getCheckedArray($text)
    {   
        $i = 0;
        $check = array();
        while($i < strlen($text))
        {
            if($text[$i] == "1")
            {
                $check[$i] = true;
            }
            else
            {
                $check[$i] = false;
            }
            $i++;
        }
        return $check;
    }

    public function createSchedule(){
        $date = $this->startDate;
        $morning = scheduleLog::getCheckedArray(substr($this->diagDateList, 0, 7));
        $afternoon = scheduleLog::getCheckedArray(substr($this->diagDateList, 7, 7));

        while(strtotime($date) <= strtotime($this->endDate))
        {
            $dayOfWeek = date("w", strtotime($date));
            if($morning[$dayOfWeek])
            {
                schedule::storeSchedule($this->scheduleLogId, $date, 'morning');
            }
            if($afternoon[$dayOfWeek])
            {
                schedule::storeSchedule($this->scheduleLogId, $date, 'afternoon');
            }
            // next date
            $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));

        }
    }

    public static function getDiagDateString($diagDate)
    {
        $text = array('0' => '0', '1' => '0', '2' => '0', '3' => '0', '4' => '0', '5' => '0', '6' => '0');
        foreach($diagDate as $date)
        { 
            $text[$date] = '1';
        }
        return join('', $text);
    }    
      
}
