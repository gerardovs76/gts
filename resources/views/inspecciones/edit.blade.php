@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			EDITAR INSPECCIÓN
		</h2>
		</div>
		<hr>
		@include('matricular.partials.error')
		{!! Form::model($inspeccion, ['route' => ['inspeccion.update', $inspeccion->id], 'method' => 'PUT']) !!}

			@include('inspecciones.partials.form-edit')

		{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('matricular.partials.aside')
	</div>-->
@endsection
