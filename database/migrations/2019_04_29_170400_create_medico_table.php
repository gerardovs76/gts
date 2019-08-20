<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula');
            $table->date('fecha');
            $table->string('nombres_apellidos');
            $table->string('curso');
            $table->string('paralelo');
            $table->string('sexo');
            $table->string('grupo_sanguineo');
            $table->string('peso')->nullable();
            $table->string('talla');
            $table->string('direccion_completa');
            $table->string('plan_vacunacion')->nullable();
            $table->string('enfermedades_padece')->nullable();
            $table->string('reaccion_alergica_alimentos')->nullable();
            $table->string('reaccion_alergica_medicamentos')->nullable();
            $table->string('reaccion_alergica_insectos')->nullable();
            $table->string('reaccion_alergica_otros')->nullable();
            $table->string('bajo_tratamiento')->nullable();
            $table->string('p_padecio')->nullable();
            $table->string('nombres_completos_1');
            $table->string('nombres_completos_2');
            $table->string('nombres_completos_3');
            $table->string('telef_fijo_1');
            $table->string('telef_fijo_2');
            $table->string('telef_fijo_3');
            $table->string('movil_1');
            $table->string('movil_2');
            $table->string('movil_3');
            $table->string('apellidos_nombres_madre');
            $table->string('apellidos_nombres_padre');
            $table->string('direccion_madre');
            $table->string('telefono_madre');
            $table->string('celular_madre');
            $table->string('direccion_padre');
            $table->string('telefono_padre');
            $table->string('celular_padre');
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
        Schema::dropIfExists('medico');
    }
}
