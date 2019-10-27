{!!Form::open(['route' => 'inspeccion.observacion-store'])!!}
<div class="modal" id="modalObservaciones">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">


        <div class="modal-header modal-header-info text-center">
          <h4 class="modal-title w-100"  id="modal-title">DATOS DE LA OBSERVACIÓN</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body" id="modal-body">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <strong>Fecha</strong><br>
                    <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    {!!Form::date('fecha',null, ['class' => 'form-control'])!!}
                </div>
                </div>
                        <div class="form-group col-md-4">
                                <strong>Curso: <br></strong>
                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                {!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control', 'id' => 'cursos', 'placeholder' => 'Coloque el curso']) !!}
                                </div>
                            </div>
                                <div class="form-group col-md-4">
                                <strong>Especialidad: <br></strong>
                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                {!! Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'TECNICO AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control ', 'placeholder' => 'Ingrese la especialidad']) !!}
                                </div>
                            </div>

                        <div class="form-group col-md-4">
                        <strong>Paralelo:</strong>
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                        {!! Form::select('paralelo', ['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el paralelo', 'id' => 'paralelo']) !!}
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>Parcial:</strong>
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                            {!! Form::select('parcial', ['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el parcial', 'id' => 'parcial']) !!}
                            </div>
                            </div>
                            <div class="form-group col-md-4">
                                <strong>Quimestre:</strong>
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                {!! Form::select('quimestre', ['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el quimestre', 'id' => 'quimestre']) !!}
                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <strong>Estudiantes: </strong>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                        {!!Form::select('estudiante',[], null, ['class' => 'form-control', 'id' => 'estudiantes', 'placeholder' => 'Seleccione al estudiante...'])!!}
                                    </div>
                                </div>
                                {!!Form::hidden('nombres', '', ['id' => 'nombres'])!!}
                                <div class="form-group col-md-12" style="text-align: center;">
                                    <strong >Observacion: </strong><br>
                                        {!! Form::textarea('observacion', null, ['id' => 'keterangan', 'class' => 'form-control', 'rows' => 6, 'cols' => 100, 'style' => 'resize:none']) !!}
                                </div>
            </div>
        </div>
        <div class="modal-footer">
          {!!Form::button('<i class="far fa-save"></i>  GUARDAR', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
        </div>

      </div>
    </div>
  </div>
  {!!Form::close()!!}
  <script>
    $('#quimestre').on('change', function(){
        var curso = $('#cursos').val();
        var paralelo = $('#paralelo').val();

        $.get('inspecciones-observaciones/'+curso+'/'+paralelo, function(response){
           $.each(response, function(index, obj){
               console.log(obj);
            $('#estudiantes').append('<option value='+obj.id+'>'+obj.nombres+'</option>');
            $('#nombres').val(obj.nombres);
           });

        });
    });
  </script>
