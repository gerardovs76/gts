<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatriculadosCarnet extends Model
{
    protected $table = 'matriculados_carnet';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'imagen',
        'matriculado_id'
    ];
}
