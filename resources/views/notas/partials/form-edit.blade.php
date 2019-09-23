<div class="panel panel-primary">
    <div class="panel panel-heading text-center">INGRESE LOS DATOS PARA LA BUSQUEDA</div>
         <div class="panel panel-body">
                    <div class="form-row">
                        @if(Auth::user()->isRole('super-admin'))
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
                             {{ Form::select('especialidad',['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'TECNICO AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-6' , 'id' => 'especialidad', 'placeholder' => 'Ingrese especialidad']) }}
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
                             {{ Form::select('quimestre',['nota_ta' => 'TRABAJOS ACADEMICOS', 'nota_ti' => 'TAREAS INDIVIDUALES', 'nota_tg' => 'TAREAS GRUPALES', 'nota_le' => 'LECCIONES', 'nota_ev' =>  'EVALUACION', 'conducta' => 'CONDUCTA'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el tipo de tarea...', 'id' => 'tipoTarea']) }}
                             </div>
                             </div>
                             <div class="form-group col-md-4">
                              <strong>Estudiantes: </strong>
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                {!!Form::select('estudiantes', ['Seleccione los estudiantes' => 'Seleccione los estudiantes'], null, ['class' => 'form-control col-md-6', 'id' => 'estudiantes'])!!}
                            </div>

                             </div>
                               <div class="form-group col-md-12">
                               {!! Form::button('<i class="fas fa-clipboard"></i> REALIZAR BUSQUEDA', ['class' => 'btn btn-primary', 'id' => 'realizarBusqueda']) !!}
                             </div>
                   </div>
                 </div>
                </div>
                  <script>
                   $('#paralelo').on('change', function() {
                    var curso = $( "#curso option:selected" ).text();
                    var paralelo  = $( "#paralelo option:selected" ).text();

                     $.get('buscar_notas/'+curso+'/'+paralelo, function(data){
                         console.log(data);
                               $('#materia').empty();
                               $('#materia').append('<option value="0" disable="true" selected="true">SELECCIONAR MATERIA</OPTION');
                     $.each(data, function(index, regenciesObj){
                               $('#materia').append('<option value="'+regenciesObj.id+'">'+ regenciesObj.materia +'</option>');
                               var materia = document.getElementById("materia").value;

                          });
                     });
                });
            </script>
                <script>
                    $('#tipoTarea').on('change', function(){
                     var curso = $('#curso').val();
                     var especialidad = $('#especialidad').val();
                     var paralelo = $('#paralelo').val();
                     var tipoTarea = $('#tipoTarea').val();
                     var materia = $('#materia').val();
                     var parcial = $('#parcial').val();
                     var quimestre = $('#quimestre').val();


                     $.get('buscar_alumnos/'+curso+'/'+paralelo, function(dato){
                           $('#estudiantes').empty();
                           $('#estudiantes').append('<option value="0" disable="true" selected="true">SELECCIONAR EL ESTUDIANTE</OPTION');
                     $.each(dato, function(inx, obj){
                        $('#estudiantes').append('<option value="'+obj.id+'">'+ obj.nombres +'</option>');

                     });
                });
                });
                </script>
                <script>
                    $('#realizarBusqueda').on('click', function(){
                        var estudiante = $('#estudiantes').val();
                        var tipoTarea = $('#tipoTarea').val();
                        var parcial = $('#parcial').val();
                        var quimestre = $('#quimestre').val();
                        var materia = $('#materia').val();
                        $.get('notas-edit-tabla/'+estudiante+'/'+tipoTarea+'/'+parcial+'/'+quimestre+'/'+materia, function(response){
                        if($('#tipoTarea').val() == 'nota_ta')
                       {
                           $.each(response, function(index, obj){
                               $('#tableid').append('<tr><td><strong>'+obj.nota_ta+'</strong></td><td>'+obj.descripcion+'</td><td>'+obj.created_at+'</td><td><a href="notas/'+obj.id+'/edit" class="btn btn-primary"><i class="far fa-edit"></i>EDITAR</a></td></tr>');
                           });
                       }else if($('#tipoTarea').val() == 'nota_ti')
                       {
                        $.each(response, function(index, obj){
                            $('#tableid').append('<tr><td><strong>'+obj.nota_ti+'</strong></td><td>'+obj.descripcion+'</td><td>'+obj.created_at+'</td><td><a href="notas/'+obj.id+'/edit" class="btn btn-primary"><i class="far fa-edit"></i>EDITAR</a></td></tr>');
                        });
                       }else if($('#tipoTarea').val() == 'nota_tg')
                       {
                        $.each(response, function(index, obj){
                            $('#tableid').append('<tr><td><strong>'+obj.nota_tg+'</strong></td><td>'+obj.descripcion+'</td><td>'+obj.created_at+'</td><td><a href="notas/'+obj.id+'/edit" class="btn btn-primary"><i class="far fa-edit"></i>EDITAR</a></td></tr>');
                        });
                       }else if($('#tipoTarea').val() == 'nota_le')
                       {
                        $.each(response, function(index, obj){
                            $('#tableid').append('<tr><td><strong>'+obj.nota_le+'</strong></td><td>'+obj.descripcion+'</td><td>'+obj.created_at+'</td><td><a href="notas/'+obj.id+'/edit" class="btn btn-primary"><i class="far fa-edit"></i>EDITAR</a></td></tr>');
                        });
                       }else if($('#tipoTarea').val() == 'nota_ev')
                       {
                        $.each(response, function(index, obj){
                            $('#tableid').append('<tr><td><strong>'+obj.nota_ev+'</strong></td><td>'+obj.descripcion+'</td><td>'+obj.created_at+'</td><td><a href="notas/'+obj.id+'/edit" class="btn btn-primary"><i class="far fa-edit"></i>EDITAR</a></td></tr>');
                        });
                       }
                       else if($('#tipoTarea').val() == 'conducta')
                       {
                        $.each(response, function(index, obj){
                            $('#tableid').append('<tr><td><strong>'+obj.conducta+'</strong></td><td>'+obj.descripcion+'</td><td>'+obj.created_at+'</td><td><a href="notas/'+obj.id+'/edit" class="btn btn-primary"><i class="far fa-edit"></i>EDITAR</a></td></tr>');
                        });
                       }
                       });
                    });
                </script>
