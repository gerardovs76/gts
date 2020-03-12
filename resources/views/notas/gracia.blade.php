@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			GRACIA
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')
					{!! Form::open(['route' => 'gracia.store']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
                                    <div class="form-group col-md-4">
                                            <strong>Curso: <br></strong>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                            {{ Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Seleccione el curso...']) }}
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
								<div class="form-group col-md-10">

   									{!! Form::button('<i class="fas fa-plus"></i> AGREGAR NOTA GRACIA', ['class' => 'btn btn-primary',  'id' => 'verNotas']) !!}
								</div>
								<div class="form-group col-md-2">

   									{!! Form::button('<i class="fas fa-clipboard"></i> VER PORCENTAJE GRACIA', ['class' => 'btn btn-primary',  'id' => 'porcentajeGracia']) !!}
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
						<p>PROMEDIO REMEDIAL</p>
					</th>
					<th>
						<p>NOTA GRACIA</p>
					</th>
					<th>
						<p>PROMEDIO GRACIA</p>
					</th>
                    </tr>
                    </thead>
					<tbody id="tableid">
				<tr>

				</tr>
			</tbody>
		</table>
	{!!Form::button('<i class="far fa-save"></i> GUARDAR', ['class' => 'btn btn-primary form-control'])!!}
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

		$.get('gracia_remedial/'+curso+'/'+paralelo+'/'+quimestre+'/'+parcial+'/'+materia, function(response){
			console.log(response);
			$.each(response, function(ind, opt){
				console.log(opt);
				$('#verNotas').css("display", "none");
				$('#tableid').append('<tr><td><strong>'+opt.nombres+'</strong></td><td style="color:red;">'+opt.promedio_remedial+'</td><input type="hidden" id="promedio_remedial" name="promedio_remedial[]" value='+opt.promedio_remedial+'><td><input type="text" id="nota_gracia" name="nota_gracia[]"></td><td></td><input type="hidden" id="matriculados_id" name="matriculados_id[]" value='+opt.id+'><input type="hidden" id="materias_id" name="materias_id[]" value='+materia+'><input type="hidden" id="quimestre" name="quimestre[]" value='+quimestre+'><input type="hidden" id="parcial" name="parcial[]" value='+parcial+'></tr>');
			});
		});
	});

	$('#porcentajeGracia').on('click', function(){

		$.get('gracia_promedio', function(response){
			$.each(response, function(indice, objeto){
				console.log(objeto);
				$('#porcentajeGracia').css("display", "none");
				if(objeto.promedio_gracia <= 7)
				{
				$('#tableid').append('<tr><td><strong>'+objeto.nombres+'</strong></td><td style="color:red;">'+objeto.promedio_remedial+'</td><td>'+objeto.nota_gracia+'</td><td style="color:red;">'+objeto.promedio_gracia+'</td></tr>');
			}else{
					$('#tableid').append('<tr><td><strong>'+objeto.nombres+'</strong></td><td style="color:red;">'+objeto.promedio_remedial+'</td><td>'+objeto.nota_gracia+'</td><td style="color:green;">'+objeto.promedio_gracia+'</td></tr>');

				}

			});
		});
	});
</script>

	  {!! Form::close() !!}
@endsection
