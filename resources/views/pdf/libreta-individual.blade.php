<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>PDF</title>
	<style>
        .page-breaj{
                page-break-after: always;
        }
		table#mitabla {
    border-collapse: collapse;
    border: 1px solid #212121;
    margin: 0 auto;
    font-size: 10px;

}

table#mitabla th {
   font-weight: bold;
    background-color: #FFFFFF;
     border-collapse: collapse;
    padding:1px;
    padding-right: 20px;
    padding-left: 20px;


}

table#mitabla tbody tr:hover td {
    background-color: #F3F3F3;
}

table#mitabla td {
	 background-color: #F3F3F3;
     border-collapse: collapse;


}
	</style>
	<style>
		table#mitabla2 {
    border-collapse: separate;
    border: 1px solid #212121;
    margin: 0 auto;
    font-size: 10px;
}

table#mitabla2 th {
    font-weight: bold;
    background-color: #FFFFFF;
     border-collapse: separate;
    padding:0px;
    padding-right: 40px;
    border: 1px solid black;

}

table#mitabla2 tbody tr:hover td {
    background-color: #F3F3F3;
     border-collapse: separate;
	 page-break-inside: avoid;
}

table#mitabla2 td {

     border-collapse: separate;
     border: 1px solid black;
}
	</style>
	<style>
		table#mitabla3 {
    border-collapse: separate;
    border: 1px solid #212121;
   margin-right: 50%;
    font-size: 10px;
}

table#mitabla3 th {
    font-weight: bold;
    background-color: #FFFFFF;
     border-collapse: separate;
    padding:0px;
    padding-right: 37px;
    border: 1px solid black;

}

table#mitabla3 tbody tr:hover td {
    background-color: #F3F3F3;
     border-collapse: separate;
}

table#mitabla3 td {

     border-collapse: separate;
     border: 1px solid black;
}
	</style>
	<style>
		#mitabla4 {
		float: left;
		border-collapse: separate;
	    border: 1px solid #212121;
	    font-size: 10px;
		}

		#mitabla4 table {
		text-align: center;
		}

		#mitabla4 table tr td {

		 background-color: #F3F3F3;
    	 border-collapse: separate;
		}
		table#mitabla4 td{
			border-collapse: separate;
			border: 1px solid black;
		}
		table#mitabla4 tbody tr:hover td {
	   	 background-color: #F3F3F3;
	     border-collapse: separate;
		}
		table#mitabla4 th{
			font-weight: bold;
			background-color:
			font-weight: bold;
		    background-color: #FFFFFF;
		    border-collapse: separate;
			border: 1px solid black;
			padding:0px;
		}
			</style>
			<style>
					table#mitabla5 {

		    border-collapse: separate;
		    border: 1px solid #212121;
		   margin-right: 43%;
		    font-size: 10px;
		    float: left;
		}

		table#mitabla5 th {
		    font-weight: bold;
		    background-color: #FFFFFF;
		     border-collapse: separate;
		    border: 1px solid black;
		     padding: 0px;

		}
		table#mitable5 tbody tr th td{
			padding: 0px;
		}


		table#mitabla5 tbody tr:hover td {
		    background-color: #F3F3F3;
		     border-collapse: separate;
		}

				#mitabla5 table tr td {

				 background-color: #F3F3F3;
		     border-collapse: separate;
				}

		table#mitabla5 td {

	     border-collapse: separate;
	     border: 1px solid black;
	}
		</style>
		<style>
					 footer #div1{
		margin-right: 43%;
		font-size: 10px;
		float: left;
		font-weight: bold;
	}
		</style>
		<style>
			.linea {
  margin:0px 20px;
  width:90px;
  border-top:1px solid #999;
  position: relative;
  top:10px;
  float:left;
  }

		</style>


