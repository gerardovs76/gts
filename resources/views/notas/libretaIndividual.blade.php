@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			LIBRETA COLECTIVA
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


					{!! Form::open(['route' => 'notas.libreta-descargar']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
                                    <div class="form-group col-md-4">
                                            <strong>Curso: <br></strong>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                            {{ Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Seleccione el curso...']) }}
                                            </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <strong>Paralelo: <br></strong>
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                                    {{ Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Seleccione el curso...']) }}
                                                    </div>
                                                    </div>
                                            <div class="form-group col-md-4">
                                                    <strong>Quimestre: <br></strong>
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                    {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6' , 'id' => 'quimestre', 'placeholder' => 'Seleccione el quimestre...']) }}
                                                    </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                            <strong>Parcial: <br></strong>
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                            {{ Form::select('parcial',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6' , 'id' => 'parcial', 'placeholder' => 'Seleccione el parcial...']) }}
                                                            </div>
                                                            </div>
								<div class="form-group col-md-10">

   									{!! Form::button('<i class="fas fa-print"></i> DESCARGAR LIBRETA', ['class' => 'btn btn-primary',  'id' => 'verNotas', 'type' => 'submit']) !!}
								</div>

							</div>

						</div>
					</div>
	</div>

	  {{ Form::close() }}
@endsection
