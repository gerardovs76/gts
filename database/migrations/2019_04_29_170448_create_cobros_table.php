<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobros', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->string('curso');
            $table->string('fecha');
            $table->string('matricula');
            $table->string('pension');
            $table->string('servicio_copiado');
            $table->string('colada_morada');
            $table->string('mantenimiento');
            $table->string('agenda');
            $table->string('seguro_accidentes');
            $table->string('piscina');
            $table->string('uniformes')->nullable();
            $table->string('total');
            $table->string('tipo_estudiante');
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
        Schema::dropIfExists('cobros');
    }
}
