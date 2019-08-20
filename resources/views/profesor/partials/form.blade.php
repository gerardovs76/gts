	<div class="panel panel-primary">
		<div class="panel panel-heading text-center">NUEVO PROFESOR</div>
				
			<div class="panel panel-body">
	<div class="form-row">
		<div class="form-group col-md-4">
		<strong>Cedula del profesor: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('cedula', null, ['class' => 'form-control col-md-8']) !!}
		</div>
	</div>	
		<div class="form-group col-md-4">
		<strong>Nombres y apellidos del profesor: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('nombres_apellidos', null, ['class' => 'form-control col-md-8']) !!}
		</div>
</div>
		<div class="form-group col-md-4">
		<strong>Dirección: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('direccion', null, ['class' => 'form-control col-md-8']) !!}
		</div>
</div>
		<div class="form-group col-md-4">
		<strong>Fecha de nacimiento: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::date('fecha_nacimiento', null, ['class' => 'form-control col-md-6']) !!}
		</div>
</div>
		<div class="form-group col-md-4">
		<strong>Correo: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('correo', null, ['class' => 'form-control col-md-6']) !!}
		</div>
</div>
		<div class="form-group col-md-4">
		<strong>Colegio proveniente: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('colegio_proveniente', null, ['class' => 'form-control col-md-6']) !!}
		</div>
</div>
		<div class="form-group col-md-4">
		<strong>Movil: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('movil', null, ['class' => 'form-control col-md-6']) !!}
		</div>
</div>
		<div class="form-group col-md-4">
		<strong>Convencional: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('convencional', null, ['class' => 'form-control col-md-6']) !!}
		</div>
</div>
		<div class="form-group col-md-4">
		<strong>Perfil docente: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('perfil_docente', null, ['class' => 'form-control col-md-6']) !!}
		</div>
</div>
		<div class="form-group col-md-4">
		<strong>Ultimo trabajo: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('ultimo_trabajo', null, ['class' => 'form-control col-md-8']) !!}
		</div>
</div>
		<div class="form-group col-md-4">
		<strong>Tipo de contrato: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('tipo_contrato', null, ['class' => 'form-control col-md-8']) !!}
		</div>
</div>
		<div class="form-group col-md-4">
		<strong>Cargo: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
		{!! Form::text('cargo', null, ['class' => 'form-control']) !!}
		</div>
</div>
		<div class="form-group col-md-10">
				{!! Form::button('<i class="fas fa-save"></i> GUARDAR', ['class' => 'btn btn-primary float-center', 'type' => 'submit']) !!}
				</div>
		</div>
	</div>
</div>
	
	