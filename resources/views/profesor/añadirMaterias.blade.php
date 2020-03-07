@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			AÑADIR MATERIA PROFESOR
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
						<div class="form-group col-md-4">
                                <strong>Cedula: <br></strong>
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                {!! Form::text('cedula', null, ['class' => 'form-control col-md-8', 'placeholder' => 'Ingrese la cedula...', 'id' => 'cedula']) !!}
                                </div>
                        </div>
						<div class="form-group col-md-10">
                            {!!Form::button('<i class="fas fa-search"></i> BUSQUEDA', ['class' => 'btn btn-primary', 'id' => 'busqueda', 'type' => 'button'])!!}
						</div>
						</div>

					</div>

					{!! Form::open(['route' => 'materiasAñadir.store', 'id' => 'form-añadirMateria']) !!}
					<div class="panel panel-primary" style="display: none;" id="panel">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA AÑADIR LA MATERIA AL PROFESOR </div>
						<div class="panel panel-body">
							<div class="form-row">
								<div class="form-group col-md-4">
                                    <strong>Seleccione el profesor: <br></strong>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
							{!! Form::select('profesores_id', ['Profesor' => 'Profesor'], null, ['class' => 'form-control col-md-8', 'id' => 'profesor']) !!}
                                </div>
                            </div>
								<div class="form-group col-md-4">
                                    <strong>Seleccione el curso de la materia: <br></strong>
                                    <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
							{!! Form::select('curso_materia',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6', 'id' => 'curso_materia', 'placeholder' => 'Seleccione el curso...']) !!}
                                </div>
								</div>
								<div class="form-group col-md-4">
                                    <strong>Seleccione el paralelo de la materia: <br></strong>
                                    <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
							{!! Form::select('curso_materia',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H'], null, ['class' => 'form-control col-md-6', 'id' => 'paralelo', 'placeholder' => 'Seleccione el curso...']) !!}
                                </div>
								</div>
								<div class="form-group col-md-4">
                                    <strong>Seleccione las materias: <br></strong>
                                    <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
									{!! Form::select('materias_id', ['s' => 'Seleccione las materias...'], null, ['class' => 'form-control col-md-6', 'id' => 'materia_curso']) !!}
                                </div>
								</div>
								<div class="form-group col-md-12">
									{!! Form::button('<i class="far fa-save"></i> GUARDAR', ['class' => 'btn btn-primary form-control', 'id' => 'add', 'type' => 'submit']) !!}

								</div>
						</div>


						</div>
					</div>
                   <table class="table table-hover table-striped" id="tableid" style="display: none;" align="center">
					    <tbody>

					    </tbody>
					</table>
					{!! Form::close() !!}
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.js"></script>
	<script>
		$('#busqueda').on('click', function(event){
			event.preventDefault();
			var cedula = $('#cedula').val();
			$.get('añadir_materias_profesor/'+cedula, function(response){
				$.each(response, function(index, obj){
					$('#panel').css("display", "block");
				$('#profesor').append('<option value='+obj.id+'>'+obj.nombres_apellidos+'</option>');
			});
			});
		});
		$('#paralelo').on('change', function(event){
			event.preventDefault();
			var curso = $('#curso_materia').val();
			var paralelo = $('#paralelo').val();
			$.get('añadir_materias_curso/'+ curso + '/'+paralelo, function(response){
				console.log(response);
				$.each(response, function(index, obj){
					$('#materia_curso').empty();
					$('#materia_curso').append('<option value='+obj.id+'>'+obj.materia+'</option>');
				});
			});
		});
	</script>
@endsection
