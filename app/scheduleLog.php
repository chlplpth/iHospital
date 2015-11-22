<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scheduleLog extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'scheduleLog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctorId',
        'staffId',
        'startDate',
        'endDate',
        'diagDateList'];

    public static function importSchedule($request)
    {
        $scheduleLog = new scheduleLog($request);
        $scheduleLog -> save();

        return $scheduleLog;
    }    
      
}
