<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbanderadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abanderados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('matriculados_id');
            $table->string('basica_2');
            $table->string('basica_3');
            $table->string('basica_4');
            $table->string('basica_5');
            $table->string('basica_6');
            $table->string('basica_7');
            $table->string('basica_8');
            $table->string('basica_9');
            $table->string('basica_10');
            $table->string('bachillerato_1');
            $table->string('bachillerato_2');
            $table->string('promedio_final');
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
        Schema::dropIfExists('abanderados');
    }
}
