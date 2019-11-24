<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_ta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nota_ta1');
            $table->string('nota_ta2');
            $table->string('nota_ta3');
            $table->string('nota_ta4');
            $table->string('nota_ta5');
            $table->string('numero_tarea_ta1');
            $table->string('numero_tarea_ta2');
            $table->string('numero_tarea_ta3');
            $table->string('numero_tarea_ta4');
            $table->string('numero_tarea_ta5');
            $table->string('descripcion_ta1')->nullable();
            $table->string('descripcion_ta2')->nullable();
            $table->string('descripcion_ta3')->nullable();
            $table->string('descripcion_ta4')->nullable();
            $table->string('descripcion_ta5')->nullable();
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
        Schema::dropIfExists('notas_ta');
    }
}
