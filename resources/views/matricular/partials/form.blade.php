	<div class="panel panel-primary">
	<div class="panel-heading text-center">DATOS DEL MATRICULADO</div>
		
	<div class="panel-body">
	
	<div class="form-row">
		<div class="form-group col-md-4">
		<strong>Cedula: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
		{!! Form::text('cedula', null, ['class' => 'form-control col-md-8' , 'id' => 'cedula']) !!}
		</div>
	</div>
		<div class="form-group col-md-4">
		<strong>Nombres: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('nombres', null, ['class' => 'form-control col-md-8', 'id' => 'nombres']) !!}
		</div>
	</div>
		<div class="form-group col-md-4">
		<strong>Apellidos: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('apellidos', null, ['class' => 'form-control col-md-8', 'id' => 'apellidos']) !!}
		</div>
	</div>
		<div class="form-group col-md-4">
		<strong>Curso: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
		{!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8', 'id' => 'cursos', 'placeholder' => 'Coloque el curso']) !!}
		</div>
	</div>
		<div class="form-group col-md-4">
		<strong>Especialidad: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
		{!! Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'TECNICO AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-8 ', 'placeholder' => 'Ingrese la especialidad']) !!}
		</div>
	</div>
		<div class="form-group col-md-4">
		<strong>Paralelo: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
		{!! Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-8', 'placeholder' => 'Ingrese el paralelo']) !!}
		</div>
	</div>
		<div class="form-group col-md-4">
		<strong>Tipo de estudiante: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
		{!! Form::select('tipo_estudiante',['NUEVO' => 'NUEVO', 'ANTIGUO' => 'ANTIGUO'], null, ['class' => 'form-control col-md-8', 'id' => 'cursos', 'placeholder' => 'Coloque el tipo de estudiante']) !!}
		</div>
	</div>
	<div class="form-group col-md-10">
		<input type="hidden" id="inscripcion" name="inscripcion">
		<button type="button" id="seleccionarFactura" class="btn btn-primary">AGREGAR FACTURA</button>
	</div>
		
	</div>
</div>
</div>
<div class="form-row" id="formulario" name="formulario" style="display: none;">
			<div class="panel panel-primary">
				<div class="panel panel-heading text-center">DATOS FACTURA</div>
				<div class="panel panel-body">
			<div class="form-group col-sm-4">
			<strong>Cedula o RUC: <br></strong>
			<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
			{!! Form::text('cedula_r', null, ['class' => 'form-control']) !!}
			</div>
						</div>
			<div class="form-group col-md-6">
			<strong>Razon social: <br></strong>
			<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-users"></i></span>
			{!! Form::text('razon_social', null, ['class' => 'form-control']) !!}
			</div>
						</div>		
			<div class="form-group col-md-4">
			<strong>Dirección: <br></strong>
			<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-address-card"></i></span>
			{!! Form::text('direccion_factura', null, ['class' => 'form-control']) !!}
			</div>
						</div>
			<div class="form-group col-md-4">
			<strong>Telefono: <br></strong>
			<div class="input-group-prepend">
			<span class="input-group-text"><i class="fas fa-phone-square"></i></span>
			{!! Form::text('telefono_factura', null, ['class' => 'form-control']) !!}
			</div>
			</div>
			<div class="form-group col-md-4">
			<strong>Codigo: <br></strong>
			<div class="input-group-prepend">
			<span class="input-group-text"><i class="fas fa-project-diagram"></i></span>
			{!! Form::text('codigo', null, ['class' => 'form-control', 'id' => 'codigo']) !!}
			</div>
						</div>
			<div class="form-group col-md-10">
			{!! Form::button('GUARDAR <i class="fas fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  !!}
			      </div>
			   </div>
			</div>	
       </div>
	
<script>
	
	$('#cedula').on('change', function(event) {
		event.preventDefault();
		var matriculado = event.target.value;
		console.log(matriculado);

		$.get('buscar_matriculado/'+ matriculado , function(data) {
    	$.each(data, function(idx, opt) {
   			$('#nombres').val(opt.nombres);
   			$('#apellidos').val(opt.apellidos);
   			$('#inscripcion').append('<input type="hidden" class="col-md-1" name="inscripcion_id" id="inscripcion_id" value='+opt.id+'>');

   	   });
	}
	, 
	'json');
	});

	$('#seleccionarFactura').on('click', function(){
		$('#formulario').css("display", "block");
		$('#seleccionarFactura').css("display", "none");

	});

</script>


