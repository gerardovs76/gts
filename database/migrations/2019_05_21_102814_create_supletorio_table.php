<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupletorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supletorios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('matriculados_id')->unsigned();
            $table->string('promedio_notas');
            $table->string('nota_supletorio');
            $table->string('quimestre');
            $table->string('parcial');
            $table->bigInteger('materias_id')->unsigned();
            $table->foreign('materias_id')->references('id')->on('materias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('matriculados_id')->references('id')->on('matriculados')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('supletorios');
    }
}
