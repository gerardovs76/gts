<!DOCTYPE html>
<html>
<head>
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
            <img src="images/ib.PNG" alt="" height="80" width="80" style="float: right;"><br>
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
			@foreach($nota->notas_ta as $notas_ta)
			@if($notas_ta->materias_id == $materia->id)
			<td>{{$notas_ta->nota_final_ta}}</td>
			@endif
			@endforeach
			@foreach($nota->notas_ti as $notas_ti)
			@if($notas_ti->materias_id == $materia->id)
			<td>{{$notas_ti->nota_final_ti}}</td>
			@endif
			@endforeach
			@foreach($nota->notas_tg as $notas_tg)
			@if($notas_tg->materias_id == $materia->id)
			<td>{{$notas_tg->nota_final_tg}}</td>
			@endif
			@endforeach
			@foreach($nota->notas_le as $notas_le)
			@if($notas_le->materias_id == $materia->id)
			<td>{{$notas_le->nota_final_le}}</td>
			@endif
			@endforeach
			@foreach($nota->notas_ev as $notas_ev)
			@if($notas_ev->materias_id == $materia->id)
			<td>{{$notas_ev->nota_final_ev}}</td>
			@endif
			@endforeach
			@foreach($nota->notas_ta as $notas_ta)
			@foreach($nota->notas_ti as $notas_ti)
			@foreach($nota->notas_tg as $notas_tg)
			@foreach($nota->notas_le as $notas_le)
			@foreach($nota->notas_ev as $notas_ev)
			@if($materia->id == $notas_ta->materias_id && $materia->id == $notas_ti->materias_id && $materia->id == $notas_tg->materias_id && $materia->id == $notas_le->materias_id && $materia->id == $notas_ev->materias_id)
			<td>{{round(((($notas_ta->nota_final_ta)  +  ($notas_ti->nota_final_ti)  +  ($notas_tg->nota_final_tg)  +  ($notas_le->nota_final_le)  +  ($notas_ev->nota_final_ev)) / 5),3)}}</td>
			@endif
			@endforeach
			@endforeach
			@endforeach
			@endforeach
			@endforeach 
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
			@foreach($nota->notas_ta as $notas_ta)
			@if($notas_ta->materias_id == $materia->id)
			<td>{{$notas_ta->nota_final_ta = ($notas_ta->nota_final_ta >= 9 && $notas_ta->nota_final_ta <= 10 ? 'A' : ($notas_ta->nota_final_ta >= 7 && $notas_ta->nota_final_ta <= 8.99 ? 'B' : ($notas_ta->nota_final_ta >= 4.01 && $notas_ta->nota_final_ta <= 6.99 ? 'C' : ($notas_ta->nota_final_ta <= 4 ? 'D' : 'Seleccione nota valida'))))}}</td>
			@endif
			@endforeach
			@foreach($nota->notas_ti as $notas_ti)
			@if($notas_ti->materias_id == $materia->id)
			<td>{{$notas_ti->nota_final_ti = ($notas_ti->nota_final_ti >= 9 && $notas_ti->nota_final_ti <= 10 ? 'A' : ($notas_ti->nota_final_ti >= 7 && $notas_ti->nota_final_ti <= 8.99 ? 'B' : ($notas_ti->nota_final_ti >= 4.01 && $notas_ti->nota_final_ti <= 6.99 ? 'C' : ($notas_ti->nota_final_ti <= 4 ? 'D' : 'Seleccione nota valida'))))}}</td>
			@endif
			@endforeach
			@foreach($nota->notas_tg as $notas_tg)
			@if($notas_tg->materias_id == $materia->id)
			<td>{{$notas_tg->nota_final_tg = ($notas_tg->nota_final_tg >= 9 && $notas_tg->nota_final_tg <= 10 ? 'A' : ($notas_tg->nota_final_tg >= 7 && $notas_tg->nota_final_tg <= 8.99 ? 'B' : ($notas_tg->nota_final_tg >= 4.01 && $notas_tg->nota_final_tg <= 6.99 ? 'C' : ($notas_tg->nota_final_tg <= 4 ? 'D' : 'Seleccione nota valida'))))}}</td>
			@endif
			@endforeach
			@foreach($nota->notas_le as $notas_le)
			@if($notas_le->materias_id == $materia->id)
			<td>{{$notas_le->nota_final_le = ($notas_le->nota_final_le >= 9 && $notas_le->nota_final_le <= 10 ? 'A' : ($notas_le->nota_final_le >= 7 && $notas_le->nota_final_le <= 8.99 ? 'B' : ($notas_le->nota_final_le >= 4.01 && $notas_le->nota_final_le <= 6.99 ? 'C' : ($notas_le->nota_final_le <= 4 ? 'D' : 'Seleccione nota valida'))))}}</td>
			@endif
			@endforeach
			@foreach($nota->notas_ev as $notas_ev)
			@if($notas_ev->materias_id == $materia->id)
			<td>{{$notas_ev->nota_final_ev = ($notas_ev->nota_final_ev >= 9 && $notas_ev->nota_final_ev <= 10 ? 'A' : ($notas_ev->nota_final_ev >= 7 && $notas_ev->nota_final_ev <= 8.99 ? 'B' : ($notas_ev->nota_final_ev >= 4.01 && $notas_ev->nota_final_ev <= 6.99 ? 'C' : ($notas_ev->nota_final_ev <= 4 ? 'D' : 'Seleccione nota valida'))))}}</td>
			@endif
			@endforeach
		{{-- 	@foreach($notasPromedioFinalTa as $c => $value)

			<td>{{$notasPromedioFinalTa[$c]['nota_final'] + $notasPromedioFinalTi[$c]['nota_final'] + $notasPromedioFinalTg[$c]['nota_final'] + $notasPromedioFinalLe[$c]['nota_final'] + $notasPromedioFinalEv[$c]['nota_final']}}</td>
		
			@endforeach --}}
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
                    @if(!empty($conducta->nota_final_conducta))
                    <td>{{($conducta->nota_final_conducta >= 9 && $conducta->nota_final_conducta <= 10 ? 'A' : ($conducta->nota_final_conducta >= 7 && $conducta->nota_final_conducta <= 8.99 ? 'B' : ($conducta->nota_final_conducta >= 4.01 &&  $conducta->nota_final_conducta <= 6.99 ? 'C' : ($conducta->nota_final_conducta <= 4  ? 'D' : 'Nota invalida'))))}}</td>
                    @endif
                    @endforeach
                    @elseif($nota->curso == 'OCTAVO DE EGB' || $nota->curso == 'NOVENO DE EGB' || $nota->curso == 'DECIMO DE EGB' || $nota->curso == 'PRIMERO DE BACHILLERATO' || $nota->curso == 'SEGUNDO DE BACHILLERATO' || $nota->curso == 'TERCERO DE BACHILLERATO')
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
                    @else
                    <td>0</td>
                    @endif
                    <td></td>
                    <td></td>
                    <td></td> --}}
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
<p style="text-align: center;">Sra. MONSERRATH RAMIREZ</p>
<p style="text-align: center;">SECRETARIA</p>
</div>
<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
<div align="center">_______________________________</div>
<p style="text-align: center;">LCDA. CARMEN RAMIREZ</p>
<p style="text-align: center;">RECTOR</p>
</div><br><br><br>
<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
<div align="center">_______________________________</div>
<p style="text-align: center;">Sra. MONSERRATH RAMIREZ</p>
<p style="text-align: center;">SECRETARIA</p>
</div>
<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
<div align="center">_______________________________</div>
<p style="text-align: center;">LCDA. CARMEN RAMIREZ</p>
<p style="text-align: center;">RECTOR</p>
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
