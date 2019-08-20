@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			CONTROL DE PROFESOR  
		</h2>
		</div>
		<hr>

		<div class="form-group col-md-4">
		<strong>Cedula: <br></strong>
		<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
		{!! Form::text('cedula', null, ['class' => 'form-control col-md-8', 'id' => 'cedula']) !!}<br>
		</div>
		</div>
		<div class="form-group col-md-12">
		
		<button type="button" id="generarDatos" name="generarDatos" class="btn btn-primary"><i class="fas fa-search"></i> BUSQUEDA</button>
		</div>
		

		<table id="tableid" class="table table-striped table-hover">
			<thead>
				<tr>
				<th>NOMBRE</th>
				<th>FECHA INICIO DE SESIÓN</th>
				<th>FECHA DE FINALIZADA LA SESIÓN</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('matricular.partials.aside')
	</div>-->
	<script>
		$('#generarDatos').on('click', function(event){
			event.preventDefault();
			var cedula = $('#cedula').val();
			$.get('users/control/'+cedula, function(data){
				$.each(data, function(inx, obj){

					$('#tableid').append('<tr><td><strong>'+obj.name+'</strong></td><td><strong>'+obj.login+'</strong></td><td><strong>'+obj.logout+'</strong></td></tr>');
					$('#generarDatos').css("display", "none");

				});

			});

		});
	</script>
@endsection