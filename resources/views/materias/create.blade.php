@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			NUEVA MATERIA
		</h2>
		</div>
		<hr>
		@include('materias.partials.error')
		{!! Form::open(['route' => 'materias.store']) !!}
			
			@include('materias.partials.form')
			
		{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('materias.partials.aside')
	</div>-->
@endsection