@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			RECURSOS HUMANOS
		</h2>
		</div>
		<hr>
		@include('recursos_humanos.partials.error')
		{!! Form::open(['route' => 'recursos_humanos.store']) !!}
			
			@include('recursos_humanos.partials.form')
			
		

	</div>
	{!! Form::close() !!}
	<!--<div class="col-xs-12 col-sm-4">
		@include('recursos_humanos.partials.aside')
	</div>-->
@endsection