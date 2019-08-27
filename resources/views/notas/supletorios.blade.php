@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			SUPLETORIOS
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


					{!! Form::open(['route' => 'supletorios.store']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
                                    <div class="form-group col-md-4">
                                            <strong>Curso: <br></strong>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                            {{ Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Seleccione el curso...']) }}
                                            </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <strong>Paralelo: <br></strong>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                            {{ Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Seleccione el paralelo...']) }}
                                            </div>
                                            </div>
                                             <div class="form-group col-md-4">
                                            <strong>Quimestre: <br></strong>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                            {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6' , 'id' => 'quimestre', 'placeholder' => 'Seleccione el quimestre...']) }}
                                            </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <strong>Parcial: <br></strong>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                            {{ Form::select('parcial',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6' , 'id' => 'parcial', 'placeholder' => 'Seleccione el parcial...']) }}
                                            </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <strong>Materia: <br></strong>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                            {{ Form::select('materia',[], null, ['class' => 'form-control col-md-6' , 'id' => 'materia', 'placeholder' => 'Seleccione la materia...']) }}
                                            </div>
                                            </div>
								<div class="form-group col-md-12">
                                    {!!Form::button('<i class="fas fa-clipboard"></i> VER PROMEDIO SUPLETORIO', ['class' => 'btn btn-primary', 'id' => 'verPromedioSupletorio', 'type' => 'button'])!!}
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
						<p>PROMEDIO</p>
					</th>
					<th>
						<p>NOTA DE SUPLETORIO</p>
					</th>
					<th>
						<p>PROMEDIO DE SUPLETORIO</p>
					</th>
                    </tr>
                    </thead>
					<tbody id="tableid">
				<tr>

				</tr>
			</tbody>
		</table>
	{!!Form::button('<i class="far fa-save"></i> GUARDAR', ['class' => 'btn btn-primary form-control', 'type' => 'submit'])!!}
	{{ Form::close() }}
	</div>
<script>
	$('#paralelo').on('change', function(event){
		event.preventDefault();
		var curso = $('#curso').val();
		var paralelo  = $('#paralelo').val();
		var parcial = $('#parcial').val();

		$.get('cargar_materia/'+curso+'/'+paralelo, function(response){
			$.each(response, function(index, obj){
				$('#materia').append('<option value='+obj.id+'>'+obj.materia+'</option>');

			});
		});
	});

</script>
<script>
	$('#materia').on('change', function(event){
		event.preventDefault();
		var curso = $('#curso').val();
		var paralelo = $('#paralelo').val();
		var parcial = $('#parcial').val();
		var materia = $('#materia').val();
		var quimestre = $('#quimestre').val();
		console.log(curso);
		console.log(paralelo);
		console.log(parcial);
		console.log(materia);

		$.get('suma_supletorio/'+curso+'/'+paralelo+'/'+quimestre+'/'+parcial+'/'+materia, function(response){
			console.log(response);
			$.each(response, function(ind, opt){
				$('#verNotas').css("display", "none");
				$('#tableid').append('<tr><td><strong>'+opt.nombres+'</strong></td><td style="color:red;">'+opt.nota_final+'</td><input type="hidden" id="promedio_notas" name="promedio_notas[]" value='+opt.nota_final+'><td><input type="text" id="nota_supletorio" name="nota_supletorio[]"></td><td id="porcentajeSupletorio"></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+opt.matriculados_id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'></tr>');

			});
		});
	});
</script>
<script>
	$('#verPromedioSupletorio').on('click', function(event){
		event.preventDefault();
		$.get('supletorios_promedio', function(response){
			$.each(response, function(index, obj){
			$('#verPromedioSupletorio').css("display", "none");
			if(obj.promedio_supletorio <= 7)
			{
				$('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td>'+obj.promedio_notas+'</td><td>'+obj.nota_supletorio+'</td><td style="color:red;">'+obj.promedio_supletorio+'</td></tr>')

			}else{
			$('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td>'+obj.promedio_notas+'</td><td>'+obj.nota_supletorio+'</td><td style="color:green;">'+obj.promedio_supletorio+'</td></tr>');
		}
		});
		});
	});
</script>
@endsection
