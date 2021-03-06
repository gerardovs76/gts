<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->string('parcial');
            $table->string('quimestre');
            $table->string('justificacionh1')->nullable();
            $table->string('justificacionh2')->nullable();
            $table->string('justificacionh3')->nullable();
            $table->string('justificacionh4')->nullable();
            $table->string('justificacionh5')->nullable();
            $table->string('justificacionh6')->nullable();
            $table->string('justificacionh7')->nullable();
            $table->string('justificacionh8')->nullable();
            $table->string('justificacionh9')->nullable();
            $table->string('h1');
            $table->string('h2');
            $table->string('h3');
            $table->string('h4');
            $table->string('h5');
            $table->string('h6');
            $table->string('h7');
            $table->string('h8');
            $table->string('h9');
            $table->bigInteger('matriculados_id')->unsigned()->nullable();
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
        Schema::dropIfExists('inspecciones');
    }
}
