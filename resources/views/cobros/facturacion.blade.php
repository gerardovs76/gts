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
        @include('notas.partials.error')
        @include('cobros.modal.modalFacturacion')

					{!! Form::open(['route' => 'cobros.facturacion-store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">INTRODUZCA LOS DATOS PARA IMPORTAR LOS DATOS DE FACTURA...</div>
						<div class="panel panel-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<strong>Archivo: <br></strong>
									{!! Form::file('import_file', null, ['class' => 'form-control col-md-6', 'placeholder' => 'Por favor que este en formato XLSX....']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <strong><em class="col-md-offset-6">En caso de ser pagos con tarjeta o efectivo...</em></strong>
                                    <button type="button" class="btn btn-primary col-md-offset-6" data-toggle="modal" data-target="#modalFacturacion" id="botonModal"><i class="fas fa-plus"></i>AGREGAR FACTURA</button>
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
                    {!!Form::select('tipo_factura',['SEP' => 'TOTAL', 'OCT' => 'PENSION OCTUBRE', 'NOV' => 'PENSION NOVIEMBRE', 'DIC' => 'PENSION DICIEMBRE', 'ENE' => 'PENSION ENERO', 'FEB' => 'PENSION FEBRERO', 'MAR' => 'PENSION MARZO', 'ABR' => 'PENSION ABRIL', 'MAY' => 'PENSION MAYO', 'JUN' => 'PENSION JUNIO'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Tipo de pensión...'])!!}
                    </div>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>Fecha inicio: <br></strong>
                        <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                        {!!Form::date('fecha_inicio', null, ['class' => 'form-control col-md-6', 'placeholder' => 'Tipo de pensión...'])!!}
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>Fecha fin: <br></strong>
                            <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                            {!!Form::date('fecha_fin', null, ['class' => 'form-control col-md-6', 'placeholder' => 'Tipo de pensión...'])!!}
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
    <style>
        .modal-header-primary {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #428bca;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
             border-top-left-radius: 5px;
             border-top-right-radius: 5px;
        }
        .modal-header-info {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #5bc0de;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
             border-top-left-radius: 5px;
             border-top-right-radius: 5px;
        }
</style>
@endsection
