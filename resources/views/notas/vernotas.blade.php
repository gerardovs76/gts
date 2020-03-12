@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-12 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			LISTA DE NOTAS
		</h2>
		</div>

        <hr>
        @include('notas.partials.error')
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
                                        @if(isset($curso) && isset($paralelo))
                                       <p class="pull-right" style="font-size: 20px;"><strong><em>Curso: {{$curso}} - Paralelo: {{$paralelo}} - Parcial: {{$parcial}} - Quimestre: {{$quimestre}}</em></strong></p>
                                       @else
                                       <p class="pull-right"><em>Curso: - Paralelo: - Parcial: - Quimestre:  </em></p>
                                       @endif
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
                    @if($nota_promedio_ta >= 7)
                    <td style="color: green;">{{$nota_promedio_ta}}</td>
                    @else
                <td style="color: red;">{{$nota_promedio_ta}}</td>
                    @endif
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
                   @if($nota_promedio_ti >= 7)
                   <td style="color: green;">{{$nota_promedio_ti}}</td>
                   @else
               <td style="color: red;">{{$nota_promedio_ti}}</td>
                   @endif
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
                   @if($nota_promedio_tg >= 7)
                   <td style="color: green;">{{$nota_promedio_tg}}</td>
                   @else
               <td style="color: red;">{{$nota_promedio_tg}}</td>
                   @endif
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
                    @if($nota_promedio_le >= 7)
                    <td style="color: green;">{{$nota_promedio_le}}</td>
                    @else
                <td style="color: red;">{{$nota_promedio_le}}</td>
                    @endif
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
                    @if($nota_promedio_ev >= 7)
                    <td style="color: green;">{{$nota_promedio_ev}}</td>
                    @else
                <td style="color: red;">{{$nota_promedio_ev}}</td>
                    @endif
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
                    @if($notas_examen->nota_final_examen >= 7)
                    <td style="color: green;">{{$notas_examen->nota_final_examen}}</td>
                    @else
                <td style="color: red;">{{$notas_examen->nota_final_examen}}</td>
                    @endif
                    @endforeach
                    @else
                    <td>0</td>
                    @endif
                    @php
                    $nota_promedio_final = ((!isset($nota_promedio_ta) ? 0 : $nota_promedio_ta) + (!isset($nota_promedio_ti) ? 0 : $nota_promedio_ti) + (!isset($nota_promedio_tg) ? 0 : $nota_promedio_tg) + (!isset($nota_promedio_le) ? 0 : $nota_promedio_le) + (!isset($nota_promedio_ev) ? 0 : $nota_promedio_ev));
				$numero_promedio_final = ((!isset($nota_promedio_ta) ? 0 : 1) + (!isset($nota_promedio_ti) ? 0 : 1) + (!isset($nota_promedio_tg) ? 0 : 1) + (!isset($nota_promedio_le) ? 0 : 1) + (!isset($nota_promedio_ev) ? 0 : 1));
				if($nota_promedio_final == 0 && $numero_promedio_final == 0)
                    {
                        $promedio_final = 0;
                    }
                    else{
                        $promedio_final = round(($nota_promedio_final) / ($numero_promedio_final), 2);
                    }
                    @endphp
                    @if($promedio_final >= 7)
                    <td style="color: green;">{{$promedio_final}}</td>
                    @else
                <td style="color: red;">{{$promedio_final}}</td>
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
{{-- <script>
    setInterval(() => {
        function bloquearTodo()
    {
        var curso = $('#curso option:selected').text();
        var paralelo = $('#paralelo option:selected').text();
        var parcial = $('#parcial').val();
        var quimestre = $('#quimestre').val();
        var materia = $('#materia').val();

        setInterval(() => {
            if(curso == '' || paralelo == '' || parcial == '' || quimestre == '' || materia == '')
            {
                console.log(curso);
                console.log(paralelo);
                console.log(parcial);
                console.log(materia);
                console.log(quimestre);
                $('#verNotas').attr("disabled", true);
            }
            else {
                console.log(curso);
                console.log(paralelo);
                console.log(parcial);
                console.log(materia);
                console.log(quimestre);
                $('#verNotas').attr("disabled", false);
            }
        }, 5);
    }
    bloquearTodo();
    }, 500);




</script> --}}
<script>
$('#paralelo').on('change', function(){
    var curso = $( "#curso option:selected" ).text();
    var paralelo  = $( "#paralelo option:selected" ).text();
    var url3 = 'notas/cargar-materias/'+curso+'/'+paralelo;
    $.ajax({
        url: url3,
        success: function(response)
        {
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
