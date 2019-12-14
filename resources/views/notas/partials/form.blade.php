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
                                          console.log(parcial);
                                          $('#agregarDescripciones').addClass("d-block");
                                          var url = 'buscar_alumnos/'+curso+'/'+paralelo+'/'+materia+'/'+parcial+'/'+quimestre;
                                          $('#saveNotas').addClass("d-block");
                                          $('#tabla').addClass("d-block");
                                          $('#tabla > tbody').empty();
                                            $.ajax({
                                                url: url,

                                                success: function(response){

                                                     console.log(response);
                                                     if(parcial == 3)
                                                        {
                                                            $('#thexamen').css("display", "block");
                                                            if(response.all_notas.length != 0)
                                                            {

                                                              $.each(response.all_notas, function(inx, obj){
                                                                   console.log(obj);
                                                               $('#tabla').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ta1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ta1[]" value='+obj.nota_ta1+'><input class="form-control  col-md-2 col-xs-2" id="nota_ta2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ta2[]" value='+obj.nota_ta2+'><input class="form-control col-md-2 col-xs-2" id="nota_ta3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ta3[]" value='+obj.nota_ta3+'><input class="form-control col-md-2 col-xs-2" id="nota_ta4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ta4[]" value='+obj.nota_ta4+'><input class="form-control col-md-2 col-xs-2" id="nota_ta5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ta5[]" value='+obj.nota_ta5+'><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #008cba; color: white;" style="width: 300px; height: 40px;" id="promediota'+obj.id+'"><input type="hidden" value='+obj.id_nota_ta+' name="id_nota_ta[]"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ti1'+obj.id+'"  style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ti1[]" value='+obj.nota_ti1+'><input class="form-control col-md-2 col-xs-2" id="nota_ti2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ti2[]" value='+obj.nota_ti2+'><input class="form-control col-md-2 col-xs-2" id="nota_ti3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ti3[]" value='+obj.nota_ti3+'><input class="form-control col-md-2 col-xs-2" id="nota_ti4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ti4[]" value='+obj.nota_ti4+'><input class="form-control col-md-2 col-xs-2" id="nota_ti5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ti5[]" value='+obj.nota_ti5+'><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #e99002; color: white;" style="width: 300px; height: 40px;" id="promedioti'+obj.id+'"><input type="hidden" value='+obj.id_nota_ti+' name="id_nota_ti[]"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_tg1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_tg1[]" value='+obj.nota_tg1+'><input class="form-control col-md-2 col-xs-2" id="nota_tg2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_tg2[]" value='+obj.nota_tg2+'><input class="form-control col-md-2 col-xs-2" id="nota_tg3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_tg3[]" value='+obj.nota_tg3+'><input class="form-control col-md-2 col-xs-2" id="nota_tg4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_tg4[]" value='+obj.nota_tg4+'><input class="form-control col-md-2 col-xs-2" id="nota_tg5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_tg5[]" value='+obj.nota_tg5+'><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #f04124; color: white;" style="width: 300px; height: 40px;" id="promediotg'+obj.id+'"><input type="hidden" value='+obj.id_nota_tg+' name="id_nota_tg[]"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_le1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_le1[]" value='+obj.nota_le1+'><input class="form-control col-md-2 col-xs-2" id="nota_le2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_le2[]" value='+obj.nota_le2+'><input class="form-control col-md-2 col-xs-2" id="nota_le3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_le3[]" value='+obj.nota_le3+'><input class="form-control col-md-2 col-xs-2" id="nota_le4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_le4[]" value='+obj.nota_le4+'><input class="form-control col-md-2 col-xs-2" id="nota_le5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_le5[]" value='+obj.nota_le5+'><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #5bc0de; color: white;" style="width: 300px; height: 40px;" id="promediole'+obj.id+'"><input type="hidden" value='+obj.id_nota_le+' name="id_nota_le[]"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ev1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ev1[]" value='+obj.nota_ev1+'><input class="form-control col-md-2 col-xs-2" id="nota_ev2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ev2[]" value='+obj.nota_ev2+'><input class="form-control col-md-2 col-xs-2" id="nota_ev3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ev3[]" value='+obj.nota_ev3+'><input class="form-control col-md-2 col-xs-2" id="nota_ev4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ev4[]" value='+obj.nota_ev4+'><input class="form-control col-md-2 col-xs-2" id="nota_ev5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ev5[]" value='+obj.nota_ev5+'><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #43ac6a; color: white;" style="width: 300px; height: 40px;" id="promedioev'+obj.id+'"><input type="hidden" value='+obj.id_nota_ev+' name="id_nota_ev[]"></td><td><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" value='+obj.nota_exq+' type="text" id="examen" name="examen[]"><input type="hidden" value='+obj.id_nota_examen+' name="id_nota_examen[]"></td><td><input class="form-control col-md-2 col-xs-2 center" style="width: 300px; height: 40px;" type="text" id="promediofinal'+obj.id+'"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id" value='+materia+'><input type="hidden" id="parcial" name="parcial" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre" value='+quimestre+'><input type="hidden" name="tipo_tareas" value="nota_ta"></tr>');
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
                                                                   setInterval(() => {
                                                              var nota_ta1 = $('#nota_ta1'+obj.id+'').val();
                                                              var nota_ta2 = $('#nota_ta2'+obj.id+'').val();
                                                              var nota_ta3 = $('#nota_ta3'+obj.id+'').val();
                                                              var nota_ta4 = $('#nota_ta4'+obj.id+'').val();
                                                              var nota_ta5 = $('#nota_ta5'+obj.id+'').val();
                                                              var sumaTa = ((parseFloat(nota_ta1) + parseFloat(nota_ta2) + parseFloat(nota_ta3) + parseFloat(nota_ta4)) + parseFloat(nota_ta5));
                                                              var sumaTa2 = ((nota_ta1 == 0 ? 0 : 1) +(nota_ta2 == 0 ? 0 : 1) +(nota_ta3 == 0 ? 0 : 1) +(nota_ta4 == 0 ? 0 : 1) +(nota_ta5 == 0 ? 0 : 1));
                                                              var sumaTaTotal = (sumaTa / sumaTa2);
                                                              var sumaTaTotal2 = sumaTaTotal.toFixed(2);
                                                              $('#promedioTa').on('click', () => {
                                                                   $('#promediota'+obj.id+'').empty();
                                                                   $('#promediota'+obj.id+'').css("font-size", "10px");
                                                                    $('#promediota'+obj.id+'').val(sumaTaTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_ti1 = $('#nota_ti1'+obj.id+'').val();
                                                              var nota_ti2 = $('#nota_ti2'+obj.id+'').val();
                                                              var nota_ti3 = $('#nota_ti3'+obj.id+'').val();
                                                              var nota_ti4 = $('#nota_ti4'+obj.id+'').val();
                                                              var nota_ti5 = $('#nota_ti5'+obj.id+'').val();
                                                              var sumaTi = ((parseFloat(nota_ti1) + parseFloat(nota_ti2) + parseFloat(nota_ti3) + parseFloat(nota_ti4)) + parseFloat(nota_ti5));
                                                              var sumaTi2 = ((nota_ti1 == 0 ? 0 : 1) +(nota_ti2 == 0 ? 0 : 1) +(nota_ti3 == 0 ? 0 : 1) +(nota_ti4 == 0 ? 0 : 1) +(nota_ti5 == 0 ? 0 : 1));
                                                              var sumaTiTotal = (sumaTi / sumaTi2);
                                                              var sumaTiTotal2 = sumaTiTotal.toFixed(2);
                                                              $('#promedioTi').on('click', () => {
                                                                   $('#promedioti'+obj.id+'').empty();
                                                                   $('#promedioti'+obj.id+'').css("font-size", "10px");
                                                                   $('#promedioti'+obj.id+'').val(sumaTiTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_tg1 = $('#nota_tg1'+obj.id+'').val();
                                                              var nota_tg2 = $('#nota_tg2'+obj.id+'').val();
                                                              var nota_tg3 = $('#nota_tg3'+obj.id+'').val();
                                                              var nota_tg4 = $('#nota_tg4'+obj.id+'').val();
                                                              var nota_tg5 = $('#nota_tg5'+obj.id+'').val();
                                                              var sumaTg = ((parseFloat(nota_tg1) + parseFloat(nota_tg2) + parseFloat(nota_tg3) + parseFloat(nota_tg4)) + parseFloat(nota_tg5));
                                                              var sumaTg2 = ((nota_tg1 == 0 ? 0 : 1) +(nota_tg2 == 0 ? 0 : 1) +(nota_tg3 == 0 ? 0 : 1) +(nota_tg4 == 0 ? 0 : 1) +(nota_tg5 == 0 ? 0 : 1));
                                                              var sumaTgTotal = (sumaTg / sumaTg2);
                                                              var sumaTgTotal2 = sumaTgTotal.toFixed(2);
                                                              $('#promedioTg').on('click', () => {
                                                                   $('#promediotg'+obj.id+'').empty();
                                                                   $('#promediotg'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediotg'+obj.id+'').val(sumaTgTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_le1 = $('#nota_le1'+obj.id+'').val();
                                                              var nota_le2 = $('#nota_le2'+obj.id+'').val();
                                                              var nota_le3 = $('#nota_le3'+obj.id+'').val();
                                                              var nota_le4 = $('#nota_le4'+obj.id+'').val();
                                                              var nota_le5 = $('#nota_le5'+obj.id+'').val();
                                                              var sumaLe = ((parseFloat(nota_le1) + parseFloat(nota_le2) + parseFloat(nota_le3) + parseFloat(nota_le4)) + parseFloat(nota_le5));
                                                              var sumaLe2 = ((nota_le1 == 0 ? 0 : 1) +(nota_le2 == 0 ? 0 : 1) +(nota_le3 == 0 ? 0 : 1) +(nota_le4 == 0 ? 0 : 1) +(nota_le5 == 0 ? 0 : 1));
                                                              var sumaLeTotal = (sumaLe / sumaLe2);
                                                              var sumeLeTotal2 = sumaLeTotal.toFixed(2);
                                                              $('#promedioLe').on('click', () => {
                                                                   $('#promediole'+obj.id+'').empty();
                                                                   $('#promediole'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediole'+obj.id+'').val(sumeLeTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_ev1 = $('#nota_ev1'+obj.id+'').val();
                                                              var nota_ev2 = $('#nota_ev2'+obj.id+'').val();
                                                              var nota_ev3 = $('#nota_ev3'+obj.id+'').val();
                                                              var nota_ev4 = $('#nota_ev4'+obj.id+'').val();
                                                              var nota_ev5 = $('#nota_ev5'+obj.id+'').val();
                                                              var sumaEv = ((parseFloat(nota_ev1) + parseFloat(nota_ev2) + parseFloat(nota_ev3) + parseFloat(nota_ev4)) + parseFloat(nota_ev5));
                                                              var sumaEv2 = ((nota_ev1 == 0 ? 0 : 1) +(nota_ev2 == 0 ? 0 : 1) +(nota_ev3 == 0 ? 0 : 1) +(nota_ev4 == 0 ? 0 : 1) +(nota_ev5 == 0 ? 0 : 1));
                                                              var sumaEvTotal = (sumaEv / sumaEv2);
                                                              var sumaEvTotal2 = sumaEvTotal.toFixed(2);
                                                              $('#promedioEv').on('click', () => {
                                                                   $('#promedioev'+obj.id+'').empty();
                                                                   $('#promedioev'+obj.id+'').css("font-size", "10px");
                                                                   $('#promedioev'+obj.id+'').val(sumaEvTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                            var nota_ta1 = $('#nota_ta1'+obj.id+'').val();
                                                            var nota_ta2 = $('#nota_ta2'+obj.id+'').val();
                                                            var nota_ta3 = $('#nota_ta3'+obj.id+'').val();
                                                            var nota_ta4 = $('#nota_ta4'+obj.id+'').val();
                                                            var nota_ta5 = $('#nota_ta5'+obj.id+'').val();
                                                            var nota_ta11 = nota_ta1 === "" ? 0  : nota_ta1;
                                                            var nota_ta22 = nota_ta2 === "" ? 0  : nota_ta2;
                                                            var nota_ta33 = nota_ta3 === "" ? 0  : nota_ta3;
                                                            var nota_ta44 = nota_ta4 === "" ? 0  : nota_ta4;
                                                            var nota_ta55 = nota_ta5 === "" ? 0  : nota_ta5;
                                                            var sumaTa = ((parseFloat(nota_ta11) + parseFloat(nota_ta22) + parseFloat(nota_ta33) + parseFloat(nota_ta44)) + parseFloat(nota_ta55));
                                                            var sumaTa2 = ((nota_ta11 == 0 ? 0 : 1) +(nota_ta22 == 0 ? 0 : 1) +(nota_ta33 == 0 ? 0 : 1) +(nota_ta44 == 0 ? 0 : 1) +(nota_ta55 == 0 ? 0 : 1));
                                                            var sumaTaTotal = (sumaTa / sumaTa2);
                                                            var sumaTaTotal2 = sumaTaTotal.toFixed(2);

                                                              var nota_ti1 = $('#nota_ti1'+obj.id+'').val();
                                                              var nota_ti2 = $('#nota_ti2'+obj.id+'').val();
                                                              var nota_ti3 = $('#nota_ti3'+obj.id+'').val();
                                                              var nota_ti4 = $('#nota_ti4'+obj.id+'').val();
                                                              var nota_ti5 = $('#nota_ti5'+obj.id+'').val();
                                                              var nota_ti11 = nota_ti1 === "" ? 0  : nota_ti1;
                                                              var nota_ti22 = nota_ti2 === "" ? 0  : nota_ti2;
                                                              var nota_ti33 = nota_ti3 === "" ? 0  : nota_ti3;
                                                              var nota_ti44 = nota_ti4 === "" ? 0  : nota_ti4;
                                                              var nota_ti55 = nota_ti5 === "" ? 0  : nota_ti5;
                                                              var sumaTi = ((parseFloat(nota_ti11) + parseFloat(nota_ti22) + parseFloat(nota_ti33) + parseFloat(nota_ti44)) + parseFloat(nota_ti55));
                                                              var sumaTi2 = ((nota_ti11 == 0 ? 0 : 1) +(nota_ti22 == 0 ? 0 : 1) +(nota_ti33 == 0 ? 0 : 1) +(nota_ti44 == 0 ? 0 : 1) +(nota_ti55 == 0 ? 0 : 1));
                                                              var sumaTiTotal = (sumaTi / sumaTi2);
                                                              var sumaTiTotal2 = sumaTiTotal.toFixed(2);

                                                              var nota_tg1 = $('#nota_tg1'+obj.id+'').val();
                                                              var nota_tg2 = $('#nota_tg2'+obj.id+'').val();
                                                              var nota_tg3 = $('#nota_tg3'+obj.id+'').val();
                                                              var nota_tg4 = $('#nota_tg4'+obj.id+'').val();
                                                              var nota_tg5 = $('#nota_tg5'+obj.id+'').val();
                                                              var nota_tg11 = nota_tg1 === "" ? 0  : nota_tg1;
                                                              var nota_tg22 = nota_tg2 === "" ? 0  : nota_tg2;
                                                              var nota_tg33 = nota_tg3 === "" ? 0  : nota_tg3;
                                                              var nota_tg44 = nota_tg4 === "" ? 0  : nota_tg4;
                                                              var nota_tg55 = nota_tg5 === "" ? 0  : nota_tg5;
                                                              var sumaTg = ((parseFloat(nota_tg11) + parseFloat(nota_tg22) + parseFloat(nota_tg33) + parseFloat(nota_tg44)) + parseFloat(nota_tg55));
                                                              var sumaTg2 = ((nota_tg11 == 0 ? 0 : 1) +(nota_tg22 == 0 ? 0 : 1) +(nota_tg33 == 0 ? 0 : 1) +(nota_tg44 == 0 ? 0 : 1) +(nota_tg55 == 0 ? 0 : 1));
                                                              var sumaTgTotal = (sumaTg / sumaTg2);
                                                              var sumaTgTotal2 = sumaTgTotal.toFixed(2);

                                                              var nota_le1 = $('#nota_le1'+obj.id+'').val();
                                                              var nota_le2 = $('#nota_le2'+obj.id+'').val();
                                                              var nota_le3 = $('#nota_le3'+obj.id+'').val();
                                                              var nota_le4 = $('#nota_le4'+obj.id+'').val();
                                                              var nota_le5 = $('#nota_le5'+obj.id+'').val();
                                                              var nota_le11 = nota_le1 === "" ? 0  : nota_le1;
                                                              var nota_le22 = nota_le2 === "" ? 0  : nota_le2;
                                                              var nota_le33 = nota_le3 === "" ? 0  : nota_le3;
                                                              var nota_le44 = nota_le4 === "" ? 0  : nota_le4;
                                                              var nota_le55 = nota_le5 === "" ? 0  : nota_le5;
                                                              var sumaLe = ((parseFloat(nota_le11) + parseFloat(nota_le22) + parseFloat(nota_le33) + parseFloat(nota_le44)) + parseFloat(nota_le55));
                                                              var sumaLe2 = ((nota_le11 == 0 ? 0 : 1) +(nota_le22 == 0 ? 0 : 1) +(nota_le33 == 0 ? 0 : 1) +(nota_le44 == 0 ? 0 : 1) +(nota_le55 == 0 ? 0 : 1));
                                                              var sumaLeTotal = (sumaLe / sumaLe2);
                                                              var sumaLeTotal2 = sumaLeTotal.toFixed(2);

                                                              var nota_ev1 = $('#nota_ev1'+obj.id+'').val();
                                                              var nota_ev2 = $('#nota_ev2'+obj.id+'').val();
                                                              var nota_ev3 = $('#nota_ev3'+obj.id+'').val();
                                                              var nota_ev4 = $('#nota_ev4'+obj.id+'').val();
                                                              var nota_ev5 = $('#nota_ev5'+obj.id+'').val();
                                                              var nota_ev11 = nota_ev1 === "" ? 0  : nota_ev1;
                                                              var nota_ev22 = nota_ev2 === "" ? 0  : nota_ev2;
                                                              var nota_ev33 = nota_ev3 === "" ? 0  : nota_ev3;
                                                              var nota_ev44 = nota_ev4 === "" ? 0  : nota_ev4;
                                                              var nota_ev55 = nota_ev5 === "" ? 0  : nota_ev5;
                                                              var sumaEv = ((parseFloat(nota_ev11) + parseFloat(nota_ev22) + parseFloat(nota_ev33) + parseFloat(nota_ev44)) + parseFloat(nota_ev55));
                                                              var sumaEv2 = ((nota_ev11 == 0 ? 0 : 1) +(nota_ev22 == 0 ? 0 : 1) +(nota_ev33 == 0 ? 0 : 1) +(nota_ev44 == 0 ? 0 : 1) +(nota_ev55 == 0 ? 0 : 1));
                                                              var sumaEvTotal = (sumaEv / sumaEv2);
                                                              var sumaEvTotal2 = sumaEvTotal.toFixed(2);

                                                              var sumaTotalTodo = ((parseFloat(sumaTaTotal2) + parseFloat(sumaTiTotal2) + parseFloat(sumaTgTotal2) + parseFloat(sumaLeTotal2) + parseFloat(sumaEvTotal2)) / 5);
                                                              var sumaTotalTodo2 = sumaTotalTodo.toFixed(2);
                                                              $('#promedioFinal').on('click', () => {
                                                                   $('#promediofinal'+obj.id+'').empty();
                                                                   $('#promediofinal'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediofinal'+obj.id+'').val(sumaTotalTodo2);
                                                              });
                                                         }, 500);
                                                          });

                                                            }
                                                            else {
                                                                $.each(response.matriculados, function(inx, obj){
                                                                    $('#tabla').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ta1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ta1[]"><input class="form-control  col-md-2 col-xs-2" id="nota_ta2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ta2[]"><input class="form-control col-md-2 col-xs-2" id="nota_ta3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ta3[]"><input class="form-control col-md-2 col-xs-2" id="nota_ta4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ta4[]"><input class="form-control col-md-2 col-xs-2" id="nota_ta5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ta5[]"><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #008cba; color: white;" style="width: 300px; height: 40px;" id="promediota'+obj.id+'"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ti1'+obj.id+'"  style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ti1[]"><input class="form-control col-md-2 col-xs-2" id="nota_ti2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ti2[]"><input class="form-control col-md-2 col-xs-2" id="nota_ti3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ti3[]"><input class="form-control col-md-2 col-xs-2" id="nota_ti4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ti4[]"><input class="form-control col-md-2 col-xs-2" id="nota_ti5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ti5[]"><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #e99002; color: white;" style="width: 300px; height: 40px;" id="promedioti'+obj.id+'"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_tg1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_tg1[]"><input class="form-control col-md-2 col-xs-2" id="nota_tg2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_tg2[]"><input class="form-control col-md-2 col-xs-2" id="nota_tg3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_tg3[]"><input class="form-control col-md-2 col-xs-2" id="nota_tg4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_tg4[]"><input class="form-control col-md-2 col-xs-2" id="nota_tg5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_tg5[]"><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #f04124; color: white;" style="width: 300px; height: 40px;" id="promediotg'+obj.id+'"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_le1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_le1[]"><input class="form-control col-md-2 col-xs-2" id="nota_le2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_le2[]"><input class="form-control col-md-2 col-xs-2" id="nota_le3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_le3[]"><input class="form-control col-md-2 col-xs-2" id="nota_le4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_le4[]"><input class="form-control col-md-2 col-xs-2" id="nota_le5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_le5[]"><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #5bc0de; color: white;" style="width: 300px; height: 40px;" id="promediole'+obj.id+'"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ev1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ev1[]"><input class="form-control col-md-2 col-xs-2" id="nota_ev2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ev2[]"><input class="form-control col-md-2 col-xs-2" id="nota_ev3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ev3[]"><input class="form-control col-md-2 col-xs-2" id="nota_ev4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ev4[]"><input class="form-control col-md-2 col-xs-2" id="nota_ev5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ev5[]"><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #43ac6a; color: white;" style="width: 300px; height: 40px;" id="promedioev'+obj.id+'"></td><td><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="text" id="promediofinal'+obj.id+'"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id" value='+materia+'><input type="hidden" id="parcial" name="parcial" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre" value='+quimestre+'><input type="hidden" name="tipo_tareas" value="nota_ta"></tr>');
                                                                    setInterval(() => {
                                                              var nota_ta1 = $('#nota_ta1'+obj.id+'').val();
                                                              var nota_ta2 = $('#nota_ta2'+obj.id+'').val();
                                                              var nota_ta3 = $('#nota_ta3'+obj.id+'').val();
                                                              var nota_ta4 = $('#nota_ta4'+obj.id+'').val();
                                                              var nota_ta5 = $('#nota_ta5'+obj.id+'').val();
                                                              var nota_ta11 = nota_ta1 === "" ? 0  : nota_ta1;
                                                              var nota_ta22 = nota_ta2 === "" ? 0  : nota_ta2;
                                                              var nota_ta33 = nota_ta3 === "" ? 0  : nota_ta3;
                                                              var nota_ta44 = nota_ta4 === "" ? 0  : nota_ta4;
                                                              var nota_ta55 = nota_ta5 === "" ? 0  : nota_ta5;
                                                              var sumaTa = ((parseFloat(nota_ta11) + parseFloat(nota_ta22) + parseFloat(nota_ta33) + parseFloat(nota_ta44)) + parseFloat(nota_ta55));
                                                              var sumaTa2 = ((nota_ta11 == 0 ? 0 : 1) +(nota_ta22 == 0 ? 0 : 1) +(nota_ta33 == 0 ? 0 : 1) +(nota_ta44 == 0 ? 0 : 1) +(nota_ta55 == 0 ? 0 : 1));
                                                              var sumaTaTotal = (sumaTa / sumaTa2);
                                                              var sumaTaTotal2 = sumaTaTotal.toFixed(2);
                                                              $('#promedioTa').on('click', () => {
                                                                   $('#promediota'+obj.id+'').empty();
                                                                   $('#promediota'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediota'+obj.id+'').val(sumaTaTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_ti1 = $('#nota_ti1'+obj.id+'').val();
                                                              var nota_ti2 = $('#nota_ti2'+obj.id+'').val();
                                                              var nota_ti3 = $('#nota_ti3'+obj.id+'').val();
                                                              var nota_ti4 = $('#nota_ti4'+obj.id+'').val();
                                                              var nota_ti5 = $('#nota_ti5'+obj.id+'').val();
                                                              var nota_ti11 = nota_ti1 === "" ? 0  : nota_ti1;
                                                              var nota_ti22 = nota_ti2 === "" ? 0  : nota_ti2;
                                                              var nota_ti33 = nota_ti3 === "" ? 0  : nota_ti3;
                                                              var nota_ti44 = nota_ti4 === "" ? 0  : nota_ti4;
                                                              var nota_ti55 = nota_ti5 === "" ? 0  : nota_ti5;
                                                              var sumaTi = ((parseFloat(nota_ti11) + parseFloat(nota_ti22) + parseFloat(nota_ti33) + parseFloat(nota_ti44)) + parseFloat(nota_ti55));
                                                              var sumaTi2 = ((nota_ti11 == 0 ? 0 : 1) +(nota_ti22 == 0 ? 0 : 1) +(nota_ti33 == 0 ? 0 : 1) +(nota_ti44 == 0 ? 0 : 1) +(nota_ti55 == 0 ? 0 : 1));
                                                              var sumaTiTotal = (sumaTi / sumaTi2);
                                                              var sumaTiTotal2 = sumaTiTotal.toFixed(2);
                                                              $('#promedioTi').on('click', () => {
                                                                   $('#promedioti'+obj.id+'').empty();
                                                                   $('#promedioti'+obj.id+'').css("font-size", "10px");
                                                                   $('#promedioti'+obj.id+'').val(sumaTiTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_tg1 = $('#nota_tg1'+obj.id+'').val();
                                                              var nota_tg2 = $('#nota_tg2'+obj.id+'').val();
                                                              var nota_tg3 = $('#nota_tg3'+obj.id+'').val();
                                                              var nota_tg4 = $('#nota_tg4'+obj.id+'').val();
                                                              var nota_tg5 = $('#nota_tg5'+obj.id+'').val();
                                                              var nota_tg11 = nota_tg1 === "" ? 0  : nota_tg1;
                                                              var nota_tg22 = nota_tg2 === "" ? 0  : nota_tg2;
                                                              var nota_tg33 = nota_tg3 === "" ? 0  : nota_tg3;
                                                              var nota_tg44 = nota_tg4 === "" ? 0  : nota_tg4;
                                                              var nota_tg55 = nota_tg5 === "" ? 0  : nota_tg5;
                                                              var sumaTg = ((parseFloat(nota_tg11) + parseFloat(nota_tg22) + parseFloat(nota_tg33) + parseFloat(nota_tg44)) + parseFloat(nota_tg55));
                                                              var sumaTg2 = ((nota_tg11 == 0 ? 0 : 1) +(nota_tg22 == 0 ? 0 : 1) +(nota_tg33 == 0 ? 0 : 1) +(nota_tg44 == 0 ? 0 : 1) +(nota_tg55 == 0 ? 0 : 1));
                                                              var sumaTgTotal = (sumaTg / sumaTg2);
                                                              var sumaTgTotal2 = sumaTgTotal.toFixed(2);
                                                              $('#promedioTg').on('click', () => {
                                                                   $('#promediotg'+obj.id+'').empty();
                                                                   $('#promediotg'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediotg'+obj.id+'').val(sumaTgTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_le1 = $('#nota_le1'+obj.id+'').val();
                                                              var nota_le2 = $('#nota_le2'+obj.id+'').val();
                                                              var nota_le3 = $('#nota_le3'+obj.id+'').val();
                                                              var nota_le4 = $('#nota_le4'+obj.id+'').val();
                                                              var nota_le5 = $('#nota_le5'+obj.id+'').val();
                                                              var nota_le11 = nota_le1 === "" ? 0  : nota_le1;
                                                              var nota_le22 = nota_le2 === "" ? 0  : nota_le2;
                                                              var nota_le33 = nota_le3 === "" ? 0  : nota_le3;
                                                              var nota_le44 = nota_le4 === "" ? 0  : nota_le4;
                                                              var nota_le55 = nota_le5 === "" ? 0  : nota_le5;
                                                              var sumaLe = ((parseFloat(nota_le11) + parseFloat(nota_le22) + parseFloat(nota_le33) + parseFloat(nota_le44)) + parseFloat(nota_le55));
                                                              var sumaLe2 = ((nota_le11 == 0 ? 0 : 1) +(nota_le22 == 0 ? 0 : 1) +(nota_le33 == 0 ? 0 : 1) +(nota_le44 == 0 ? 0 : 1) +(nota_le55 == 0 ? 0 : 1));
                                                              var sumaLeTotal = (sumaLe / sumaLe2);
                                                              var sumaLeTotal2 = sumaLeTotal.toFixed(2);
                                                              $('#promedioLe').on('click', () => {
                                                                   $('#promediole'+obj.id+'').empty();
                                                                   $('#promediole'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediole'+obj.id+'').val(sumaLeTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_ev1 = $('#nota_ev1'+obj.id+'').val();
                                                              var nota_ev2 = $('#nota_ev2'+obj.id+'').val();
                                                              var nota_ev3 = $('#nota_ev3'+obj.id+'').val();
                                                              var nota_ev4 = $('#nota_ev4'+obj.id+'').val();
                                                              var nota_ev5 = $('#nota_ev5'+obj.id+'').val();
                                                              var nota_ev11 = nota_ev1 === "" ? 0  : nota_ev1;
                                                              var nota_ev22 = nota_ev2 === "" ? 0  : nota_ev2;
                                                              var nota_ev33 = nota_ev3 === "" ? 0  : nota_ev3;
                                                              var nota_ev44 = nota_ev4 === "" ? 0  : nota_ev4;
                                                              var nota_ev55 = nota_ev5 === "" ? 0  : nota_ev5;
                                                              var sumaEv = ((parseFloat(nota_ev11) + parseFloat(nota_ev22) + parseFloat(nota_ev33) + parseFloat(nota_ev44)) + parseFloat(nota_ev55));
                                                              var sumaEv2 = ((nota_ev11 == 0 ? 0 : 1) +(nota_ev22 == 0 ? 0 : 1) +(nota_ev33 == 0 ? 0 : 1) +(nota_ev44 == 0 ? 0 : 1) +(nota_ev55 == 0 ? 0 : 1));
                                                              var sumaEvTotal = (sumaEv / sumaEv2);
                                                              var sumaEvTotal2 = sumaEvTotal.toFixed(2);
                                                              $('#promedioEv').on('click', () => {
                                                                   $('#promedioev'+obj.id+'').empty();
                                                                   $('#promedioev'+obj.id+'').css("font-size", "10px");
                                                                   $('#promedioev'+obj.id+'').val(sumaEvTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                            var nota_ta1 = $('#nota_ta1'+obj.id+'').val();
                                                            var nota_ta2 = $('#nota_ta2'+obj.id+'').val();
                                                            var nota_ta3 = $('#nota_ta3'+obj.id+'').val();
                                                            var nota_ta4 = $('#nota_ta4'+obj.id+'').val();
                                                            var nota_ta5 = $('#nota_ta5'+obj.id+'').val();
                                                            var nota_ta11 = nota_ta1 === "" ? 0  : nota_ta1;
                                                            var nota_ta22 = nota_ta2 === "" ? 0  : nota_ta2;
                                                            var nota_ta33 = nota_ta3 === "" ? 0  : nota_ta3;
                                                            var nota_ta44 = nota_ta4 === "" ? 0  : nota_ta4;
                                                            var nota_ta55 = nota_ta5 === "" ? 0  : nota_ta5;
                                                            var sumaTa = ((parseFloat(nota_ta11) + parseFloat(nota_ta22) + parseFloat(nota_ta33) + parseFloat(nota_ta44)) + parseFloat(nota_ta55));
                                                            var sumaTa2 = ((nota_ta11 == 0 ? 0 : 1) +(nota_ta22 == 0 ? 0 : 1) +(nota_ta33 == 0 ? 0 : 1) +(nota_ta44 == 0 ? 0 : 1) +(nota_ta55 == 0 ? 0 : 1));
                                                            var sumaTaTotal = (sumaTa / sumaTa2);
                                                            var sumaTaTotal2 = sumaTaTotal.toFixed(2);

                                                              var nota_ti1 = $('#nota_ti1'+obj.id+'').val();
                                                              var nota_ti2 = $('#nota_ti2'+obj.id+'').val();
                                                              var nota_ti3 = $('#nota_ti3'+obj.id+'').val();
                                                              var nota_ti4 = $('#nota_ti4'+obj.id+'').val();
                                                              var nota_ti5 = $('#nota_ti5'+obj.id+'').val();
                                                              var nota_ti11 = nota_ti1 === "" ? 0  : nota_ti1;
                                                              var nota_ti22 = nota_ti2 === "" ? 0  : nota_ti2;
                                                              var nota_ti33 = nota_ti3 === "" ? 0  : nota_ti3;
                                                              var nota_ti44 = nota_ti4 === "" ? 0  : nota_ti4;
                                                              var nota_ti55 = nota_ti5 === "" ? 0  : nota_ti5;
                                                              var sumaTi = ((parseFloat(nota_ti11) + parseFloat(nota_ti22) + parseFloat(nota_ti33) + parseFloat(nota_ti44)) + parseFloat(nota_ti55));
                                                              var sumaTi2 = ((nota_ti11 == 0 ? 0 : 1) +(nota_ti22 == 0 ? 0 : 1) +(nota_ti33 == 0 ? 0 : 1) +(nota_ti44 == 0 ? 0 : 1) +(nota_ti55 == 0 ? 0 : 1));
                                                              var sumaTiTotal = (sumaTi / sumaTi2);
                                                              var sumaTiTotal2 = sumaTiTotal.toFixed(2);

                                                              var nota_tg1 = $('#nota_tg1'+obj.id+'').val();
                                                              var nota_tg2 = $('#nota_tg2'+obj.id+'').val();
                                                              var nota_tg3 = $('#nota_tg3'+obj.id+'').val();
                                                              var nota_tg4 = $('#nota_tg4'+obj.id+'').val();
                                                              var nota_tg5 = $('#nota_tg5'+obj.id+'').val();
                                                              var nota_tg11 = nota_tg1 === "" ? 0  : nota_tg1;
                                                              var nota_tg22 = nota_tg2 === "" ? 0  : nota_tg2;
                                                              var nota_tg33 = nota_tg3 === "" ? 0  : nota_tg3;
                                                              var nota_tg44 = nota_tg4 === "" ? 0  : nota_tg4;
                                                              var nota_tg55 = nota_tg5 === "" ? 0  : nota_tg5;
                                                              var sumaTg = ((parseFloat(nota_tg11) + parseFloat(nota_tg22) + parseFloat(nota_tg33) + parseFloat(nota_tg44)) + parseFloat(nota_tg55));
                                                              var sumaTg2 = ((nota_tg11 == 0 ? 0 : 1) +(nota_tg22 == 0 ? 0 : 1) +(nota_tg33 == 0 ? 0 : 1) +(nota_tg44 == 0 ? 0 : 1) +(nota_tg55 == 0 ? 0 : 1));
                                                              var sumaTgTotal = (sumaTg / sumaTg2);
                                                              var sumaTgTotal2 = sumaTgTotal.toFixed(2);

                                                              var nota_le1 = $('#nota_le1'+obj.id+'').val();
                                                              var nota_le2 = $('#nota_le2'+obj.id+'').val();
                                                              var nota_le3 = $('#nota_le3'+obj.id+'').val();
                                                              var nota_le4 = $('#nota_le4'+obj.id+'').val();
                                                              var nota_le5 = $('#nota_le5'+obj.id+'').val();
                                                              var nota_le11 = nota_le1 === "" ? 0  : nota_le1;
                                                              var nota_le22 = nota_le2 === "" ? 0  : nota_le2;
                                                              var nota_le33 = nota_le3 === "" ? 0  : nota_le3;
                                                              var nota_le44 = nota_le4 === "" ? 0  : nota_le4;
                                                              var nota_le55 = nota_le5 === "" ? 0  : nota_le5;
                                                              var sumaLe = ((parseFloat(nota_le11) + parseFloat(nota_le22) + parseFloat(nota_le33) + parseFloat(nota_le44)) + parseFloat(nota_le55));
                                                              var sumaLe2 = ((nota_le11 == 0 ? 0 : 1) +(nota_le22 == 0 ? 0 : 1) +(nota_le33 == 0 ? 0 : 1) +(nota_le44 == 0 ? 0 : 1) +(nota_le55 == 0 ? 0 : 1));
                                                              var sumaLeTotal = (sumaLe / sumaLe2);
                                                              var sumaLeTotal2 = sumaLeTotal.toFixed(2);

                                                              var nota_ev1 = $('#nota_ev1'+obj.id+'').val();
                                                              var nota_ev2 = $('#nota_ev2'+obj.id+'').val();
                                                              var nota_ev3 = $('#nota_ev3'+obj.id+'').val();
                                                              var nota_ev4 = $('#nota_ev4'+obj.id+'').val();
                                                              var nota_ev5 = $('#nota_ev5'+obj.id+'').val();
                                                              var nota_ev11 = nota_ev1 === "" ? 0  : nota_ev1;
                                                              var nota_ev22 = nota_ev2 === "" ? 0  : nota_ev2;
                                                              var nota_ev33 = nota_ev3 === "" ? 0  : nota_ev3;
                                                              var nota_ev44 = nota_ev4 === "" ? 0  : nota_ev4;
                                                              var nota_ev55 = nota_ev5 === "" ? 0  : nota_ev5;
                                                              var sumaEv = ((parseFloat(nota_ev11) + parseFloat(nota_ev22) + parseFloat(nota_ev33) + parseFloat(nota_ev44)) + parseFloat(nota_ev55));
                                                              var sumaEv2 = ((nota_ev11 == 0 ? 0 : 1) +(nota_ev22 == 0 ? 0 : 1) +(nota_ev33 == 0 ? 0 : 1) +(nota_ev44 == 0 ? 0 : 1) +(nota_ev55 == 0 ? 0 : 1));
                                                              var sumaEvTotal = (sumaEv / sumaEv2);
                                                              var sumaEvTotal2 = sumaEvTotal.toFixed(2);

                                                              var sumaTotalTodo = ((parseFloat(sumaTaTotal2) + parseFloat(sumaTiTotal2) + parseFloat(sumaTgTotal2) + parseFloat(sumaLeTotal2) + parseFloat(sumaEvTotal2)) / 5);
                                                              var sumaTotalTodo2 = sumaTotalTodo.toFixed(2);
                                                              $('#promedioFinal').on('click', () => {
                                                                   $('#promediofinal'+obj.id+'').empty();
                                                                   $('#promediofinal'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediofinal'+obj.id+'').val(sumaTotalTodo2);
                                                              });
                                                         }, 500);
                                                               });
                                                            }
                                                        }
                                                        else {
                                                            if(response.all_notas.length != 0)
                                                            {

                                                              $.each(response.all_notas, function(inx, obj){
                                                                   console.log(obj);
                                                               $('#tabla').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ta1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ta1[]" value='+obj.nota_ta1+'><input class="form-control  col-md-2 col-xs-2" id="nota_ta2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ta2[]" value='+obj.nota_ta2+'><input class="form-control col-md-2 col-xs-2" id="nota_ta3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ta3[]" value='+obj.nota_ta3+'><input class="form-control col-md-2 col-xs-2" id="nota_ta4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ta4[]" value='+obj.nota_ta4+'><input class="form-control col-md-2 col-xs-2" id="nota_ta5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ta5[]" value='+obj.nota_ta5+'><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #008cba; color: white;" style="width: 300px; height: 40px;" id="promediota'+obj.id+'"><input type="hidden" value='+obj.id_nota_ta+' name="id_nota_ta[]"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ti1'+obj.id+'"  style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ti1[]" value='+obj.nota_ti1+'><input class="form-control col-md-2 col-xs-2" id="nota_ti2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ti2[]" value='+obj.nota_ti2+'><input class="form-control col-md-2 col-xs-2" id="nota_ti3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ti3[]" value='+obj.nota_ti3+'><input class="form-control col-md-2 col-xs-2" id="nota_ti4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ti4[]" value='+obj.nota_ti4+'><input class="form-control col-md-2 col-xs-2" id="nota_ti5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ti5[]" value='+obj.nota_ti5+'><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #e99002; color: white;" style="width: 300px; height: 40px;" id="promedioti'+obj.id+'"><input type="hidden" value='+obj.id_nota_ti+' name="id_nota_ti[]"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_tg1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_tg1[]" value='+obj.nota_tg1+'><input class="form-control col-md-2 col-xs-2" id="nota_tg2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_tg2[]" value='+obj.nota_tg2+'><input class="form-control col-md-2 col-xs-2" id="nota_tg3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_tg3[]" value='+obj.nota_tg3+'><input class="form-control col-md-2 col-xs-2" id="nota_tg4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_tg4[]" value='+obj.nota_tg4+'><input class="form-control col-md-2 col-xs-2" id="nota_tg5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_tg5[]" value='+obj.nota_tg5+'><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #f04124; color: white;" style="width: 300px; height: 40px;" id="promediotg'+obj.id+'"><input type="hidden" value='+obj.id_nota_tg+' name="id_nota_tg[]"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_le1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_le1[]" value='+obj.nota_le1+'><input class="form-control col-md-2 col-xs-2" id="nota_le2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_le2[]" value='+obj.nota_le2+'><input class="form-control col-md-2 col-xs-2" id="nota_le3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_le3[]" value='+obj.nota_le3+'><input class="form-control col-md-2 col-xs-2" id="nota_le4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_le4[]" value='+obj.nota_le4+'><input class="form-control col-md-2 col-xs-2" id="nota_le5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_le5[]" value='+obj.nota_le5+'><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #5bc0de; color: white;" style="width: 300px; height: 40px;" id="promediole'+obj.id+'"><input type="hidden" value='+obj.id_nota_le+' name="id_nota_le[]"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ev1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ev1[]" value='+obj.nota_ev1+'><input class="form-control col-md-2 col-xs-2" id="nota_ev2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ev2[]" value='+obj.nota_ev2+'><input class="form-control col-md-2 col-xs-2" id="nota_ev3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ev3[]" value='+obj.nota_ev3+'><input class="form-control col-md-2 col-xs-2" id="nota_ev4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ev4[]" value='+obj.nota_ev4+'><input class="form-control col-md-2 col-xs-2" id="nota_ev5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ev5[]" value='+obj.nota_ev5+'><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #43ac6a; color: white;" style="width: 300px; height: 40px;" id="promedioev'+obj.id+'"><input type="hidden" value='+obj.id_nota_ev+' name="id_nota_ev[]"></td><td><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="text" id="promediofinal'+obj.id+'"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id" value='+materia+'><input type="hidden" id="parcial" name="parcial" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre" value='+quimestre+'><input type="hidden" name="tipo_tareas" value="nota_ta"></tr>');
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
                                                                   setInterval(() => {
                                                              var nota_ta1 = $('#nota_ta1'+obj.id+'').val();
                                                              var nota_ta2 = $('#nota_ta2'+obj.id+'').val();
                                                              var nota_ta3 = $('#nota_ta3'+obj.id+'').val();
                                                              var nota_ta4 = $('#nota_ta4'+obj.id+'').val();
                                                              var nota_ta5 = $('#nota_ta5'+obj.id+'').val();
                                                              var sumaTa = ((parseFloat(nota_ta1) + parseFloat(nota_ta2) + parseFloat(nota_ta3) + parseFloat(nota_ta4)) + parseFloat(nota_ta5));
                                                              var sumaTa2 = ((nota_ta1 == 0 ? 0 : 1) +(nota_ta2 == 0 ? 0 : 1) +(nota_ta3 == 0 ? 0 : 1) +(nota_ta4 == 0 ? 0 : 1) +(nota_ta5 == 0 ? 0 : 1));
                                                              var sumaTaTotal = (sumaTa / sumaTa2);
                                                              var sumaTaTotal2 = sumaTaTotal.toFixed(2);
                                                              $('#promedioTa').on('click', () => {
                                                                   $('#promediota'+obj.id+'').empty();
                                                                   $('#promediota'+obj.id+'').css("font-size", "10px");
                                                                    $('#promediota'+obj.id+'').val(sumaTaTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_ti1 = $('#nota_ti1'+obj.id+'').val();
                                                              var nota_ti2 = $('#nota_ti2'+obj.id+'').val();
                                                              var nota_ti3 = $('#nota_ti3'+obj.id+'').val();
                                                              var nota_ti4 = $('#nota_ti4'+obj.id+'').val();
                                                              var nota_ti5 = $('#nota_ti5'+obj.id+'').val();
                                                              var sumaTi = ((parseFloat(nota_ti1) + parseFloat(nota_ti2) + parseFloat(nota_ti3) + parseFloat(nota_ti4)) + parseFloat(nota_ti5));
                                                              var sumaTi2 = ((nota_ti1 == 0 ? 0 : 1) +(nota_ti2 == 0 ? 0 : 1) +(nota_ti3 == 0 ? 0 : 1) +(nota_ti4 == 0 ? 0 : 1) +(nota_ti5 == 0 ? 0 : 1));
                                                              var sumaTiTotal = (sumaTi / sumaTi2);
                                                              var sumaTiTotal2 = sumaTiTotal.toFixed(2);
                                                              $('#promedioTi').on('click', () => {
                                                                   $('#promedioti'+obj.id+'').empty();
                                                                   $('#promedioti'+obj.id+'').css("font-size", "10px");
                                                                   $('#promedioti'+obj.id+'').val(sumaTiTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_tg1 = $('#nota_tg1'+obj.id+'').val();
                                                              var nota_tg2 = $('#nota_tg2'+obj.id+'').val();
                                                              var nota_tg3 = $('#nota_tg3'+obj.id+'').val();
                                                              var nota_tg4 = $('#nota_tg4'+obj.id+'').val();
                                                              var nota_tg5 = $('#nota_tg5'+obj.id+'').val();
                                                              var sumaTg = ((parseFloat(nota_tg1) + parseFloat(nota_tg2) + parseFloat(nota_tg3) + parseFloat(nota_tg4)) + parseFloat(nota_tg5));
                                                              var sumaTg2 = ((nota_tg1 == 0 ? 0 : 1) +(nota_tg2 == 0 ? 0 : 1) +(nota_tg3 == 0 ? 0 : 1) +(nota_tg4 == 0 ? 0 : 1) +(nota_tg5 == 0 ? 0 : 1));
                                                              var sumaTgTotal = (sumaTg / sumaTg2);
                                                              var sumaTgTotal2 = sumaTgTotal.toFixed(2);
                                                              $('#promedioTg').on('click', () => {
                                                                   $('#promediotg'+obj.id+'').empty();
                                                                   $('#promediotg'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediotg'+obj.id+'').val(sumaTgTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_le1 = $('#nota_le1'+obj.id+'').val();
                                                              var nota_le2 = $('#nota_le2'+obj.id+'').val();
                                                              var nota_le3 = $('#nota_le3'+obj.id+'').val();
                                                              var nota_le4 = $('#nota_le4'+obj.id+'').val();
                                                              var nota_le5 = $('#nota_le5'+obj.id+'').val();
                                                              var sumaLe = ((parseFloat(nota_le1) + parseFloat(nota_le2) + parseFloat(nota_le3) + parseFloat(nota_le4)) + parseFloat(nota_le5));
                                                              var sumaLe2 = ((nota_le1 == 0 ? 0 : 1) +(nota_le2 == 0 ? 0 : 1) +(nota_le3 == 0 ? 0 : 1) +(nota_le4 == 0 ? 0 : 1) +(nota_le5 == 0 ? 0 : 1));
                                                              var sumaLeTotal = (sumaLe / sumaLe2);
                                                              var sumeLeTotal2 = sumaLeTotal.toFixed(2);
                                                              $('#promedioLe').on('click', () => {
                                                                   $('#promediole'+obj.id+'').empty();
                                                                   $('#promediole'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediole'+obj.id+'').val(sumeLeTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_ev1 = $('#nota_ev1'+obj.id+'').val();
                                                              var nota_ev2 = $('#nota_ev2'+obj.id+'').val();
                                                              var nota_ev3 = $('#nota_ev3'+obj.id+'').val();
                                                              var nota_ev4 = $('#nota_ev4'+obj.id+'').val();
                                                              var nota_ev5 = $('#nota_ev5'+obj.id+'').val();
                                                              var sumaEv = ((parseFloat(nota_ev1) + parseFloat(nota_ev2) + parseFloat(nota_ev3) + parseFloat(nota_ev4)) + parseFloat(nota_ev5));
                                                              var sumaEv2 = ((nota_ev1 == 0 ? 0 : 1) +(nota_ev2 == 0 ? 0 : 1) +(nota_ev3 == 0 ? 0 : 1) +(nota_ev4 == 0 ? 0 : 1) +(nota_ev5 == 0 ? 0 : 1));
                                                              var sumaEvTotal = (sumaEv / sumaEv2);
                                                              var sumaEvTotal2 = sumaEvTotal.toFixed(2);
                                                              $('#promedioEv').on('click', () => {
                                                                   $('#promedioev'+obj.id+'').empty();
                                                                   $('#promedioev'+obj.id+'').css("font-size", "10px");
                                                                   $('#promedioev'+obj.id+'').val(sumaEvTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                         var nota_ta1 = $('#nota_ta1'+obj.id+'').val();
                                                         var nota_ta2 = $('#nota_ta2'+obj.id+'').val();
                                                         var nota_ta3 = $('#nota_ta3'+obj.id+'').val();
                                                         var nota_ta4 = $('#nota_ta4'+obj.id+'').val();
                                                         var nota_ta5 = $('#nota_ta5'+obj.id+'').val();
                                                         var nota_ta11 = nota_ta1 === "" ? 0  : nota_ta1;
                                                         var nota_ta22 = nota_ta2 === "" ? 0  : nota_ta2;
                                                         var nota_ta33 = nota_ta3 === "" ? 0  : nota_ta3;
                                                         var nota_ta44 = nota_ta4 === "" ? 0  : nota_ta4;
                                                         var nota_ta55 = nota_ta5 === "" ? 0  : nota_ta5;
                                                         var sumaTa = ((parseFloat(nota_ta11) + parseFloat(nota_ta22) + parseFloat(nota_ta33) + parseFloat(nota_ta44)) + parseFloat(nota_ta55));
                                                         var sumaTa2 = ((nota_ta11 == 0 ? 0 : 1) +(nota_ta22 == 0 ? 0 : 1) +(nota_ta33 == 0 ? 0 : 1) +(nota_ta44 == 0 ? 0 : 1) +(nota_ta55 == 0 ? 0 : 1));
                                                         var sumaTaTotal = (sumaTa / sumaTa2);
                                                         var sumaTaTotal2 = sumaTaTotal.toFixed(2);

                                                           var nota_ti1 = $('#nota_ti1'+obj.id+'').val();
                                                           var nota_ti2 = $('#nota_ti2'+obj.id+'').val();
                                                           var nota_ti3 = $('#nota_ti3'+obj.id+'').val();
                                                           var nota_ti4 = $('#nota_ti4'+obj.id+'').val();
                                                           var nota_ti5 = $('#nota_ti5'+obj.id+'').val();
                                                           var nota_ti11 = nota_ti1 === "" ? 0  : nota_ti1;
                                                           var nota_ti22 = nota_ti2 === "" ? 0  : nota_ti2;
                                                           var nota_ti33 = nota_ti3 === "" ? 0  : nota_ti3;
                                                           var nota_ti44 = nota_ti4 === "" ? 0  : nota_ti4;
                                                           var nota_ti55 = nota_ti5 === "" ? 0  : nota_ti5;
                                                           var sumaTi = ((parseFloat(nota_ti11) + parseFloat(nota_ti22) + parseFloat(nota_ti33) + parseFloat(nota_ti44)) + parseFloat(nota_ti55));
                                                           var sumaTi2 = ((nota_ti11 == 0 ? 0 : 1) +(nota_ti22 == 0 ? 0 : 1) +(nota_ti33 == 0 ? 0 : 1) +(nota_ti44 == 0 ? 0 : 1) +(nota_ti55 == 0 ? 0 : 1));
                                                           var sumaTiTotal = (sumaTi / sumaTi2);
                                                           var sumaTiTotal2 = sumaTiTotal.toFixed(2);

                                                           var nota_tg1 = $('#nota_tg1'+obj.id+'').val();
                                                           var nota_tg2 = $('#nota_tg2'+obj.id+'').val();
                                                           var nota_tg3 = $('#nota_tg3'+obj.id+'').val();
                                                           var nota_tg4 = $('#nota_tg4'+obj.id+'').val();
                                                           var nota_tg5 = $('#nota_tg5'+obj.id+'').val();
                                                           var nota_tg11 = nota_tg1 === "" ? 0  : nota_tg1;
                                                           var nota_tg22 = nota_tg2 === "" ? 0  : nota_tg2;
                                                           var nota_tg33 = nota_tg3 === "" ? 0  : nota_tg3;
                                                           var nota_tg44 = nota_tg4 === "" ? 0  : nota_tg4;
                                                           var nota_tg55 = nota_tg5 === "" ? 0  : nota_tg5;
                                                           var sumaTg = ((parseFloat(nota_tg11) + parseFloat(nota_tg22) + parseFloat(nota_tg33) + parseFloat(nota_tg44)) + parseFloat(nota_tg55));
                                                           var sumaTg2 = ((nota_tg11 == 0 ? 0 : 1) +(nota_tg22 == 0 ? 0 : 1) +(nota_tg33 == 0 ? 0 : 1) +(nota_tg44 == 0 ? 0 : 1) +(nota_tg55 == 0 ? 0 : 1));
                                                           var sumaTgTotal = (sumaTg / sumaTg2);
                                                           var sumaTgTotal2 = sumaTgTotal.toFixed(2);

                                                           var nota_le1 = $('#nota_le1'+obj.id+'').val();
                                                           var nota_le2 = $('#nota_le2'+obj.id+'').val();
                                                           var nota_le3 = $('#nota_le3'+obj.id+'').val();
                                                           var nota_le4 = $('#nota_le4'+obj.id+'').val();
                                                           var nota_le5 = $('#nota_le5'+obj.id+'').val();
                                                           var nota_le11 = nota_le1 === "" ? 0  : nota_le1;
                                                           var nota_le22 = nota_le2 === "" ? 0  : nota_le2;
                                                           var nota_le33 = nota_le3 === "" ? 0  : nota_le3;
                                                           var nota_le44 = nota_le4 === "" ? 0  : nota_le4;
                                                           var nota_le55 = nota_le5 === "" ? 0  : nota_le5;
                                                           var sumaLe = ((parseFloat(nota_le11) + parseFloat(nota_le22) + parseFloat(nota_le33) + parseFloat(nota_le44)) + parseFloat(nota_le55));
                                                           var sumaLe2 = ((nota_le11 == 0 ? 0 : 1) +(nota_le22 == 0 ? 0 : 1) +(nota_le33 == 0 ? 0 : 1) +(nota_le44 == 0 ? 0 : 1) +(nota_le55 == 0 ? 0 : 1));
                                                           var sumaLeTotal = (sumaLe / sumaLe2);
                                                           var sumaLeTotal2 = sumaLeTotal.toFixed(2);

                                                           var nota_ev1 = $('#nota_ev1'+obj.id+'').val();
                                                           var nota_ev2 = $('#nota_ev2'+obj.id+'').val();
                                                           var nota_ev3 = $('#nota_ev3'+obj.id+'').val();
                                                           var nota_ev4 = $('#nota_ev4'+obj.id+'').val();
                                                           var nota_ev5 = $('#nota_ev5'+obj.id+'').val();
                                                           var nota_ev11 = nota_ev1 === "" ? 0  : nota_ev1;
                                                           var nota_ev22 = nota_ev2 === "" ? 0  : nota_ev2;
                                                           var nota_ev33 = nota_ev3 === "" ? 0  : nota_ev3;
                                                           var nota_ev44 = nota_ev4 === "" ? 0  : nota_ev4;
                                                           var nota_ev55 = nota_ev5 === "" ? 0  : nota_ev5;
                                                           var sumaEv = ((parseFloat(nota_ev11) + parseFloat(nota_ev22) + parseFloat(nota_ev33) + parseFloat(nota_ev44)) + parseFloat(nota_ev55));
                                                           var sumaEv2 = ((nota_ev11 == 0 ? 0 : 1) +(nota_ev22 == 0 ? 0 : 1) +(nota_ev33 == 0 ? 0 : 1) +(nota_ev44 == 0 ? 0 : 1) +(nota_ev55 == 0 ? 0 : 1));
                                                           var sumaEvTotal = (sumaEv / sumaEv2);
                                                           var sumaEvTotal2 = sumaEvTotal.toFixed(2);

                                                           var sumaTotalTodo = ((parseFloat(sumaTaTotal2) + parseFloat(sumaTiTotal2) + parseFloat(sumaTgTotal2) + parseFloat(sumaLeTotal2) + parseFloat(sumaEvTotal2)) / 5);
                                                           var sumaTotalTodo2 = sumaTotalTodo.toFixed(2);
                                                           $('#promedioFinal').on('click', () => {
                                                                $('#promediofinal'+obj.id+'').empty();
                                                                $('#promediofinal'+obj.id+'').css("font-size", "10px");
                                                                $('#promediofinal'+obj.id+'').val(sumaTotalTodo2);
                                                           });
                                                         }, 500);
                                                          });

                                                            }
                                                            else {
                                                              $.each(response.matriculados, function(inx, obj){
                                                                    $('#tabla').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ta1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ta1[]"><input class="form-control  col-md-2 col-xs-2" id="nota_ta2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ta2[]"><input class="form-control col-md-2 col-xs-2" id="nota_ta3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ta3[]"><input class="form-control col-md-2 col-xs-2" id="nota_ta4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ta4[]"><input class="form-control col-md-2 col-xs-2" id="nota_ta5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ta5[]"><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #008cba; color: white;" style="width: 300px; height: 40px;" id="promediota'+obj.id+'"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ti1'+obj.id+'"  style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ti1[]"><input class="form-control col-md-2 col-xs-2" id="nota_ti2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ti2[]"><input class="form-control col-md-2 col-xs-2" id="nota_ti3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ti3[]"><input class="form-control col-md-2 col-xs-2" id="nota_ti4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ti4[]"><input class="form-control col-md-2 col-xs-2" id="nota_ti5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ti5[]"><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #e99002; color: white;" style="width: 300px; height: 40px;" id="promedioti'+obj.id+'"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_tg1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_tg1[]"><input class="form-control col-md-2 col-xs-2" id="nota_tg2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_tg2[]"><input class="form-control col-md-2 col-xs-2" id="nota_tg3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_tg3[]"><input class="form-control col-md-2 col-xs-2" id="nota_tg4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_tg4[]"><input class="form-control col-md-2 col-xs-2" id="nota_tg5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_tg5[]"><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #f04124; color: white;" style="width: 300px; height: 40px;" id="promediotg'+obj.id+'"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_le1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_le1[]"><input class="form-control col-md-2 col-xs-2" id="nota_le2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_le2[]"><input class="form-control col-md-2 col-xs-2" id="nota_le3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_le3[]"><input class="form-control col-md-2 col-xs-2" id="nota_le4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_le4[]"><input class="form-control col-md-2 col-xs-2" id="nota_le5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_le5[]"><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #5bc0de; color: white;" style="width: 300px; height: 40px;" id="promediole'+obj.id+'"></td><td><input class="form-control col-md-2 col-xs-2" id="nota_ev1'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#1" name="nota_ev1[]"><input class="form-control col-md-2 col-xs-2" id="nota_ev2'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#2" name="nota_ev2[]"><input class="form-control col-md-2 col-xs-2" id="nota_ev3'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#3" name="nota_ev3[]"><input class="form-control col-md-2 col-xs-2" id="nota_ev4'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#4" name="nota_ev4[]"><input class="form-control col-md-2 col-xs-2" id="nota_ev5'+obj.id+'" style="width: 300px; height: 40px;" type="number" step="any" min="0" max="10" placeholder="#5" name="nota_ev5[]"><input type="text" class="form-control col-md-2 col-xs-2" style="background-color: #43ac6a; color: white;" style="width: 300px; height: 40px;" id="promedioev'+obj.id+'"></td><td><input class="form-control col-md-2 col-xs-2" style="width: 300px; height: 40px;" type="text" id="promediofinal'+obj.id+'"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'><input type="hidden" id="materias_id" name="materias_id" value='+materia+'><input type="hidden" id="parcial" name="parcial" value='+parcial+'><input type="hidden" id="quimestre" name="quimestre" value='+quimestre+'><input type="hidden" name="tipo_tareas" value="nota_ta"></tr>');
                                                                    setInterval(() => {
                                                              var nota_ta1 = $('#nota_ta1'+obj.id+'').val();
                                                              var nota_ta2 = $('#nota_ta2'+obj.id+'').val();
                                                              var nota_ta3 = $('#nota_ta3'+obj.id+'').val();
                                                              var nota_ta4 = $('#nota_ta4'+obj.id+'').val();
                                                              var nota_ta5 = $('#nota_ta5'+obj.id+'').val();
                                                              var nota_ta11 = nota_ta1 === "" ? 0  : nota_ta1;
                                                              var nota_ta22 = nota_ta2 === "" ? 0  : nota_ta2;
                                                              var nota_ta33 = nota_ta3 === "" ? 0  : nota_ta3;
                                                              var nota_ta44 = nota_ta4 === "" ? 0  : nota_ta4;
                                                              var nota_ta55 = nota_ta5 === "" ? 0  : nota_ta5;
                                                              var sumaTa = ((parseFloat(nota_ta11) + parseFloat(nota_ta22) + parseFloat(nota_ta33) + parseFloat(nota_ta44)) + parseFloat(nota_ta55));
                                                              var sumaTa2 = ((nota_ta11 == 0 ? 0 : 1) +(nota_ta22 == 0 ? 0 : 1) +(nota_ta33 == 0 ? 0 : 1) +(nota_ta44 == 0 ? 0 : 1) +(nota_ta55 == 0 ? 0 : 1));
                                                              var sumaTaTotal = (sumaTa / sumaTa2);
                                                              var sumaTaTotal2 = sumaTaTotal.toFixed(2);
                                                              $('#promedioTa').on('click', () => {
                                                                   $('#promediota'+obj.id+'').empty();
                                                                   $('#promediota'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediota'+obj.id+'').val(sumaTaTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_ti1 = $('#nota_ti1'+obj.id+'').val();
                                                              var nota_ti2 = $('#nota_ti2'+obj.id+'').val();
                                                              var nota_ti3 = $('#nota_ti3'+obj.id+'').val();
                                                              var nota_ti4 = $('#nota_ti4'+obj.id+'').val();
                                                              var nota_ti5 = $('#nota_ti5'+obj.id+'').val();
                                                              var nota_ti11 = nota_ti1 === "" ? 0  : nota_ti1;
                                                              var nota_ti22 = nota_ti2 === "" ? 0  : nota_ti2;
                                                              var nota_ti33 = nota_ti3 === "" ? 0  : nota_ti3;
                                                              var nota_ti44 = nota_ti4 === "" ? 0  : nota_ti4;
                                                              var nota_ti55 = nota_ti5 === "" ? 0  : nota_ti5;
                                                              var sumaTi = ((parseFloat(nota_ti11) + parseFloat(nota_ti22) + parseFloat(nota_ti33) + parseFloat(nota_ti44)) + parseFloat(nota_ti55));
                                                              var sumaTi2 = ((nota_ti11 == 0 ? 0 : 1) +(nota_ti22 == 0 ? 0 : 1) +(nota_ti33 == 0 ? 0 : 1) +(nota_ti44 == 0 ? 0 : 1) +(nota_ti55 == 0 ? 0 : 1));
                                                              var sumaTiTotal = (sumaTi / sumaTi2);
                                                              var sumaTiTotal2 = sumaTiTotal.toFixed(2);
                                                              $('#promedioTi').on('click', () => {
                                                                   $('#promedioti'+obj.id+'').empty();
                                                                   $('#promedioti'+obj.id+'').css("font-size", "10px");
                                                                   $('#promedioti'+obj.id+'').val(sumaTiTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_tg1 = $('#nota_tg1'+obj.id+'').val();
                                                              var nota_tg2 = $('#nota_tg2'+obj.id+'').val();
                                                              var nota_tg3 = $('#nota_tg3'+obj.id+'').val();
                                                              var nota_tg4 = $('#nota_tg4'+obj.id+'').val();
                                                              var nota_tg5 = $('#nota_tg5'+obj.id+'').val();
                                                              var nota_tg11 = nota_tg1 === "" ? 0  : nota_tg1;
                                                              var nota_tg22 = nota_tg2 === "" ? 0  : nota_tg2;
                                                              var nota_tg33 = nota_tg3 === "" ? 0  : nota_tg3;
                                                              var nota_tg44 = nota_tg4 === "" ? 0  : nota_tg4;
                                                              var nota_tg55 = nota_tg5 === "" ? 0  : nota_tg5;
                                                              var sumaTg = ((parseFloat(nota_tg11) + parseFloat(nota_tg22) + parseFloat(nota_tg33) + parseFloat(nota_tg44)) + parseFloat(nota_tg55));
                                                              var sumaTg2 = ((nota_tg11 == 0 ? 0 : 1) +(nota_tg22 == 0 ? 0 : 1) +(nota_tg33 == 0 ? 0 : 1) +(nota_tg44 == 0 ? 0 : 1) +(nota_tg55 == 0 ? 0 : 1));
                                                              var sumaTgTotal = (sumaTg / sumaTg2);
                                                              var sumaTgTotal2 = sumaTgTotal.toFixed(2);
                                                              $('#promedioTg').on('click', () => {
                                                                   $('#promediotg'+obj.id+'').empty();
                                                                   $('#promediotg'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediotg'+obj.id+'').val(sumaTgTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_le1 = $('#nota_le1'+obj.id+'').val();
                                                              var nota_le2 = $('#nota_le2'+obj.id+'').val();
                                                              var nota_le3 = $('#nota_le3'+obj.id+'').val();
                                                              var nota_le4 = $('#nota_le4'+obj.id+'').val();
                                                              var nota_le5 = $('#nota_le5'+obj.id+'').val();
                                                              var nota_le11 = nota_le1 === "" ? 0  : nota_le1;
                                                              var nota_le22 = nota_le2 === "" ? 0  : nota_le2;
                                                              var nota_le33 = nota_le3 === "" ? 0  : nota_le3;
                                                              var nota_le44 = nota_le4 === "" ? 0  : nota_le4;
                                                              var nota_le55 = nota_le5 === "" ? 0  : nota_le5;
                                                              var sumaLe = ((parseFloat(nota_le11) + parseFloat(nota_le22) + parseFloat(nota_le33) + parseFloat(nota_le44)) + parseFloat(nota_le55));
                                                              var sumaLe2 = ((nota_le11 == 0 ? 0 : 1) +(nota_le22 == 0 ? 0 : 1) +(nota_le33 == 0 ? 0 : 1) +(nota_le44 == 0 ? 0 : 1) +(nota_le55 == 0 ? 0 : 1));
                                                              var sumaLeTotal = (sumaLe / sumaLe2);
                                                              var sumaLeTotal2 = sumaLeTotal.toFixed(2);

                                                              $('#promedioLe').on('click', () => {
                                                                   $('#promediole'+obj.id+'').empty();
                                                                   $('#promediole'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediole'+obj.id+'').val(sumaLeTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                              var nota_ev1 = $('#nota_ev1'+obj.id+'').val();
                                                              var nota_ev2 = $('#nota_ev2'+obj.id+'').val();
                                                              var nota_ev3 = $('#nota_ev3'+obj.id+'').val();
                                                              var nota_ev4 = $('#nota_ev4'+obj.id+'').val();
                                                              var nota_ev5 = $('#nota_ev5'+obj.id+'').val();
                                                              var nota_ev11 = nota_ev1 === "" ? 0  : nota_ev1;
                                                              var nota_ev22 = nota_ev2 === "" ? 0  : nota_ev2;
                                                              var nota_ev33 = nota_ev3 === "" ? 0  : nota_ev3;
                                                              var nota_ev44 = nota_ev4 === "" ? 0  : nota_ev4;
                                                              var nota_ev55 = nota_ev5 === "" ? 0  : nota_ev5;
                                                              var sumaEv = ((parseFloat(nota_ev11) + parseFloat(nota_ev22) + parseFloat(nota_ev33) + parseFloat(nota_ev44)) + parseFloat(nota_ev55));
                                                              var sumaEv2 = ((nota_ev11 == 0 ? 0 : 1) +(nota_ev22 == 0 ? 0 : 1) +(nota_ev33 == 0 ? 0 : 1) +(nota_ev44 == 0 ? 0 : 1) +(nota_ev55 == 0 ? 0 : 1));
                                                              var sumaEvTotal = (sumaEv / sumaEv2);
                                                              var sumaEvTotal2 = sumaEvTotal.toFixed(2);
                                                              $('#promedioEv').on('click', () => {
                                                                   $('#promedioev'+obj.id+'').empty();
                                                                   $('#promedioev'+obj.id+'').css("font-size", "10px");
                                                                   $('#promedioev'+obj.id+'').val(sumaEvTotal2);
                                                              });
                                                         }, 500);
                                                         setInterval(() => {
                                                            var nota_ta1 = $('#nota_ta1'+obj.id+'').val();
                                                            var nota_ta2 = $('#nota_ta2'+obj.id+'').val();
                                                            var nota_ta3 = $('#nota_ta3'+obj.id+'').val();
                                                            var nota_ta4 = $('#nota_ta4'+obj.id+'').val();
                                                            var nota_ta5 = $('#nota_ta5'+obj.id+'').val();
                                                            var nota_ta11 = nota_ta1 === "" ? 0  : nota_ta1;
                                                            var nota_ta22 = nota_ta2 === "" ? 0  : nota_ta2;
                                                            var nota_ta33 = nota_ta3 === "" ? 0  : nota_ta3;
                                                            var nota_ta44 = nota_ta4 === "" ? 0  : nota_ta4;
                                                            var nota_ta55 = nota_ta5 === "" ? 0  : nota_ta5;
                                                            var sumaTa = ((parseFloat(nota_ta11) + parseFloat(nota_ta22) + parseFloat(nota_ta33) + parseFloat(nota_ta44)) + parseFloat(nota_ta55));
                                                            var sumaTa2 = ((nota_ta11 == 0 ? 0 : 1) +(nota_ta22 == 0 ? 0 : 1) +(nota_ta33 == 0 ? 0 : 1) +(nota_ta44 == 0 ? 0 : 1) +(nota_ta55 == 0 ? 0 : 1));
                                                            var sumaTaTotal = (sumaTa / sumaTa2);
                                                            var sumaTaTotal2 = sumaTaTotal.toFixed(2);

                                                              var nota_ti1 = $('#nota_ti1'+obj.id+'').val();
                                                              var nota_ti2 = $('#nota_ti2'+obj.id+'').val();
                                                              var nota_ti3 = $('#nota_ti3'+obj.id+'').val();
                                                              var nota_ti4 = $('#nota_ti4'+obj.id+'').val();
                                                              var nota_ti5 = $('#nota_ti5'+obj.id+'').val();
                                                              var nota_ti11 = nota_ti1 === "" ? 0  : nota_ti1;
                                                              var nota_ti22 = nota_ti2 === "" ? 0  : nota_ti2;
                                                              var nota_ti33 = nota_ti3 === "" ? 0  : nota_ti3;
                                                              var nota_ti44 = nota_ti4 === "" ? 0  : nota_ti4;
                                                              var nota_ti55 = nota_ti5 === "" ? 0  : nota_ti5;
                                                              var sumaTi = ((parseFloat(nota_ti11) + parseFloat(nota_ti22) + parseFloat(nota_ti33) + parseFloat(nota_ti44)) + parseFloat(nota_ti55));
                                                              var sumaTi2 = ((nota_ti11 == 0 ? 0 : 1) +(nota_ti22 == 0 ? 0 : 1) +(nota_ti33 == 0 ? 0 : 1) +(nota_ti44 == 0 ? 0 : 1) +(nota_ti55 == 0 ? 0 : 1));
                                                              var sumaTiTotal = (sumaTi / sumaTi2);
                                                              var sumaTiTotal2 = sumaTiTotal.toFixed(2);

                                                              var nota_tg1 = $('#nota_tg1'+obj.id+'').val();
                                                              var nota_tg2 = $('#nota_tg2'+obj.id+'').val();
                                                              var nota_tg3 = $('#nota_tg3'+obj.id+'').val();
                                                              var nota_tg4 = $('#nota_tg4'+obj.id+'').val();
                                                              var nota_tg5 = $('#nota_tg5'+obj.id+'').val();
                                                              var nota_tg11 = nota_tg1 === "" ? 0  : nota_tg1;
                                                              var nota_tg22 = nota_tg2 === "" ? 0  : nota_tg2;
                                                              var nota_tg33 = nota_tg3 === "" ? 0  : nota_tg3;
                                                              var nota_tg44 = nota_tg4 === "" ? 0  : nota_tg4;
                                                              var nota_tg55 = nota_tg5 === "" ? 0  : nota_tg5;
                                                              var sumaTg = ((parseFloat(nota_tg11) + parseFloat(nota_tg22) + parseFloat(nota_tg33) + parseFloat(nota_tg44)) + parseFloat(nota_tg55));
                                                              var sumaTg2 = ((nota_tg11 == 0 ? 0 : 1) +(nota_tg22 == 0 ? 0 : 1) +(nota_tg33 == 0 ? 0 : 1) +(nota_tg44 == 0 ? 0 : 1) +(nota_tg55 == 0 ? 0 : 1));
                                                              var sumaTgTotal = (sumaTg / sumaTg2);
                                                              var sumaTgTotal2 = sumaTgTotal.toFixed(2);

                                                              var nota_le1 = $('#nota_le1'+obj.id+'').val();
                                                              var nota_le2 = $('#nota_le2'+obj.id+'').val();
                                                              var nota_le3 = $('#nota_le3'+obj.id+'').val();
                                                              var nota_le4 = $('#nota_le4'+obj.id+'').val();
                                                              var nota_le5 = $('#nota_le5'+obj.id+'').val();
                                                              var nota_le11 = nota_le1 === "" ? 0  : nota_le1;
                                                              var nota_le22 = nota_le2 === "" ? 0  : nota_le2;
                                                              var nota_le33 = nota_le3 === "" ? 0  : nota_le3;
                                                              var nota_le44 = nota_le4 === "" ? 0  : nota_le4;
                                                              var nota_le55 = nota_le5 === "" ? 0  : nota_le5;
                                                              var sumaLe = ((parseFloat(nota_le11) + parseFloat(nota_le22) + parseFloat(nota_le33) + parseFloat(nota_le44)) + parseFloat(nota_le55));
                                                              var sumaLe2 = ((nota_le11 == 0 ? 0 : 1) +(nota_le22 == 0 ? 0 : 1) +(nota_le33 == 0 ? 0 : 1) +(nota_le44 == 0 ? 0 : 1) +(nota_le55 == 0 ? 0 : 1));
                                                              var sumaLeTotal = (sumaLe / sumaLe2);
                                                              var sumaLeTotal2 = sumaLeTotal.toFixed(2);

                                                              var nota_ev1 = $('#nota_ev1'+obj.id+'').val();
                                                              var nota_ev2 = $('#nota_ev2'+obj.id+'').val();
                                                              var nota_ev3 = $('#nota_ev3'+obj.id+'').val();
                                                              var nota_ev4 = $('#nota_ev4'+obj.id+'').val();
                                                              var nota_ev5 = $('#nota_ev5'+obj.id+'').val();
                                                              var nota_ev11 = nota_ev1 === "" ? 0  : nota_ev1;
                                                              var nota_ev22 = nota_ev2 === "" ? 0  : nota_ev2;
                                                              var nota_ev33 = nota_ev3 === "" ? 0  : nota_ev3;
                                                              var nota_ev44 = nota_ev4 === "" ? 0  : nota_ev4;
                                                              var nota_ev55 = nota_ev5 === "" ? 0  : nota_ev5;
                                                              var sumaEv = ((parseFloat(nota_ev11) + parseFloat(nota_ev22) + parseFloat(nota_ev33) + parseFloat(nota_ev44)) + parseFloat(nota_ev55));
                                                              var sumaEv2 = ((nota_ev11 == 0 ? 0 : 1) +(nota_ev22 == 0 ? 0 : 1) +(nota_ev33 == 0 ? 0 : 1) +(nota_ev44 == 0 ? 0 : 1) +(nota_ev55 == 0 ? 0 : 1));
                                                              var sumaEvTotal = (sumaEv / sumaEv2);
                                                              var sumaEvTotal2 = sumaEvTotal.toFixed(2);

                                                              var sumaTotalTodo = ((parseFloat(sumaTaTotal2) + parseFloat(sumaTiTotal2) + parseFloat(sumaTgTotal2) + parseFloat(sumaLeTotal2) + parseFloat(sumaEvTotal2)) / 5);
                                                              var sumaTotalTodo2 = sumaTotalTodo.toFixed(2);
                                                              $('#promedioFinal').on('click', () => {
                                                                   $('#promediofinal'+obj.id+'').empty();
                                                                   $('#promediofinal'+obj.id+'').css("font-size", "10px");
                                                                   $('#promediofinal'+obj.id+'').val(sumaTotalTodo2);
                                                              });
                                                         }, 500);
                                                               });
                                                            }
                                                        }

                                                },
                                                error: function(error){

                                                }
                                            });
                                        });
                                </script>




