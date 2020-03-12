@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			REPORTES  
		</h2>
		</div>
		<marquee>
			<h3>
				<strong>
		POR FAVOR, ESPECIFICAR SU BUSQUEDA, YA SEA POR CEDULA(INVIDUAL) O POR CURSO(GRUPAL). GRACIAS!
				</strong>
			</h3>
		</marquee>
		<hr>
		<div class="form-group col-md-4">
		<strong>Cedula: <br></strong>
		<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
		{!! Form::text('cedula', null, ['class' => 'form-control col-md-8', 'id' => 'cedula']) !!}<br>
		</div>
		</div>
		<div class="form-group col-md-4">
		<strong>Curso: <br></strong>
		<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-bezier-curve"></i></span>
		{!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8', 'id' => 'curso', 'placeholder' => 'Ingrese el curso...']) !!}<br>
		<button type="button" id="generarDatos" name="generarDatos" class="btn btn-primary"> <i class="fas fa-print"></i> GENERAR DATOS</button>
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
			var cedula = $('#cedula').val();
			$.get('matriculados_busqueda/'+cedula, function(data){
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

		$('#generarDatos').on('click', function(event){
			event.preventDefault();
			var curso = $('#curso').val();
			$.get('matriculados_busqueda/'+curso, function(data){
				var cedulaPDF = (data);
				console.log(cedulaPDF);
				localStorage.setItem("curso", JSON.stringify(cedulaPDF));
				$.each(data, function(inx, obj){

					$('#tableid').append('<tr><td><strong>'+obj.id+'</strong></td><td><strong>'+obj.cedula+'</strong></td><td><strong>'+obj.nombres+'</strong></td><td><strong>'+obj.apellidos+'</strong></td><td><strong>'+obj.curso+'</strong></td><td><strong>'+obj.especialidad+'</strong></td><td><strong>'+obj.paralelo+'</strong></td></tr>');
					$('#generarPDF').css("display", "block");
					$('#generarDatos').css("display", "none");

				});

			});

		});
	</script>
@endsection