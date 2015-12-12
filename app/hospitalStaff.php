<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
use App\user;
use App\hospitalStaff;

class hospitalStaff extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hospitalStaff';
    protected $primaryKey = 'userId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId',
        'staffId',
        'departmentId'];

    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'userId');
    }

    public function department()
    {
        return $this->belongsTo('App\department', 'departmentId', 'departmentId');
    }

    public function name()
    {
        return $this->user->name;
    }

    public function surname()
    {
        return $this->user->surname;
    }

    public function fullname()
    {
        return $this->name() . ' ' . $this->surname();
    }


    public static function searchStaff($keyword)
    {
       
        $users = hospitalStaff::join('users','hospitalStaff.userId','=','users.userId')
                     ->where(function ($query) use($keyword){
                             $query->where('name', 'like', '%'.$keyword.'%')
                                   ->orwhere('surname', 'like', '%'.$keyword.'%')
                                   ->orwhere('staffId', 'like', '%'.$keyword.'%');
                            })
                     ->join('department','hospitalStaff.departmentId','=','department.departmentId')
                     ->first();   
        return $users;
    }

    public static function editStaff($input, $userId)
    {
        User::where('userId',$userId)->update(array(
                'name'      => $input['name'],
                'surname'   => $input['surname']
            ));
        hospitalStaff::where('userId',$userId)->update(array(
                'departmentId'   => $input['departmentId']
            ));
        return hospitalStaff::where('userId', $userId)->get();
    }

    public static function deleteStaff($staffId)
    {
        $user = user::where('userId',$staffId)->first();
        if($user->userType == 'doctor')
        {
            $doctor = doctor::where('userId', $staffId)->first();
            $doctor->delete();
        }
        else if($user->userType == 'staff')
        {
            $staff = staff::where('userId', $staffId)->first();
            $staff->delete();
        }

        $hospitalStaff = hospitalStaff::where('userId', $staffId)->first();
        $hospitalStaff->delete();
        $user -> delete();
    }

    public static function searchHospitalStaff($keyword)
    {
        $users = DB::table('users')
                     ->join('hospitalStaff','users.userId','=','hospitalStaff.userId')
                     ->where(function ($query) use($keyword){
                             $query->where('name', 'like', '%'.$keyword.'%')
                                   ->orwhere('surname', 'like', '%'.$keyword.'%');
                            });
                     // ->get();   
        return $users;
    }
}