</head>
@foreach($notas as $nota)
<body>
        <div class="page-break">

            <img src="images/logo-institucion.png" alt="" height="80" width="80" style="float: left;">

           	<br>
		<table class="table" id="mitabla">
				<tbody>
			<tr>
				<th>Apellidos: {{ $nota->apellidos }}</th>
				<th>Nombres: {{ $nota->nombres }}</th>

			</tr>
			<tr>
                <th>Curso: {{ $nota->curso }}</th>
                <th>Quimestre: {{ $quimestre }}</th>
			</tr>
			<tr>
				<th>Codigo: {{$nota->codigo}}</th>
				<th>Año lectivo: 2019-2020</th>
			</tr>
			<tr>
                <th>Paralelo: {{ $nota->paralelo }}</th>
                <th>Parcial: {{ $parcial }}</th>
			</tr>
        </tbody>
        </table>
        <br>
		<table id="mitabla2">
		<thead>
			<tr>
				<th>Asingatura</th>
				<th>T.Academico</th>
				<th>Act. Individual</th>
				<th>Act. Grupal</th>
				<th>Lección</th>
				<th>Evaluación</th>
				<th>Promedio</th>
			</tr>
		</thead>
		<tbody>
			<tr>
                <th><strong>AREAS INSTITUCIONALES</strong></th>
			</tr>
			@foreach($materias as $materia)
			@if($materia->tipo_materia == 'NO')
			<tr>
			<td><strong>{{$materia->materia}}</strong></td>
				@if($nota->notas_ta != [])
				@foreach($nota->notas_ta as $notas_ta)
				@if($notas_ta->materias_id == $materia->id)
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
			<td style="color: red">{{$nota_promedio_ta}}</td>
			@endif
				@endif
				@endforeach
				@else
				<td>0</td>
				@endif
				@if($nota->notas_ti->count() != 0)
				@foreach($nota->notas_ti as $notas_ti)
				@if($notas_ti->materias_id == $materia->id)
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
			<td style="color: red">{{$nota_promedio_ti}}</td>
			@endif
				@endif
				@endforeach
				@else
				<td>0</td>
				@endif
				@if($nota->notas_tg->count() != 0)
				@foreach($nota->notas_tg as $notas_tg)
				@if($notas_tg->materias_id == $materia->id)
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
			<td style="color: red">{{$nota_promedio_tg}}</td>
			@endif
				@endif
				@endforeach
				@else
				<td>0</td>
				@endif
				@if($nota->notas_le->count() != 0)
				@foreach($nota->notas_le as $notas_le)
				@if($notas_le->materias_id == $materia->id)
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
			<td style="color: red">{{$nota_promedio_le}}</td>
			@endif
				@endif
				@endforeach
				@else
				<td>0</td>
				@endif
				@if($nota->notas_ev->count() != 0)
				@foreach($nota->notas_ev as $notas_ev)
				@if($notas_ev->materias_id == $materia->id)
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
			<td style="color: red">{{$nota_promedio_ev}}</td>
			@endif
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
			<td style="color: red">{{$promedio_final}}</td>
			@endif
			</tr>
			@endif
			@endforeach
			<tr>
				<th>CLUBES</th>
			</tr>
			@foreach($materias as $materia)
			@if($materia->tipo_materia == 'SI')
			<tr>
			<td><strong>{{$materia->materia}}</strong></td>
				@if($nota->notas_ta->count() != 0)
				@foreach($nota->notas_ta as $notas_ta)
				@if($notas_ta->materias_id == $materia->id)
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
				@endif
				@endforeach
				@else
				<td>0</td>
				@endif
				@if($nota->notas_ti->count() != 0)
				@foreach($nota->notas_ti as $notas_ti)
				@if($notas_ti->materias_id == $materia->id)
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
				@endif
				@endforeach
				@else
				<td>0</td>
				@endif
				@if($nota->notas_tg->count() != 0)
				@foreach($nota->notas_tg as $notas_tg)
				@if($notas_tg->materias_id == $materia->id)
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
				@endif
				@endforeach
				@else
				<td>0</td>
				@endif
				@if($nota->notas_le->count() != 0)
				@foreach($nota->notas_le as $notas_le)
				@if($notas_le->materias_id == $materia->id)
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
				@endif
				@endforeach
				@else
				<td>0</td>
				@endif
				@if($nota->notas_ev->count() != 0)
				@foreach($nota->notas_ev as $notas_ev)
				@if($notas_ev->materias_id == $materia->id)
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
				$promedio_final  = ($promedio_final >= 9 && $promedio_final <= 10 ? 'A' : ($promedio_final >= 7 && $promedio_final <= 8.99 ? 'B' : ($promedio_final >= 4.01 && $promedio_final <= 6.99 ? 'C' : ($promedio_final <= 4 ? 'D' : 'Seleccione nota valida'))));
				@endphp
				@if($promedio_final == 'A' || $promedio_final == 'B')
				<td style="color: green;">{{$promedio_final}}</td>
				@else
			<td style="color: red;">{{$promedio_final}}</td>
			@endif
			</tr>
			@endif
			@endforeach

		</tbody>
	</table>
	<br>
	 <table id="mitabla3" align="left">
		<thead>
			<tr>
				<th>Comportamiento</th>
				<th>Faltas Justificadas</th>
				<th>Faltas Injustificadas</th>
				<th>Atrasos</th>
			</tr>
		</thead>
		<tbody>
			<tr>
					@if($nota->curso == 'INICIAL 1'|| $nota->curso == 'INICIAL 2' || $nota->curso == 'PRIMERO DE EGB'|| $nota->curso == 'SEGUNDO DE EGB'||$nota->curso == 'TERCERO DE EGB'||$nota->curso == 'CUARTO DE EGB'||$nota->curso == 'QUINTO DE EGB'||$nota->curso == 'SEXTO DE EGB'||$nota->curso == 'SEPTIMO DE EGB')
					@foreach($nota->notas_conducta as $conducta)
						<td>{{($conducta->conductas >= 9 && $conducta->conductas <= 10 ? 'A' : ($conducta->conductas >= 7 && $conducta->conductas <= 8.99 ? 'B' : ($conducta->conductas >= 4.01 &&  $conducta->conductas <= 6.99 ? 'C' : ($conducta->conductas <= 4  ? 'D' : 'Nota invalida'))))}}</td>
						<td>{{($conducta->faltas_j >= 9 && $conducta->faltas_j <= 10 ? 'A' : ($conducta->faltas_j >= 7 && $conducta->faltas_j <= 8.99 ? 'B' : ($conducta->faltas_j >= 4.01 &&  $conducta->faltas_j <= 6.99 ? 'C' : ($conducta->faltas_j <= 4  ? 'D' : 'Nota invalida'))))}}</td>
						<td>{{($conducta->faltas_i >= 9 && $conducta->faltas_i <= 10 ? 'A' : ($conducta->faltas_i >= 7 && $conducta->faltas_i <= 8.99 ? 'B' : ($conducta->faltas_i >= 4.01 &&  $conducta->faltas_i <= 6.99 ? 'C' : ($conducta->faltas_i <= 4  ? 'D' : 'Nota invalida'))))}}</td>
					@endforeach
                     @else
						@foreach($inspe as $in)
							@if((10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) >= 9 && (10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) <= 10 )
								<td>A</td>
								@break
							@elseif((10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) >= 7 && (10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) <= 8.99)
								<td>B</td>
								@break
							@elseif((10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) >= 4.01 && (10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) <= 6.99)
								<td>C</td>
								@break
							@elseif((10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) <= 4)
								<td>D</td>
								@break
							@endif
						@endforeach
                    @endif
                    <td></td>
			</tr>
		</tbody>
	</table>
	<br>
	<table id="mitabla4">
		<thead>
			<tr>
				<th>Escala Cuantitativa: </th>
				<th>Descripción</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>9-10</th>
				<td>Domina los aprendizajes requeridos</td>
			</tr>
			<tr>
				<th>7 - 8.99</th>
				<td>Alcanza los aprendizajes requeridos</td>
			</tr>
			<tr>
				<th>4.01 - 6.99</th>
				<td>Esta próximo a alcanzar los aprendizajes</td>
			</tr>
			<tr>
				<th> - 4</th>
				<td>No alcanza los aprendizajes requeridos</td>
			</tr>
		</tbody>
	</table>
	<table id="mitabla5">
		<thead>
			<tr>
				<th>NOMECLATURA</th>
				<th>Descripción</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>A = Muy Satisfactorio</th>
				<td>Lidera el cumplimiento de los compromisos establecidos para la sana convivencia social.</td>
			</tr>
			<tr>
				<th>B = Satisfactorio</th>
				<td>Cumple con los compromisos establecidos para la sana convivencia social.</td>
			</tr>
			<tr>
				<th>C = Poco Satisfactorio</th>
				<td>Falla ocasionalmente en el cumplimiento de los compromisos establecidos para la sana convivencia social.</td>
			</tr>
			<tr>
				<th>D = Mejorable</th>
				<td>Falla reiteradamente en el cumplimiento de los compromisos establecidos para la sana convivencia social.</td>
			</tr>
			<tr>
				<th>E = Insatisfactorio</th>
				<td>No cumple con los  compromisos establecidos para la sana convivencia social.</td><br>
			</tr>
		</tbody>
	</table>
	<br><br><br><br><br><br><br><br><br><br>
