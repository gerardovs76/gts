@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			REMEDIALES
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')
		
					
					{!! Form::open(['route' => 'remediales.store']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<strong>Curso: <br></strong>
									{!! Form::select('curso', ['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6', 'id' => 'curso', 'placeholder' => 'Seleccione un curso']) !!}
								</div>
								<div class="form-group col-md-4">
									<strong>Quimestre: <br></strong>
									{!! Form::select('quimestre', ['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6', 'id' => 'quimestre', 'placeholder' => 'Seleccione un paralelo']) !!}
								</div>
								<div class="form-group col-md-4">
									<strong>Paralelo: <br></strong>
									{!! Form::select('paralelo', ['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6', 'id' => 'paralelo', 'placeholder' => 'Seleccione un paralelo']) !!}
								</div>
								<div class="form-group col-md-4">
									<strong>Parcial: <br></strong>
									{!! Form::select('parcial', ['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6', 'id' => 'parcial', 'placeholder' => 'Seleccione un parcial']) !!}
								</div>
								<div class="form-group col-md-4">
									<strong>Materia: <br></strong>
									{!! Form::select('materia', [], null, ['class' => 'form-control col-md-6', 'id' => 'materia', 'placeholder' =>'Seleccione una materia']) !!}
								</div>
								<div class="form-group col-md-10">

   									{!! Form::button('AGREGAR NOTA REMEDIAL', ['class' => 'btn btn-primary',  'id' => 'verNotas']) !!}									
								</div>
								<div class="form-group col-md-2">

   									{!! Form::button('VER PORCENTAJE REMEDIAL', ['class' => 'btn btn-primary',  'id' => 'porcentajeRemedial']) !!}									
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
						<p>PROMEDIO SUPLETORIO</p>
					</th>
					<th>
						<p>NOTA REMEDIAL</p>
					</th>
					<th>
						<p>PROMEDIO REMEDIAL</p>
					</th>
                    </tr>	
                    </thead>
					<tbody id="tableid">
				<tr>
				
				</tr>
			</tbody>
		</table>
	{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	</div>
<script>
	$('#paralelo').on('change', function(){
		var curso = $('#curso').val();
		var paralelo  = $('#paralelo').val();
		var parcial = $('#parcial').val();

		$.get('cargar_materia/'+curso+'/'+paralelo, function(response){
			$.each(response, function(index, obj){
				$('#materia').append('<option value='+obj.id+'>'+obj.materia+'</option>');

			});
		});
	});

	$('#verNotas').on('click', function(){
		var curso = $('#curso').val();
		var paralelo = $('#paralelo').val();
		var quimestre = $('#quimestre').val();
		var parcial = $('#parcial').val();
		var materia = $('#materia').val();
		console.log(curso);
		console.log(paralelo);
		console.log(parcial);
		console.log(materia);

		$.get('remedial_supletorio/'+curso+'/'+paralelo+'/'+quimestre+'/'+parcial+'/'+materia, function(response){
			console.log(response);
			$.each(response, function(ind, opt){
				$('#verNotas').css("display", "none");
				$('#tableid').append('<tr><td><strong>'+opt.nombres+'</strong></td><td style="color:red;">'+opt.promedio_supletorio+'</td><input type="hidden" id="promedio_supletorio" name="promedio_supletorio[]" value='+opt.promedio_supletorio+'><td><input type="text" id="nota_remedial" name="nota_remedial[]"></td><td id="porcentajeRemedial"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+opt.matriculados_id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'></tr>');
			});
		});
	});

	$('#porcentajeRemedial').on('click', function(){

		$.get('remedial_porcentaje', function(response){
			$.each(response, function(indice, objeto){
				$('#porcentajeRemedial').css("display", "none");
				if(objeto.promedio_remedial <= 7)
				{
				$('#tableid').append('<tr><td><strong>'+objeto.nombres+'</strong></td><td style="color:red;">'+objeto.promedio_supletorio+'</td><td>'+objeto.nota_remedial+'</td><td style="color:red;">'+objeto.promedio_remedial+'</td></tr>');
			}else{
					$('#tableid').append('<tr><td><strong>'+objeto.nombres+'</strong></td><td style="color:red;">'+objeto.promedio_supletorio+'</td><td>'+objeto.nota_remedial+'</td><td style="color:green;">'+objeto.promedio_remedial+'</td></tr>');

				}

			});
		});
	});
</script>

	  {!! Form::close() !!}	
@endsection 