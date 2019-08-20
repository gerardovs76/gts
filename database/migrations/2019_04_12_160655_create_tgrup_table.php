<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTgrupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas_grupales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tarea_grupal');
            $table->string('descripcion');
            $table->string('numero_tarea');
            $table->string('parcial');
            $table->bigInteger('materias_id')->unsigned()->nullable();
            $table->bigInteger('matriculados_id')->unsigned()->nullable();
            $table->foreign('matriculados_id')->references('id')->on('matriculados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('materias_id')->references('id')->on('materias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tareas_grupales');
    }
}
