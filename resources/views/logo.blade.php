@extends('layouts.app')



@section('content')
<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			ASIGNAR LOGO
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')
		
					
					{!! Form::open(['route' => 'logo.store', 'enctype' => 'multipart/form-data']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center"></div>
						<div class="panel panel-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<strong>Logo: <br></strong>
									{!! Form::file('logo', null, ['class' => 'form-control col-md-6', 'placeholder' => 'Por favor que este en formato XLSX....']) !!}
								</div>
								<div class="form-group col-md-10">
   									{!! Form::submit('Enviar datos', ['class' => 'btn btn-primary form-control col-md-2']) !!}							
								</div>
								
							</div>
							
						</div>
					</div>        
	</div>

@endsection