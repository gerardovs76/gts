@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<hr>
		{!! Form::open(['route' => 'parcial1.store']) !!}
			
			@include('parcial1.partials.form')
			

		@include('parcial1.partials.info')
					<table class="table">
						<div class="form-row">
				  	  <thead>
				      <tr>
				      <th scope="col">ALUMNOS</th>
				      <th scope="col"><a class="btn btn-primary" href="{{ route('trabajosAcademicos.create') }}">Trabajo academico</a>
				      </th>
				      <th scope="col"><a href="{{ route('tareasIndividuales.create') }}" class="btn btn-primary">Tareas Individuales</a></th>
				      <th scope="col"><a href="{{ route('tareasGrupales.create') }}" class="btn btn-primary">Tareas Grupales</a></th>
				      <th scope="col"><a href="{{ route('lecciones.create') }}" class="btn btn-primary">Lecciones</a></th>
				      <th scope="col">Evaluacion</th>
				      <th scope="col">Promedio</th>
				      <th scope="col">Conducta</th>
				      </tr>
				  	</thead>
	
                 
			<tbody id="tableid">	
				<tr>
				<td>
				
				
				</td>

				<td>
				
				
				</td>
				</tr>
				
			</tbody>
		</table>
		
		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	</div>

			{!! Form::close() !!}
	<!--<div class="col-xs-12 col-sm-4">
		@include('notas.partials.aside')
	</div>-->
	<script>
		var nuevaVistaAlumnos = JSON.parse(localStorage.getItem("alumnos"));
		var nuevaVistaParcial = JSON.parse(localStorage.getItem("parcial"));
		var nuevaVistaMaterias = JSON.parse(localStorage.getItem("materias"));
	
			$('#tableid').empty();
    	$.each(nuevaVistaAlumnos, function(idx, opt) {
				
			$.get('porcentaje_nota/'+opt.id+'/'+nuevaVistaParcial+'/'+nuevaVistaMaterias, function(data){
				
					$.each(data, function(index, obj){
						console.log(obj.id);  

					var trr = ('<tr><td><strong>'+opt.nombres+'</strong></td><td><input type="text" id="nota_ta" name="nota_ta[]" value='+obj.nota_ta+'></td><td><input type="text" id="nota_ta" name="nota_ta[]"></td><td><input type="text" id="nota_ta" name="nota_ta[]"></td><td><input type="text" id="nota_ta" name="nota_ta[]"></td><td><input type="text" id="evaluacion" name="evaluacion[]"><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+obj.id+'></td></tr>');
					$('#tableid').append(trr);

			  
			  
		  });
					


		});




	});
	  	   
</script>
@endsection