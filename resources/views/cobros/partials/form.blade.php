 <div class="panel panel-primary">
     <div class="panel-heading">COBROS</div>

     <div class="panel-body">

     <div class="form-row">
          <div class="form-group col-md-4">
          <strong>Curso: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8', 'id' => 'cursos', 'placeholder' => 'Coloque el curso']) !!}
          </div>
          </div>
          <div class="form-group col-md-4">
          <strong>Tipo de estudiante: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::select('tipo_estudiante',['NUEVO' => 'NUEVO', 'ANTIGUO' => 'ANTIGUO'], null, ['class' => 'form-control col-md-8', 'id' => 'cursos', 'placeholder' => 'Coloque el curso']) !!}
          </div>
          </div>
          <div class="form-group col-md-10">
              <button class="btn btn-primary" id="agregarValores" type="button">AGREGAR VALORES</button>
          </div>
     </div>
     </div>
     </div>

<div class="panel panel-primary" id="formularioValores" style="display: none;">
<div class="panel-heading">VALORES A COBRAR</div>

     <div class="panel-body">

     <div class="form-row">
          <div class="form-group col-md-4">
          <strong>Matricula: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('matricula', null, ['class' => 'form-control col-md-8 ', 'id' => 'matricula']) !!}
          </div>
          </div>

          <div class="form-group col-md-4">
          <strong>Pensión: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('pension', null, ['class' => 'form-control col-md-8 ', 'id' => 'pension']) !!}
          </div>
          </div>

          <div class="form-group col-md-4">
          <strong>Servicio de copiado anual: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('servicio_copiado', null, ['class' => 'form-control col-md-8 ', 'id' => 'servicio_copiado']) !!}
          </div>
          </div>

          <div class="form-group col-md-4">
          <strong>Colada Morada: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('colada_morada', null, ['class' => 'form-control col-md-8 ', 'id' => 'colada_morada']) !!}
          </div>
          </div>

          <div class="form-group col-md-4">
          <strong>Mantenimiento: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('mantenimiento', null, ['class' => 'form-control col-md-8 ', 'id' => 'mantenimiento']) !!}
          </div>
          </div>

          <div class="form-group col-md-4">
          <strong>Agenda + Tomatodo de 600ml Paul dirac + carnet: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('agenda', null, ['class' => 'form-control col-md-8 ', 'id' => 'agenda']) !!}
          </div>
          </div>

          <div class="form-group col-md-4">
          <strong>Seguro accidentes: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('seguro_accidentes', null, ['class' => 'form-control col-md-8', 'id' => 'seguro_accidentes']) !!}
          </div>
          </div>

          <div class="form-group col-md-4">
          <strong>Piscina "MYZU" incluido transporte: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('piscina', null, ['class' => 'form-control col-md-8', 'id' => 'piscina']) !!}
          </div>
     </div>

          <div class="form-group col-md-4">
          <strong>Uniformes: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('uniformes', null, ['class' => 'form-control col-md-8', 'placeholder' => 'En caso de que sea nuevo alumno...', 'id' => 'uniformes']) !!}
          </div>
     </div>

          <div class="form-group col-md-4">
          <strong>TOTAL: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('total', null, ['class' => 'form-control col-md-8', 'id' => 'total']) !!}
          </div>
     </div>
     <div class="form-group col-md-12 col-md-offset-5" id="guardar" style="display: none;">
     {!!Form::button('<i class="far fa-save"></i> GUARDAR', ['class' => 'btn btn-primary'])!!}
               </div>
</div>
</div>
</div>




     </div>
<script src="{{asset('js/cobros-suma.js')}}"></script>
