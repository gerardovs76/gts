<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriculacion extends Model
{

    protected $table = 'matriculados';
     protected $primaryKey = 'id';
    protected $fillable = [
        'inscripcion_id',
    	'cedula',
    	'nombres',
    	'apellidos',
    	'curso',
    	'especialidad',
    	'paralelo',
        'cedula_r',
        'razon_social',
        'direccion_factura',
        'telefono_factura',
        'codigo',
        'tipo_estudiante',
        'fecha_creacion',
        'foto_carnet'
    ];




public function inspecciones()
{
    return $this->hasMany('App\Inspecciones', 'matriculados_id');
}

public function facturaciones()
{
    return $this->hasMany('App\Facturacion', 'codigo', 'codigo');
}
public function recuperaciones()
{
    return $this->hasMany('App\Recuperacion', 'matriculados_id');
}
public function notas()
{
    return $this->hasMany('App\Notas', 'matriculados_id');
}
public function remediales()
{
    return $this->hasMany('App\Remediales', 'matriculados_id');
}
public function supletorios()
{
    return $this->hasMany('App\Supletorio', 'matriculados_id');
}
public function inscripcion()
{
    return $this->hasOne('App\Inscripcion', 'cedula', 'cedula');
}
public function materias()
{
    return $this->hasMany('App\Materias', 'curso', 'curso');
}
}
