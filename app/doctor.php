<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\user;
use App\hospitalStaff;
use DB;

class doctor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'doctor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId',
        'proficiency'];

    //-------------  relationship
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }


    //-------------------------  function  -----------------------------------
    
    public static function viewDoctorProfile($doctorId)
    {
        
       $doctor = DB::table('users')
                     ->join('doctor','users.userId','=','doctor.userId')
                     ->join('hospitalStaff','users.userId','=','hospitalStaff.userId')
                     ->where('users.userId', $doctorId)
                     ->first();

        return $doctor;
    }

    public static function searchDoctor($department, $doctor)
    {
        $doctors = DB::table('users')
                     ->join('doctor','users.userId','=','doctor.userId')
                     ->join('hospitalStaff','users.userId','=','hospitalStaff.userId')
                     ->where(function ($query) use($department){
                             if($department!=0)
                                $query->where('departmentId', $department);
                            })
                     ->where(function ($query) use($doctor){
                                $query->where('name', 'like', '%'.$doctor.'%')
                                      ->orwhere('surname', 'like', '%'.$doctor.'%');
                            })
                     ->where('userType',"doctor")
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
