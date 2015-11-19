<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        'sex',
        'bloodGroup'];

    //-------------  relationship
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }

      public function appointments()
      {
      	return $this->hasMany('App/Appointment');
      }

    //-------------  accessor

    public function getHospitalNoAttribute($value)
    {
        return sprintf("%08d", $value);
    }
}