@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			REPORTE COLECTIVO
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')
		
					
					{!! Form::open(['route' => 'notas.descargarLibretaColectiva']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<strong>Curso: <br></strong>
									{!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6', 'id' => 'curso', 'placeholder' => 'Seleccione un curso']) !!}
								</div>
								<div class="form-group col-md-10">

   									{!! Form::button('DESCARGAR REPORTE', ['class' => 'btn btn-primary',  'id' => 'verNotas', 'type' => 'submit']) !!}									
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