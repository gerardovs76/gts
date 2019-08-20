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
		
					
					{!! Form::open(['route' => 'notas.libreta-descargar']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<strong>Cedula: <br></strong>
									{!! Form::text('cedula', null, ['class' => 'form-control col-md-6', 'id' => 'curso', 'placeholder' => 'Seleccione un curso']) !!}
								</div>
								<div class="form-group col-md-4">
									<strong>Quimestre: <br></strong>
									{!! Form::select('quimestre', ['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6', 'id' => 'paralelo', 'placeholder' => 'Seleccione un quimestre', 'id' => 'quimestre']) !!}
								</div>
								<div class="form-group col-md-4">
									<strong>Parcial: <br></strong>
									{!! Form::select('parcial', ['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6', 'id' => 'parcial', 'placeholder' => 'Seleccione un parcial']) !!}
								</div>
								<div class="form-group col-md-10">

   									{!! Form::button('DESCARGAR LIBRETA', ['class' => 'btn btn-primary',  'id' => 'verNotas', 'type' => 'submit']) !!}									
								</div>
								
							</div>
							
						</div>
					</div>
                   
                  
                    <table class="table table-striped table-hover" id="tableid">
			<thead>

                    <tr>	
                    <th>
                    	<p>
                    	<strong>ALUMNOS</strong>
                    	</p>
                    </th>
					<th>
				
					</th>
					<th>
						
					</th>
					<th>
				
					</th>

					</th>
					<th>
		
					</th>
					<th>
				
					</th>
                    </tr>	
                    </thead>
					<tbody id="tableid">
				<tr>
				
				</tr>
			</tbody>
		</table>
	
	</div>

	  {{ Form::close() }}	
@endsection 