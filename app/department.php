<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'department';
    protected $primaryKey = 'departmentId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function getDoctorArray()
    {
        $department = department::all();
        $tmpArr = array();
        foreach($department as $dep)
        {
            $tmpArr[$dep->departmentId] = $dep->getDoctorByDepartment($dep->departmentId);
        }
        return $tmpArr;
    }

    public function getDoctorByDepartment($departmentId)
    {
        $doctor = DB::table('department')
                    ->where('department.departmentId', $departmentId)
                    ->join('hospitalStaff', 'department.departmentId', '=', 'hospitalStaff.departmentId')
                    ->join('doctor', 'hospitalStaff.userId', '=', 'doctor.userId')
                    ->join('users', 'doctor.userId', '=', 'users.userId')
                    ->select('users.userId', 'users.name', 'users.surname')
                    ->get();
        return $doctor;
    }

    // ------------- relationships ------------- 
    public function doctor()
    {
        return $this->hasManyThrough('App\hospitalStaff', 'App\doctor', 'userId', 'departmentId');
    }

    protected $fillable = [
        'departmentName',
        'departmentBuilding',
        'departmentTel'];
}
