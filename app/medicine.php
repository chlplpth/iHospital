<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medicine';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'medicineId',
        'medicinName',
        'medicineType',
        'decsription'];

    //---------------------------------------  function --------------------------------
   
}
