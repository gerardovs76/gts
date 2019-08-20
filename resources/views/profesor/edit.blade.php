@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			EDITAR PROFESOR
		</h2>
		</div>
		<hr>
		@include('profesor.partials.error')
		{!! Form::model($profesor, ['route' => ['profesor.update', $profesor->id], 'method' => 'PUT']) !!}
			
			@include('profesor.partials.form')
			
		{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('profesor.partials.aside')
	</div>-->
@endsection