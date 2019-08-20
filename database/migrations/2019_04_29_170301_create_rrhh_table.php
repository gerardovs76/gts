<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRrhhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos_humanos', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();
            $table->string('cedula')->nullable();
            $table->string('nombres_apellidos')->nullable();
            $table->string('apellidos_paternos')->nullable();
            $table->string('apellidos_maternos')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('provincia')->nullable();
            $table->string('parroquia')->nullable();
            $table->string('canton')->nullable();
            $table->string('numero_telefono_domicilio')->nullable();
            $table->string('numero_telefono_celular')->nullable();
            $table->string('institucion_bancaria')->nullable();
            $table->string('numero_cuenta')->nullable();
            $table->string('tipo_cuenta')->nullable();
            $table->string('correo_electronico')->nullable();
            $table->string('t_zapatos')->nullable();
            $table->string('t_pantalon')->nullable();
            $table->string('t_camiseta')->nullable();
            $table->string('avenida')->nullable();
            $table->string('calle')->nullable();
            $table->string('pasaje')->nullable();
            $table->string('jiron')->nullable();
            $table->string('urb_lugar')->nullable();
            $table->string('sector')->nullable();
            $table->string('numero')->nullable();
            $table->string('transversal')->nullable();
            $table->string('referencia')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('apellidos_paternos_c')->nullable();
            $table->string('apellidos_maternos_c')->nullable();
            $table->string('nombres_conyugue')->nullable();
            $table->string('fecha_nacimiento_conyugue')->nullable();
            $table->string('lugar_donde_labora')->nullable();
            $table->string('apellidos_nombres_hijos')->nullable();
            $table->string('fecha_nacimiento_hijos')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('estado_civil_hijos')->nullable();
            $table->string('vive_con_usted')->nullable();
            $table->string('apellidos_nombres_familiares')->nullable();
            $table->string('parentesco')->nullable();
            $table->string('direccion_telefono')->nullable();
            $table->string('educacion');
            $table->string('completa_incompleta')->nullable();
            $table->string('desde')->nullable();
            $table->string('hasta')->nullable();
            $table->string('educacion_superior')->nullable();
            $table->string('especialidad')->nullable();
            $table->string('centro_de_estudios')->nullable();
            $table->string('desde_edu_supe')->nullable();
            $table->string('hasta_edu_supe')->nullable();
            $table->string('completa_incompleta_edu_sup')->nullable();
            $table->string('grado_academico_obtenido')->nullable();
            $table->string('idioma_dialecto')->nullable();
            $table->string('lee')->nullable();
            $table->string('habla')->nullable();
            $table->string('escribe')->nullable();
            $table->string('nombre_empresa')->nullable();
            $table->string('fecha_entrada_empresa')->nullable();
            $table->string('fecha_salida_empresa');
            $table->string('cargo')->nullable();
            $table->string('funciones_especificas')->nullable();
            $table->string('nombre_jefe')->nullable();
            $table->string('motivo_salida')->nullable();
            $table->string('telefono_de_empresa')->nullable();
            $table->string('huellas_digitales')->nullable();
            $table->string('croquis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recursos_humanos');
    }
}
