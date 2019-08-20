@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8">
		<h2>
			<strong>#{{ $inscripcion->id }}</strong> {{ $inscripcion->cedula }}
			
		</h2>
		<hr>
		<p><strong>Nombre: </strong>{{ $inscripcion->nombres }}</p>
		<p><strong>Apellidos: </strong>{{ $inscripcion->apellidos }}</p>
		<p><strong>Fecha de nacimiento: </strong>{{ $inscripcion->fecha_nacimiento }}</p>
		<p><strong>Edad: </strong>{{ $inscripcion->edad }}</p>
		<p><strong>Colegio proveniente: </strong>{{ $inscripcion->colegio_proveniente }}</p>
		<p><strong>Dirección del alumno:  </strong>{{ $inscripcion->direccion_inscripcion }}</p>
		<p><strong>Sexo: </strong>{{ $inscripcion->sexo }}</p>
		<p><strong>Cedula del Representante: </strong>{{ $inscripcion->cedrepresentante }}</p>
		<p><strong>Nombres y Apellidos del representante: </strong>{{ $inscripcion->nombres_apellidos }}</p>
		<p><strong>Parentesco: </strong>{{ $inscripcion->parentesco }}</p>
		<p><strong>Dirección del representante: </strong>{{ $inscripcion->direccion_representante }}</p>
		<p><strong>Movil: </strong>{{ $inscripcion->movil }}</p>
		<p><strong>Convencional: </strong>{{ $inscripcion->convencional }}</p>
		
	</div>
	<!--<div class="col-xs-12 col-sm-4">
	</div>-->
	<a href="{{ route('inscripcion.index') }}" class="btn btn-primary ">		REGRESAR
			</a>
@endsection