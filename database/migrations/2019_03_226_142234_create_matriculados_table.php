<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculados', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('inscripcion_id')->unsigned()->nullable();  
            $table->string('cedula');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('curso');
            $table->string('especialidad')->nullable();
            $table->string('paralelo');
            $table->string('cedula_ruc');
            $table->string('razon_social');
            $table->string('direccion_factura');
            $table->string('telefono_factura');
            $table->string('tipo_estudiante');
            $table->string('fecha_creacion');
            $table->string('codigo')->nullable();
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
        Schema::dropIfExists('matriculados');
    }
}