<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
	<div align="center">_______________________________</div>
	<p style="text-align: center;">Sra. Moserrate Ramírez</p>
	<p style="text-align: center;">SECRETARIA</p>
	</div>
	<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
	<div align="center">_______________________________</div>
	<p style="text-align: center;">Lic. Carmen Ramírez</p>
	<p style="text-align: center;">RECTORA</p>
	</div><br><br><br>
	<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
	<div align="center">_______________________________</div>
	<p style="text-align: center;">Sra. Moserrate Ramírez</p>
	<p style="text-align: center;">SECRETARIA</p>
	</div>
	<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
	<div align="center">_______________________________</div>
	<p style="text-align: center;">Lic. Carmen Ramírez</p>
	<p style="text-align: center;">RECTORA</p>
	</div><br><br><br><br><br>
	<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
	<div align="center">_______________________________</div>
	<p style="text-align: center;"></p>
	<p style="text-align: center;">TUTOR</p>
	</div>
<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
<div align="center">_______________________________</div>

@if(!isset($nota->inscripcion->nombres_representante))
<p style="text-align: center;"></p>
@else
<p style="text-align: center;">{{$nota->inscripcion->nombres_representante}}</p>
@endif

<p style="text-align: center;">REPRESENTANTE</p>

</div>
</div>
</body>
@endforeach
</html>
