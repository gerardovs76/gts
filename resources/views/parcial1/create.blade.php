@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<h2 class="text-center">
		</h2>
		<hr>
		@include('parcial1.partials.error')
		{!! Form::open(['route' => 'parcial1.store']) !!}
			
			@include('parcial1.partials.form')
			
		{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('parcial1.partials.aside')
	</div>-->
@endsection