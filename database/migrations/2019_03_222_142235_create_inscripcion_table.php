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
            $table->string('tipo_estudiante');
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
            $table->string('cedula_padre')->nullable();
            $table->string('apellidos_padre')->nullable();
            $table->string('nombres_padre')->nullable();
            $table->string('direccion_padre')->nullable();
            $table->string('telefono_padre')->nullable();
            $table->string('celular_padre')->nullable();
            $table->string('correo_padre')->nullable();
            $table->string('profesion_padre')->nullable();
            $table->string('ocupacion_padre')->nullable();
            $table->string('cedula_madre')->nullable();
            $table->string('codigo_nuevo');
            $table->string('apellidos_madre')->nullable();
            $table->string('nombres_madre')->nullable();
            $table->string('direccion_madre')->nullable();
            $table->string('telefono_madre')->nullable();
            $table->string('celular_madre')->nullable();
            $table->string('correo_madre')->nullable();
            $table->string('profesion_madre')->nullable();
            $table->string('ocupacion_madre')->nullable();
            $table->string('fecha')->nullable();
            $table->string('hora')->nullable();
            $table->string('fecha_creacion');
            $table->string('paralelo')->nullable();
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
