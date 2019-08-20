@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<h2 class="text-center">
			NUEVO PARCIAL 1
		</h2>
		<hr>
		@include('parcial3.partials.error')
		{!! Form::open(['route' => 'parcial3.store']) !!}
			
			@include('parcial3.partials.form')
			
		{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('parcial3.partials.aside')
	</div>-->
@endsection