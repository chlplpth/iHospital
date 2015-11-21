<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hospitalStaff extends Model
{
    ///**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hospitalStaff';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId',
        'departmentId'];

    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }
}
