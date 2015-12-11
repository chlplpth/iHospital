<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prescription';
    protected $primaryKey = 'prescriptionId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'appointementId',
        'pharmacistId'];

    //--------------- relationship
    public function appointment()
    {
        $this->belongsTo('App\appointment', 'appointmentId', 'appointmentId');
    }

    public function medicines()
    {
        return $this->hasMany('App\medicinePrescription', 'prescriptionId', 'prescriptionId');
    }
    
    //--------------- function
    public function confirm($pharmacistId)
    {
        $this->pharmacistId = $pharmacistId;
        $this->save();
    }
}
