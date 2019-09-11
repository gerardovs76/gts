@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			IMPORTAR MATRICULACIONES
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')

					{!! Form::open(['route' => 'matriculacion.import', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center"></div>
						<div class="panel panel-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<strong>Archivo: <br></strong>
									{!! Form::file('import_file', null, ['class' => 'form-control col-md-6', 'placeholder' => 'Por favor que este en formato XLSX....']) !!}
								</div>
								<div class="form-group col-md-12">
   									{!! Form::button('<i class="fa fa-paper-plane"></i> ENVIAR DATOS', ['class' => 'btn btn-primary col-sm-2', 'type' => 'submit']) !!}
								</div>

							</div>

						</div>
					</div>
                   <table class="table table-hover table-striped" id="tableid" style="display: none;" align="center">
					    <tbody>

					    </tbody>
					</table>
	</div>
@endsection
