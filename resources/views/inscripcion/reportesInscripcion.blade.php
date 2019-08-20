@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			EXPORTAR INSCRIPCIONES
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')
		
					
					{!! Form::open(['route' => 'exportar.inscripciones', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center"></div>
						<div class="panel panel-body">
							<div class="form-row">
								<div class="form-group col-md-4">
		<strong>Fecha: <br></strong>
		<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
		{!! Form::date('fecha', null, ['class' => 'form-control col-md-8', 'id' => 'fecha', 'placeholder' => 'Ingrese la fecha...']) !!}<br>
		</div>
		</div>
		
		<div class="form-group col-md-4">
		<strong>Fecha hasta: <br></strong>
		<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
		{!! Form::date('fecha_hasta', null, ['class' => 'form-control col-md-8', 'id' => 'fecha', 'placeholder' => 'Ingrese la fecha...']) !!}<br>
		</div>
		</div>

		<div class="form-group col-md-4">
		<strong>Tipo de estudiante: <br></strong>
		<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
		{!! Form::select('tipo_estudiante',['NUEVO' => 'NUEVO', 'ANTIGUO' => 'ANTIGUO', 'BLOQUEADO' => 'BLOQUEADO'], null, ['class' => 'form-control col-md-8', 'id' => 'tipo_estudiante', 'placeholder' => 'Ingrese el tipo de estudiante...']) !!}<br>
		</div>
		</div>
								<div class="form-group col-md-12">
   									{!! Form::button('<i class="fas fa-print"></i>  GENERAR EXCEL', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}							
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