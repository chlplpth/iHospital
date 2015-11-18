<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class physicalRecord extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'physicalRecord';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nurseId',
        'diagRecordId',
        'weight',
        'height',
        'sysBlood',
        'diBlood',
        'heartRate'];
}
