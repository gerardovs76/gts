@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			LIBRETA INDIVIDUAL
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


					{!! Form::open(['route' => 'notas.reporte-individual-libreta-store']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
                                    <div class="form-group col-md-4">
                                            <strong>Codigo: <br></strong>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                            {{ Form::text('codigo', null, ['class' => 'form-control col-md-6' , 'id' => 'codigo', 'placeholder' => 'Introduzca el codigo...']) }}
                                            </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <strong>Parcial: <br></strong>
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                {{ Form::select('parcial',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6' , 'id' => 'parcial', 'placeholder' => 'Seleccione el parcial...']) }}
                                                </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <strong>Quimestre: <br></strong>
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                    {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6' , 'id' => 'quimestre', 'placeholder' => 'Seleccione el quimestre...']) }}
                                                    </div>
                                                    </div>
								<div class="form-group col-md-10">

   									{!! Form::button('<i class="fas fa-print"></i> DESCARGAR REPORTE', ['class' => 'btn btn-primary',  'id' => 'verNotas', 'type' => 'submit']) !!}
								</div>

							</div>

						</div>
					</div>
	</div>

	  {{ Form::close() }}
@endsection

