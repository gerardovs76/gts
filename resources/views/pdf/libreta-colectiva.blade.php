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
    padding:0px;
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

			<img src="images/logo-institucion.png" alt="" height="80" width="80" style="float: left;"><br>
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
            <tr style="margin 0;">
                <th>Parciales</th>
                <th>1er</th>
                <th>2do</th>
                <th>3er</th>
                <th>Promedio</th>
                <th>80%</th>
                <th>Examen</th>
                <th>Examen 20%</th>
                <th>Quimestre</th>
            </tr>
		</thead>
		<tbody>
			<tr>
                <th><strong>AREAS INSTITUCIONALES</strong></th>
                <th style="display: none;"></th>
			</tr>
            @foreach($nota->materias as $materiasIndi)
            @if($materiasIndi->tipo_materia === 'NO')
			<tr>

                    <th><strong>{{$materiasIndi->materia}}</strong></th>
                   @foreach($nota->notas as $parcial1)
                   @if(!$nota->recuperaciones->isEmpty())

                   @foreach($nota->recuperaciones as $recuperacionp1)

                   @if($parcial1->materias_id == $materiasIndi->id && $recuperacionp1->materias_id == $parcial1->materias_id)

                   <td>{{round(($recuperacionp1->promedio_final), 3)}}</td>

                   @elseif($parcial1->materias_id == $materiasIndi->id)

                   <td>{{$parcial1->nota_final}}</td>

                   @endif

                   @endforeach

                   @elseif($nota->recuperaciones->isEmpty())
                   @if($parcial1->materias_id == $materiasIndi->id)
                   <td>{{$parcial1->nota_final}}</td>
                   @else

                   @endif

                   @endif

                   @endforeach

                   @foreach($nota->parcial2 as $parcial2)
                   @if(!$nota->recuperaciones_p2->isEmpty())

                   @foreach($nota->recuperaciones_p2 as $recuperacionp2)

                   @if($parcial2->materias_id == $materiasIndi->id && $recuperacionp2->materias_id == $parcial2->materias_id)

                   <td>{{round(($recuperacionp2->promedio_final), 3)}}</td>

                   @elseif($parcial2->materias_id == $materiasIndi->id)

                   <td>{{$parcial2->nota_final}}</td>

                   @endif

                   @endforeach

                   @elseif($nota->recuperaciones_p2->isEmpty())
                   @if($parcial2->materias_id == $materiasIndi->id)
                   <td>{{$parcial2->nota_final}}</td>
                   @else

                   @endif

                   @endif

                   @endforeach

                   @foreach($nota->parcial3 as $parcial3)
                   @if(!$nota->recuperaciones_p3->isEmpty())

                   @foreach($nota->recuperaciones_p3 as $recuperacionp3)

                   @if($parcial3->materias_id == $materiasIndi->id && $recuperacionp3->materias_id == $parcial3->materias_id)

                   <td>{{round(($recuperacionp3->promedio_final), 3)}}</td>

                   @elseif($parcial3->materias_id == $materiasIndi->id)

                   <td>{{$parcial3->nota_final}}</td>

                   @endif

                   @endforeach

                   @elseif($nota->recuperaciones_p3->isEmpty())
                   @if($parcial3->materias_id == $materiasIndi->id)
                   <td>{{$parcial3->nota_final}}</td>
                   @else

                   @endif

                   @endif

                   @endforeach

                   <td></td>
                   <td></td>
                   @if(isset($nota->examen))
                   @foreach($nota->examen as $examen)
                   @if($examen->materias_id == $materiasIndi->id)
                   @if(!empty($examen->nota_examen))
                   <td>{{$examen->nota_examen}}</td>
                   @else
                   <td>0</td>
                   @endif
                   @if(!empty($examen->nota_examen))
                   <td>{{((($examen->nota_examen) * 20) / 100)}}</td>
                   @else
                   <td>0</td>
                   @endif
                   @endif
                   @endforeach
                   @endif




            </tr>
            @endif
            @endforeach
			<tr>
				<th>CLUBES</th>
            </tr>
            @foreach($nota->materias as $materiasIndi)
            @if($materiasIndi->tipo_materia == 'SI')
            <tr>
                <td><strong>{{$materiasIndi->materia}}</strong></td>
				@foreach($nota->notas as $parcial1)
				@if(!$nota->recuperaciones->isEmpty())

				@foreach($nota->recuperaciones as $recuperacionp1)

				@if($parcial1->materias_id == $materiasIndi->id && $recuperacionp1->materias_id == $parcial1->materias_id)

				<td>{{($recuperacionp1->promedio_final >= 9 && $recuperacionp1->promedio_final <= 10 ? 'A' : ($recuperacionp1->promedio_final >= 7 && $recuperacionp1->promedio_final <= 8.99 ? 'B' : ($recuperacionp1->promedio_final >= 4.01 && $recuperacionp1->promedio_final <= 6.99 ? 'C' : ($recuperacionp1->promedio_final <= 4 ? 'D' : 'Nota invalida'))))}}</td>

				@elseif($parcial1->materias_id == $materiasIndi->id)

				<td>{{($parcial1->nota_final >= 9 && $parcial1->nota_final <=  10 ? 'A' : ($parcial1->nota_final >= 7 && $parcial1->nota_final <= 8.99 ? 'B' : ($parcial1->nota_final >= 4.01 && $parcial1->nota_final <= 6.99 ? 'C' : ($parcial1->nota_final <= 4 ? 'D' : 'Nota invalida'))))}}</td>

				@endif

				@endforeach

				@elseif($nota->recuperaciones->isEmpty())
				@if($parcial1->materias_id == $materiasIndi->id)
				<td>{{($parcial1->nota_final >= 9 && $parcial1->nota_final <=  10 ? 'A' : ($parcial1->nota_final >= 7 && $parcial1->nota_final <= 8.99 ? 'B' : ($parcial1->nota_final >= 4.01 && $parcial1->nota_final <= 6.99 ? 'C' : ($parcial1->nota_final <= 4 ? 'D' : 'Nota invalida'))))}}</td>
				@else

				@endif

				@endif

				@endforeach

				@foreach($nota->parcial2 as $parcial2)
				@if(!$nota->recuperaciones_p2->isEmpty())

				@foreach($nota->recuperaciones_p2 as $recuperacionp2)

				@if($parcial2->materias_id == $materiasIndi->id && $recuperacionp2->materias_id == $parcial2->materias_id)

				<td>{{($recuperacionp2->promedio_final >= 9 && $recuperacionp2->promedio_final <= 10 ? 'A' : ($recuperacionp2->promedio_final >= 7 && $recuperacionp2->promedio_final <= 8.99 ? 'B' : ($recuperacionp2->promedio_final >= 4.01 && $recuperacionp2->promedio_final <= 6.99 ? 'C' : ($recuperacionp2->promedio_final <= 4 ? 'D' : 'Nota invalida'))))}}</td>

				@elseif($parcial2->materias_id == $materiasIndi->id)

				<td>{{($parcial2->nota_final >= 9 && $parcial2->nota_final <=  10 ? 'A' : ($parcial2->nota_final >= 7 && $parcial2->nota_final <= 8.99 ? 'B' : ($parcial2->nota_final >= 4.01 && $parcial2->nota_final <= 6.99 ? 'C' : ($parcial2->nota_final <= 4 ? 'D' : 'Nota invalida'))))}}</td>

				@endif

				@endforeach

				@elseif($nota->recuperaciones_p2->isEmpty())
				@if($parcial2->materias_id == $materiasIndi->id)
				<td>{{($parcial2->nota_final >= 9 && $parcial2->nota_final <=  10 ? 'A' : ($parcial2->nota_final >= 7 && $parcial2->nota_final <= 8.99 ? 'B' : ($parcial2->nota_final >= 4.01 && $parcial2->nota_final <= 6.99 ? 'C' : ($parcial2->nota_final <= 4 ? 'D' : 'Nota invalida'))))}}</td>
				@else

				@endif

				@endif

				@endforeach

				@foreach($nota->parcial3 as $parcial3)
				@if(!$nota->recuperaciones_p3->isEmpty())

				@foreach($nota->recuperaciones_p3 as $recuperacionp3)

				@if($parcial3->materias_id == $materiasIndi->id && $recuperacionp3->materias_id == $parcial3->materias_id)

				<td>{{($recuperacionp3->promedio_final >= 9 && $recuperacionp3->promedio_final <= 10 ? 'A' : ($recuperacionp3->promedio_final >= 7 && $recuperacionp3->promedio_final <= 8.99 ? 'B' : ($recuperacionp3->promedio_final >= 4.01 && $recuperacionp3->promedio_final <= 6.99 ? 'C' : ($recuperacionp3->promedio_final <= 4 ? 'D' : 'Nota invalida'))))}}</td>

				@elseif($parcial3->materias_id == $materiasIndi->id)

				<td>{{($parcial3->nota_final >= 9 && $parcial3->nota_final <=  10 ? 'A' : ($parcial3->nota_final >= 7 && $parcial3->nota_final <= 8.99 ? 'B' : ($parcial3->nota_final >= 4.01 && $parcial3->nota_final <= 6.99 ? 'C' : ($parcial3->nota_final <= 4 ? 'D' : 'Nota invalida'))))}}</td>

				@endif

				@endforeach

				@elseif($nota->recuperaciones_p3->isEmpty())
				@if($parcial3->materias_id == $materiasIndi->id)
				<td>{{($parcial3->nota_final >= 9 && $parcial3->nota_final <=  10 ? 'A' : ($parcial3->nota_final >= 7 && $parcial3->nota_final <= 8.99 ? 'B' : ($parcial3->nota_final >= 4.01 && $parcial3->nota_final <= 6.99 ? 'C' : ($parcial3->nota_final <= 4 ? 'D' : 'Nota invalida'))))}}</td>
				@else

				@endif

				@endif

				@endforeach

				<td></td>
				<td></td>
				@if(isset($nota->examen))
				@foreach($nota->examen as $examen)
				@if($examen->materias_id == $materiasIndi->id)
				@if(!empty($examen->nota_examen))
				<td>{{($examen->nota_examen >= 9 && $examen->nota_examen <= 10 ? 'A' : ($examen->nota_examen >= 7 && $examen->nota_examen <= 8.99 ? 'B' : ($examen->nota_examen >= 4.01 && $examen->nota_examen <= 6.99 ? 'C' : ($examen->nota_examen <= 4 ? 'D' : 'Nota invalida'))))}}</td>
				@else
				<td>0</td>
				@endif
                @if(!empty($examen->nota_examen))
                @if(($examen->nota_examen * 20 / 100) >= 9 && ($examen->nota_examen) <= 10)
                <td>A</td>
                @elseif(($examen->nota_examen * 20 / 100) >= 7 && ($examen->nota_examen) <= 8.99)
                <td>B</td>
                @elseif(($examen->nota_examen * 20 / 100) >= 4.01 && ($examen->nota_examen) <= 6.99)
                <td>C</td>
                @elseif(($examen->nota_examen * 20 / 100) <= 4)
                <td>D</td>
                @endif
				@else
				<td>0</td>
				@endif
				@endif
				@endforeach
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
                @foreach($nota->conducta as $conducta)
                @if(!empty($conducta->nota_conducta))
                <td>{{($conducta->nota_conducta >= 9 && $conducta->nota_conducta <= 10 ? 'A' : ($conducta->nota_conducta >= 7 && $conducta->nota_conducta <= 8.99 ? 'B' : ($conducta->nota_conducta >= 4.01 &&  $conducta->nota_conducta <= 6.99 ? 'C' : ($conducta->nota_conducta <= 4  ? 'D' : 'Nota invalida'))))}}</td>
                @endif
                @endforeach
                @elseif($nota->curso == 'OCTAVO DE EGB' || $nota->curso == 'NOVENO DE EGB' || $nota->curso == 'DECIMO DE EGB' || $nota->curso == 'PRIMERO DE BACHILLERATO' || $nota->curso == 'SEGUNDO DE BACHILLERATO' || $nota->curso == 'TERCERO DE BACHILLERATO')
                @foreach($inspe as $in)
                @if((10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) >= 9 && (10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) <= 10 )
                <td>A</td>
                @elseif((10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) >= 7 && (10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) <= 8.99)
                <td>B</td>
                @elseif((10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) >= 4.01 && (10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) <= 6.99)
                <td>C</td>
                @elseif((10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) <= 4)
                <td>D</td>
                @endif
                @endforeach
                @else
                <td>0</td>
                @endif
                <td></td>
                <td></td>
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
