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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'appointementId',
        'pharmacistId'];

    //--------------- relationship

    public function diagRecord()
    {
        return $this->belongsTo('App\diagnosisRecord', 'diagRecordId');
    }
}
