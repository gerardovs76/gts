@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			NUEVO CARGO
		</h2>
		</div>
		<hr>
		@include('users.partials.info')
		{!! Form::open(['route' => 'users-cargos.store']) !!}
			
			<div class="panel panel-primary">
			<div class="panel-heading text-center">DATOS DEL CARGO</div>
				
			<div class="panel-body">
			
			<div class="form-row">
				<div class="form-group col-md-4">
				<strong>Nombre: <br></strong>
		<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
				{!! Form::text('nombre', null, ['class' => 'form-control col-md-8' , 'id' => 'cedula']) !!}
				</div>
			</div>
				<div class="form-group col-md-4">
				<strong>Cargo: <br></strong>
		<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
				{!! Form::text('cargo', null, ['class' => 'form-control col-md-8', 'id' => 'nombres']) !!}
				</div>
			</div>
<div class="form-group col-md-10">
			{!! Form::button('GUARDAR <i class="fas fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  !!}
			      </div>
			   </div>
			</div>	
       </div>
		{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('matricular.partials.aside')
	</div>-->
@endsection