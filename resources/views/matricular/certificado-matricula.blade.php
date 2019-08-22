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
            <div class="panel panel-primary">
                <div class="panel panel-heading text-center">INGRESE LA CEDULA PARA LA BUSQUEDA...</div>
                <div class="panel panel-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
            <strong>Cedula: <br></strong>
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
            {!! Form::text('cedula', null, ['class' => 'form-control col-md-8', 'id' => 'cedula', 'placeholder' => 'Ingrese la cedula...']) !!}<br>
            </div>
            </div>
            <div class="form-group col-md-12">
            {!! Form::button(' <i class="fas fa-search"></i> BUSQUEDA', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'mostrarBusqueda']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!!Form::close()!!}



		@include('notas.partials.info')
@endsection
