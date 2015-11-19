<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'doctor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId',
        'proficiency'];

    //-------------  relationship
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }
}
