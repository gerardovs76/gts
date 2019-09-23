<!DOCTYPE html>
<html>
<head>
	<title>PDF</title>
	<style>
		table#mitabla {
    border-collapse: collapse;
    border: 1px solid #CCC;
    margin: 0 auto;
    font-size: 12px;
}
 
table#mitabla th {
    font-weight: bold;
    background-color: #E1E1E1;
    padding:5px;
}
 
table#mitabla tbody tr:hover td {
    background-color: #F3F3F3;
}
 
table#mitabla td {
    padding: 5px 10px;
}
	</style>
</head>
<body>
		<img src="images/lp.PNG" alt="" height="80" width="80" style="float: left;">
		<img src="images/ib.png" alt="" height="80" width="180" style="float: right;">
<header style="text-align: center;"><h2>REPORTE MATRICULADOS INSCRITOS A UN CURSO: <BR></h2></header>
	<table id="mitabla">
		<thead>
			<tr>
				<th>NOMBRES</th>
				<th>CURSO</th>
				<th>PARALELO</th>
				<th>TIPO ESTUDIANTE</th>
				<th>CODIGO</th>
			</tr>
		</thead>
		<tbody>
			@foreach($matriculados as $matriculado)
		<tr>
		    <td>{{ $matriculado->apellidos  }} {{ $matriculado->nombres }}</td>
			<td>{{ $matriculado->curso }}</td>
			<td>{{ $matriculado->paralelo }}</td>
			<td>{{ $matriculado->tipo_estudiante }}</td>
			<td>{{ $matriculado->codigo }}</td>
		</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>