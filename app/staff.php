<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    protected $fillable = [
        'userId',
        'grant' ];
    protected $primaryKey = 'userId';
}
