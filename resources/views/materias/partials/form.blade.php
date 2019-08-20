	<div class="panel panel-primary">
		<div class="panel panel-heading text-center">DATOS DE LA MATERIA</div>
		<div class="panel panel-body">
			
	<div class="form-row">
		<div class="form-group col-md-4">
		<strong>Curso del alumno: <br></strong>
		<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
		{!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8', 'placeholder' => 'Ingrese el curso']) !!}
		</div>
	</div>
		<div class="form-group col-md-4">
		<strong>Nombre de la materia: <br></strong>
		<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('materia', null, ['class' => 'form-control col-md-8']) !!}
		</div>
	</div>
		<div class="form-group col-md-4">
		<strong>Especialidad: <br></strong>
		<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-user-tag"></i></span>
		{!! Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'TECNICO AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-8 ', 'placeholder' => 'Ingrese la especialidad']) !!}
		</div>
	</div>
		<div class="form-group col-md-4">
		<strong>Paralelo: <br></strong>
		<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
		{!! Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-8', 'placeholder' => 'Ingrese el paralelo']) !!}
		</div>
	</div>
	<div class="form-group col-md-4">
		<strong>Tipo materia especial: <br></strong>
		<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
		{!! Form::select('tipo_materia',['NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control col-md-8', 'placeholder' => 'Ingrese el paralelo']) !!}
		</div>
	</div>
	</div>
	<div class="form-group col-md-4">
	{!! Form::button('<i class="fas fa-save"></i> GUARDAR', ['class' => 'btn btn-primary float-center', 'type' => 'submit']) !!}
			</div>
	

		</div>
		
	