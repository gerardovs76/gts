<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecuperacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recuperacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('matriculados_id');
            $table->string('nota_recuperacion');
            $table->string('promedio_notas');
            $table->bigInteger('quimestre');
            $table->bigInteger('parcial');
            $table->bigInteger('materias_id');
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
        Schema::dropIfExists('recuperacion');
    }
}
