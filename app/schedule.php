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
    protected $primaryKey = 'scheduleId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scheduleLogId',
        'diagDate',
        'diagTime'];

    //-------------------------------  relationships -------------------------------
    public function appointments()
    {
        return $this->hasMany('App\appointment', 'scheduleId', 'scheduleId');
    }

    public function scheduleLog()
    {
        return $this->belongsTo('App\scheduleLog', 'scheduleLogId', 'scheduleLogId');
    }

    public function doctor()
    {
        return $this->scheduleLog->doctor;
    }

    //---------------------------------  accessors ---------------------------------

    public function getDiagDateAttribute($value)
    {
        return 'วันที่ ' . $value . '  ';
        // return $value;
    }

    //-----------------------------------  scope -----------------------------------

    public function scopeDiagDateInRange($query, $year, $month)
    {
        $firstDate = Carbon::create($year, $month, 1, 0, 0, 0);
        return $query->whereRaw('MONTH(diagDate) = ?', [$firstDate->month])
                     ->whereRaw('YEAR(diagDate) = ?', [$firstDate->year]);
    }

    //---------------------------------  functions ---------------------------------x

    public function patientsAmount()
    {
        return $this->appointments->count();
    }

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
                        ->join('hospitalStaff', 'doctor.userId', '=', 'hospitalStaff.userId')
                        ->join('department', 'hospitalStaff.departmentId', '=', 'department.departmentId')
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

        return $appointments;
    }

    public static function getDateTimeToCalendar($userId)
    {
        $query = schedule::join('scheduleLog', 'schedule.scheduleLogId', '=', 'scheduleLog.scheduleLogId')
                           ->where('scheduleLog.doctorId', $userId)
                           ->get();

        $arr = [];
        foreach($query as $schedule)
        {
            $st = "'" . $schedule['diagDate'] . '-' . $schedule['diagTime'] . "'";
            array_push($arr, $st);
        }
        
        $textArr = implode(", ", $arr);
        $textArr = "[" . $textArr . "]";
        return $textArr;
    }

    // public function getDiagTimeAttribute($value)
    // {
    //     if($value == 'morning')
    //     {
    //         return '9.30 น. - 11.30 น.';
    //     }
    //     else
    //     {
    //         return '13.00 น. - 15.30 น.';
    //     }
    // }

    public static function storeSchedule($scheduleLogId, $diagDate, $diagTime)
    {
        $schedule = new Schedule;
        $schedule->scheduleLogId = $scheduleLogId;
        $schedule->diagDate = $diagDate;
        $schedule->diagTime = $diagTime;
        $schedule->save();
    }
}
