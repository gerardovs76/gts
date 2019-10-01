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
		<img src="images/logo-institucion.png" alt="" height="80" width="80" style="float: left;">
		<img src="images/ib.png" alt="" height="80" width="180" style="float: right;">
		<br>
		<br>
		<br>
		<br>
		<br>
	<h2 style="text-align: center;">MALLA CURRICULAR</h2>
	<table id="mitabla">
		<thead>
			<tr>
				<th>CURSO</th>
				<th>NOMBRE</th>
				<th>PARALELO</th>

			</tr>
		</thead>
		<tbody>
			@foreach($materias as $materia)
		<tr>
		    <td>{{ $materia->curso }}</td>
			<td>{{ $materia->materia }}</td>
			<td>{{ $materia->paralelo }}</td>
		</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>


