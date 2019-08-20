@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
          <h2 class="text-center" style="color: #fff;">
             EDITAR ALUMNO
          </h2>
          </div>
		<hr>
		@include('inscripcion.partials.error')
		{!! Form::model($inscripcion, ['route' => ['inscripcion.update', $inscripcion->id], 'method' => 'PUT']) !!}
			
			@include('inscripcion.partials.form-edit')
			
		{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('inscripcion.partials.aside')
	</div>-->
@endsection