           <div class="panel panel-primary">
                    <div class="panel panel-heading text-center">INGRESE LOS DATOS PARA LA BUSQUEDA</div>
                         <div class="panel panel-body">
                                    <div class="form-row">
                                        @if(Auth::user()->isRole('super-admin') || Auth::user()->isRole('dece') || Auth::user()->isRole('admin'))
                                        <div class="form-group col-md-4">
                                             <strong>Curso: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                             </div>
                                             </div>

                                             <div class="form-group col-md-4">
                                             <strong>Especialidad: <br></strong>
                                                  <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'TECNICO AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-6' , 'id' => 'especialidad', 'placeholder' => 'Ingrese especialidad']) }}
                                             </div>
                                             </div>

                                             <div class="form-group col-md-4">
                                             <strong>Paralelo: <br></strong>
                                             <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
                                             </div>
                                             </div>
                                        @elseif(Auth::user()->isRole('profesor'))
                                        <div class="form-group col-md-4">
                                             <strong>Curso: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('curso',$profesorCurso, null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                             </div>
                                             </div>

                                             <div class="form-group col-md-4">
                                             <strong>Especialidad: <br></strong>
                                                  <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'TECNICO AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-6' , 'id' => 'especialidad', 'placeholder' => 'Ingrese especialidad']) }}
                                             </div>
                                             </div>

                                             <div class="form-group col-md-4">
                                             <strong>Paralelo: <br></strong>
                                             <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('paralelo',$profesorParalelo, null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
                                             </div>
                                             </div>
                                        @endif

                                             <div class="form-group col-md-4">
                                             <strong>Materia: <br></strong>
                                             <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('materia', ['materia' => 'MATERIA'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Materia', 'id' => 'materia']) }}
                                             </div>
                                             </div>

                                             <div class="form-group col-md-4">
                                             <strong>Quimestre: <br></strong>
                                             <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el quimestre', 'id' => 'quimestre']) }}
                                             </div>
                                             </div>
                                             <div class="form-group col-md-4">
                                             <strong>Parcial: <br></strong>
                                             <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('quimestre',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el parcial', 'id' => 'parcial']) }}
                                             </div>
                                             </div>
                                             <div class="form-group col-md-4">
                                             <strong>Tipo de tarea: <br></strong>
                                             <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('quimestre',['nota_ta[]' => 'TRABAJOS ACADEMICOS', 'nota_ti[]' => 'TAREAS INDIVIDUALES', 'nota_tg[]' => 'TAREAS GRUPALES', 'nota_le[]' => 'LECCIONES', 'nota_ev[]' =>  'EVALUACION', 'conducta[]' => 'CONDUCTA', 'examen[]' => 'EXAMEN'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el tipo de tarea...', 'id' => 'tipoTarea']) }}
                                             </div>
                                             </div>
                                             <div class="form-group col-md-6">
                                               {!! Form::button('<i class="fas fa-plus"></i> AGREGAR DESCRIPCION', ['class' => 'btn btn-primary col-md-4', 'id' => 'agregarDescripcion']) !!}

                                             </div>
                                             <div id="descripcion" class="form-group col-md-12" style="display: none;">
                                             <strong>Descripcion de la tarea: <br></strong>
                                             <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::text('descripcion', null, ['class' => 'form-control col-md-4', 'placeholder' => 'Descripcion de la tarea...', 'id' => 'descripcion']) }}
                                             </div>
                                             </div>
                                               <div id ="agregarNotas" class="form-group col-md-4" style="display: none;">
                                               {!! Form::button('<i class="fas fa-clipboard"></i> AGREGAR NOTAS', ['class' => 'btn btn-primary col-md-4', 'id' => 'agregarNotas']) !!}

                                             </div>



                                   </div>
                                 </div>
                                </div>
                                <script type="text/javascript" src="{{asset('js/notas-form.js')}}"></script>



