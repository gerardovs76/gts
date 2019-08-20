@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			REPORTE MATRICULADOS
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')
		
					
					{!! Form::open(['route' => 'matricular.reporteStore', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center"></div>
						<div class="panel panel-body">
							<div class="form-row">
								<div class="form-group col-md-4">
		<strong>Curso: <br></strong>
		<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
		{!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8', 'id' => 'curso', 'placeholder' => 'Ingrese el curso...']) !!}<br>
		</div>
		</div>
									<div class="form-group col-md-4">
		<strong>Paralelo: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
		{!! Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-8', 'id' => 'paralelo', 'placeholder' => 'Ingrese el paralelo']) !!}
		</div>
	</div>
	<div class="form-group col-md-12">
   									{!! Form::button(' <i class="fas fa-search"></i> BUSQUEDA', ['class' => 'btn btn-primary', 'type' => 'button', 'id' => 'mostrarBusqueda']) !!}							
								</div>
				

							<div class="form-group col-md-12">
   									{!! Form::button('<i class="fas fa-print"></i> IMPRIMIR REPORTE', ['class' => 'btn btn-primary form-control d-none', 'type' => 'submit', 'id' => 'imprimir']) !!}							
								</div>
								
							</div>
							
						</div>
					</div>        
                   <table class="table table-hover table-striped" id="tableid" align="center">
                   	<thead>
                   		<tr>
                   		    <th>NUM. ESTUDIANTE</th>
                   			<th>NOMBRES</th>
                   			<th>CURSO</th>
                   			<th>PARALELO</th>
                   			<th>TIPO ESTUDIANTE</th>
                   			<th>CODIGO</th>
                   		</tr>
                   	</thead>
					    <tbody>
					    	<tr>
					    		
					    	</tr>
					    
					    </tbody>
					</table>
	</div>
<script>
	$('#mostrarBusqueda').on('click', function(){
		var curso = $('#curso').val();
		var paralelo = $('#paralelo').val();
		
		

		$.get('matricular-reporte-tabla/'+curso+'/'+paralelo, function(response){
			$.each(response, function(index, obj){
			 console.log(index);
				$('#tableid').append('<tr><td><strong>'+(index + 1)+'</strong></td><td><strong>'+obj.nombres+' '+obj.apellidos+'</strong></td><td>'+obj.curso+'</td><td>'+obj.paralelo+'</td><td>'+obj.tipo_estudiante+'</td><td><strong>'+obj.codigo+'</strong></td></tr>');
				$('#mostrarBusqueda').css("display", "none");
				$('#imprimir').addClass("d-block");

			});
		});
	});
</script>
@endsection