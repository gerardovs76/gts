@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8">
		<h2>
			<strong>#{{ $profesor->id }}</strong> {{ $profesor->cedula }}
	
		</h2>
		<hr>
		<p><strong>Nombres y Apellidos: </strong>{{ $profesor->nombres_apellidos }}</p>
		<p><strong>Direccion: </strong>{{ $profesor->direccion }}</p>
		<p><strong>Fecha de nacimiento: </strong>{{ $profesor->fecha_nacimiento }}</p>
		<p><strong>Correo: </strong>{{ $profesor->correo }}</p>
		<p><strong>Movil:  </strong>{{ $profesor->movil }}</p>
		<p><strong>Convencional: </strong>{{ $profesor->convencional }}</p>
		<p><strong>Perfil del profesor: </strong>{{ $profesor->perfil_docente }}</p>
		<p><strong>Ultimo trabajo: </strong>{{ $profesor->ultimo_trabajo }}</p>
		<p><strong>Tipo de contrato: </strong>{{ $profesor->tipo_contrato }}</p>
		<p><strong>Cargo: </strong>{{ $profesor->cargo }}</p>
		<p><strong>Curso a dar: </strong>{{ $profesor->curso_dar }}</p>
		
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('alumnos.partials.aside')
	</div>-->
	<a href="{{ route('profesor.index') }}" class="btn btn-primary ">		REGRESAR
			</a>