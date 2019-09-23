<!DOCTYPE html>
<html>
<head>
	<title>PDF</title>
	<style>
		table#mitabla {
    border-collapse: separate;
    border: 1px solid #212121;
    margin: 0 auto;
    font-size: 12px;

}

table#mitabla th {
   font-weight: bold;
    background-color: #FFFFFF;
     border-collapse: separate;
    padding:0px;
    padding-right: 40px;


}

table#mitabla tbody tr:hover td {
    background-color: #F3F3F3;
}

table#mitabla td {
	 background-color: #F3F3F3;
     border-collapse: separate;


}
	</style>
	<style>
		table#mitabla2 {
    border-collapse: separate;
    border: 1px solid #212121;
    margin: 0 auto;
    font-size: 12px;
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
    font-size: 12px;
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
	    font-size: 12px;
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
		    font-size: 12px;
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
		font-size: 12px;
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
<body>
	<header>
			<img src="images/lp.PNG" alt="" height="80" width="80" style="float: left;">
            <img src="images/ib.png" alt="" height="80" width="180" style="float: right;">
            <br>
            <br>
            <br>
            <br>
            <br>
		<table class="table table-sm" id="mitabla">
				<tbody>
			@foreach($matriculados as $matriculado)
			<tr>
				<th>Apellidos: {{ $matriculado->apellidos }}</th>
				<th>Nombres: {{ $matriculado->nombres }}</th>

			</tr>
			<tr>
				<th>Curso: {{ $matriculado->curso }}</th>
				<th>Quimestre: {{ $matriculado->quimestre }}</th>
			</tr>
			<tr>
				<th>Codigo: </th>
				<th>Año lectivo: 2019-2020</th>
			</tr>
			<tr>
				<th>Paralelo: {{ $matriculado->paralelo }}</th>
				<th>Parcial: {{ $matriculado->parcial }}</th>
			</tr>
			@endforeach


		</tbody>
		</table>
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
			@foreach($libreta as $lib)
			<tr>
			<th>{{ $lib->materia }}</th>
			<td>{{ $lib->nota_ta }}</td>
			<td>{{ $lib->nota_ti }}</td>
			<td>{{ $lib->nota_tg }}</td>
			<td>{{ $lib->nota_le }}</td>
			<td>{{ $lib->nota_ev }}</td>
			@if($lib->nota_final >= '7')
			<td style="color: green;">{{ $lib->nota_final }}</td>
			@else
			<td style="color: red;">{{ $lib->nota_final }}</td>
			@endif
			</tr>
			@endforeach
			<tr>
				<th>CLUBES</th>
			</tr>
		</tbody>
	</table>
	<br>
	<table id="mitabla3" align="left">
		<thead>
			<tr>
				<th>Comportamiento</th>
				<th>Faltas Justificadas</th>
				<th>Faltas Injustificadas</th>
                <th>Mal uniformado</th>
                <th>Presentación personal</th>
			</tr>
		</thead>
		<tbody>
            @foreach($inspe as $in)
			<tr>
				<td>{{(10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 + $in->h9_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 + $in->h9_count_01) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 + $in->h9_count_04)) * 0.25)) }}</td>
				<td>{{($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01+$in->h9_count_01)}}</td>
				<td>{{($in->h1_count_02 +$in->h2_count_02 +$in->h3_count_02 +$in->h4_count_02 +$in->h5_count_02 +$in->h6_count_02 +$in->h7_count_02 +$in->h8_count_02+$in->h9_count_01)}}</td>
                <td>{{($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03+$in->h9_count_01)}}</td>
                <td>{{($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04+$in->h9_count_01)}}</td>
            </tr>
            @endforeach
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
	</header>
	<br><br><br><br><br><br><br><br><br><br><br><br>
<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
<div align="center">----------------------------------------------------</div>
<p style="text-align: center;">Sra. MONSERRATH RAMIREZ</p>
<p style="text-align: center;">SECRETARIA</p>
</div>
<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
<div align="center">----------------------------------------------------</div>
<p style="text-align: center;">LCDA. CARMEN RAMIREZ</p>
<p style="text-align: center;">VICERRECTORA</p>
</div><br><br><br><br>
<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
<div align="center">----------------------------------------------------</div>
<p style="text-align: center;">Sra. MONSERRATH RAMIREZ</p>
<p style="text-align: center;">SECRETARIA</p>
</div>
<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
<div align="center">----------------------------------------------------</div>
<p style="text-align: center;">LCDA. CARMEN RAMIREZ</p>
<p style="text-align: center;">VICERRECTORA</p>
</div><br><br><br><br><br>
<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
<div align="center">----------------------------------------------------</div>
<p style="text-align: center;">TUTOR</p>
</div>
<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
<div align="center">----------------------------------------------------</div>
@foreach($representante as $repre)
<p style="text-align: center;">{{$repre->nombres_representante}}</p>
@endforeach

<p style="text-align: center;">REPRESENTANTE</p>

</div>
</body>
</html>
