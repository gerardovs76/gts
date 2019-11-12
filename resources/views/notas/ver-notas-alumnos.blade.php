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


					{!! Form::open(['route' => 'notas.cargar-notas-alumnos']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">

							<div class="form-group col-md-4">
                                             <strong>Cedula: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                             {{ Form::text('cedula', Auth::user()->cedula, ['class' => 'form-control col-md-6' , 'id' => 'cedula', 'readonly']) }}
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

   									{!! Form::button('<i class="fas fa-clipboard"></i> VER NOTAS', ['class' => 'btn btn-primary', 'type' => 'submit','id' => 'verNotas']) !!}
								</div>

							</div>

						</div>
					</div>


                    <table class="table table-striped table-bordered" id="tableid">
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
                        <p>EXAMEN</p>
                    </th>
					<th>
						<p>PROMEDIO</p>
					</th>
                    </tr>
                    </thead>
					<tbody id="tableid">
                        @if(isset($notas))
                        @foreach($notas as $nota)
                    <tr>
                        <td><strong>{{$nota->apellidos}} {{$nota->nombres}}</strong></td>
                        @foreach($nota->notas_ta as $notas_ta)
                        @if($notas_ta->nota_final_ta != null)
                        <td>{{$notas_ta->nota_final_ta}}</td>
                        @else
                        <td>0</td>
                        @endif
                        @endforeach
                        @foreach($nota->notas_ti as $notas_ti)
                        @if($notas_ti->nota_final_ti != null)
                        <td>{{$notas_ti->nota_final_ti}}</td>
                        @else 
                        <td>0</td>
                        @endif
                        @endforeach
                        @foreach($nota->notas_tg as $notas_tg)
                        @if($notas_tg->nota_final_tg != null)
                        <td>{{$notas_tg->nota_final_tg}}</td>
                        @else 
                        <td>0</td>
                        @endif
                        @endforeach
                        @foreach($nota->notas_le as $notas_le)
                        @if($notas_le->nota_final_le != null)
                        <td>{{$notas_le->nota_final_le}}</td>
                        @else
                        <td>0</td>
                        @endif
                        @endforeach
                        @foreach($nota->notas_ev as $notas_ev)
                        @if($notas_ev->nota_final_ev != null)
                        <td>{{$notas_ev->nota_final_ev}}</td>
                        @else 
                        <td>0</td>
                        @endif
                        @endforeach
                        @foreach($nota->notas_conducta as $notas_conducta)
                        @if($notas_conducta->nota_final_conducta != null)
                        <td>{{$notas_conducta->nota_final_conducta}}</td>
                        @else
                        <td>0</td>
                        @endif
                        @endforeach
                        @foreach($nota->notas_examen as $notas_examen)
                        @if($notas_examen->nota_final_examen != null)
                        <td>{{$notas_examen->nota_final_examen}}</td>
                        @else
                        <td>0</td>
                        @endif
                        @if(isset($nota->notas_ta->first()->nota_final_ta) && isset($nota->notas_ti->first()->nota_final_ti) && isset($nota->notas_tg->first()->nota_final_tg) && isset($nota->notas_le->first()->nota_final_le) && isset($nota->notas_ev->first()->nota_final_ev) && isset($nota->notas_conducta->first()->nota_final_conducta))
                        <td>{{round(((($nota->notas_ta->first()->nota_final_ta)  +  ($nota->notas_ti->first()->nota_final_ti)  +  ($nota->notas_tg->first()->nota_final_tg)  +  ($nota->notas_le->first()->nota_final_le)  +  ($nota->notas_ev->first()->nota_final_ev)  +  ($nota->notas_conducta->first()->nota_final_conducta)) / 6),3)}}</td>
                        @else
                        <td>0</td>
                        @endif
                        @endforeach
                    </tr>
                    @endforeach
                    @else
                    <tr>
    
                    </tr>
                    @endif
                </tbody>
        </table>
        {!!Form::close()!!}
    </div>
    <script>
      $('#parcial').on('change', function(){
                var cedula = $('#cedula').val();
                var url = 'cargar-materias-alumnos/'+cedula;
                $.ajax({
                    url: url,
                    success: function(response)
                    {
                        console.log(response);
                    $.each(response, function(index, obj){
                    $('#materia').append('<option value='+obj.id+'>'+obj.materia+'</option>');
                   });
                    },
                    error: function(error)
                    {

                    }
                });
            });
    </script>
    @endsection

