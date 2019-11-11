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
            $table->string('nota_le');
            $table->string('numero_tarea_le');
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
        Schema::dropIfExists('notas_le');
    }
}
