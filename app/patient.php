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
        'hospitalNo',
        'phoneNo',
        'address',
        'sex',
        'bloodGroup'];

    //-------------  relationship
      public function appointments()
      {
      	retuen $this->hasMany('App/Appointment');
      }
