<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicinePrescription extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medicinePrescription';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'medicineId',
        'quantity',
        'instruction',
        'note'];

    //-------------  relationship

      public function medicines()
      {
      	return $this->hasMany('App/medicine','medicineId');
      }
}
