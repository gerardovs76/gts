@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">

		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			CAS
		</h2>
		</div>
		<hr>

        {!!Form::open(['route' => 'matricular.storeCas', 'method' => 'post'])!!}
            <div class="panel panel-primary">
                <div class="panel panel-heading text-center">INGRESE LOS DATOS PARA LA BUSQUEDA...</div>
                <div class="panel panel-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
            <strong>Curso: <br></strong>
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
            {!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8', 'id' => 'curso', 'placeholder' => 'Ingrese el curso...']) !!}<br>
            </div>
            </div>
            <div class="form-group col-md-4">
                    <strong>Paralelo: <br></strong>
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                    {!! Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-8', 'id' => 'paralelo', 'placeholder' => 'Ingrese el paralelo']) !!}<br>
                    </div>
                    </div>
            <div class="form-group col-md-12">
            {!! Form::button(' <i class="fas fa-search"></i> IMPRIMIR EN EXCEL', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'excel', 'name' => 'printButton', 'value' => 'excel']) !!}
                        </div>
                        <div class="form-group col-md-12">
                                {!! Form::button(' <i class="fas fa-search"></i> IMPRIMIR EN PDF', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'pdf', 'name' => 'printButton', 'value' => 'pdf']) !!}
                                            </div>
                    </div>
                </div>
            </div>
            {!!Form::close()!!}



		@include('notas.partials.info')
@endsection
