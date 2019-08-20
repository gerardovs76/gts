@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			REPORTE MEDICO
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')
		
					
					{!! Form::open([]) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<strong>Cedula: <br></strong>
									{!! Form::text('cedula', null, ['class' => 'form-control col-md-6', 'id' => 'cedula', 'placeholder' => 'Seleccione un curso']) !!}
								</div>
								<div class="form-group col-md-10">

   									{!! Form::button('REALIZAR BUSQUEDA', ['class' => 'btn btn-primary',  'id' => 'verReporte']) !!}									
								</div>
								
							</div>
							
						</div>
					</div>
                   
                  
                    <table class="table table-striped table-hover" id="tableid">
			<thead>

                    <tr>	
                    <th>
                    	<p>
                    	<strong>NOMBRES</strong>
                    	</p>
                    </th>
                    <th>
                    	<p>
                    	<strong>CURSO Y PAR.</strong>
                    	</p>
                    </th>
                    <th>
                    	<p>
                    	<strong>FECHA</strong>
                    	</p>
                    </th>
                    <th>
                    	<p>
                    	<strong>DIAGNOSTICO</strong>
                    	</p>
                    </th>
                    <th>
                    	<p>
                    	<strong>MEDICAMENTOS</strong>
                    	</p>
                    </th>
                    <th>
                    	<p>
                    	<strong>OBSERVACIÓN</strong>
                    	</p>
                    </th>
                    </tr>	
                    </thead>
					<tbody>
				<tr>
				
				</tr>
			</tbody>
		</table>
	
	</div>

	  {{ Form::close() }}	
	  <script>
	  	$('#verReporte').on('click', function(){
	  		var cedula = $('#cedula').val();
	  		$.get('observacion/ver/'+cedula, function(response){
	  			$.each(response, function(index, ob){
	  				$('#tableid').append('<tr><td>'+ob.apellidos+' '+ob.nombres+'</td><td>'+ob.curso+' '+ob.paralelo+'</td><td>'+ob.fecha+'</td><td>'+ob.diagnostico+'</td><td>'+ob.medicamentos+'</td><td>'+ob.observacion+'</td></tr>');
	  			});
	  		});
	  	});

	  </script>
@endsection 