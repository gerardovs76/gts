@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			EDITAR MATRICULA
		</h2>
		</div>
		<hr>
		@include('matricular.partials.error')
		{!! Form::model($matricular, ['route' => ['matricular.update', $matricular->id], 'method' => 'PUT']) !!}

			@include('matricular.partials.form')

		{!! Form::close() !!}
	</div>
@endsection
