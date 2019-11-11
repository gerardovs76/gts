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
            $table->string('nota_ev');
            $table->string('numero_tarea_ev');
            $table->string('descripcion')->nullable();
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
