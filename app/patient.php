<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use App\user;
use DB;

class patient extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patient';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId',
        'hospitalNo',
        'telHome',
        'telMobile',
        'address',
        'citizenNo',
        'sex',
        'bloodGroup'];

    //-------------  relationship
    // public function user()
    // {
    //     return $this->belongsTo('App\User', 'userId');
    // }

    //   public function appointments()
    //   {
    //   	return $this->hasMany('App/Appointment');
    //   }

    //-------------  accessor

    public function getHospitalNoAttribute($value)
    {
        return sprintf("%08d", $value);
    }

    //----------------- function --------------------
    
    public static function viewPatientProfile($userId)
    {
        $patient = DB::table('users')
                    ->where('users.userId',$userId)
                    ->join('patient','users.userId','=','patient.userId')
                    ->first();

        return $patient;
    }


    public static function editPatientProfile($request)
    {
        $userId = $request['userId'];
    

        if($request['addressNo']!=null)
            $addressSet = array($request['addressNo'], $request['moo'], $request['street'], $request['subdistrict'], $request['district'], $request['province'], $request['zipcode']);


        User::where('userId',$userId)->update(array(
                'email'     => $request['email'],
                'name'      => $request['name'],
                'lastname'  => $request['lastname']
            ));

        patient::where('userId',$userId)->update(array(
                'telHome'     => $request['telHome'],
                'telMobile'   => $request['telMobile'],
                'address'     => $addressSet,
                'bloodGroup'  => $request['bloodGroup']
            ));

    }

    public static function searchPatient($keyword)
    {
        $users = DB::table('users')
                     ->join('patient','users.userId','=','patient.userId')
                     ->where(function ($query) use($keyword){
                             $query->where('name', 'like', '%'.$keyword.'%')
                                   ->orwhere('surname', 'like', '%'.$keyword.'%')
                                   ->orwhere('hospitalNo', 'like', '%'.$keyword.'%');
                            })
                     ->where('userType',"patient")
                     ->get();   
        return $users;
    }
}