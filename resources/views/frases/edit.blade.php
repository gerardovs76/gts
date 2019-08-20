@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
    <h2 class="text-center" style="color: #fff;">
      EDITAR FRASE
    </h2>
    </div>
    <hr>
		{!! Form::model($frases, ['route' => ['frases.update', $frases->id], 'method' => 'PUT']) !!}
			
		
				                 	<div class="form-group">
				                 		<strong>Ingrese el autor: <br></strong>
				                 	{!! Form::text('autor', null, ['class' => 'form-control']) !!}
				                 	</div>

				                 	<div class="form-group ">
				                 		<strong>Ingrese la frase: <br></strong>
				                 	{!! Form::textarea('frase', null, ['class' => 'form-control']) !!}	
				                 	</div>

				                 	<div class="form-group">
				                 	<button type="submit" class="btn btn-primary btn-block">ENVIAR</button>
				                 	</div>
			
		{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('matricular.partials.aside')
	</div>-->
@endsection