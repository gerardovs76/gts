<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dece', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula');
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');
            $table->string('año_eb_bgu');
            $table->string('nombre_representante');
            $table->string('cedula_representante');
            $table->string('numero_telefono');
            $table->string('numero_movil');
            $table->string('presenta_nee');
            $table->string('nombre_profesional');
            $table->string('remitido_por');
            $table->date('fecha_seguimiento');
            $table->string('descripcion_problema');
            $table->date('fecha');
            $table->string('accion_realizada');
            $table->string('sugerencias_observaciones');
            $table->string('responsable');
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
        Schema::dropIfExists('dece');
    }
}
