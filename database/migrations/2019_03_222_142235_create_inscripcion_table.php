<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula');
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');
            $table->string('edad');
            $table->string('curso');
            $table->string('colegio_proveniente');
            $table->string('direccion_alumno');
            $table->string('sexo');
            $table->string('representante');
            $table->string('tipo_persona');
            $table->string('sector');
            $table->string('email');
            $table->string('profesion');
            $table->string('ocupacion');
            $table->string('cedrepresentante');
            $table->string('nombres_representante');
            $table->string('apellidos_representante');
            $table->string('direccion_representante');
            $table->string('fn_representante');
            $table->string('movil');
            $table->string('convencional');
            $table->string('edad_representante');
            $table->string('observacion');
            $table->string('cedula_padre');
            $table->string('apellidos_padre');
            $table->string('nombres_padre');
            $table->string('direccion_padre');
            $table->string('telefono_padre');
            $table->string('celular_padre');
            $table->string('correo_padre');
            $table->string('profesion_padre');
            $table->string('ocupacion_padre');
            $table->string('cedula_madre');
            $table->string('apellidos_madre');
            $table->string('nombres_madre');
            $table->string('direccion_madre');
            $table->string('telefono_madre');
            $table->string('celular_madre');
            $table->string('correo_madre');
            $table->string('profesion_madre');
            $table->string('ocupacion_madre');
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
        Schema::dropIfExists('inscripciones');
    }
}
