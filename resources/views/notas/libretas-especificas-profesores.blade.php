@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			LIBRETA QUIMESTRAL PARA PROFESORES
		</h2>
		</div>

                <hr>
                @include('notas.partials.error')
		@include('notas.partials.info')


					{!! Form::open(['route' => 'notas.descargarLibretaColectivaParaProfesores']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
                                    <div class="form-group col-md-4">
                                            <strong>Curso: <br></strong>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                            {{ Form::select('curso',[], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Seleccione el curso...']) }}
                                            </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <strong>Paralelo: <br></strong>
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                                    {{ Form::select('paralelo',[], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Seleccione el curso...']) }}
                                                    </div>
                                                    </div>
                                            <div class="form-group col-md-4">
                                                    <strong>Quimestre: <br></strong>
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                    {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6' , 'id' => 'quimestre', 'placeholder' => 'Seleccione el quimestre...']) }}
                                                    </div>
                                                    </div>
                                                <input type="hidden" name="profesor_cedula" value="{{Auth::user()->cedula}}">
								<div class="form-group col-md-10">
   									{!! Form::button('<i class="fas fa-print"></i> DESCARGAR LIBRETA', ['class' => 'btn btn-primary',  'id' => 'verNotas', 'type' => 'submit']) !!}
								</div>

							</div>

						</div>
					</div>
	</div>

      {{ Form::close() }}
      @if(Auth::user()->isRole('profesor'))
<script>
$(document).ready(function(){
    var url1 = 'notas/cargar-notas-profesor';
    $.ajax({
        url: url1,
        success: function(response)
        {
            $.each(response, function(index, obj){
            $('#curso').append('<option value="'+obj.curso+'">'+obj.curso+'</option>');
        });
        },
        error: function(error)
        {

        }
        });
    });
</script>
<script>
    $(document).ready(() => {
        var url2 = 'notas/cargar-notas-profesor-paralelo';
        $.ajax({
            url: url2,
            success: function(response)
            {
                $.each(response, function(index, obj){
                $('#paralelo').append('<option value="'+obj.paralelo+'">'+obj.paralelo+'</option>');
                });
            },
            error: function(error)
            {

            }
        });
    });
</script>
@endif
@endsection
