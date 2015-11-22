<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\scheduleLog;
use DB;

class schedule extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schedule';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scheduleLogId',
        'diagDate',
        'diagTime'];

    
    //-------------------------  function ---------------------
    public static function importSchedule($request)
    {
        
        //return scheduleLog;
    }

    public static function requestDate($input)
    {
        //find doctor in logId

        //specific doctor id
        if($input['doctorId']!=null)
        {
            $schedules = DB::table('scheduleLog')
                        ->join('hospitalStaff','scheduleLog.doctorId','=','hospitalStaff.userId')
                        ->where('scheduleLog.doctorId',$input['doctorId'])
                        ->join('schedule','scheduleLog.scheduleLogId','=','schedule.scheduleLogId')
                        ->where('schedule.diagDate',$input['date'])
                        ->where('schedule.diagTime',$input['time'])
                        ->get();
        }
        else if($input['departmentId']!=0)
        {
            $schedules = DB::table('scheduleLog')
                        ->join('hospitalStaff','scheduleLog.doctorId','=','hospitalStaff.userId')
                        ->where('hospitalStaff.departmentId',$input['departmentId'])
                        ->join('schedule','scheduleLog.scheduleLogId','=','schedule.scheduleLogId')
                        ->where('schedule.diagDate',$input['date'])
                        ->where('schedule.diagTime',$input['time'])
                        ->get();
        }
        
        $schedules = DB::table('scheduleLog')
                        ->join('hospitalStaff','scheduleLog.doctorId','=','hospitalStaff.userId')
                        ->join('schedule','scheduleLog.scheduleLogId','=','schedule.scheduleLogId')
                        ->where('schedule.diagDate',$input['date'])
                        ->where('schedule.diagTime',$input['time'])
                        ->get();

        return $schedules;
    }
}
