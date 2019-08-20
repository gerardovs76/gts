           <div class="panel panel-primary">
                    <div class="panel panel-heading text-center">INGRESE LOS DATOS PARA LA BUSQUEDA</div>
                         <div class="panel panel-body">
                                    <div class="form-row">
                                        @if(Auth::user()->roles('super-admin'))
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
                                        @elseif(Auth::user()->roles('profesor'))
                                        <div class="form-group col-md-4">
                                             <strong>Curso: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('curso',['Ingrese el curso' => 'Ingrese el curso'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                             </div>
                                             </div>

                                             <div class="form-group col-md-4">
                                             <strong>Especialidad: <br></strong>
                                                  <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('especialidad', ['Ingrese la especialidad' => 'Ingrese la especialidad'], null, ['class' => 'form-control col-md-6' , 'id' => 'especialidad', 'placeholder' => 'Ingrese especialidad']) }}
                                             </div>
                                             </div>

                                             <div class="form-group col-md-4">
                                             <strong>Paralelo: <br></strong>
                                             <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('paralelo',['Ingrese el paralelo' => 'Ingrese el pararelo'], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
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
                                             {{ Form::select('quimestre',['nota_ta[]' => 'TRABAJOS ACADEMICOS', 'nota_ti[]' => 'TAREAS INDIVIDUALES', 'nota_tg[]' => 'TAREAS GRUPALES', 'nota_le[]' => 'LECCIONES', 'nota_ev[]' =>  'EVALUACION'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el tipo de tarea...', 'id' => 'tipoTarea']) }}
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
       <script>
         $(document).ready(function(){
          $.get('asignar-nota-profesor', function(response){
            console.log(response);
            $.each(response, function(index, obj){
              console.log(obj);
              $('#curso').append('<option value="'+obj.curso+'">'+obj.curso+'</option>');
              $('#especialidad').append('<option value="'+obj.especialidad+'">'+obj.especialidad+'</option>');
              $('#paralelo').append('<option value="'+obj.paralelo+'">'+obj.paralelo+'</option>');

            });
          });
        });
       </script>  
        
       <script>
        $('#paralelo').on('change', function() {
        var curso = $('#curso').val();
        var especialidad = $('#especialidad').val();
        var paralelo = $('#paralelo').val();
        console.log(curso);
        console.log(especialidad);
        console.log(paralelo);
        
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
                               $('#agregarDescripcion').on('click', function(){
                                $('#agregarDescripcion').css("display", "none");

          $('#descripcion').css("display", "block");
          $('#agregarNotas').css("display", "block");
        });
          $('#agregarNotas').on('click', function(){
            $('#agregarNotas').css("display", "none");
            $('#guardar').addClass("d-block");
          var curso = $('#curso').val();
          var especialidad = $('#especialidad').val();
          var paralelo = $('#paralelo').val();
          var tipoTarea = $('#tipoTarea').val();
          var materia = $('#materia').val();
          var parcial = $('#parcial').val();
          var quimestre = $('#quimestre').val();
          console.log(quimestre);
        console.log(parcial);
        console.log(tipoTarea);
        console.log(curso);
        console.log(especialidad);
        console.log(paralelo);
        console.log(materia);

          $.get('buscar_alumnos/'+curso+'/'+paralelo, function(dato){
                console.log(dato);
               $('#tableid').empty();
          $.each(dato, function(inx, obj){
               console.log(obj);
               $('#guardarNotas').css("display", "block");
               $('#tablaNotas').css("display", "block");
               $('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input type="text" name='+tipoTarea+'></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'></tr>');

          });
     });      
     });
     </script>



