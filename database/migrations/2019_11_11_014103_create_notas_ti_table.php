<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_ti', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_antiguo');
            $table->string('nota_ti1');
            $table->string('nota_ti2');
            $table->string('nota_ti3');
            $table->string('nota_ti4');
            $table->string('nota_ti5');
            $table->string('numero_tarea_ti1');
            $table->string('numero_tarea_ti2');
            $table->string('numero_tarea_ti3');
            $table->string('numero_tarea_ti4');
            $table->string('numero_tarea_ti5');
            $table->string('descripcion_ti1')->nullable();
            $table->string('descripcion_ti2')->nullable();
            $table->string('descripcion_ti3')->nullable();
            $table->string('descripcion_ti4')->nullable();
            $table->string('descripcion_ti5')->nullable();
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
        Schema::dropIfExists('notas_ti');
    }
}
