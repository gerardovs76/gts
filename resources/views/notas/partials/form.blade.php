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
                                             <div class="form-group col-md-4">
                                             <strong>6.- Parcial: <br></strong>
                                             <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                             {{ Form::select('parcial',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el parcial', 'id' => 'parcial']) }}
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
                                          $('#agregarDescripciones').addClass("d-block");
                                          var url = 'buscar_alumnos/'+curso+'/'+paralelo+'/'+materia;
                                          $('#saveNotas').addClass("d-block");
                                          $('#tabla').addClass("d-block");
                                            $.ajax({
                                                url: url,
                                                success: function(response){
                                                     console.log(response);
                                                     if(response.all_notas.length != 0)
                                                     {
                                                       $.each(response.all_notas, function(inx, obj){
                                                            console.log(obj);
                                                        $('#tabla').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ta1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ta1[]" value='+obj.nota_ta1+'><input class="form-control  col-md-2 col-xs-2" id="nota_ta2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ta2[]" value='+obj.nota_ta2+'><input class="form-control col-md-2 col-xs-2" id="nota_ta3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ta3[]" value='+obj.nota_ta3+'><input class="form-control col-md-2 col-xs-2" id="nota_ta4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ta4[]" value='+obj.nota_ta4+'><input class="form-control col-md-2 col-xs-2" id="nota_ta5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ta5[]" value='+obj.nota_ta5+'><p id="promedio'+obj.id+'"></p></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ti1'+obj.id+'"  style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ti1[]" value='+obj.nota_ti1+'><input class="form-control col-md-2 col-xs-2" id="nota_ti2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ti2[]" value='+obj.nota_ti2+'><input class="form-control col-md-2 col-xs-2" id="nota_ti3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ti3[]" value='+obj.nota_ti3+'><input class="form-control col-md-2 col-xs-2" id="nota_ti4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ti4[]" value='+obj.nota_ti4+'><input class="form-control col-md-2 col-xs-2" id="nota_ti5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ti5[]" value='+obj.nota_ti5+'></td><td><input class="form-control col-md-2 col-xs-2" id="nota_tg1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_tg1[]" value='+obj.nota_tg1+'><input class="form-control col-md-2 col-xs-2" id="nota_tg2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_tg2[]" value='+obj.nota_tg2+'><input class="form-control col-md-2 col-xs-2" id="nota_tg3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_tg3[]" value='+obj.nota_tg3+'><input class="form-control col-md-2 col-xs-2" id="nota_tg4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_tg4[]" value='+obj.nota_tg4+'><input class="form-control col-md-2 col-xs-2" id="nota_tg5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_tg5[]" value='+obj.nota_tg5+'></td><td><input class="form-control col-md-2 col-xs-2" id="nota_le1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_le1[]" value='+obj.nota_le1+'><input class="form-control col-md-2 col-xs-2" id="nota_le2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_le2[]" value='+obj.nota_le2+'><input class="form-control col-md-2 col-xs-2" id="nota_le3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_le3[]" value='+obj.nota_le3+'><input class="form-control col-md-2 col-xs-2" id="nota_le4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_le4[]" value='+obj.nota_le4+'><input class="form-control col-md-2 col-xs-2" id="nota_le5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_le5[]" value='+obj.nota_le5+'></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ev1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ev1[]" value='+obj.nota_ev1+'><input class="form-control col-md-2 col-xs-2" id="nota_ev2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ev2[]" value='+obj.nota_ev2+'><input class="form-control col-md-2 col-xs-2" id="nota_ev3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ev3[]" value='+obj.nota_ev3+'><input class="form-control col-md-2 col-xs-2" id="nota_ev4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ev4[]" value='+obj.nota_ev4+'><input class="form-control col-md-2 col-xs-2" id="nota_ev5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ev5[]" value='+obj.nota_ev5+'></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'><input type="hidden" name="tipo_tareas" value="nota_ta"></tr>');
                                                        $('#descripcion_ta1').val(obj.descripcion_ta1);
                                                        $('#descripcion_ta2').val(obj.descripcion_ta2);
                                                        $('#descripcion_ta3').val(obj.descripcion_ta3);
                                                        $('#descripcion_ta4').val(obj.descripcion_ta4);
                                                        $('#descripcion_ta5').val(obj.descripcion_ta5);
                                                        $('#descripcion_ti1').val(obj.descripcion_ti1);
                                                        $('#descripcion_ti2').val(obj.descripcion_ti2);
                                                        $('#descripcion_ti3').val(obj.descripcion_ti3);
                                                        $('#descripcion_ti4').val(obj.descripcion_ti4);
                                                        $('#descripcion_ti5').val(obj.descripcion_ti5);
                                                        $('#descripcion_tg1').val(obj.descripcion_tg1);
                                                        $('#descripcion_tg2').val(obj.descripcion_tg2);
                                                        $('#descripcion_tg3').val(obj.descripcion_tg3);
                                                        $('#descripcion_tg4').val(obj.descripcion_tg4);
                                                        $('#descripcion_tg5').val(obj.descripcion_tg5);
                                                        $('#descripcion_le1').val(obj.descripcion_le1);
                                                        $('#descripcion_le2').val(obj.descripcion_le2);
                                                        $('#descripcion_le3').val(obj.descripcion_le3);
                                                        $('#descripcion_le4').val(obj.descripcion_le4);
                                                        $('#descripcion_le5').val(obj.descripcion_le5);
                                                        $('#descripcion_ev1').val(obj.descripcion_ev1);
                                                        $('#descripcion_ev2').val(obj.descripcion_ev2);
                                                        $('#descripcion_ev3').val(obj.descripcion_ev3);
                                                        $('#descripcion_ev4').val(obj.descripcion_ev4);
                                                        $('#descripcion_ev5').val(obj.descripcion_ev5);
                                                       /*     setTimeout(() => {
                                                       var nota_ta1 = $('#nota_ta1'+obj.id+'').val();
                                                       var nota_ta2 = $('#nota_ta2'+obj.id+'').val();
                                                       var nota_ta3 = $('#nota_ta3'+obj.id+'').val();
                                                       var nota_ta4 = $('#nota_ta4'+obj.id+'').val();
                                                       var nota_ti1 = $('#nota_ti1'+obj.id+'').val();
                                                       var nota_ti2 = $('#nota_ti2'+obj.id+'').val();
                                                       var nota_ti3 = $('#nota_ti3'+obj.id+'').val();
                                                       var nota_ti4 = $('#nota_ti4'+obj.id+'').val();
                                                       var nota_tg1 = $('#nota_tg1'+obj.id+'').val();
                                                       var nota_tg2 = $('#nota_tg2'+obj.id+'').val();
                                                       var nota_tg3 = $('#nota_tg3'+obj.id+'').val();
                                                       var nota_tg4 = $('#nota_tg4'+obj.id+'').val();
                                                       var nota_le1 = $('#nota_le1'+obj.id+'').val();
                                                       var nota_le2 = $('#nota_le2'+obj.id+'').val();
                                                       var nota_le3 = $('#nota_le3'+obj.id+'').val();
                                                       var nota_le4 = $('#nota_le4'+obj.id+'').val();
                                                       var nota_ev1 = $('#nota_ev1'+obj.id+'').val();
                                                       var nota_ev2 = $('#nota_ev2'+obj.id+'').val();
                                                       var nota_ev3 = $('#nota_ev3'+obj.id+'').val();
                                                       var nota_ev4 = $('#nota_ev4'+obj.id+'').val();
                                                       var sumaTa = ((parseInt(nota_ta1) + parseInt(nota_ta2) + parseInt(nota_ta3) + parseInt(nota_ta4)) / 4);
                                                       var sumaTi = ((parseInt(nota_ti1) + parseInt(nota_ti2) + parseInt(nota_ti3) + parseInt(nota_ti4)) / 4);
                                                       var sumaTg = ((parseInt(nota_tg1) + parseInt(nota_tg2) + parseInt(nota_tg3) + parseInt(nota_tg4)) / 4);
                                                       var sumeLe = ((parseInt(nota_le1) + parseInt(nota_le2) + parseInt(nota_le3) + parseInt(nota_le4)) / 4);
                                                       var sumeEv = ((parseInt(nota_ev1) + parseInt(nota_ev2) + parseInt(nota_ev3) + parseInt(nota_ev4)) / 4);
                                                       $('#promedio'+obj.id+'').append('P: '+sumaTa+'');
                                                  }, 2000); */
                                                   });
                                                     }
                                                     else {
                                                       $.each(response.matriculados, function(inx, obj){
                                                              $('#tabla').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input  class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ta1[]"><input class="form-control  col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ta2[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ta3[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ta4[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ta5[]"></td><td><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ti1[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ti2[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ti3[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ti4[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ti5[]"></td><td><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_tg1[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_tg2[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_tg3[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_tg4[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_tg5[]"></td><td><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_le1[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_le2[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_le3[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_le4[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_le5[]"></td><td><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ev1[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ev2[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ev3[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ev4[]"><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ev5[]"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'><input type="hidden" name="tipo_tareas" value="nota_ta"></tr>');
                                                       });
                                                     }
                                                   
                                                },
                                                error: function(error){

                                                }
                                            });
                                        });
                                </script>




