<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Users
      /*   Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ve en detalle cada usuario del sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',
        ]);

        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un rol',
            'slug'          => 'roles.show',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        //Inscripcion
        Permission::create([
            'name'          => 'Navegar inscripcion',
            'slug'          => 'inscripcion.index',
            'description'   => 'Lista y navega todos los inscripcion del sistema',
        ]);

        Permission::create([
            'name'          => 'Crear una inscripcion',
            'slug'          => 'inscripcion.create',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Poder guardar la creacion de la inscripcion',
            'slug'          => 'inscripcion.store',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver una inscripcion ya creada',
            'slug'          => 'inscripcion.show',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Editar una inscripcion',
            'slug'          => 'inscripcion.edit',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar una inscripcion editada',
            'slug'          => 'inscripcion.update',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de inscripcion',
            'slug'          => 'inscripcion.perfil',
            'description'   => 'Podría crear nuevos inscripcion en el sistema',
        ]);

        Permission::create([
            'name'          => 'Reportes de inscripcion',
            'slug'          => 'inscripcion.reportes',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Exportar a EXCEL inscripcion',
            'slug'          => 'inscripcion.excel',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Importar inscripcion',
            'slug'          => 'inscripcion.importar',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        //matricular
        Permission::create([
            'name'          => 'Navegar matricular',
            'slug'          => 'matricular.index',
            'description'   => 'Lista y navega todos los matricular del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación matriculados',
            'slug'          => 'matricular.create',
            'description'   => 'Podría crear nuevos matricular en el sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar un  matriculado',
            'slug'          => 'matricular.store',
            'description'   => 'Podría crear nuevos matricular en el sistema',
        ]);
        Permission::create([
            'name'          => 'Editar matriculados',
            'slug'          => 'matricular.edit',
            'description'   => 'Podría crear nuevos matricular en el sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar matriculados editados',
            'slug'          => 'matricular.update',
            'description'   => 'Podría crear nuevos matricular en el sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar una inscripcion',
            'slug'          => 'inscripcion.destroy',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Reportes de los matriculados',
            'slug'          => 'matricular.reportes',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        //Profesor
        Permission::create([
            'name'          => 'Navegar materia',
            'slug'          => 'profesor.index',
            'description'   => 'Lista y navega todos los profesor del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de profesor',
            'slug'          => 'profesor.create',
            'description'   => 'Podría crear nuevos profesor en el sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar a un profesor creado',
            'slug'          => 'profesor.store',
            'description'   => 'Podría crear nuevos profesor en el sistema',
        ]);
        Permission::create([
            'name'          => 'Editar un profesor',
            'slug'          => 'profesor.edit',
            'description'   => 'Podría crear nuevos profesor en el sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar un profesor editado',
            'slug'          => 'profesor.update',
            'description'   => 'Podría crear nuevos profesor en el sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalles del profesor',
            'slug'          => 'profesor.show',
            'description'   => 'Podría crear nuevos profesor en el sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar un profesor',
            'slug'          => 'profesor.destroy',
            'description'   => 'Podría crear nuevos profesor en el sistema',
        ]);

        Permission::create([
            'name'          => 'Perfil de profesor',
            'slug'          => 'profesor.perfil',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Añadir materias al profesor',
            'slug'          => 'profesor.añadirMaterias',
            'description'   => '',
        ]);

        Permission::create([
            'name'          => 'Ver materias asignadas al profesor profesor',
            'slug'          => 'profesor.verMaterias',
            'description'   => '',
        ]);
        //Materias
        Permission::create([
            'name'          => 'Navegar materias',
            'slug'          => 'materias.index',
            'description'   => 'Lista y navega todos los materias del sistema',
        ]);

        Permission::create([
            'name'          => 'Creacion de materias especiales',
            'slug'          => 'materias.especiales',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de materias',
            'slug'          => 'materias.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar una materia creada',
            'slug'          => 'materias.store',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        Permission::create([
            'name'          => 'Editar una materia',
            'slug'          => 'materias.edit',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar una materia editada',
            'slug'          => 'materias.update',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de materia',
            'slug'          => 'materias.show',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar una materia',
            'slug'          => 'materias.destroy',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        Permission::create([
            'name'          => 'Malla curricular',
            'slug'          => 'materias.curso',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        //Notas
        Permission::create([
            'name'          => 'Ingresar notas',
            'slug'          => 'notas.index',
            'description'   => 'Lista y navega todos los notas del sistema',
        ]);

        Permission::create([
            'name'          => 'Ingresar notas especiales',
            'slug'          => 'notas.especiales',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver notas',
            'slug'          => 'notas.cargadas',
            'description'   => 'Podría crear nuevos notas en el sistema',
        ]);

        Permission::create([
            'name'          => 'Supletorios',
            'slug'          => 'notas.supletorios',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Remedial',
            'slug'          => 'notas.remedial',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Gracia',
            'slug'          => 'notas.gracia',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        //Inspeccion
        Permission::create([
            'name'          => 'Asistencias',
            'slug'          => 'inspeccion.index',
            'description'   => 'Lista y navega todos los inspeccion del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear Asistencias',
            'slug'          => 'inspeccion.create',
            'description'   => 'Lista y navega todos los inspeccion del sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar asistencias',
            'slug'          => 'inspeccion.store',
            'description'   => 'Lista y navega todos los inspeccion del sistema',
        ]);
        Permission::create([
            'name'          => 'Editar asistencias',
            'slug'          => 'inspeccion.edit',
            'description'   => 'Lista y navega todos los inspeccion del sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar asistencia editada',
            'slug'          => 'inspeccion.update',
            'description'   => 'Lista y navega todos los inspeccion del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de asistencias',
            'slug'          => 'inspeccion.show',
            'description'   => 'Lista y navega todos los inspeccion del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar asistencias',
            'slug'          => 'inspeccion.destroy',
            'description'   => 'Lista y navega todos los inspeccion del sistema',
        ]);
        //DECE
        Permission::create([
            'name'          => 'DECE',
            'slug'          => 'dece.index',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear DECE',
            'slug'          => 'dece.create',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar DECE',
            'slug'          => 'dece.store',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Editar DECE',
            'slug'          => 'dece.edit',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar DECE editado',
            'slug'          => 'dece.update',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalles del DECE',
            'slug'          => 'dece.show',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar DECE',
            'slug'          => 'dece.destroy',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);
        //RR.HH
        Permission::create([
            'name'          => 'Ingresar profesor',
            'slug'          => 'recursos_humanos.index',
            'description'   => 'Podría crear nuevos inspeccion en el sistema',
        ]);
         Permission::create([
            'name'          => 'Crear RR HH',
            'slug'          => 'recursos_humanos.create',
            'description'   => 'Podría crear nuevos inspeccion en el sistema',
        ]);
          Permission::create([
            'name'          => 'Guardar RR HH',
            'slug'          => 'recursos_humanos.store',
            'description'   => 'Podría crear nuevos inspeccion en el sistema',
        ]);
           Permission::create([
            'name'          => 'Editar RR HH',
            'slug'          => 'recursos_humanos.edit',
            'description'   => 'Podría crear nuevos inspeccion en el sistema',
        ]);
            Permission::create([
            'name'          => 'Guardar RR HH editado',
            'slug'          => 'recursos_humanos.update',
            'description'   => 'Podría crear nuevos inspeccion en el sistema',
        ]);
             Permission::create([
            'name'          => 'Ver detalle del RR HH',
            'slug'          => 'recursos_humanos.show',
            'description'   => 'Podría crear nuevos inspeccion en el sistema',
        ]);
              Permission::create([
            'name'          => 'Eliminar RR HH',
            'slug'          => 'recursos_humanos.destroy',
            'description'   => 'Podría crear nuevos inspeccion en el sistema',
        ]);
        //MEDICO
        Permission::create([
            'name'          => 'Ficha medica',
            'slug'          => 'medico.index',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear ficha medica',
            'slug'          => 'medico.create',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar ficha medica',
            'slug'          => 'medico.store',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Editar ficha medica',
            'slug'          => 'medico.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar ficha medica editada',
            'slug'          => 'medico.update',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalles de la ficha medica',
            'slug'          => 'medico.show',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar ficha medica',
            'slug'          => 'medico.destroy',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Ingresar obsevacion',
            'slug'          => 'medico.observacion',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        //COBROS
        Permission::create([
            'name'          => 'Ingresar valores',
            'slug'          => 'cobros.index',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
         Permission::create([
            'name'          => 'Crear valores',
            'slug'          => 'cobros.create',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
          Permission::create([
            'name'          => 'Guardar valores',
            'slug'          => 'cobros.store',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
           Permission::create([
            'name'          => 'Editar valores',
            'slug'          => 'cobros.edit',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
            Permission::create([
            'name'          => 'Guardar valores editados',
            'slug'          => 'cobros.update',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
             Permission::create([
            'name'          => 'Ver detalles de los valores',
            'slug'          => 'cobros.show',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
              Permission::create([
            'name'          => 'Eliminar valores',
            'slug'          => 'cobros.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        //TAREAS
        Permission::create([
            'name'          => 'Asignar tarea',
            'slug'          => 'tareas.index',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Crear tarea',
            'slug'          => 'tareas.create',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar tarea',
            'slug'          => 'tareas.store',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Editar tarea',
            'slug'          => 'tareas.edit',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Guardar tarea editada',
            'slug'          => 'tareas.update',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver tarea',
            'slug'          => 'tareas.show',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar tarea',
            'slug'          => 'tareas.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        //HORARIOS
        Permission::create([
            'name'          => 'Ver',
            'slug'          => 'horarios.index',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        //EVENTOS
        Permission::create([
            'name'          => 'Eventos',
            'slug'          => 'events.index',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Añadir evento',
            'slug'          => 'events.add',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);
        //ESTADISTICAS
        Permission::create([
            'name'          => 'Ver grafico',
            'slug'          => 'grafico.index',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);

        //MENSAJERIA
        Permission::create([
            'name'          => 'Enviar mensaje',
            'slug'          => 'mensaje.index',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]); */
        Role::create([
            'name'      => 'Super-admin',
            'slug'      => 'super-admin',
            'special'   => 'all-access'
        ]);
         Role::create([
            'name'      => 'Admin',
            'slug'      => 'admin',
            'special'   => ''
        ]);
          Role::create([
            'name'      => 'Profesor',
            'slug'      => 'profesor',
            'special'   => ''
        ]);
           Role::create([
            'name'      => 'Alumno',
            'slug'      => 'alumno',
            'special'   => ''
        ]);
            Role::create([
            'name'      => 'Suspendido',
            'slug'      => 'suspendido',
            'special'   => 'no-access'
        ]);
    }
}
