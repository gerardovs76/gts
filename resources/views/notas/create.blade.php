@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<h2 class="text-center">
			NUEVAS NOTAS
		</h2>
		<hr>
		@include('notas.partials.error')
		{!! Form::open(['route' => 'notas.store']) !!}
			
			@include('notas.partials.form')
			
		{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('notas.partials.aside')
	</div>-->
@endsection