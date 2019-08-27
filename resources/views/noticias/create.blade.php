@extends('layouts.app')

@section('content')

<div class="col-xs-12 col-sm-8 col-lg-12">
	<div style="background-color: #008cba; padding: 7px;">
    <h2 class="text-center" style="color: #fff;">
      CREAR NOTICIA
    </h2>
    </div>
    <hr>

				<div class="container">

				    <div class="row">
				        <div class="col-md-8 col-md-offset-2">

				        	@include('mensaje.partials.info')
				            <div class="panel panel-primary">
				                <div class="panel-heading text-center">Ingrese los datos...</div>

				                <div class="panel-body">
				                 {!! Form::open(['route' => 'noticias.store']) !!}
				                 	<div class="form-group">
                                         <strong>Nombre: <br></strong>
                                         <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
				                 	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                                     </div>
				                 	</div>
				                 	<div class="form-group">
                                         <strong>Dirección: <br></strong>
                                         <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
				                 	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
				                 	</div>
				                 	</div>
				                 	<div class="form-group ">
                                         <strong>Descripción: <br></strong>
                                         <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
				                 	{!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
				                 	</div>
				                 	</div>
				                 	<div class="form-group">
				                 	{!!Form::button('<i class="fa fa-paper-plane"></i> GUARDAR', ['class' => 'btn btn-primary btn-block', 'type' => 'submit'])!!}
				                 	</div>

				                 {!! Form::close() !!}

				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			</div>

@endsection
