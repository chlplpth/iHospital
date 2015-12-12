<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    protected $fillable = [
        'userId',
        'grant' ];
    protected $primaryKey = 'userId';

    // -------------------------------  relationship -------------------------------
    public function hospitalStaff()
    {
    	return $this->belongsTo('App\hospitalStaff', 'userId', 'userId');
    }

    public function user()
    {
    	return $this->belongsTo('App\user', 'userId', 'userId');
    }

    public function department()
    {
    	return $this->hospitalStaff->department;
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

    public function email()
    {
    	return $this->user->email;
    }

    public function getGrantAttribute($value)
    {
        if($value == 0)
        {
            return 'false';
        }
        else if($value == 1)
        {
            return 'true';
        }

    }

    // -------------------------------  function -------------------------------

    public function editStaffProfile($input)
    {
        $this->user->update([
          'name' => $input['name'],
          'surname' => $input['surname'],
          'email' => $input['email']
        ]);
        $this->hospitalStaff->update(['departmentId' => $input['departmentId']]);
    }

    public static function searchStaff($keyword)
    {
        $users = User::join('staff','users.userId','=','staff.userId')
                     ->where('users.name', 'LIKE', '%'.$keyword.'%')
                     ->orwhere('users.surname', 'LIKE', '%'.$keyword.'%')
                     ->get();
        return $users;
    }

    public static function grantStaff($input)
    {
        foreach($input['staffs'] as $s)
        {
            $staff = staff::where('userId', $s)->first();
            $grant = 0;
            if(isset($input['grant']))
            {
                if(in_array($s, $input['grant']))
                {
                    $grant = 1;
                }
            }

            $staff->grant = $grant;
            $staff->save();
        }
    }
}
