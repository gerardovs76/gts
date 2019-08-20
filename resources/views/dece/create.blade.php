@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			DEPARTAMENTO DE CONSEJERIA ESTUDIANTIL
		</h2>
		</div>
		<hr>
		@include('dece.partials.info')
		{!! Form::open(['route' => 'dece.store']) !!}
			
			@include('dece.partials.form')
			
		{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
	</div>-->
@endsection