@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			LISTA DE NOTAS ESPECIALES
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


					{!! Form::open(['route' => 'notas.cargar-notas-especiales-store']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
                                @if(Auth::user()->isRole('super-admin'))
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
                                             @elseif(Auth::user()->isRole('profesor'))
                                             <div class="form-group col-md-4">
                                                    <strong>Curso: <br></strong>
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                                    {{ Form::select('curso',[], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Seleccione el curso...']) }}
                                                    </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <strong>Paralelo: <br></strong>
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                                    {{ Form::select('paralelo',[], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Seleccione el paralelo...']) }}
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

   									{!! Form::button('<i class="fas fa-clipboard"></i> VER NOTAS', ['class' => 'btn btn-primary', 'type' => 'submit','id' => 'verNotas']) !!}
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
                            @if(isset($notas))
                            @foreach($notas as $nota)
                        <tr>
                            <td><strong>{{$nota->apellidos}} {{$nota->nombres}}</strong></td>
                            @if($nota->notas_ta->count() != 0)
                            @foreach($nota->notas_ta as $notas_ta)
                            <td>{{$notas_ta->nota_final_ta = ($notas_ta->nota_final_ta >= 9 && $notas_ta->nota_final_ta <= 10 ? 'A' : ($notas_ta->nota_final_ta >= 7 && $notas_ta->nota_final_ta <= 8.99 ? 'B' : ($notas_ta->nota_final_ta >= 4.01 && $notas_ta->nota_final_ta <= 6.99 ? 'C' : ($notas_ta->nota_final_ta <= 4 ? 'D' : 'Seleccione nota valida'))))}}</td>
                            @endforeach
                            @else
                            <td>0</td>
                            @endif
                            @if($nota->notas_ti->count() != 0)
                            @foreach($nota->notas_ti as $notas_ti)
                            <td>{{$notas_ti->nota_final_ti = ($notas_ti->nota_final_ti >= 9 && $notas_ti->nota_final_ti <= 10 ? 'A' : ($notas_ti->nota_final_ti >= 7 && $notas_ti->nota_final_ti <= 8.99 ? 'B' : ($notas_ti->nota_final_ti >= 4.01 && $notas_ti->nota_final_ti <= 6.99 ? 'C' : ($notas_ti->nota_final_ti <= 4 ? 'D' : 'Seleccione nota valida'))))}}</td>
                            @endforeach
                            @else
                            <td>0</td>
                            @endif
                            @if($nota->notas_tg->count() != 0)
                            @foreach($nota->notas_tg as $notas_tg)
                            <td>{{$notas_tg->nota_final_tg = ($notas_tg->nota_final_tg >= 9 && $notas_tg->nota_final_tg <= 10 ? 'A' : ($notas_tg->nota_final_tg >= 7 && $notas_tg->nota_final_tg <= 8.99 ? 'B' : ($notas_tg->nota_final_tg >= 4.01 && $notas_tg->nota_final_tg <= 6.99 ? 'C' : ($notas_tg->nota_final_tg <= 4 ? 'D' : 'Seleccione nota valida'))))}}</td>
                            @endforeach
                            @else
                            <td>0</td>
                            @endif
                            @if($nota->notas_le->count() != 0)
                            @foreach($nota->notas_le as $notas_le)
                            <td>{{$notas_le->nota_final_le = ($notas_le->nota_final_le >= 9 && $notas_le->nota_final_le <= 10 ? 'A' : ($notas_le->nota_final_le >= 7 && $notas_le->nota_final_le <= 8.99 ? 'B' : ($notas_le->nota_final_le >= 4.01 && $notas_le->nota_final_le <= 6.99 ? 'C' : ($notas_le->nota_final_le <= 4 ? 'D' : 'Seleccione nota valida'))))}}</td>
                            @endforeach
                            @else
                            <td>0</td>
                            @endif
                            @if($nota->notas_ev->count() != 0)
                            @foreach($nota->notas_ev as $notas_ev)
                            <td>{{$notas_ev->nota_final_ev = ($notas_ev->nota_final_ev >= 9 && $notas_ev->nota_final_ev <= 10 ? 'A' : ($notas_ev->nota_final_ev >= 7 && $notas_ev->nota_final_ev <= 8.99 ? 'B' : ($notas_ev->nota_final_ev >= 4.01 && $notas_ev->nota_final_ev <= 6.99 ? 'C' : ($notas_ev->nota_final_ev <= 4 ? 'D' : 'Seleccione nota valida'))))}}</td>
                            @endforeach
                            @else
                            <td>0</td>
                            @endif
                            @if($nota->notas_conducta->count() != 0)
                            @foreach($nota->notas_conducta as $notas_conducta)
                            <td>{{$notas_conducta->nota_final_conducta = ($notas_conducta->nota_final_conducta >= 9 && $notas_conducta->nota_final_conducta <= 10 ? 'A' : ($notas_conducta->nota_final_conducta >= 7 && $notas_conducta->nota_final_conducta <= 8.99 ? 'B' : ($notas_conducta->nota_final_conducta >= 4.01 && $notas_conducta->nota_final_conducta <= 6.99 ? 'C' : ($notas_conducta->nota_final_conducta <= 4 ? 'D' : 'Seleccione nota valida'))))}}</td>
                            @endforeach
                            @else
                            <td>0</td>
                            @endif
                            @if($nota->notas_examen->count() != 0)
                            @foreach($nota->notas_examen as $notas_examen)
                            <td>{{$notas_examen->nota_final_examen = ($notas_examen->nota_final_examen >= 9 && $notas_examen->nota_final_examen <= 10 ? 'A' : ($notas_examen->nota_final_examen >= 7 && $notas_examen->nota_final_examen <= 8.99 ? 'B' : ($notas_examen->nota_final_examen >= 4.01 && $notas_examen->nota_final_examen <= 6.99 ? 'C' : ($notas_examen->nota_final_examen <= 4 ? 'D' : 'Seleccione nota valida'))))}}</td>
                            @endforeach
                            @else
                            <td>0</td>
                            @endif
                            @if($nota->notas_ta->count() != 0 && $nota->notas_ti->count() != 0 && $nota->notas_tg->count() != 0 && $nota->notas_le->count() != 0 && $nota->notas_ev->count() != 0)
                             <td>{{round(((($nota->notas_ta->first()->nota_final_ta)  +  ($nota->notas_ti->first()->nota_final_ti)  +  ($nota->notas_tg->first()->nota_final_tg)  +  ($nota->notas_le->first()->nota_final_le)  +  ($nota->notas_ev->first()->nota_final_ev)) / 5),3)}}</td>
                            @else
                            <td>0</td>
                            @endif
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
    @if(Auth::user()->isRole('profesor'))
    <script>
    $(document).ready(function(){
    $.get('notas/cargar-notas-profesor', function(response){
        $.each(response, function(index, obj){
            $('#curso').append('<option value="'+obj.curso+'">'+obj.curso+'</option>');
        });
    });
    $.get('notas/cargar-notas-profesor-paralelo', function(response){
        $.each(response, function(index, obj){
            $('#paralelo').append('<option value="'+obj.paralelo+'">'+obj.paralelo+'</option>');
        });
    });
});
</script>
@endif
<script>
$('#paralelo').on('change', function(){
var curso = $( "#curso option:selected" ).text();
var paralelo  = $( "#paralelo option:selected" ).text();
var parcial = $('#parcial').val();

$.get('cargar_materia/especial/'+curso+'/'+paralelo, function(response){
    console.log(response);
$.each(response, function(index, obj){
    $('#materia').append('<option value='+obj.id+'>'+obj.materia+'</option>');

});
});
});
</script>

@endsection
