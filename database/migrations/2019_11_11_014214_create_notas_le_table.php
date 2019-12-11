<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasLeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_le', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_antiguo');
            $table->string('nota_le1');
            $table->string('nota_le2');
            $table->string('nota_le3');
            $table->string('nota_le4');
            $table->string('nota_le5');
            $table->string('numero_tarea_le1');
            $table->string('numero_tarea_le2');
            $table->string('numero_tarea_le3');
            $table->string('numero_tarea_le4');
            $table->string('numero_tarea_le5');
            $table->string('descripcion_le1')->nullable();
            $table->string('descripcion_le2')->nullable();
            $table->string('descripcion_le3')->nullable();
            $table->string('descripcion_le4')->nullable();
            $table->string('descripcion_le5')->nullable();
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
        Schema::dropIfExists('notas_le');
    }
}
