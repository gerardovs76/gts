<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula', 11);
            $table->string('nombres_apellidos');
            $table->string('direccion');
            $table->date('fecha_nacimiento');
            $table->string('correo', 50);
            $table->string('movil', 16);
            $table->string('convencional', 16);
            $table->text('perfil_docente');
            $table->string('ultimo_trabajo', 100);
            $table->string('tipo_contrato', 50);
            $table->string('cargo', 50);
            $table->foreign('cedula')->references('cedula')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('profesors');
    }
}
