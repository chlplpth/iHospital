<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\scheduleLog;
use DB;
use Carbon\Carbon;

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
        
        // get appointment from a department or a doctor
        if($input['doctorId'] != '0')
        {
            $schedule = DB::table('schedule')
                        ->join('scheduleLog', 'schedule.scheduleLogId', '=', 'scheduleLog.scheduleLogId')
                        ->join('doctor', 'scheduleLog.doctorId', '=', 'doctor.userId')
                        ->join('users', 'doctor.userId', '=', 'users.userId')
                        ->where('doctor.userId', $input['doctorId']);
        }
        else if($input['departmentId'] != '0')
        {
            $schedule = DB::table('schedule')
                        ->join('scheduleLog', 'schedule.scheduleLogId', '=', 'scheduleLog.scheduleLogId')
                        ->join('doctor', 'scheduleLog.doctorId', '=', 'doctor.userId')
                        ->join('users', 'doctor.userId', '=', 'users.userId')
                        ->join('hospitalStaff', 'doctor.userId', '=', 'hospitalStaff.userId')
                        ->join('department', 'hospitalStaff.departmentId', '=', 'department.departmentId')
                        ->where('department.departmentId', $input['departmentId']);
        }

        // get appointment from specific date or choose only the fastest appointment
        if($input['date'] == '')
        {
            $appointments = $schedule->where('diagDate', '>', Carbon::now())
                                    ->orderBy('diagDate', 'asc')
                                    ->orderBy('diagTime', 'asc')
                                    ->take(10)
                                    ->get();
        }
        else
        {
            $input['date'] = scheduleLog::changeDateFormat($input['date']);
            $appointments = $schedule->where('diagDate', $input['date'])
                                    ->orderBy('diagTime', 'asc')
                                    ->get();
        }

        // choose first 10 schedules or on specific date

        // $input['date'] = scheduleLog::changeDateFormat($input['date']);

        //     $schedules = DB::table('scheduleLog')
        //                 ->join('hospitalStaff','scheduleLog.doctorId','=','hospitalStaff.userId')
        //                 ->where('scheduleLog.doctorId',$input['doctorId'])
        //                 ->join('schedule','scheduleLog.scheduleLogId','=','schedule.scheduleLogId')
        //                 ->where('schedule.diagDate',$input['date'])
        //                 ->get();
        // }
        // else if($input['departmentId']!=0)
        // {
        //     $schedules = DB::table('scheduleLog')
        //                 ->join('hospitalStaff','scheduleLog.doctorId','=','hospitalStaff.userId')
        //                 ->where('hospitalStaff.departmentId',$input['departmentId'])
        //                 ->join('schedule','scheduleLog.scheduleLogId','=','schedule.scheduleLogId')
        //                 ->where('schedule.diagDate',$input['date'])
        //                 ->get();
        // }
        
        // $schedules = DB::table('scheduleLog')
        //                 ->join('hospitalStaff','scheduleLog.doctorId','=','hospitalStaff.userId')
        //                 ->join('schedule','scheduleLog.scheduleLogId','=','schedule.scheduleLogId')
        //                 ->where('schedule.diagDate',$input['date'])
        //                 ->where('schedule.diagTime',$input['time'])
        //                 ->get();

        return $appointments;
    }

    public static function storeSchedule($scheduleLogId, $diagDate, $diagTime)
    {
        $schedule = new Schedule;
        $schedule->scheduleLogId = $scheduleLogId;
        $schedule->diagDate = $diagDate;
        $schedule->diagTime = $diagTime;
        $schedule->save();
    }
}
