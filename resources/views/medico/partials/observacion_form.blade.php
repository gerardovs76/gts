
			<div class="panel panel-primary">
				<div class="panel panel-heading text-center">INGRESE LOS DATOS CORRESPONDIENTES</div>
				<div class="panel panel-body">
					<div class="form-row">
					<div class="form-group col-md-4">
					<strong>Curso: <br></strong>
					<div class="input-group-prepend">
					<span class="input-group-text"><i>@</i></span>
					{!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6', 'id' => 'curso', 'placeholder' => 'Seleccione el curso...']) !!}
					</div>
					</div>
					<div class="form-group col-md-4">
					<strong>Fecha: <br></strong>
					<div class="input-group-prepend">
						<span class="input-group-text"><i>@</i></span>
					{!! Form::date('fecha', null, ['class' => 'form-control col-md-6', 'id' => 'fecha']) !!}
					</div>
					</div>
						<div class="form-group col-md-4">
					<strong>Alumno: <br></strong>
					<div class="input-group-prepend">
					<span class="input-group-text"><i>@</i></span>
					{!! Form::select('nombre',['ESTUDIANTE' => 'ESTUDIANTE'], null, ['class' => 'form-control col-md-6', 'id' => 'nombres']) !!}
					</div>
					</div>

					<input type="hidden" name="matriculados_id" id="matriculados_id">

					<div class="form-group col-md-10">
					{!! Form::button('<i class="fas fa-plus"></i> AGREGAR OBSERVACIÓN', ['class' => 'btn btn-primary', 'id' => 'agregarObservacion']) !!}
					</div>

				</div>
				</div>
			</div>

			<div class="panel panel-primary" id="formularioObservacion" style="display: none;">
				<div class="panel panel-heading text-center">INSERTE LA OBSERVACIÓN</div>
				<div class="panel panel-body">
					<div class="form-row">
					<div class="form-group col-md-4">
						<strong>Diagnostico: <br></strong>
						<div class="input-group-prepend">
						<span class="input-group-text"><i>@</i></span>
						{!! Form::text('diagnostico', null, ['class' => 'form-control col-md-6']) !!}
					</div>
					</div>

					<div class="form-group col-md-4">
						<strong>Medicamentos: <br></strong>
						<div class="input-group-prepend">
						<span class="input-group-text"><i>@</i></span>
						{!! Form::text('medicamentos', null, ['class' => 'form-control col-md-6']) !!}
					</div>
					</div>

					<div class="form-group col-md-6">
						<strong>Observacion: <br></strong>
						<div class="input-group-prepend">
						<span class="input-group-text"><i>@</i></span>
						{!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
					</div>
					</div>

					</div>
					<div class="form-group col-md-4">
						{!! Form::button('GUARDAR', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'agregarObservacion']) !!}
					</div>
				</div>
			</div>


<script>
	$('#fecha').on('change', function(event){
		event.preventDefault();

		var curso = $('#curso').val();

		$.get('medico_observacion/'+curso, function(data){
			console.log(data);
			$.each(data, function(index, obj){
				console.log(obj.nombres);
				$('#nombres').append('<option value='+obj.id+'>'+obj.nombres+'</option>');
				$('#matriculados_id').val(obj.id);

			});
		});
	});

	$('#agregarObservacion').on('click', function(){

		$('#formularioObservacion').css("display", "block");
		$('#agregarObservacion').css("display", "none");

	});


</script>
