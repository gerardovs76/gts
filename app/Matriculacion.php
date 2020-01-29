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
public function notas_ta()
{
    return $this->hasMany('App\Nota_ta', 'matriculado_id');
}
public function notas_ti()
{
    return $this->hasMany('App\Notas_ti', 'matriculado_id');
}
public function notas_tg()
{
    return $this->hasMany('App\Notas_tg', 'matriculado_id');
}
public function notas_le()
{
    return $this->hasMany('App\Notas_le', 'matriculado_id');
}
public function notas_ev()
{
    return $this->hasMany('App\Notas_ev', 'matriculado_id');
}
public function notas_conducta()
{
    return $this->hasMany('App\Notas_conducta', 'matriculados_id');
}
public function notas_examen()
{
    return $this->hasMany('App\Notas_examen', 'matriculado_id');
}
public function notas_ta_final()
{
    return $this->hasMany('App\Nota_ta', 'matriculado_id')->groupBy('matriculado_id', 'materias_id');
}
public function inscripcion()
{
    return $this->hasOne('App\Inscripcion', 'cedula', 'cedula');
}
public function materias()
{
    return $this->hasMany('App\Materias', 'curso', 'curso');
}
public function notas_promedio()
{
    return $this->hasManyThrough('App\Nota_ta','App\Notas_ti','App\Notas_tg','App\Notas_le','App\Notas_ev', 'matriculado_id');
}
//POR PARCIAL
//PARCIAL1 
public function notas_ta1()
{
    return $this->hasMany('App\Nota_ta', 'matriculado_id')->where('parcial', '1');
}
public function notas_ti1()
{
    return $this->hasMany('App\Notas_ti', 'matriculado_id')->where('parcial', '1');
}
public function notas_tg1()
{
    return $this->hasMany('App\Notas_tg', 'matriculado_id')->where('parcial', '1');
}
public function notas_le1()
{
    return $this->hasMany('App\Notas_le', 'matriculado_id')->where('parcial', '1');
}
public function notas_ev1()
{
    return $this->hasMany('App\Notas_ev', 'matriculado_id')->where('parcial', '1');
}
public function notas_conducta1()
{
    return $this->hasMany('App\Notas_conducta', 'matriculados_id')->where('parcial', '1');
}
//PARCIAL2
public function notas_ta2()
{
    return $this->hasMany('App\Nota_ta', 'matriculado_id')->where('parcial', '2');
}
public function notas_ti2()
{
    return $this->hasMany('App\Notas_ti', 'matriculado_id')->where('parcial', '2');
}
public function notas_tg2()
{
    return $this->hasMany('App\Notas_tg', 'matriculado_id')->where('parcial', '2');
}
public function notas_le2()
{
    return $this->hasMany('App\Notas_le', 'matriculado_id')->where('parcial', '2');
}
public function notas_ev2()
{
    return $this->hasMany('App\Notas_ev', 'matriculado_id')->where('parcial', '2');
}
public function notas_conducta2()
{
    return $this->hasMany('App\Notas_conducta', 'matriculados_id')->where('parcial', '2');
}
//PARCIAL 3
public function notas_ta3()
{
    return $this->hasMany('App\Nota_ta', 'matriculado_id')->where('parcial', '3');
}
public function notas_ti3()
{
    return $this->hasMany('App\Notas_ti', 'matriculado_id')->where('parcial', '3');
}
public function notas_tg3()
{
    return $this->hasMany('App\Notas_tg', 'matriculado_id')->where('parcial', '3');
}
public function notas_le3()
{
    return $this->hasMany('App\Notas_le', 'matriculado_id')->where('parcial', '3');
}
public function notas_ev3()
{
    return $this->hasMany('App\Notas_ev', 'matriculado_id')->where('parcial', '3');
}
public function notas_conducta3()
{
    return $this->hasMany('App\Notas_conducta', 'matriculados_id')->where('parcial', '3');
}

}
