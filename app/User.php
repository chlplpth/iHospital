<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use App\patient;
use App\hospitalStaff;
use DB;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = 'userId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'name',
        'surname',
        'email',
        'userType',
        'verifyCode' ];

    public function genVerifyCode()
    {
        $user = null;
        $verifyCode = '';
        do{
            $verifyCode = str_random(60);
            $user = User::where('verifyCode', '=', $verifyCode)->first();
        }while($user != null);
        
        $this->verifyCode = $verifyCode;
        $this->save();
        return $verifyCode;
    }

    public static function setNewPassword($verifyCode, $newPassword)
    {
        $user = User::where('verifyCode', $verifyCode)->first();
        if($user != null)
        {
            $user->password = $newPassword;
            $user->verifyCode = null;
            $user->save();
        }
    }

    public function patient()
    {
        return $this->hasOne('App\patient', 'userId', 'userId');
    }

    public function hospitalStaff()
    {
        return $this->hasOne('App\hospitalStaff', 'userId', 'userId');
    }

    public function department()
    {
        return $this->hospitalStaff->department;
    }

    public function staff()
    {
        return $this->hasOne('App\staff', 'userId', 'userId');
    }

    public function grant()
    {
        return $this->staff->grant;
    }

    public function editPharmacistProfile($input)
    {
        $this->hospitalStaff->departmentId = $input['departmentId'];
        $this->hospitalStaff->save();

        $this->name = $input['name'];
        $this->surname = $input['surname'];
        $this->email = $input['email'];
        $this->save();
    }

    public function editNurseProfile($input)
    {
        $this->hospitalStaff->departmentId = $input['departmentId'];
        $this->hospitalStaff->save();

        $this->name = $input['name'];
        $this->surname = $input['surname'];
        $this->email = $input['email'];
        $this->save();
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    //----------------------------------------
    // public function patient()
    // {
    //     return $this->hasOne('App\patient');
    // }


}
