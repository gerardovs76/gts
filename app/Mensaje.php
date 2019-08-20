<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes';
    protected $fillable = [
    	'envio_id',
    	'recibio_id',
    	'body'


    ];

  
}
