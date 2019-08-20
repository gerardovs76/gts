<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControlProfesor extends Model
{
    protected $table = 'control_profesor';

    protected $fillable = [
    	'user_id',
    	'login',
    	'logout',
    ];
}
