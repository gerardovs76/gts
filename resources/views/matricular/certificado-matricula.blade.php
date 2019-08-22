@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">

		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			CERTIFICADO DE MATRICULA
		</h2>
		</div>
		<hr>

        {!!Form::open(['route' => 'matricular.certificadoStore'])!!}
        <div class="form-row">
        <div class="form-group col-md-4">
        <strong>Cedula: <br></strong>
        {!!Form::text('cedula', null, ['class' => 'form-control col-md-6'])!!}
        </div>
        <div class="form-group col-md-12">
        {!!Form::button('<i class="fas fa-search"></i> BUSQUEDA', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'busqueda'])!!}
        </div>
        </div>

        {!!Form::close()!!}
		@include('notas.partials.info')
@endsection