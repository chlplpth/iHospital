<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diagnosisDate extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'diagnosisDate';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scheduleId'];

    //-------------  relationship
    public function schedule()
    {
        return $this->belongsTo('App\schedule', 'scheduleId');
    }
}
