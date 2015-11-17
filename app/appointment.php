<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'appointment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'time',
        'symptom'];

    //relationship

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
    public function diagnosisRecord()
    {
        return $this->belongsTo('App\DiagnosisRecord');
    }
}
	
    