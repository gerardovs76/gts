<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('matriculados_id')->unsigned();
            $table->bigInteger('materias_id')->unsigned();
            $table->string('nota_ta')->nullable();
            $table->string('nota_ti')->nullable();
            $table->string('nota_tg')->nullable();
            $table->string('nota_le')->nullable();
            $table->string('nota_ev')->nullable();
            $table->string('descripcion');
            $table->string('parcial');
            $table->string('numero_tarea_ta')->nullable();
            $table->string('numero_tarea_ti')->nullable();
            $table->string('numero_tarea_tg')->nullable();
            $table->string('numero_tarea_le')->nullable();
            $table->string('numero_tarea_ev')->nullable();
            $table->string('numero_conducta')->nullable();
            $table->string('conducta')->nullable();
            $table->string('quimestre');
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
        Schema::dropIfExists('notas');
    }
}
