@extends('layouts.app')


@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12 col-md-8">
<div style="background-color: #008cba; padding: 7px;">
    <h2 class="text-center" style="color: #fff;">
      MENSAJERIA
    </h2>
    </div>
    <hr>

				    <div class="row">
				    	<div class="col-md-6">
				    		<div class="panel panel-primary">
				    			<div class="panel panel-heading text-center">Registro de mensajes</div>
				    			<div class="panel panel-body">
				    				@foreach (Auth::user()->notifications as $notification)
			               <i>{{ $notification->data["envio_id"]["name"] }}</i> te ha enviado un mensaje: <b>{{ $notification->data["body"]}}</b><br>
			                @endforeach


				    			</div>
				    			</div>

				    	</div>
				        <div class="col-md-6">

				        	@include('mensaje.partials.info')
				            <div class="panel panel-primary">
				                <div class="panel-heading text-center">Ingrese los datos y el mensaje...</div>

				                <div class="panel-body">
				                 {!! Form::open(['route' => 'mensaje.store']) !!}



				                 	<div class="form-group">
				                 	<select name="recibio_id" class="form-control">
				                 		<option value="#">Seleccione el usuario</option>
				                 		@foreach($users as $user)
				                 		<option value="{{ $user->id }}">{{ $user->name }}</option>
				                 		@endforeach
				                 	</select>
				                 	</div>

				                 	<div class="form-group ">
				                 	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
				                 	</div>

				                 	<div class="form-group">
				                 	{!!Form::button('<i class="fa fa-paper-plane"></i> ENVIAR', ['class' => 'btn btn-primary btn-block', 'type' => 'submit'])!!}
				                 	</div>

				                 {!! Form::close() !!}

				                </div>
				            </div>
				        </div>
				    </div>
				</div>|


@endsection
