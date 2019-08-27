@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			FACTURACION
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')

					{!! Form::open(['route' => 'cobros.facturacion-store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">INTRODUZCA LOS DATOS PARA IMPORTAR LOS DATOS DE FACTURA...</div>
						<div class="panel panel-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<strong>Archivo: <br></strong>
									{!! Form::file('import_file', null, ['class' => 'form-control col-md-6', 'placeholder' => 'Por favor que este en formato XLSX....']) !!}
								</div>
                                <div class="form-group col-md-10">
                                {!! Form::button('<i class="fa fa-paper-plane"></i> ENVIAR DATOS', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
                                </div>
							</div>
							{!!Form::close()!!}
						</div>

					</div>
                    {!!Form::open(['route' => 'cobros.facturacion-exports', 'method' => 'POST'])!!}
                    <div class="panel panel-primary">
                    <div class="panel panel-heading text-center">INTRODUZCA LOS DATOS PARA EXPORTAR DATOS DE FACTURA...</div>
                    <div class="panel panel-body">
                    <div class="form-row">
					<div class="form-group col-md-4">
                    <strong>Tipo factura: <br></strong>
                    <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    {!!Form::select('tipo_factura',['TOTAL' => 'TOTAL', 'PENSION' => 'PENSION'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Tipo de estudiante...'])!!}
                    </div>
					</div>
					<div class="form-group col-md-4">
                    <strong>Fecha inicio: <br></strong>
                    <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    {!!Form::date('fecha_inicio', null, ['class' => 'form-control col-md-6', 'placeholder' => 'Tipo de estudiante...'])!!}
                    </div>
					</div>
					<div class="form-group col-md-4">
                    <strong>Fecha hasta: <br></strong>
                    <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    {!!Form::date('fecha_hasta', null, ['class' => 'form-control col-md-6', 'placeholder' => 'Tipo de estudiante...'])!!}
                    </div>
					</div>
                    <div class="form-group col-md-10">
                    {!!Form::button('<i class="fas fa-search"></i> BUSQUEDA', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
                    </div>
                    </div>
                    </div>
                    </div>
                    {!!Form::close()!!}
                   <table class="table table-hover table-striped" id="tableid" style="display: none;" align="center">
					    <tbody>

					    </tbody>
					</table>
	</div>
@endsection
