@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<h2 class="text-center">
			TAREAS ACADEMICAS
		</h2>
		<hr>
		@include('trabajosAcademicos.partials.error')
		{!! Form::open(['route' => 'trabajosAcademicos.store']) !!}
			
			@include('trabajosAcademicos.partials.form')
			
		
	</div>
	<table class="table table-striped table-hover">
	<thead>
	<tr>
			<th>
				<p>ALUMNOS</p>
			</th>
			<th>
				<p>NOTA</p>
			</th>
		</tr>
			</thead>
			<tbody id="tableid">
			
			    <tr>
					
				</tr>

			</tbody>
	

		</table>
		{!! Form::submit('GUARDAR', ['class' => 'btn btn-primary float-center']) !!}
		<button type="#" id="buttonid" class="btn btn-primary">AGREGAR</button>
	</div>
	{!! Form::close() !!}
	<!--<div class="col-xs-12 col-sm-4">
		@include('trabajosAcademicos.partials.aside')
	</div>-->
	<script>
		var nuevaVistaAlumnos = JSON.parse(localStorage.getItem("alumnos"));
		
		
		
		$('#buttonid').on('click', function(event) {
						event.preventDefault();
		var nuevaVistaMaterias = JSON.parse(localStorage.getItem("materias"));
		var nuevaVistaParcial = JSON.parse(localStorage.getItem("parcial"));
   		$.each(nuevaVistaAlumnos, function(index, row){
   		var tr = '<tr><td><strong>' + row.nombres + '</strong></td><td><input type="text" class="col-md-1" name="trabajo_academico[]" id="trabajo_academico"><input type="hidden" name="matriculados_id[]" value='+ row.id  +'><input type="hidden" class="col-md-1" name="materias_id[]" id="materias_id" value='+nuevaVistaMaterias+'><input type="hidden" class="col-md-1" name="parcial[]" id="parcial" value='+nuevaVistaParcial+'></td></tr>';
    	$('#tableid').append(tr);

	});
		

});
   	   
		

	</script>
@endsection