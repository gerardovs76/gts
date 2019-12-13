<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none; 
    }
    
    input[type=number] {
      -moz-appearance: textfield;
    }
    </style>
<div class="panel panel-primary" id="panel1">
              <div class="panel panel-heading text-center" style="padding: 1px;"><h3>INGRESE LOS DATOS PARA LA BUSQUEDA SIGUIENDO EL ORDEN NUMERICO...</h3></div>
                   <div class="panel panel-body">
                              <div class="form-row">
                                  @if(Auth::user()->isRole('super-admin') || Auth::user()->isRole('dece') || Auth::user()->isRole('admin'))
                                  <div class="form-group col-md-4">
                                       <strong>1.- Curso: <br></strong>
                                       <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                       </div>
                                       </div>

                                       <div class="form-group col-md-4">
                                       <strong>2.- Especialidad: <br></strong>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'TECNICO AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-6' , 'id' => 'especialidad', 'placeholder' => 'Ingrese especialidad']) }}
                                       </div>
                                       </div>

                                       <div class="form-group col-md-4">
                                       <strong>3.- Paralelo: <br></strong>
                                       <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
                                       </div>
                                       </div>
                                  @elseif(Auth::user()->isRole('profesor'))
                                  <div class="form-group col-md-4">
                                       <strong>1.- Curso: <br></strong>
                                       <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('curso',$profesorCurso, null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                       </div>
                                       </div>

                                       <div class="form-group col-md-4">
                                       <strong>2.- Especialidad: <br></strong>

                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'TECNICO AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-6' , 'id' => 'especialidad', 'placeholder' => 'Ingrese especialidad']) }}
                                       </div>
                                       </div>

                                       <div class="form-group col-md-4">
                                       <strong>3.- Paralelo: <br></strong>
                                       <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('paralelo',$profesorParalelo, null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
                                       </div>
                                       </div>
                                  @endif

                                       <div class="form-group col-md-4">
                                       <strong>4.- Materia: <br></strong>
                                       <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('materia', [], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione la materia', 'id' => 'materia']) }}
                                       </div>
                                       </div>

                                       <div class="form-group col-md-4">
                                       <strong>5.- Quimestre: <br></strong>
                                       <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el quimestre', 'id' => 'quimestre']) }}
                                       </div>
                                       </div>
                                         <div  class="form-group col-md-12">
                                         {!! Form::button('<i class="fas fa-clipboard"></i> AGREGAR NOTAS', ['class' => 'btn btn-primary', 'id' => 'agregarNotas']) !!}
                                         <button id="saveNotas"  class="btn btn-primary pull-right d-none" type="submit"><i class="fas fa-clipboard"></i> GUARDAR NOTAS</button>
                                       </div>
                             </div>
                           </div>
                          </div>
                          <script>
                             $(document).ready(function() {
                                  $(window).keydown(function(event){
                                  if(event.keyCode == 13) {
                                       event.preventDefault();
                                       return false;
                                  }
                                  });
                                  });
                                </script>
                          <script>
                                  $('#paralelo').on('change', function() {
                                      var curso = $( "#curso option:selected" ).text();
                                      var paralelo  = $( "#paralelo option:selected" ).text();
                                      var url = 'buscar_notas/'+curso+'/'+paralelo;
                                      $.ajax({
                                          url: url,
                                          success: function(data)
                                          {
                                                      $('#materia').empty();
                                                  $.each(data, function(index, regenciesObj){
                                                      $('#materia').append('<option value="'+regenciesObj.id+'">'+ regenciesObj.materia +'</option>');
                                                      var materia = document.getElementById("materia").value;

                                                   });
                                          },
                                          error: function(error)
                                          {

                                          }
                                      });
                                  });
                                  </script>
                                  <script>
                                   
                                    $('#agregarNotas').on('click', function(){
                                    var curso = $( "#curso option:selected" ).text();
                                    var paralelo  = $( "#paralelo option:selected" ).text();
                                    var especialidad = $('#especialidad').val();
                                    var materia = $('#materia').val();
                                    var parcial = $('#parcial').val();
                                    var quimestre = $('#quimestre').val();
                                    $('#examenQuimestral').addClass("d-block");
                                    var url = 'buscar_alumnos2/'+curso+'/'+paralelo;
                                    console.log(url);
                                    $('#saveNotas').addClass("d-block");
                                    $('#tabla').addClass("d-block");
                                    $('#examenQuimestral').on('click', () => {
                                            $('.modal-title').empty();
                                            $('#tableid').empty();
                                            $('.modal-title').append('INGRESE EXAMEN QUIMESTRAL');
                                           
                                            $.ajax({
                                                url: url,
                                                success: function(response){
                                                    $.each(response, function(inx, obj){
                                                        $('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-6" type="number" step="any" min="1" max="10" name="examen[]"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'><input type="hidden" name="tipo_tareas" value="nota_examen"></tr>');

                                                   });
                                                },
                                                error: function(error){
                                                }
                                            });
                                        });
                                  });
                          </script>




