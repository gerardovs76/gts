<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('inscripcion', 'InscripcionController@store')->name('inscripcion.store');

Route::get('inscripcion/create', 'InscripcionController@create')->name('inscripcion.create');

Route::get('inscripcion/busqueda-antiguos/{codigo}', 'InscripcionController@busquedaAntiguos');

Route::get('users/{cedula}', 'UserController@asignarRol');

Route::get('salvar-notas_ta', 'SaveControllerApp@salvarNotasTa');
Route::get('salvar-notas_ti', 'SaveControllerApp@salvarNotasTi');
Route::get('salvar-notas_tg', 'SaveControllerApp@salvarNotasTg');
Route::get('salvar-notas_ev', 'SaveControllerApp@salvarNotasEv');
Route::get('salvar-notas_le', 'SaveControllerApp@salvarNotasLe');
Route::get('salvar-notas_conducta', 'SaveControllerApp@salvarNotasConducta');
Route::get('salvar-notas_examen', 'SaveControllerApp@salvarNotasExamen');

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
//INSCRIPCION
Route::middleware(['auth'])->group(function(){

Route::get('home-asistencia', 'HomeController@asistencia');

Route::get('inscripcion', 'InscripcionController@index')->name('inscripcion.index')->middleware('has.permission:inscripcion.index');
Route::get('inscripcion/reportes/inscripcion', 'InscripcionController@exportarInscripciones')->name('inscripcion.reportesInscritos')->middleware('has.permission:inscripcion.reportesInscritos');

Route::put('inscripcion/{inscripcion}', 'InscripcionController@update')->name('inscripcion.update')->middleware('has.permission:inscripcion.update');

Route::get('inscripcion/{inscripcion}', 'InscripcionController@show')->name('inscripcion.show')->middleware('has.permission:inscripcion.show');

Route::delete('inscripcion/{inscripcion}', 'InscripcionController@destroy')->name('inscripcion.destroy')->middleware('has.permission:inscripcion.destroy');

Route::get('inscripcion/{inscripcion}/edit', 'InscripcionController@edit')->name('inscripcion.edit')->middleware('has.permission:inscripcion.edit');

Route::get('inscripcion_perfil', 'InscripcionController@perfil')->name('inscripcion.perfil')->middleware('has.permission:inscripcion.perfil');

Route::get('busqueda_perfil_cedula/{cedula}', 'InscripcionController@buscarPerfilCedula');

Route::get('busqueda_perfil_apellidos/{apellidos}', 'InscripcionController@buscarPerfilApellidos');

Route::post('import', 'InscripcionController@import')->name('inscripcion.import')->middleware('has.permission:inscripcion.import');

Route::get('importar_data', 'InscripcionController@importarDatos')->name('inscripcion.importar')->middleware('has.permission:inscripcion.importar');

Route::get('exportar_usuarios', 'InscripcionController@buscarReporteInscritosUsuarios')->name('exportar.usuarios')->middleware('has.permission:exportar.usuarios');

Route::post('exportar_inscripciones', 'InscripcionController@exportInscritos')->name('exportar.inscripciones')->middleware('has.permission:exportar.inscripciones');
//PROFESOR
Route::get('profesor', 'ProfesorController@index')->name('profesor.index')->middleware('has.permission:profesor.index');

Route::post('profesor', 'ProfesorController@store')->name('profesor.store')->middleware('has.permission:profesor.store');

Route::get('profesor/create', 'ProfesorController@create')->name('profesor.create')->middleware('has.permission:profesor.create');

Route::put('profesor/{profesor}', 'ProfesorController@update')->name('profesor.update')->middleware('has.permission:profesor.update');

Route::get('profesor/{profesor}', 'ProfesorController@show')->name('profesor.show')->middleware('has.permission:profesor.show');

Route::delete('profesor/{profesor}', 'ProfesorController@destroy')->name('profesor.destroy')->middleware('has.permission:profesor.destroy');

Route::get('profesor/{profesor}/edit', 'ProfesorController@edit')->name('profesor.edit')->middleware('has.permission:profesor.edit');

Route::get('profesor_perfil', 'ProfesorController@perfil')->name('profesor.perfil')->middleware('has.permission:profesor.perfil');

Route::get('profesor_perfil_cedula/{cedula}', 'ProfesorController@perfilProfesorCedula');

Route::get('añadir_materias', 'ProfesorController@añadirMateriasProfesor')->name('profesor.añadirMaterias')->middleware('has.permission:profesor.añadirMaterias');

Route::get('añadir_materias_profesor/{cedula}', 'ProfesorController@buscarMateriasProfesor');

Route::get('verMaterias_profesor', 'ProfesorController@verProfesorMaterias')->name('profesor.verMaterias')->middleware('has.permission:profesor.verMaterias');

Route::get('ver_materias_profesor/{cedula}', 'ProfesorController@verMateriasProfesor');

Route::get('control_profesor','ProfesorController@controlProfesor')->name('profesor.control')->middleware('has.permission:profesor.control');

Route::get('control_profesor_notas', 'ProfesorController@controlNotasProfesor');


//MATERIAS
Route::get('materias', 'MateriasController@index')->name('materias.index')->middleware('has.permission:materias.index');

Route::post('materias', 'MateriasController@store')->name('materias.store')->middleware('has.permission:materias.store');

Route::get('materias/create', 'MateriasController@create')->name('materias.create')->middleware('has.permission:materias.create');

Route::put('materias/{materias}', 'MateriasController@update')->name('materias.update')->middleware('has.permission:materias.update');

Route::get('materias/{materias}', 'MateriasController@show')->name('materias.show')->middleware('has.permission:materias.show');

Route::delete('materias/{materias}', 'MateriasController@destroy')->name('materias.destroy')->middleware('has.permission:materias.destroy');

Route::get('eliminar-materias-profesor/{materias}', 'MateriasController@deleteMateriasAsignadasProfesor');

Route::get('materias/{materias}/edit', 'MateriasController@edit')->name('materias.edit')->middleware('has.permission:materias.edit');

Route::get('materias-import', 'MateriasController@importMaterias')->name('materias.import-materias');

Route::post('materias-store-import', 'MateriasController@importMateriaStore')->name('materias.store-materias-import');

Route::get('materiaEspeciales', 'MateriasController@materiaEspecial')->name('materias.especiales')->middleware('has.permission:materias.especiales');

Route::post('materiasE', 'MateriasController@materiaEspecialStore')->name('materiaEspecial.store')->middleware('has.permission:materiaEspecial.store');

Route::get('añadir_materias_curso/{curso}/{paralelo}', 'MateriasController@buscarMateriasAñadir');

Route::post('añadir_materias_store', 'MateriasController@añadirMateriaStore')->name('materiasAñadir.store')->middleware('has.permission:materiasAñadir.store');
//NOTAS
Route::get('notas', 'NotasController@index')->name('notas.index')->middleware('has.permission:notas.index');

Route::post('notas', 'NotasController@store')->name('notas.store')->middleware('has.permission:notas.store');

Route::get('notas/{id}/{tt}/edit', 'NotasController@edit')->name('notas.edit');

Route::get('notas/{id}/{tt}/destroy', 'NotasController@destroy');

Route::put('notas/{id}/{tt}', 'NotasController@update')->name('notas.update');

Route::get('buscar_notas/{curso}/{paralelo}', 'NotasController@buscarMateriaAlumno');

Route::get('buscar_alumnos/{cursos}/{paralelo}/{materia}/{parcial}/{quimestre}', 'NotasController@buscarAlumnoNotas');

Route::get('buscar_alumnos2/{cursos}/{paralelo}', 'NotasController@buscarAlumnoNotas2');

Route::get('asignar_nota/{curso}/{especialidad}/{paralelo}', 'TrabajosAcademicosController@asignarNota');

Route::get('mostrar_notas/{curso}', 'NotasController@mostrardatosAlumnos');

Route::post('notas/store/examen', 'NotasController@examenQuimestralStore')->name('notas.store-examen');

Route::get('notas-editar', 'NotasController@editarNotas')->name('notas.editar-notas')->middleware('has.permission:notas.editar-notas');

Route::get('mostrar_porcentaje/{curso}', 'NotasController@mostrarPorcentajeAlumnos');

Route::get('ver_notas_cargadas', 'NotasController@verNotasCargadas')->name('notas.cargadas')->middleware('has.permission:notas.cargadas');

Route::get('notas/cargar-notas-profesor', 'NotasController@cargarMateriasProfesor');

Route::get('notas/cargar-notas-profesor-paralelo', 'NotasController@cargarMateriasProfesorParalelo');

Route::get('notas/cargar-materias/{curso}/{paralelo}', 'NotasController@cargarMateriasProfesorView');

Route::get('cargar_materia/{curso}/{paralelo}', 'NotasController@cargarNotas');

Route::get('cargar-materias-recuperacion/{curso}/{paralelo}', 'NotasController@cargarMateriasRecuperacion');

Route::get('cargar_materia/especial/{curso}/{paralelo}', 'NotasController@cargarMateriasEspecialesProfesorView');

Route::post('cargar_notas', 'NotasController@cargarNotasAlumnos')->name('notas.cargar-notas-store');

Route::post('notas/cargar-notas-alumnos', 'NotasController@cargarNotasParaAlumnos')->name('notas.cargar-notas-alumnos');

Route::get('notas/cargar-materias-alumnos/{cedula}', 'NotasController@cargarMateriasAlumnos');

Route::post('cargar_notas/especial', 'NotasController@cargarNotasEspecialesAlumnos')->name('notas.cargar-notas-especiales-store');

Route::get('notas_supletorios', 'NotasController@supletoriosNotas')->name('notas.supletorios')->middleware('has.permission:notas.supletorios');

Route::Get('suma_supletorio/{curso}/{paralelo}/{quimestre}/{parcial}/{materia}', 'NotasController@sumaSupletorio');

Route::get('suma-recuperacion/{curso}/{paralelo}/{quimestre}/{parcial}/{materia}', 'NotasController@sumaRecuperacion');

Route::post('supletorio_store', 'NotasController@supletorioStore')->name('supletorios.store')->middleware('has.permission:supletorios.store');

Route::get('supletorios_promedio', 'NotasController@promedioSupletorio');

Route::get('recuperacion-promedio/{curso}/{paralelo}/{quimestre}/{parcial}/{materia}', 'NotasController@promedioRecuperacion');

Route::post('recuperacion-store', 'NotasController@recuperacionStore')->name('recuperacion.store');

Route::get('remedial', 'NotasController@remedialNotas')->name('notas.remedial')->middleware('has.permission:notas.remedial');

Route::get('remedial_supletorio/{curso}/{paralelo}/{quimestre}/{parcial}/{materia}', 'NotasController@remedialPromedioSupletorio');

Route::post('remediales', 'NotasController@remedialStore')->name('remediales.store')->middleware('has.permission:remediales.store');

Route::get('remedial_porcentaje', 'NotasController@remedialPromedio');

Route::get('gracia', 'NotasController@gracia')->name('notas.gracia')->middleware('has.permission:notas.gracia');

Route::get('gracia_remedial/{curso}/{paralelo}/{quimestre}/{parcial}/{materia}', 'NotasController@graciaRemedialPromedio');

Route::post('gracias', 'NotasController@graciaStore')->name('gracia.store')->middleware('has.permission:gracia.store');

Route::get('gracia_promedio', 'NotasController@graciaPromedio');



Route::get('notas-edit-tabla/{idestudiante}/{ttarea}/{parcial}/{quimestre}/{materia}', 'NotasController@notasEdit');

Route::get('notas-resumen/{ttarea}/{parcial}/{quimestre}/{materia}', 'NotasController@resumenNotaStore');

Route::get('notas-delete-all-resumen/{descripcion}/{created_at}/{tt}', 'NotasController@deleteAllNotesResumen');

Route::get('enviar-libreta-individuales', 'NotasController@enviarLibretasIndividuales')->name('notas.enviar-libreta-individuales');

Route::get('buscar_alumnos_libretas/{curso}/{paralelo}/{parcial}/{quimestre}', 'NotasController@storeLibretaIndividualEnviar');

Route::get('enviar-libreta-individual-email/{cedula}/{email}/{paralelo}/{quimestre}', 'NotasController@enviarLibretaIndividualDefinitiva');

Route::get('nota_especial', 'NotasController@notaEspeciales')->name('notas.especial')->middleware('has.permission:notas.especial');

Route::get('materias_especiales/{curso}/{especialidad}/{paralelo}', 'NotasController@buscarMateriaEspecial');

Route::post('notas_especiales', 'NotasController@materiaEspecialStore')->name('especial.store')->middleware('has.permission:especial.store');

Route::get('notas_porcentaje', 'NotasController@notasPorcentaje')->name('notas.porcentaje')->middleware('has.permmission:notas.porcentaje');

Route::get('asignar-nota-profesor', 'NotasController@asignarDatosProfesor');

Route::get('libreta-individual', 'NotasController@libretaIndividual')->name('notas.libretaIndividual')->middleware('has.permission:notas.libretaIndividual');

Route::post('libreta-descargar', 'NotasController@descargarLibreta')->name('notas.libreta-descargar')->middleware('has.permission:notas.libreta-descargar');

Route::get('libreta-colectiva', 'NotasController@libretaColectiva')->name('notas.libretaColectiva')->middleware('has.permission:notas.libretaColectiva');

Route::get('ver-notas-especiales', 'NotasController@verNotasEspeciales')->name('notas.verNotasEspeciales')->middleware('has.permission:notas.verNotasEspeciales');

Route::get('notas/reportes/excel', 'NotasController@nominaEstudiante')->name('notas.reportesExcel')->middleware('has.permission:notas.reportesExcel');

Route::post('notas/reportes/todo', 'NotasController@reportesExcel')->name('notas.reportesExcelTodo')->middleware('has.permission:notas.reportesExcelTodo');

Route::post('notas/libreta-colectiva/descargar', 'NotasController@descargarLibretaColectiva')->name('notas.descargarLibretaColectiva')->middleware('has.permission:notas.descargarLibretaColectiva');

Route::get('notas/ver-notas-alumnos', 'NotasController@verNotasAlumnos')->name('notas.ver-notas-alumnos')->middleware('has.permission:notas.ver-notas-alumnos');

Route::get('cargar-materias-alumnos/{cedula}', 'NotasController@cargarMateriasMatriculado');

Route::get('notas-recuperacion', 'NotasController@recuperacion')->name('notas.recuperacion')->middleware('has.permission:notas.recuperacion');

Route::get('notas-abanderados', 'NotasController@abanderados')->name('notas.abanderados')->middleware('has.permission:notas.abanderados');

Route::get('api-abanderados/{curso}/{paralelo}', 'NotasController@apiAbanderados');

Route::post('abanderados-store', 'NotasController@abanderadoStore')->name('notas.abanderados-store');

Route::post('abanderados-reportes', 'NotasController@abanderadosExcel')->name('notas.abanderados-reportes');

Route::get('reporte-individual-libreta', 'NotasController@reporteIndividualLibreta')->name('notas.reporte-individual-libreta');

Route::post('reporte-individual-libreta-store', 'NotasController@reporteIndividualLibretaStore')->name('notas.reporte-individual-libreta-store');

Route::get('promedios-finales', 'NotasController@promediosFinales');

Route::get('notas-resumen', 'NotasController@resumenNotas')->name('notas.nota-resumen');

Route::get('notas-examen', 'NotasController@examenQuimestral')->name('notas.examen');
//MATRICULACIÓN

Route::get('matricular', 'MatriculacionController@index')->name('matricular.index')->middleware('has.permission:matricular.index');

Route::post('matricular', 'MatriculacionController@store')->name('matricular.store')->middleware('has.permission:matricular.store');

Route::get('matricular/create', 'MatriculacionController@create')->name('matricular.create')->middleware('has.permission:matricular.create');

Route::put('matricular/{matricular}', 'MatriculacionController@update')->name('matricular.update')->middleware('has.permission:matricular.update');

Route::get('matricular/{matricular}', 'MatriculacionController@show')->name('matricular.show')->middleware('has.permission:matricular.show');

Route::delete('matricular/{matricular}', 'MatriculacionController@destroy')->name('matricular.destroy')->middleware('has.permission:matricular.destroy');

Route::get('matricular/{matricular}/edit', 'MatriculacionController@edit')->name('matricular.edit')->middleware('has.permission:matricular.edit');

Route::get('relacion', 'MatriculacionController@relacion');

Route::get('ver-carnets', 'MatriculacionController@showCarnets')->name('matricular.showCarnets');

Route::get('download-carnet/{curso}/{paralelo}', 'MatriculacionController@downloadCarnet');

Route::get('carnet', 'MatriculacionController@carnets')->name('matricular.carnet');

Route::get('matricular/carnet/{curso}/{paralelo}', 'MatriculacionController@verAlumnosCarnet');

Route::get('matricular/importar/alumnos', 'MatriculacionController@import');

Route::post('matricular/import', 'MatriculacionController@importMatriculacion')->name('matriculacion.import')->middleware('has.permission:matriculacion.import');

Route::get('matricular/buscar_matriculado/{cedula}', 'MatriculacionController@buscarAlumnoMatriculado');

Route::get('matricular/reportes/todos', 'MatriculacionController@reporteMatriculados')->name('matricular.reportesTodos')->middleware('has.permission:matricular.reportesTodos');

Route::post('matricular/reportes/fecha', 'MatriculacionController@matriculadosReporteStore')->name('matricular.reporteStore')->middleware('has.permission:matricular.reporteStore');

Route::get('matricular/index/constancia', 'MatriculacionController@indexConstancia')->name('matricular.index-constancia')->middleware('has.permission:matricular.index-constancia');

Route::get('matricular-bloqueados', 'MatriculacionController@reportesBloqueados')->name('matricular.reporte-bloqueados')->middleware('has.permission:matricular.reporte-bloqueados');

Route::get('matricular-certificado-matricula', 'MatriculacionController@certificadoMatricula')->name('matricular.certificado-matricula');

Route::get('certificado-store/{cedula}', 'MatriculacionController@certificadoStore')->name('matricular.certificadoStore');

Route::get('matricular-cas', 'MatriculacionController@cas')->name('matricular.cas')->middleware('has.permission:matricular.cas');

Route::post('matricular-cas-store', 'MatriculacionController@storeCas')->name('matricular.storeCas');

Route::get('/matricular/reportes/tabla-todos', 'MatriculacionController@reporteMatriculadosTablaTodos');

Route::get('matricular-total-resumen', 'MatriculacionController@totalResumen')->name('matricular.total-resumen')->middleware('has.permission:matricular.total-resumen');


Route::get('/matricular/reportes/matricular-reporte-tabla/{curso}/{paralelo}', 'MatriculacionController@reporteMatriculadosTabla');

Route::get('matricular/reporte/index', 'MatriculacionController@indexReporteMatriculados')->name('matricular.index-repo-matri')->middleware('has.permission:matricular.index-repo-matri');

Route::get('matricular-cambiar-status/{id}', 'MatriculacionController@changeStatus')->name('matricular.cambiarStatus')->middleware('has.permission:matricular.cambiarStatus');

Route::get('matricular-total', 'MatriculacionController@reporteTotal')->name('matricular.total')->middleware('has.permission:matricular.total');

Route::get('matricular-reporte-total/{curso}/{paralelo}', 'MatriculacionController@reporteTotalStore');

Route::get('total-matricular', 'MatriculacionController@totalAlumnosCobros')->name('matricular.total-alumnosCobros')->middleware('has.permission:matricular.total-alumnosCobros');

Route::post('total-alumnos-store', 'MatriculacionController@totalAlumnosStore')->name('matricular.total-alumnosStore');

Route::post('store-carnets', 'MatriculacionController@storeCarnets')->name('matricular.storeCarnets');

Route::get('matricular/reportes/matriculados-gender-male/{curso}/{paralelo}', 'MatriculacionController@genderMale');

Route::get('matricular/reportes/matriculados-gender-female/{curso}/{paralelo}', 'MatriculacionController@genderFemale');

Route::get('matricular/reportes/matriculados-gender-male-todos', 'MatriculacionController@genderMaleTodos');

Route::get('matricular/reportes/matriculados-gender-female-todos', 'MatriculacionController@genderFemaleTodos');

Route::get('matricular/reportes/matricular-reporte-nuevos', 'MatriculacionController@nuevosTotal');

Route::get('matricular/reportes/matricular-reporte-antiguos', 'MatriculacionController@antiguosTotal');

Route::get('matricular/reportes/matricular-reporte-nuevos/{curso}/{paralelo}', 'MatriculacionController@nuevoTotalCurso');

Route::get('matricular/reportes/matricular-reporte-antiguos/{curso}/{paralelo}', 'MatriculacionController@antiguosTotalCurso');


Route::get('matricular-lista-total', 'MatriculacionController@listaTotal')->name('matricular.lista-total');

Route::get('matricular-perfil-total', 'MatriculacionController@perfilTotalMatriculado')->name('matricular.perfil-total')->middleware('has.permission:matricular.perfil-total');

Route::get('matricular-perfil-total-store/{codigo}', 'MatriculacionController@perfilTotalStore')->name('matricular.perfil-total-store');



//INSPECCIÓN

Route::get('buscar/inspeccion/alumno/{id}', 'InspeccionesController@buscarInspeccionAlumno');

Route::get('mostrar/datos/inspeccion/{curso}/{paralelo}', 'InspeccionesController@mostrarDatosInspeccion');

Route::get('inspeccion', 'InspeccionesController@index')->name('inspeccion.index')->middleware('has.permission:inspeccion.index');

Route::get('inspeccion/{id}/edit', 'InspeccionesController@edit')->name('inspeccion.edit');

Route::put('inspeccion/{id}', 'InspeccionesController@update')->name('inspeccion.update');

Route::post('inspeccion', 'InspeccionesController@store')->name('inspeccion.store')->middleware('has.permission:inspeccion.store');

Route::get('inspeccion/conducta', 'InspeccionesController@indexConducta')->name('inspeccion.index-conducta')->middleware('has.permission:inspeccion.index-conducta');


Route::get('reporte-individual', 'InspeccionesController@reporteIndividual')->name('inspeccion.reporte-individual')->middleware('has.permission:inspeccion.reporte-individual');

Route::get('reporte-colectivo', 'InspeccionesController@reporteColectivo')->name('inspeccion.reporte-colectivo')->middleware('has.permission:inspeccion.reporte-colectivo');

Route::post('repo', 'InspeccionesController@verReportes')->name('inspeccion.repo')->middleware('has.permission:inspeccion.repo');

Route::get('index-inspecciones', 'InspeccionesController@indexInspeccion')->name('inspeccion.index-inspeccion')->middleware('has.permission:inspeccion.index-inspeccion');

Route::post('store-inspeccion', 'InspeccionesController@inspeccionStore')->name('inspeccion.store-inspeccion');

Route::get('inspecciones-store/{curso}/{paralelo}/{parcial}/{quimestre}', 'InspeccionesController@buscarInspecciones');

Route::get('inspecciones-promedios', 'InspeccionesController@promedios')->name('inspeccion.promedios')->middleware('has.permission:inspeccion.promedios');

Route::post('inspeccion-promedios', 'InspeccionesController@buscarPromedioEstudiantes')->name('inspeccion.promedios-store');

Route::get('inspeccion-alertas', 'InspeccionesController@alertas')->name('inspeccion.alertas')->middleware('has.permission:inspeccion.alertas');

Route::get('inspecciones-count-alertas', 'InspeccionesController@countAlertas');

Route::get('leccionario-inspeccion-general', 'InspeccionesController@LeccionarioInspeccionGeneral')->name('inspeccion.leccionarioGeneral');

Route::get('inspecciones-observaciones', 'InspeccionesController@observaciones')->name('inspeccion.observacion');

Route::get('inspecciones-observaciones/{curso}/{paralelo}', 'InspeccionesController@observacionAlumnos');

Route::post('inspecciones-observaciones-store', 'InspeccionesController@observacionStore')->name('inspeccion.observacion-store');
//RECURSOS HUMANOS

Route::get('recursos_humanos', 'RecursosHumanosController@index')->name('recursos_humanos.index')->middleware('has.permission:recursos_humanos.index');

Route::post('recursos_humanos', 'RecursosHumanosController@store')->name('recursos_humanos.store')->middleware('has.permission:recursos_humanos.store');

Route::get('buscar_profesor/{cedula}', 'RecursosHumanosController@BuscarProfesorRRHH');

Route::get('rrhh/perfil', 'RecursosHumanosController@perfil')->name('recursos_humanos.perfil')->middleware('has.permission:recursos_humanos.perfil');

Route::get('rrhh/perfil/{cedula}' , 'RecursosHumanosController@datosPerfil');

//MEDICO
Route::get('medico', 'MedicoController@index')->name('medico.index')->middleware('has.permission:medico.index');

Route::post('medico', 'MedicoController@store')->name('medico.store')->middleware('has.permission:medico.store');

Route::get('medico_alumno/{cedula}', 'MedicoController@medicoAlumno');

Route::get('medico_observacion', 'MedicoController@observacionMedica')->name('medico.observacion')->middleware('has.permission:medico.observacion');

Route::post('medico_observacion', 'MedicoController@asignarObservacionMedica')->name('medico.asignar')->middleware('has.permission:medico.asignar');

Route::get('medico/reporte', 'MedicoController@reporte')->name('medico.reporte')->middleware('has.permission:medico.reporte');

Route::get('medico_observacion/{curso}', 'MedicoController@buscarAlumnoMedico');

Route::get('medico/observacion/ver/{cedula}', 'MedicoController@verReporte');
//EVENTOS
Route::get('events', 'EventosController@index')->name('events.index')->middleware('has.permission:events.index');

Route::post('events', 'EventosController@addEvent')->name('events.add')->middleware('has.permission:events.add');
//COBROS

Route::get('cobros', 'CobrosController@index')->name('cobros.index')->middleware('has.permission:cobros.index');

Route::post('cobros', 'CobrosController@store')->name('cobros.store')->middleware('has.permission:cobros.store');

Route::get('cobros/create', 'CobrosController@create')->name('cobros.create')->middleware('has.permission:cobros.create');

Route::put('cobros/{cobros}', 'CobrosController@update')->name('cobros.update')->middleware('has.permission:cobros.update');

Route::delete('cobros/{cobros}', 'CobrosController@destroy')->name('cobros.destroy')->middleware('has.permission:cobros.destroy');

Route::get('cobros/{cobros}/edit', 'CobrosController@edit')->name('cobros.edit')->middleware('has.permission:cobros.edit');

Route::get('reportes_cobros', 'CobrosController@reportesCobros')->name('cobros.reportes')->middleware('has.permission:cobros.reportes');

Route::get('reportes_matriculados', 'CobrosController@matriculadosReporte')->name('cobros.matriculados')->middleware('has.permission:cobros.matriculados');

Route::get('reportes_clientes', 'CobrosController@reportesClientes')->name('reportes.clientes')->middleware('has.permission:reportes.clientes');

Route::get('index_cobros', 'CobrosController@indexCobros')->name('cobros.indexCobros')->middleware('has.permission:cobros.indexCobros');

Route::get('cobros/matriculados', 'CobrosController@indexRepoMatriculados');

Route::get('cobros/lista-facturaciones', 'CobrosController@facturacionList')->name('cobros.lista-facturaciones');

Route::get('matriculados/cobros', 'CobrosController@descargarReporteCliente')->name('cobros.descargar-clientes');

Route::get('facturacion-index', 'CobrosController@facturacion')->name('cobros.facturacion-index');

Route::post('facturacion-store', 'CobrosController@facturacionStore')->name('cobros.facturacion-store');

Route::post('facturacion-exports', 'CobrosController@facturacionExports')->name('cobros.facturacion-exports');

Route::get('facturacion/download/{file}', 'CobrosController@facturacionDownload');

Route::get('facturacion/delete/{file}', 'CobrosController@deleteFileFacturacion');

Route::post('facturacion-individual-store', 'CobrosController@facturacionIndividualStore')->name('cobros.facturacion-in-store');

Route::get('facturacion-index-lista', 'CobrosController@indexFacturacion')->name('cobros.facturacion-index-lista');

Route::get('facturacion/{id}/edit', 'CobrosController@editFacturacion')->name('cobros.facturacion-edit');

Route::put('facturacion/{id}', 'CobrosController@updateFacturacion')->name('cobros.facturacion-update');

Route::delete('facturacion/{id}', 'CobrosController@deleteFactura')->name('cobros.facturacion-delete');
//TAREAS
Route::get('tareas', 'TareasController@index')->name('tareas.index')->middleware('has.permission:tareas.index');

Route::post('tareas', 'TareasController@store')->name('tareas.store')->middleware('has.permission:tareas.store');

Route::get('tareas_ver', 'TareasController@verTareas')->name('tareas.verTareas')->middleware('has.permission:tareas.ver-tareas');

Route::get('tareas_matriculados', 'TareasController@verTareasMatriculados');

Route::get('tareas/{tareas}', 'TareasController@destroy');

Route::get('tareas/download/{file}' , 'TareasController@downloadFile');

Route::get('tareas_count', 'TareasController@countPush');
//HORARIOS
Route::get('asignar-horarios-estudiantes', 'HorariosController@horariosEstudiantes')->name('horarios.asignar-horarios-estudiantes')->middleware('has.permission:horarios.asignar-horarios-estudiantes');

Route::get('asignar-horarios-profesores', 'HorariosController@horariosProfesores')->name('horarios.asignar-horarios-profesores')->middleware('has.permission:horarios.asignar-horarios-profesores');

Route::get('ver-horarios', 'HorariosController@verHorarios')->name('horarios.ver-horarios')->middleware('has.permission:horarios.ver-horarios');

Route::post('asignar-estudiantes-store', 'HorariosController@horariosEstudianteStore')->name('horarios.estudiantes-store');

Route::post('asignar-profesores-store', 'HorariosController@horariosProfesorStore')->name('horarios.profesores-store');

//CRONOGRAMA
Route::get('home', 'HomeController@cronograma')->name('home.index');

//DECE
Route::post('dece', 'DECEController@store')->name('dece.store')->middleware('has.permission:dece.store');

Route::get('dece/create', 'DECEController@create')->name('dece.create')->middleware('has.permission:dece.create');

Route::get('dece/buscar_dece/{cedula}', 'DECEController@buscarAlumnoDECE');

Route::get('dece-reporte', 'DECEController@reporteDECE')->name('dece.reporte')->middleware('has.permission:dece.reporte');

Route::get('dece/reporte/{cedula}', 'DECEController@verReporte');

//GRAFICOS
Route::get('graficos', 'GraficosController@generarGrafico')->name('grafico.index')->middleware('has.permission:grafico.index');

Route::get('graficos_materias/{curso}/{paralelo}', 'GraficosController@generarMateriaGrafico');

Route::get('graficos_notas/{curso}/{paralelo}/{parcial}/{materia}', 'GraficosController@generarGraficoNotas');


//PDF Y EXCEL
Route::get('matri_pdf', 'MatriculacionController@alumnosPDF')->name('matri_pdf')->middleware('has.permission:matri_pdf');

Route::get('matricular_reportes', 'MatriculacionController@buscarAlumno')->name('matricular.reportes')->middleware('has.permission:matricular.reportes');

Route::get('matriculados_busqueda/{dato}', 'MatriculacionController@buscarAlumnoReporte');

Route::get('inscripcion_busqueda', 'InscripcionController@buscarReporteInscritos')->name('inscripcion.reportes')->middleware('has.permission:inscripcion.reportes');

Route::get('materias_curso', 'MateriasController@materiasPDF')->name('materias.curso')->middleware('has.permission:materias.curso');

Route::get('inscripciones_excel', 'InscripcionController@buscarReporteInscritosExcel')->name('inscritos.excel')->middleware('has.permission:inscritos.excel');



Route::post('pdf/constantica-de-estudio', 'MatriculacionController@constanciaDeEstudio')->name('matricular.constancia-de-estudio');

Route::post('pdf/conducta', 'InspeccionesController@conducta')->name('inspeccion.conducta');

 //PRUEBAS
Route::get('a', 'AutocompleteController@a');

Route::get('b', 'AutocompleteController@b');

Route::get('c', 'AutocompleteController@c');

Route::get('d', 'AutocompleteController@d');

Route::get('e/{idalumno}/{nparcial}/{idmateria}', 'AutocompleteController@e');

//MENSAJE

Route::get('mensaje_index', 'MensajeController@index')->name('mensaje.index')->middleware('has.permission:mensaje.index');

Route::post('mensaje_store', 'MensajeController@store')->name('mensaje.store')->middleware('has.permission:mensaje.store');

Route::get('notify/mensaje', 'MensajeController@store');

Route::get('markasread', function(){
        auth()->user()->unreadNotifications->first()->markAsRead();
   })->name('markasread');

   Route::get('ver_mensaje', 'MensajeController@verMensaje')->name('mensaje.ver_mensajes');


//ROLES
Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('has.permission:roles.store');

Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('has.permission:roles.index');

Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('has.permission:roles.create');

Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('has.permission:roles.update');

Route::get('roles/{role}', 'RoleController@show')->name('roles.show')->middleware('has.permission:roles.show');

Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('has.permission:roles.destroy');

Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('has.permission:roles.edit');
//USUARIOS
Route::get('users', 'UserController@index')->name('users.index')->middleware('has.permission:users.index');

Route::put('users/{user}', 'UserController@update')->name('users.update')->middleware('has.permission:users.update');


Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('has.permission:users.destroy');

Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('has.permission:users.edit');

Route::get('users/control/{cedula}', 'UserController@buscarControl');


Route::get('users_importarData', 'UserController@importarDataUsuarios')->name('users.importarDatos');

Route::post('users_import', 'UserController@importUsers')->name('users.importUsers');

Route::get('users/asignar-cargo', 'UserController@asignarCargos')->name('users.asignar-cargo');

Route::post('users-store-cargos', 'UserController@storeCargos')->name('users-cargos.store');


//FRASES

Route::resource('frases', 'FrasesController')->middleware('has.permission:frases');

Route::get('traer_frases', 'FrasesController@traerFrases')->name('traer.frases');


//NOTICIAS

Route::resource('noticias', 'NoticiasController')->middleware('has.permission:noticias');

Route::get('traer_noticias', 'NoticiasController@traerNoticias')->name('traer.noticias');

//LOGO

Route::get('logo', 'LogoController@asignarLogo')->name('logo.asignar');

Route::post('logo/guardar', 'LogoController@agregarLogo')->name('logo.store');

});

