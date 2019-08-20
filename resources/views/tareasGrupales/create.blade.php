@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<h2 class="text-center">
			TAREAS GRUPALES
		</h2>
		<hr>
		@include('tareasGrupales.partials.error')
		{!! Form::open(['route' => 'tareasGrupales.store']) !!}
			
			@include('tareasGrupales.partials.form')
			
		
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
		@include('tareasGrupales.partials.aside')
	</div>-->
	<script>
		var nuevaVistaAlumnos = JSON.parse(localStorage.getItem("alumnos"));
		
		
		
		$('#buttonid').on('click', function(event) {
						event.preventDefault();
		var nuevaVistaMaterias = JSON.parse(localStorage.getItem("materias"));
		var nuevaVistaParcial = JSON.parse(localStorage.getItem("parcial"));
   		$.each(nuevaVistaAlumnos, function(index, row){
   		var tr = '<tr><td><strong>' + row.nombres + '</strong></td><td><input type="text" class="col-md-1" name="tarea_grupal[]" id="tarea_grupal"><input type="hidden" name="matriculados_id[]" value='+ row.id  +'><input type="hidden" class="col-md-1" name="materias_id[]" id="materias_id" value='+nuevaVistaMaterias+'><input type="hidden" class="col-md-1" name="parcial[]" id="parcial" value='+nuevaVistaParcial+'></td></tr>';
    	$('#tableid').append(tr);

	});
		

});
   	   
		

	</script>
@endsection