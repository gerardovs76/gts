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
                        @if($nota->notas_ta->count() != 0)
                        @foreach($nota->notas_ta as $notas_ta)
                        @php 
                        $nota_final_ta = ($notas_ta->nota_ta1 + $notas_ta->nota_ta2 + $notas_ta->nota_ta3 + $notas_ta->nota_ta4 + $notas_ta->nota_ta5);
                        $numero_nota_final_ta = (($notas_ta->nota_ta1 == 0 ? 0 : 1) + ($notas_ta->nota_ta2 == 0 ? 0 : 1) + ($notas_ta->nota_ta3 == 0 ? 0 : 1) + ($notas_ta->nota_ta4 == 0 ? 0 : 1) + ($notas_ta->nota_ta5 == 0 ? 0 : 1));
                        if($nota_final_ta == 0 && $numero_nota_final_ta == 0){
                           $nota_promedio_ta = 0;
                        }
                        else{
                            $nota_promedio_ta = round(($nota_final_ta) / ($numero_nota_final_ta), 2);
                        }
                        @endphp
                        <td>{{$nota_promedio_ta}}</td>
                        @endforeach
                        @else
                        <td>0</td>
                        @endif
                        @if($nota->notas_ti->count() != 0)
                        @foreach($nota->notas_ti as $notas_ti)
                        @php 
                        $nota_final_ti = ($notas_ti->nota_ti1 + $notas_ti->nota_ti2 + $notas_ti->nota_ti3 + $notas_ti->nota_ti4 + $notas_ti->nota_ti5);
                        $numero_nota_final_ti = (($notas_ti->nota_ti1 == 0 ? 0 : 1) + ($notas_ti->nota_ti2 == 0 ? 0 : 1) + ($notas_ti->nota_ti3 == 0 ? 0 : 1) + ($notas_ti->nota_ti4 == 0 ? 0 : 1) + ($notas_ti->nota_ti5 == 0 ? 0 : 1));
                        if($nota_final_ti == 0 && $numero_nota_final_ti == 0){
                           $nota_promedio_ti = 0;
                        }
                        else{
                            $nota_promedio_ti = round(($nota_final_ti) / ($numero_nota_final_ti), 2);
                        }
                        @endphp
                        <td>{{$nota_promedio_ti}}</td>
                         @endforeach
                        @else
                        <td>0</td>
                        @endif
                        @if($nota->notas_tg->count() != 0)
                        @foreach($nota->notas_tg as $notas_tg)
                        @php 
                        $nota_final_tg = ($notas_tg->nota_tg1 + $notas_tg->nota_tg2 + $notas_tg->nota_tg3 + $notas_tg->nota_tg4 + $notas_tg->nota_tg5);
                        $numero_nota_final_tg = (($notas_tg->nota_tg1 == 0 ? 0 : 1) + ($notas_tg->nota_tg2 == 0 ? 0 : 1) + ($notas_tg->nota_tg3 == 0 ? 0 : 1) + ($notas_tg->nota_tg4 == 0 ? 0 : 1) + ($notas_tg->nota_tg5 == 0 ? 0 : 1));
                        if($nota_final_tg == 0 && $numero_nota_final_tg == 0){
                           $nota_promedio_tg = 0;
                        }
                        else{
                            $nota_promedio_tg = round(($nota_final_tg) / ($numero_nota_final_tg), 2);
                        }
                        @endphp
                        <td>{{$nota_promedio_tg}}</td>
                        @endforeach
                        @else
                        <td>0</td>
                        @endif
                        @if($nota->notas_le->count() != 0)
                        @foreach($nota->notas_le as $notas_le)
                        @php 
                        $nota_final_le = ($notas_le->nota_le1 + $notas_le->nota_le2 + $notas_le->nota_le3 + $notas_le->nota_le4 + $notas_le->nota_le5);
                        $numero_nota_final_le = (($notas_le->nota_le1 == 0 ? 0 : 1) + ($notas_le->nota_le2 == 0 ? 0 : 1) + ($notas_le->nota_le3 == 0 ? 0 : 1) + ($notas_le->nota_le4 == 0 ? 0 : 1) + ($notas_le->nota_le5 == 0 ? 0 : 1));
                        if($nota_final_le == 0 && $numero_nota_final_le == 0){
                           $nota_promedio_le = 0;
                        }
                        else{
                            $nota_promedio_le = round(($nota_final_le) / ($numero_nota_final_le), 2);
                        }
                        @endphp
                        <td>{{$nota_promedio_le}}</td>
                        @endforeach
                        @else
                        <td>0</td>
                        @endif
                        @if($nota->notas_ev->count() != 0)
                        @foreach($nota->notas_ev as $notas_ev)
                        @php 
                        $nota_final_ev = ($notas_ev->nota_ev1 + $notas_ev->nota_ev2 + $notas_ev->nota_ev3 + $notas_ev->nota_ev4 + $notas_ev->nota_ev5);
                        $numero_nota_final_ev = (($notas_ev->nota_ev1 == 0 ? 0 : 1) + ($notas_ev->nota_ev2 == 0 ? 0 : 1) + ($notas_ev->nota_ev3 == 0 ? 0 : 1) + ($notas_ev->nota_ev4 == 0 ? 0 : 1) + ($notas_ev->nota_ev5 == 0 ? 0 : 1));
                        if($nota_final_ev == 0 && $numero_nota_final_ev == 0){
                           $nota_promedio_ev = 0;
                        }
                        else{
                            $nota_promedio_ev = round(($nota_final_ev) / ($numero_nota_final_ev), 2);
                        }
                        @endphp
                        <td>{{$nota_promedio_ev}}</td>
                        @endforeach
                        @else
                        <td>0</td>
                        @endif
                        @if($nota->notas_conducta->count() != 0)
                        @foreach($nota->notas_conducta as $notas_conducta)
                        <td>{{$notas_conducta->nota_final_conducta}}</td>
                        @endforeach
                        @else
                        <td>0</td>
                        @endif
                        @if($nota->notas_examen->count() != 0)
                        @foreach($nota->notas_examen as $notas_examen)
                        <td>{{$notas_examen->nota_final_examen}}</td>
                        @endforeach
                        @else
                        <td>0</td>
                        @endif
                        @php
                        $nota_promedio_final = ($nota_promedio_ta + $nota_promedio_ti + $nota_promedio_tg + $nota_promedio_le + $nota_promedio_ev);
                        $numero_promedio_final = ($nota_promedio_ta == 0 ? 0 : 1) + ($nota_promedio_ti == 0 ? 0 : 1) + ($nota_promedio_tg == 0 ? 0 : 1) + ($nota_promedio_le == 0 ? 0 : 1) + ($nota_promedio_ev == 0 ? 0 : 1);
                        if($nota_promedio_final == 0 && $numero_promedio_final == 0)
                        {
                            $promedio_final = 0;
                        }
                        else{
                            $promedio_final = round(($nota_promedio_final) / ($numero_promedio_final), 2);
                        }
                        @endphp
                        <td>{{$promedio_final}}</td>
                        
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

