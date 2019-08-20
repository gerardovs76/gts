<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicoObservacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico_observacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('matriculados_id')->unsigned();
            $table->date('fecha');
            $table->string('diagnostico');
            $table->string('medicamentos');
            $table->mediumText('observacion');
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
        Schema::dropIfExists('medico_observacion');
    }
}
