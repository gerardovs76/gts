@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			HORARIOS ESTUDIANTES
		</h2>
		</div>

		<hr>
		@include('horarios.partials.info')
					{!! Form::open(['route' => 'horarios.estudiantes-store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">Seleccione los datos y guarde el archivo...</div>
						<div class="panel panel-body">
							<div class="form-row">
                                <div class="form-group col-md-4">
                                        <strong>Curso: </strong><br>
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                    {!!Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el curso', 'id' => 'curso'])!!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                        <strong>Paralelo: </strong><br>
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                    {!!Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el curso', 'id' => 'curso'])!!}
                                    </div>
                                </div>
								<div class="form-group col-md-12">
									<strong>Archivo: <br></strong>
									{!! Form::file('archivo', null, ['class' => 'form-control col-md-6', 'placeholder' => 'Por favor que este en formato XLSX....']) !!}
								</div>
								<div class="form-group col-md-8">
   									{!! Form::button('<i class="far fa-save"></i> GUARDAR', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
								</div>

							</div>

						</div>
                    </div>
                    {!!Form::close()!!}

	</div>
@endsection
