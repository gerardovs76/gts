<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_profesores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('profesores_id')->unsigned();
            $table->bigInteger('materias_id')->unsigned();
            $table->foreign('profesores_id')->references('id')->on('profesors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('materias_id')->references('id')->on('materias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('materias_profesores');
    }
}
