<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_tg', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('id_antiguo');
             $table->string('nota_tg1');
             $table->string('nota_tg2');
             $table->string('nota_tg3');
             $table->string('nota_tg4');
             $table->string('nota_tg5');
             $table->string('numero_tarea_tg1');
             $table->string('numero_tarea_tg2');
             $table->string('numero_tarea_tg3');
             $table->string('numero_tarea_tg4');
             $table->string('numero_tarea_tg5');
             $table->string('descripcion_tg1')->nullable();
             $table->string('descripcion_tg2')->nullable();
             $table->string('descripcion_tg3')->nullable();
             $table->string('descripcion_tg4')->nullable();
             $table->string('descripcion_tg5')->nullable();
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
        Schema::dropIfExists('notas_tg');
    }
}
