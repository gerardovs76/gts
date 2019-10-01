 @extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
          <h2 class="text-center" style="color: #fff;">
              TAREAS
          </h2>
          </div>
		<hr>
		{{--@include('notas.partials.info')--}}
	      {!! Form::open(['route' => 'tareas.store', 'enctype' => 'multipart/form-data']) !!}
			<div class="panel panel-primary">
     <div class="panel-heading">TAREAS O COMUNICADOS</div>

     <div class="panel-body">

     <div class="form-row">
           <div class="form-group col-md-4">
               <strong>Profesor: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::text('profesor', $profesor, ['class' => 'form-control col-md-8', 'id' => 'cursos', 'placeholder' => 'Profesor...']) !!}
          </div>
          </div>
          @if(Auth::user()->isRole('super-admin'))
          <div class="form-group col-md-4">
          <strong>Curso: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8', 'id' => 'cursos', 'placeholder' => 'Coloque el curso']) !!}
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
          {!! Form::select('tipo_tarea',['TAREAS' => 'TAREAS', 'T.INVIDIVUAL' => 'T.INDIVIDUAL', 'T.GRUPAL' => 'T.GRUPAL', 'LECCIÓN' => 'LECCIÓN', 'EVALUACIÓN' => 'EVALUACIÓN', 'EXAMEN QUIMESTRAL' => 'EXAMEN QUIMESTRA', 'COMUNICADO' => 'COMUNICADO'], null, ['class' => 'form-control col-md-8', 'id' => 'tipo_tarea', 'placeholder' => 'Coloque el tipo de tarea']) !!}
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
</div>

     <div class="form-group col-md-12">
     {!!Form::button('<i class="far fa-save"></i> GUARDAR', ['class' => 'btn btn-primary form-control', 'type' => 'submit'])!!}
        </div>


	</div>
	{!! Form::close() !!}
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
