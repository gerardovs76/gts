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

	<table id="mitabla">
		<thead>
			<tr>
				<th>NOMBRES</th>
				<th>CURSO</th>
				<th>PARALELO</th>
				<th>TIPO ESTUDIANTE</th>
			</tr>
		</thead>
		<tbody>
			@foreach($matriculados as $matriculado)
		<tr>
		    <td>{{ $matriculado->apellidos  }} {{ $matriculado->nombres }}</td>
			<td>{{ $matriculado->curso }}</td>
			<td>{{ $matriculado->paralelo }}</td>
			<td>{{ $matriculado->tipo_estudiante }}</td>
		</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
