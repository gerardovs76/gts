@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<hr>
		@include('parcial3.partials.info')
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
	
                 
			<tbody>
			
				@foreach($notasAlumno as $alumno)
				<tr>
					
					<td><strong>{{ $alumno->nombres }} {{ $alumno->apellidos }}</strong></td>
					</td>
					
				</tr>
				@endforeach
				<tr>
					<!--AQUI VA LOS RESULTADOS DE LA TABLA DEL PORCENTAJE DE TODOS LOS TRABAJOS/TAREAS-->
			{{-- 		<td>{{ $parcial->tareas_academicas }}</td>
					<td>{{ $parcial->tareas_individuales }}</td>
					<td>{{ $parcial->trabajos_grupales }}</td>
					<td>{{ $parcial->leccion }}</td>
					<td>{{ $parcial->evalucacion }}</td> 2 
					<td>{{ $parcial->promedio }}</td>
					<td>{{ $parcial->comportamiento }}</td> --}}
				</tr>
			</tbody>
		</table>
		
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('notas.partials.aside')
	</div>-->
@endsection