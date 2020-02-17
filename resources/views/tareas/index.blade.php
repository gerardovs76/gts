 @extends('layouts.app')

@section('content')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-es_ES.min.js "> </script>
	<div class="container col-xs-12 col-sm-12 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
          <h2 class="text-center" style="color: #fff;">
              TAREAS
          </h2>
          </div>
		<hr>
        @include('notas.partials.info')
        @include('notas.partials.error')
	      {!! Form::open(['route' => 'tareas.store', 'enctype' => 'multipart/form-data']) !!}
			<div class="panel panel-primary">
     <div class="panel-heading">TAREAS O COMUNICADOS</div>

     <div class="panel-body">

     <div class="form-row">
           <div class="form-group col-md-4">
               <strong>Profesor: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('profesorName', $profesor, ['class' => 'form-control col-md-8', 'id' => 'profesor', 'placeholder' => 'Profesor...']) !!}
          {!! Form::hidden('profesor', $profesorId) !!}
          </div>
          </div>
          @if(Auth::user()->isRole('super-admin'))
          <div class="form-group col-md-4">
          <strong>Curso: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          <select name="curso" id="curso" class="form-control col-md-8">
              <option value="INICIAL 1">INICIAL 1</option>
              <option value="INICIAL 2">INICIAL 2</option>
              <option value="PRIMERO DE EGB">PRIMERO DE EGB</option>
              <option value="SEGUNDO DE EGB">SEGUNDO DE EGB</option>
              <option value="TERCERO DE EGB">TERCERO DE EGB</option>
              <option value="CUARTO DE EGB">CUARTO DE EGB</option>
              <option value="QUINTO DE EGB">QUINTO DE EGB</option>
              <option value="SEXTO DE EGB">SEXTO DE EGB</option>
              <option value="SEPTIMO DE EGB">SEPTIMO DE EGB</option>
              <option value="OCTAVO DE EGB">OCTAVO DE EGB</option>
              <option value="NOVENO DE EGB">NOVENO DE EGB</option>
              <option value="DECIMO DE EGB">DECIMO DE EGB</option>
              <option value="PRIMERO DE BACHILLERATO">PRIMERO DE BACHILLERATO</option>
              <option value="SEGUNDO DE BACHILLERATO">SEGUNDO DE BACHILLERATO</option>
              <option value="TERCERO DE BACHILLERATO">TERCERO DE BACHILLERATO</option>
          </select>
          </div>
          </div>

          <div class="form-group col-md-4">
          <strong>Especialidad: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'TECNICO AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-8 ', 'placeholder' => 'Ingrese la especialidad']) !!}
          </div>
          </div>
          <div class="form-group col-md-4">
          <strong>Paralelo: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-8', 'placeholder' => 'Ingrese el paralelo']) !!}
          </div>
          </div>
          @elseif(Auth::user()->isRole('profesor'))
          <div class="form-group col-md-4">
            <strong>Curso: <br></strong>
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
            {!! Form::select('curso',[], null, ['class' => 'form-control col-md-8', 'id' => 'curso', 'placeholder' => 'Coloque el curso']) !!}
            </div>
            </div>
            <div class="form-group col-md-4">
            <strong>Especialidad: <br></strong>
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
            {!! Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'TECNICO AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-8 ', 'placeholder' => 'Ingrese la especialidad']) !!}
            </div>
            </div>
            <div class="form-group col-md-4">
            <strong>Paralelo: <br></strong>
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
            {!! Form::select('paralelo',[], null, ['class' => 'form-control col-md-8', 'id' => 'paralelo','placeholder' => 'Ingrese el paralelo']) !!}
            </div>
            </div>
                @endif
     </div>
</div>
</div>
<div class="panel panel-primary">
<div class="panel-heading">DATOS: </div>

     <div class="panel-body">

     <div class="form-row">
          <div class="form-group col-md-4">
          <strong>Fecha de entrega: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::date('fecha_entrega', null, ['class' => 'form-control col-md-8', 'id' => 'cursos', 'placeholder' => 'Fecha de entrega']) !!}
          </div>
          </div>

          <div class="form-group col-md-4">
          <strong>Tipo de tarea/Comunicado:  <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::select('tipo_tarea',['TAREAS' => 'TAREAS ACADEMICAS', 'ACT. INDIVIDUAL' => 'ACT. INDIVIDUAL', 'ACT. GRUPAL' => 'ACT. GRUPAL', 'LECCIÓN' => 'LECCIÓN', 'EVALUACIÓN' => 'EVALUACIÓN', 'EXAMEN' => 'EXAMEN', 'COMUNICADOS' => 'COMUNICADOS'], null, ['class' => 'form-control col-md-8', 'id' => 'tipo_tarea', 'placeholder' => 'Coloque el tipo de tarea']) !!}
          </div>
          </div>

           <div class="form-group col-md-4">
          <strong>Titulo: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('titulo', null, ['class' => 'form-control col-md-8', 'id' => 'titulo', 'placeholder' => 'Titulo de la tarea']) !!}
          </div>
          </div>

          <div class="form-group col-md-4">
          <strong>Archivo: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::file('archivo', null, ['class' => 'form-control col-md-8 ', 'placeholder' => 'Ingrese el archivo']) !!}
          </div>
          </div>

          <div class="form-group col-md-6">
          <strong>Descripción: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion de la tarea']) !!}
          </div>
          </div>
     </div>
</div>
</div>
<div class="form-group col-md-12">
    {!!Form::button('<i class="far fa-save"></i> ENVIAR', ['class' => 'btn btn-primary form-control', 'type' => 'submit'])!!}
       </div>
       {!! Form::close() !!}
</div>
    <script>
        $(document).ready(function(){
            $.get('notas/cargar-notas-profesor', function(response){
                $.each(response, function(index, obj){
                    $('#curso').append('<option value="'+obj.curso+'">'+obj.curso+'</option>');
                });
            });
        $.get('notas/cargar-notas-profesor-paralelo', function(response){
            $.each(response, function(index, obj){
                $('#paralelo').append('<option value="'+obj.paralelo+'">'+obj.paralelo+'</option>');
            });
        });
    });
    </script>
@endsection
