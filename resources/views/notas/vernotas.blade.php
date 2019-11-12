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


					{!! Form::open(['route' => 'notas.cargar-notas-store']) !!}
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
                                                    {{ Form::select('curso',[], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                                    </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <strong>Paralelo: <br></strong>
                                                    <div class="input-group-prepend">
                                                         <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                    {{ Form::select('paralelo',[], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
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

   									{!! Form::button('<i class="fas fa-clipboard"></i> VER NOTAS', ['class' => 'btn btn-primary','type' => 'submit', 'id' => 'verNotas']) !!}
								</div>

							</div>

						</div>
					</div>


                    <table class="table table-bordered table-hover" id="tableid">
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
                        @if(isset($quimestre))
                        @if($quimestre == '1')
                        <p>EXAMEN 1ER QUIM.</p>
                        @elseif($quimestre == '2')
                        <p>EXAMEN 2DO QUIM.</p>
                        @else
                        <p>EXAMEN</p>
                        @endif
                        @else
                        <p>EXAMEN</p>
                        @endif
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
        {{ Form::close() }}
    </div>
</div>
@if(Auth::user()->isRole('profesor'))
<script>
$(document).ready(function(){
    var url1 = 'notas/cargar-notas-profesor';
    $.ajax({
        url: url1,
        success: function(response)
        {
            $.each(response, function(index, obj){
            $('#curso').append('<option value="'+obj.curso+'">'+obj.curso+'</option>');
        });
        },
        error: function(error)
        {

        }
        });
    });
</script>
<script>
    $(document).ready(() => {
        var url2 = 'notas/cargar-notas-profesor-paralelo';
        $.ajax({
            url: url2, 
            success: function(response)
            {
                $.each(response, function(index, obj){
                $('#paralelo').append('<option value="'+obj.paralelo+'">'+obj.paralelo+'</option>');
                });
            },
            error: function(error)
            {

            }
        });
    });
</script>
@endif
<script>
$('#paralelo').on('change', function(){
    var curso = $( "#curso option:selected" ).text();
    var paralelo  = $( "#paralelo option:selected" ).text();
    var url3 = 'notas/cargar-materias/'+curso+'/'+paralelo;
    $.ajax({
        url: url3,
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
