<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use App\user;
use App\hospitalStaff;
use App\schedule;
use DB;

class doctor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'doctor';
    protected $primaryKey = 'userId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId',
        'proficiency'];

    //-------------------------------  relationship -------------------------------
    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'userId');
    }

    public function schedules()
    {
        return $this->hasManyThrough('App\schedule', 'App\scheduleLog', 'doctorId', 'scheduleLogId');
    }

    public function hospitalStaff()
    {
        return $this->belongsTo('App\hospitalStaff', 'userId', 'userId');
    }

    public function department()
    {
        return $this->hospitalStaff->department;
    }

    //--------------------------------  attributes --------------------------------

    public function name()
    {
        return $this->user->name;
    }

    public function surname()
    {
        return $this->user->surname;
    }

    public function email()
    {
        return $this->user->email;
    }

    public function fullname()
    {
        return $this->name() . ' ' . $this->surname();
    }

    //-------------------------  functions  -----------------------------------
    
    public static function doctorSortByName()
    {
        return doctor::join('users', 'doctor.userId', '=', 'users.userId')
                ->orderBy('name', 'asc')
                ->orderBy('surname', 'asc')
                ->join('hospitalStaff', 'doctor.userId', '=', 'hospitalStaff.userId')
                ->join('department', 'hospitalStaff.departmentId', '=', 'department.departmentId');
    }

    public function editDoctorProfile($input)
    {
      $this->update(['proficiency' => $input['proficiency']]);
      $this->user->update([
          'name' => $input['name'],
          'surname' => $input['surname'],
          'email' => $input['email']
        ]);
      $this->hospitalStaff->update(['departmentId' => $input['departmentId']]);
    }

    public function getDiagStats($year, $month)
    {
        $schedules = schedule::diagDateInRange($year, $month)
                    ->join('scheduleLog', 'schedule.scheduleLogId', '=', 'scheduleLog.scheduleLogId')
                    ->join('doctor', 'scheduleLog.doctorId', '=', 'doctor.userId')
                    ->where('doctor.userId', '=', $this->userId)
                    ->where('schedule.diagDate', '<', Carbon::now())
                    ->orderBy('diagDate')
                    ->get();

        $i = -1;
        $lastDate = '';
        $results = array();

        foreach($schedules as $s)
        {
            $schedule = schedule::where('scheduleId', $s['scheduleId'])->first();
            if($s->diagDate != $lastDate)
            {
                $i++;
                $results[$i]['morning'] = '-';
                $results[$i]['afternoon'] = '-';
                $results[$i]['sum'] = 0;
                $results[$i]['date'] = $schedule['diagDate'];
                $lastDate = $s->diagDate;
            }

            $patientNo = $schedule->patientsAmount();
            $results[$i][$s->getOriginal('diagTime')] = $patientNo;
            $results[$i]['sum'] += $patientNo;
        }

        $results['sum']['date'] = 'รวม';
        $results['sum']['morning'] = 0;
        $results['sum']['afternoon'] = 0;
        foreach($results as $date)
        {
            if($date['morning'] != '-')
            {
                $results['sum']['morning'] += $date['morning'];
            }
            if($date['afternoon'] != '-')
            {
                $results['sum']['afternoon'] += $date['afternoon'];
            }
        }

        $results['sum']['sum'] = $results['sum']['morning'] + $results['sum']['afternoon'];

        return $results;
    }

    public static function viewDoctorProfile($doctorId)
    {
        
       $doctor = DB::table('users')
                     ->join('doctor','users.userId','=','doctor.userId')
                     ->join('hospitalStaff','users.userId','=','hospitalStaff.userId')
                     ->where('users.userId', $doctorId)
                     ->first();

        return $doctor;
    }

    public static function searchDoctorByName($keyword)
    {
        $doctors = DB::table('users')
                     ->join('doctor','users.userId','=','doctor.userId')
                     ->join('hospitalStaff','users.userId','=','hospitalStaff.userId')
                     ->where(function ($query) use($keyword){
                             $query->where('name', 'like', '%'.$keyword.'%')
                                   ->orwhere('surname', 'like', '%'.$keyword.'%')
                                   ->orwhere('staffId', 'like', '%'.$keyword.'%');
                            })
                     ->where('userType',"doctor");
                     //->get();   

        return $doctors;
    }

    public static function searchDoctor($department, $doctor)
    {
        $doctors = DB::table('users')
                     ->join('doctor','users.userId','=','doctor.userId')
                     ->join('hospitalStaff','users.userId','=','hospitalStaff.userId')
                     ->where(function ($query) use($department){
                             if($department!=0)
                                $query->where('hospitalStaff.departmentId', $department);
                            })
                     ->where(function ($query) use($doctor){
                                $query->where('name', 'like', '%'.$doctor.'%')
                                      ->orwhere('surname', 'like', '%'.$doctor.'%');
                            })
                     ->where('userType',"doctor")
                     ->join('department','hospitalStaff.departmentId','=','department.departmentId')
                     ->get();   

          

        return $doctors;
    }

    //get list of doctor in department
    public static function getDoctorList($department)
    {
        $doctors = DB::table('users')
                     ->join('doctor','users.userId','=','doctor.userId')
                     ->join('hospitalStaff','users.userId','=','hospitalStaff.userId')
                     ->where('departmentId', $department)
                     //->orderBy('name', 'desc')
                     //->take(10)
                     ->get(); 

        return $doctors;
    }
}
