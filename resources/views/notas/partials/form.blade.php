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
                                               <div id ="agregarNotas" class="form-group col-md-4">
                                               {!! Form::button('<i class="fas fa-clipboard"></i> AGREGAR NOTAS', ['class' => 'btn btn-primary col-md-4', 'id' => 'agregarNotas']) !!}

                                             </div>



                                   </div>
                                 </div>
                                </div>
                                <script>

                                        $('#paralelo').on('change', function() {
                                            var curso = $( "#curso option:selected" ).text();
                                            var paralelo  = $( "#paralelo option:selected" ).text();
                                          $.get('buscar_notas/'+curso+'/'+paralelo, function(data){
                                                    $('#materia').empty();
                                                    $('#materia').append('<option value="0" disable="true" selected="true">SELECCIONAR MATERIA</OPTION');
                                          $.each(data, function(index, regenciesObj){
                                                    $('#materia').append('<option value="'+regenciesObj.id+'">'+ regenciesObj.materia +'</option>');
                                                    var materia = document.getElementById("materia").value;

                                               });
                                          });
                                        });
                                          $('#agregarNotas').on('click', function(){
                                            $('#agregarNotas').css("display", "none");
                                            var curso = $( "#curso option:selected" ).text();
                                            var paralelo  = $( "#paralelo option:selected" ).text();
                                          var especialidad = $('#especialidad').val();
                                          var materia = $('#materia').val();
                                          var parcial = $('#parcial').val();
                                          var quimestre = $('#quimestre').val();

                                          $('#trabajos_academicos').attr("disabled", false);
                                          $('#tareas_individuales').attr("disabled", false);
                                          $('#tareas_grupales').attr("disabled", false);
                                          $('#lecciones').attr("disabled", false);
                                          $('#evaluaciones').attr("disabled", false);

                                          if(curso == 'INICIAL 1' || curso == 'INICIAL 2' || curso == 'PRIMERO DE EGB' || curso == 'SEGUNDO DE EGB' || curso == 'TERCERO DE EGB' || curso == 'CUARTO DE EGB' || curso == 'QUINTO DE EGB' || curso == 'SEXTO DE EGB' || curso == 'SEPTIMO DE EGB')
                                          {
                                            $('#conducta').attr("disabled", false);
                                          }
                                          else {
                                              $('#conducta').attr("disabled", true);
                                          }
                                          $('#examen').attr("disabled", false);
                                          $('#trabajos_academicos').on('click', () => {
                                            var curso = $( "#curso option:selected" ).text();
                                            var paralelo  = $( "#paralelo option:selected" ).text();
                                            var especialidad = $('#especialidad').val();
                                            var materia = $('#materia').val();
                                            var parcial = $('#parcial').val();
                                            var quimestre = $('#quimestre').val();
                                            var url = 'buscar_alumnos/'+curso+'/'+paralelo;
                                            $('.modal-title').empty();
                                            $('#tableid').empty();
                                            $('.modal-title').append('INGRESE TRABAJOS ACADEMICOS');
                                            console.log(url);
                                            $.ajax({
                                                url: url,
                                                success: function(response){
                                                    $.each(response, function(inx, obj){
                                                        $('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-6" type="number" step="any" min="1" max="10" name="nota_ta[]"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'></tr>');

                                                   });
                                                },
                                                error: function(error){

                                                }
                                            });
                                        });
                                        $('#tareas_individuales').on('click', () => {
                                            var curso = $( "#curso option:selected" ).text();
                                            var paralelo  = $( "#paralelo option:selected" ).text();
                                            var especialidad = $('#especialidad').val();
                                            var materia = $('#materia').val();
                                            var parcial = $('#parcial').val();
                                            var quimestre = $('#quimestre').val();
                                            var url = 'buscar_alumnos/'+curso+'/'+paralelo;
                                            $('.modal-title').empty();
                                            $('#tableid').empty();
                                            $('.modal-title').append('INGRESE TAREAS INDIVIDUALES');
                                            console.log(url);
                                            $.ajax({
                                                url: url,
                                                success: function(response){
                                                    $.each(response, function(inx, obj){
                                                        $('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-6" type="number" step="any" min="1" max="10" name="nota_ti[]"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'></tr>');

                                                   });
                                                },
                                                error: function(error){

                                                }
                                            });
                                        });
                                        $('#tareas_grupales').on('click', () => {
                                            var curso = $( "#curso option:selected" ).text();
                                            var paralelo  = $( "#paralelo option:selected" ).text();
                                            var especialidad = $('#especialidad').val();
                                            var materia = $('#materia').val();
                                            var parcial = $('#parcial').val();
                                            var quimestre = $('#quimestre').val();
                                            var url = 'buscar_alumnos/'+curso+'/'+paralelo;
                                            $('.modal-title').empty();
                                            $('#tableid').empty();
                                            $('.modal-title').append('INGRESE TAREAS GRUPALES');
                                            console.log(url);
                                            $.ajax({
                                                url: url,
                                                success: function(response){
                                                    $.each(response, function(inx, obj){
                                                        $('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-6" type="number" step="any" min="1" max="10" name="nota_tg[]"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'></tr>');

                                                   });
                                                },
                                                error: function(error){

                                                }
                                            });
                                        });
                                        $('#lecciones').on('click', () => {
                                            var curso = $( "#curso option:selected" ).text();
                                            var paralelo  = $( "#paralelo option:selected" ).text();
                                            var especialidad = $('#especialidad').val();
                                            var materia = $('#materia').val();
                                            var parcial = $('#parcial').val();
                                            var quimestre = $('#quimestre').val();
                                            var url = 'buscar_alumnos/'+curso+'/'+paralelo;
                                            $('.modal-title').empty();
                                            $('#tableid').empty();
                                            $('.modal-title').append('INGRESE LECCIONES');
                                            console.log(url);
                                            $.ajax({
                                                url: url,
                                                success: function(response){
                                                    $.each(response, function(inx, obj){
                                                        $('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-6" type="number" step="any" min="1" max="10" name="nota_le[]"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'></tr>');

                                                   });
                                                },
                                                error: function(error){

                                                }
                                            });
                                        });
                                        $('#evaluaciones').on('click', () => {
                                            var curso = $( "#curso option:selected" ).text();
                                            var paralelo  = $( "#paralelo option:selected" ).text();
                                            var especialidad = $('#especialidad').val();
                                            var materia = $('#materia').val();
                                            var parcial = $('#parcial').val();
                                            var quimestre = $('#quimestre').val();
                                            var url = 'buscar_alumnos/'+curso+'/'+paralelo;
                                            $('.modal-title').empty();
                                            $('#tableid').empty();
                                            $('.modal-title').append('INGRESE EVALUACIONES');
                                            console.log(url);
                                            $.ajax({
                                                url: url,
                                                success: function(response){
                                                    $.each(response, function(inx, obj){
                                                        $('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-6" type="number" step="any" min="1" max="10" name="nota_ev[]"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'></tr>');

                                                   });
                                                },
                                                error: function(error){

                                                }
                                            });
                                        });
                                        $('#conducta').on('click', () => {
                                            var curso = $( "#curso option:selected" ).text();
                                            var paralelo  = $( "#paralelo option:selected" ).text();
                                            var especialidad = $('#especialidad').val();
                                            var materia = $('#materia').val();
                                            var parcial = $('#parcial').val();
                                            var quimestre = $('#quimestre').val();
                                            var url = 'buscar_alumnos/'+curso+'/'+paralelo;
                                            $('.modal-title').empty();
                                            $('#tableid').empty();
                                            $('.modal-title').append('INGRESE CONDUCTAS');
                                            console.log(url);
                                            $.ajax({
                                                url: url,
                                                success: function(response){
                                                    $.each(response, function(inx, obj){
                                                        $('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-6" type="number" step="any" min="1" max="10" name="conducta[]"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'></tr>');

                                                   });
                                                },
                                                error: function(error){

                                                }
                                            });
                                        });
                                        $('#examen').on('click', () => {
                                            var curso = $( "#curso option:selected" ).text();
                                            var paralelo  = $( "#paralelo option:selected" ).text();
                                            var especialidad = $('#especialidad').val();
                                            var materia = $('#materia').val();
                                            var parcial = $('#parcial').val();
                                            var quimestre = $('#quimestre').val();
                                            var url = 'buscar_alumnos/'+curso+'/'+paralelo;
                                            $('.modal-title').empty();
                                            $('#tableid').empty();
                                            $('.modal-title').append('INGRESE EXAMEN QUIMESTRAL');
                                            console.log(url);
                                            $.ajax({
                                                url: url,
                                                success: function(response){
                                                    $.each(response, function(inx, obj){
                                                        $('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-6" type="number" step="any" min="1" max="10" name="examen[]"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'></tr>');

                                                   });
                                                },
                                                error: function(error){
                                                }
                                            });
                                        });
                                    });






                                </script>




                                {{--

                                     $.get('buscar_alumnos/'+curso+'/'+paralelo, function(dato){
                                               $('#tableid').empty();
                                          $.each(dato, function(inx, obj){
                                               $('#guardarNotas').css("display", "block");
                                               $('#tablaNotas').css("display", "block");
                                               $('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-2" type="number" step="any" min="1" max="10" name='+tipoTarea+'></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'></tr>');

                                          });
                                    <div class="form-group col-md-4">
                                        <strong>Tipo de tarea: <br></strong>
                                        <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                        {{ Form::select('quimestre',['nota_ta[]' => 'TRABAJOS ACADEMICOS', 'nota_ti[]' => 'TAREAS INDIVIDUALES', 'nota_tg[]' => 'TAREAS GRUPALES', 'nota_le[]' => 'LECCIONES', 'nota_ev[]' =>  'EVALUACION', 'conducta[]' => 'CONDUCTA', 'examen[]' => 'EXAMEN'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el tipo de tarea...', 'id' => 'tipoTarea']) }}
                                        </div>
                                        </div>  --}}
