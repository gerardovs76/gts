@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-12 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			LISTA DE NOTAS
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


					{!! Form::open(['route' => 'notas.store']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">

                                        @if(Auth::user()->isRole('super-admin'))
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
                                             @elseif(Auth::user()->isRole('profesor'))
                                             <div class="form-group col-md-4">
                                                    <strong>Curso: <br></strong>
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                    {{ Form::select('curso',$profesorCurso, null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                                    </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <strong>Paralelo: <br></strong>
                                                    <div class="input-group-prepend">
                                                         <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                    {{ Form::select('paralelo',$profesorParalelo, null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
                                                    </div>
                                                    </div>
                                            @endif
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

   									{!! Form::button('<i class="fas fa-clipboard"></i> VER NOTAS', ['class' => 'btn btn-primary',  'id' => 'verNotas']) !!}
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
						<p>TRABAJO ACADEMICO</p>
					</th>
					<th>
						<p>TAREAS INDIVIDUALES</p>
					</th>
					<th>
						<p>TAREAS GRUPALES</p>
					</th>
					<th>
						<p>LECCIONES</p>
					</th>
					<th>
						<p>EVALUACIONES</p>
                    </th>
                    <th>
                        <p>CONDUCTA</p>
                    </th>
					<th>
						<p>PROMEDIO</p>
					</th>
                    </tr>
                    </thead>
					<tbody id="tableid">
				<tr>

				</tr>
			</tbody>
		</table>
        {{ Form::close() }}
    </div>
</div>

<script>
	$('#paralelo').on('change', function(){
		var curso = $( "#curso option:selected" ).text();
        var paralelo  = $( "#paralelo option:selected" ).text();


		$.get('cargar_materia/'+curso+'/'+paralelo, function(response){
            console.log(response);
			$.each(response, function(index, obj){
				$('#materia').append('<option value='+obj.id+'>'+obj.materia+'</option>');

			});
		});
    });

	$('#verNotas').on('click', function(){
        var curso = $( "#curso option:selected" ).text();
        var paralelo  = $( "#paralelo option:selected" ).text();
		var parcial = $('#parcial').val();
		var materia = $('#materia').val();
        var quimestre = $('#quimestre').val();

        console.log(curso);
        console.log(paralelo);
        console.log(parcial);
        console.log(materia);
        console.log(quimestre);


		$.get('cargar_notas/'+curso+'/'+paralelo+'/'+quimestre+'/'+parcial+'/'+materia, function(response){
			console.log(response);
			$.each(response, function(ind, opt){
				if(opt.nota_final < 7){
					$('#tableid').append('<tr><td><strong>'+opt.nombres+'</strong></td><td><strong>'+((opt.nota_ta) = (opt.nota_ta == null) ? 0 : opt.nota_ta)+'</strong></td><td><strong>'+((opt.nota_ti) = (opt.nota_ti == null) ? 0 : opt.nota_ti )+'</strong></td><td><strong>'+((opt.nota_tg) = (opt.nota_tg == null) ? 0 : opt.nota_tg)+'</strong></td><td><strong>'+((opt.nota_le) = (opt.nota_le == null) ? 0 : opt.nota_le)+'</strong></td><td><strong>'+((opt.nota_ev) = (opt.nota_ev == null) ? 0 : opt.nota_ev)+'</strong></td><td><strong>'+((opt.nota_conducta) = (opt.nota_conducta == null) ? 0 : opt.nota_conducta)+'</strong></td><td style="color:red;">'+((opt.nota_final) = (opt.nota_final == null) ? 0 : opt.nota_final)+'</td></tr>');
				}else{
				$('#tableid').append('<tr><td><strong>'+opt.nombres+'</strong></td><td><strong>'+((opt.nota_ta) = (opt.nota_ta == null) ? 0 : opt.nota_ta )+'</strong></td><td><strong>'+((opt.nota_ti) = (opt.nota_ti == null) ? 0 : opt.nota_ti)+'</strong></td><td><strong>'+((opt.nota_tg) = (opt.nota_tg == null) ? 0 : opt.nota_tg)+'</strong></td><td><strong>'+((opt.nota_le) = (opt.nota_le == null) ? 0 : opt.nota_le)+'</strong></td><td><strong>'+((opt.nota_ev) = (opt.nota_ev == null) ? 0 : opt.nota_ev)+'</strong></td><td><strong>'+((opt.nota_conducta) = (opt.nota_conducta == null) ? 0 : opt.nota_conducta)+'</strong></td><td style="color:green;">'+((opt.nota_final) = (opt.nota_final == null) ? 0 : opt.nota_final)+'</td></tr>');

					}


			});
		});
	});



</script>

@endsection
