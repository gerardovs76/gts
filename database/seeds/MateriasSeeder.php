<?php

use Illuminate\Database\Seeder;
use App\Materias;
class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     'cedula',
		'materias_apellidos',
		'curso',
		'especialidad',
		'paralelo'
     */
    public function run()
    {
        Materias::create([
            //'matricular_id' => '1',
            'materia' => 'MATEMATICAS',
            'curso' => 'INICIAL 1',
            'especialidad' => 'EDUCACION INICIAL',
            'paralelo' => 'A'
        ]);
        Materias::create([
            //'matricular_id' => '1',
            'materia' => 'QUIMICA',
            'curso' => 'INICIAL 1',
            'especialidad' => 'EDUCACION INICIAL',
            'paralelo' => 'A'
        ]);
        Materias::create([
            //'matricular_id' => '1',
            'materia' => 'FISICA',
            'curso' => 'INICIAL 1',
            'especialidad' => 'EDUCACION INICIAL',
            'paralelo' => 'A'
        ]);
        Materias::create([
            //'matricular_id' => '1',
            'materia' => 'BIOLOGIA',
            'curso' => 'INICIAL 1',
            'especialidad' => 'EDUCACION INICIAL',
            'paralelo' => 'A'
        ]);
        Materias::create([
            //'matricular_id' => '1',
            'materia' => 'EDUC. FISICA',
            'curso' => 'INICIAL 1',
            'especialidad' => 'EDUCACION INICIAL',
            'paralelo' => 'A'
        ]);
        Materias::create([
            //'matricular_id' => '1',
            'materia' => 'HISTORIA',
            'curso' => 'INICIAL 1',
            'especialidad' => 'EDUCACION INICIAL',
            'paralelo' => 'A'
        ]);
    }
}
