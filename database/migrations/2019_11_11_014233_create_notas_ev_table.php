<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasEvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_ev', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_antiguo');
            $table->string('nota_ev1');
            $table->string('nota_ev2');
            $table->string('nota_ev3');
            $table->string('nota_ev4');
            $table->string('nota_ev5');
            $table->string('numero_tarea_ev1');
            $table->string('numero_tarea_ev2');
            $table->string('numero_tarea_ev3');
            $table->string('numero_tarea_ev4');
            $table->string('numero_tarea_ev5');
            $table->string('descripcion_ev1')->nullable();
            $table->string('descripcion_ev2')->nullable();
            $table->string('descripcion_ev3')->nullable();
            $table->string('descripcion_ev4')->nullable();
            $table->string('descripcion_ev5')->nullable();
            $table->string('matriculado_id');
            $table->string('materias_id');
            $table->string('parcial');
            $table->string('quimestre');
            $table->string('autoridad_id');
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
        Schema::dropIfExists('notas_ev');
    }
}
