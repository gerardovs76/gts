<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasExqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_exq', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_antiguo');
            $table->string('nota_exq');
            $table->string('numero_tarea_exq');
            $table->string('descripcion')->nullable();
            $table->string('matriculado_id');
            $table->string('materias_id');
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
        Schema::dropIfExists('notas_exq');
    }
}
