@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			REPORTES  
		</h2>
		</div>
		<marquee>
			<h3>
				<strong>
		POR FAVOR, ESPECIFICAR SU BUSQUEDA, YA SEA POR FECHA DE INSCRIPCIÓN. GRACIAS!
				</strong>
			</h3>
		</marquee>
		<hr>
		<div class="form-group col-md-4">
		<strong>Fecha: <br></strong>
		<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
		{!! Form::date('fecha', null, ['class' => 'form-control col-md-8', 'id' => 'fecha', 'placeholder' => 'Ingrese la fecha...']) !!}<br>
		<button type="button" id="generarDatos" name="generarDatos" class="btn btn-primary"><i class="fas fa-hourglass-start"></i> GENERAR DATOS</button>
		</div>
		</div>
   
		<table id="tableid" class="table table-striped table-hover">
			<thead>
				<tr>
				<th>ID</th>
				<th>CEDULA</th>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>CURSO</th>
				<th>ESPECIALIDAD</th>
				<th>PARALELO</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
				</tr>
			</tbody>
		</table>
		<a href="{{ route('matri_pdf') }}" class="btn btn-primary" id="generarPDF" style="display: none;">Generar PDF</a>
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('matricular.partials.aside')
	</div>-->
	<script>
		$('#generarDatos').on('click', function(event){
			event.preventDefault();
			var fecha = $('#fecha').val();
			$.get('inscripcion_busqueda/'+fecha, function(data){
				var cedulaPDF = (data);
				console.log(cedulaPDF);
				localStorage.setItem("cedula", JSON.stringify(cedulaPDF));
				$.each(data, function(inx, obj){

					$('#tableid').append('<tr><td><strong>'+obj.id+'</strong></td><td><strong>'+obj.cedula+'</strong></td><td><strong>'+obj.nombres+'</strong></td><td><strong>'+obj.apellidos+'</strong></td><td><strong>'+obj.curso+'</strong></td><td><strong>'+obj.especialidad+'</strong></td><td><strong>'+obj.paralelo+'</strong></td></tr>');
					$('#generarPDF').css("display", "block");
					$('#generarDatos').css("display", "none");

				});

			});

		});
	</script>
@endsection