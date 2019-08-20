@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8">
		<h2>
			<strong>#{{ $alumno->id }}</strong> {{ $alumno->cedula }}
			
		</h2>
		<hr>
		<p><strong>Nombre: </strong>{{ $alumno->nombres }}</p>
		<p><strong>Apellidos: </strong>{{ $alumno->apellidos }}</p>
		<p><strong>Fecha de nacimiento: </strong>{{ $alumno->fecha_nacimiento }}</p>
		<p><strong>Edad: </strong>{{ $alumno->edad }}</p>
		<p><strong>Colegio proveniente: </strong>{{ $alumno->colegio_proveniente }}</p>
		<p><strong>Dirección del alumno:  </strong>{{ $alumno->direccion_alumno }}</p>
		<p><strong>Sexo: </strong>{{ $alumno->sexo }}</p>
		<p><strong>Cedula del Representante: </strong>{{ $alumno->cedrepresentante }}</p>
		<p><strong>Nombres y Apellidos del representante: </strong>{{ $alumno->nombres_apellidos }}</p>
		<p><strong>Parentesco: </strong>{{ $alumno->parentesco }}</p>
		<p><strong>Dirección del representante: </strong>{{ $alumno->direccion_representante }}</p>
		<p><strong>Movil: </strong>{{ $alumno->movil }}</p>
		<p><strong>Convencional: </strong>{{ $alumno->convencional }}</p>
		
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('alumnos.partials.aside')
	</div>-->
	<a href="{{ route('alumnos.index') }}" class="btn btn-primary ">		REGRESAR
			</a>
@endsection