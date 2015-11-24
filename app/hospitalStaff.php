<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo('App\User', 'userId');
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
    }

    public static function deleteStaff($input)
    {
        
        $hospitalStaff = hospitalStaff::where('userId',$input)->first();
        // //echo $hospitalStaff->userId;
        $hospitalStaff ->delete();
        //if(sizeof($hospitalStaff)==0) echo "not found";
        //$hospitalStaff->delete();
        $user = user::where('userId',$input)->first();
        $user -> delete();
    }
    public function department()
    {
        return $this->belongsTo('App\department', 'departmentId');

    }
}
