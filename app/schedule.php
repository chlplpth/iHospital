<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\scheduleLog;
use App\doctor;
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

    public function department()
    {
        return $this->doctor()->department();
    }

    //---------------------------------  accessors ---------------------------------

    public function getDiagDateAttribute($value)
    {
        return schedule::formatDiagDate($value);
        // return $value;
    }

    public static function formatDiagDate($value)
    {
        $date = explode('-', $value);
        
        $day = $date[2];
        if($day[0] == '0')
        {
            $day = $day[1];
        }

        $BEyear = $date[0] + 543;
        
        return $day . ' ' . schedule::getMonthName($date[1]) . ' ' . $BEyear;
    }

    public static function getMonthName($value)
    {
        $monthName = array('01'=>'มกราคม', '02'=>'กุมภาพันธ์', '03'=>'มีนาคม', '04'=>'เมษายน', '05'=>'พฤษภาคม', '06'=>'มิถุนายน', '07'=>'กรกฎาคม', '08'=>'สิงหาคม', '09'=>'กันยายน', '10'=>'ตุลาคม', '11'=>'พฤศจิกายน', '12'=>'ธันวาคม');
        return $monthName[$value];
    }

    public function getDiagTimeAttribute($value)
    {
        if($value == 'morning')
        {
            return '9.30 น. - 11.30 น.';
        }
        else
        {
            return '13.00 น. - 15.30 น.';
        }
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
        return $this->appointments()
                    ->hasPhysicalRecord()
                    ->hasDiagnosisRecord()
                    ->count();
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
            $doctor = doctor::where('userId', $input['doctorId'])->first();
            $schedule = $doctor->schedules()
                        ->join('users', 'scheduleLog.doctorId', '=', 'users.userId');
        }
        else if($input['departmentId'] != '0')
        {
            $schedule = schedule::join('scheduleLog', 'schedule.scheduleLogId', '=', 'scheduleLog.scheduleLogId')
                        ->join('doctor', 'scheduleLog.doctorId', '=', 'doctor.userId')
                        ->join('hospitalStaff', 'doctor.userId', '=', 'hospitalStaff.userId')
                        ->join('users', 'hospitalStaff.userId', '=', 'users.userId')
                        ->join('department', 'hospitalStaff.departmentId', '=', 'department.departmentId')
                        ->where('department.departmentId', $input['departmentId']);
        }

        // get appointment from specific date or choose only the fastest appointment
        if($input['date'] == '')
        {
            $appointments = $schedule->where('diagDate', '>', Carbon::now())
                                    ->orderBy('diagDate', 'asc')
                                    ->orderBy('diagTime', 'asc')
                                    ->orderBy('name', 'asc')
                                    ->orderBy('surname', 'asc')
                                    ->take(10)
                                    ->get();
        }
        else
        {
            $input['date'] = scheduleLog::changeDateFormat($input['date']);
            $appointments = $schedule->where('diagDate', $input['date'])
                                    ->orderBy('diagTime', 'asc')
                                    ->orderBy('name', 'asc')
                                    ->orderBy('surname', 'asc')
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
            $st = "'" . $schedule->getOriginal('diagDate') . '-' . $schedule->getOriginal('diagTime') . "'";
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
