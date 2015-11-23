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
    protected $primaryKey = 'medicineId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'medicineId',
        'medicineName',
        'description',
        'medicineType'];
}
