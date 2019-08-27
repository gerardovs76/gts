@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			LISTA DE NOTAS ALUMNOS
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


					{!! Form::open(['route' => 'notas.store']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
							<div class="form-group col-md-4">
                                             <strong>Cedula: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                             @foreach($matriculados as $matriculado)
                                             {{ Form::text('cedula', $matriculado->cedula, ['class' => 'form-control col-md-6' , 'id' => 'cedula', 'readonly']) }}
                                             </div>
                                             </div>
                                             <div class="form-group col-md-4">
                                             <strong>Nombres: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                             {{ Form::text('nombres',$matriculado->nombres, ['class' => 'form-control col-md-6' , 'id' => 'nombres','readonly']) }}
                                             </div>
                                             </div>
                                             @endforeach
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
                                             {{ Form::select('materia',$materias, null, ['class' => 'form-control col-md-6' , 'id' => 'materia', 'placeholder' => 'Seleccione la materia...']) }}
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
						<p>PROMEDIO</p>
					</th>
                    </tr>
                    </thead>
					<tbody id="tableid">
				<tr>

				</tr>
			</tbody>
		</table>
    </div>
    <script>
            $('#verNotas').on('click', function(){
                var cedula = $('#cedula').val();
                var quimestre = $('#quimestre').val();
                var parcial = $('#parcial').val();
                var materia = $('#materia').val();

                $.get('cargar-notas-alumnos/'+cedula+'/'+quimestre+'/'+parcial+'/'+materia, function(response){
                    console.log(response);
                    $.each(response, function(ind, opt){
                        if(opt.nota_final < 7){
                            $('#tableid').append('<tr><td><strong>'+opt.nombres+'</strong></td><td><strong>'+((opt.nota_ta) = (opt.nota_ta == null) ? 0 : opt.nota_ta)+'</strong></td><td><strong>'+((opt.nota_ti) = (opt.nota_ti == null) ? 0 : opt.nota_ti )+'</strong></td><td><strong>'+((opt.nota_tg) = (opt.nota_tg == null) ? 0 : opt.nota_tg)+'</strong></td><td><strong>'+((opt.nota_le) = (opt.nota_le == null) ? 0 : opt.nota_le)+'</strong></td><td><strong>'+((opt.nota_ev) = (opt.nota_ev == null) ? 0 : opt.nota_ev)+'</strong></td><td style="color:red;">'+((opt.nota_final) = (opt.nota_final == null) ? 0 : opt.nota_final)+'</td></tr>');
                        }else{
                        $('#tableid').append('<tr><td><strong>'+opt.nombres+'</strong></td><td><strong>'+((opt.nota_ta) = (opt.nota_ta == null) ? 0 : opt.nota_ta )+'</strong></td><td><strong>'+((opt.nota_ti) = (opt.nota_ti == null) ? 0 : opt.nota_ti)+'</strong></td><td><strong>'+((opt.nota_tg) = (opt.nota_tg == null) ? 0 : opt.nota_tg)+'</strong></td><td><strong>'+((opt.nota_le) = (opt.nota_le == null) ? 0 : opt.nota_le)+'</strong></td><td><strong>'+((opt.nota_ev) = (opt.nota_ev == null) ? 0 : opt.nota_ev)+'</strong></td><td style="color:green;">'+((opt.nota_final) = (opt.nota_final == null) ? 0 : opt.nota_final)+'</td></tr>');

                            }


                    });
                });
            });
    </script>
    @endsection

