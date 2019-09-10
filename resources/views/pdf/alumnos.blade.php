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
				<th>EDAD</th>
				<th>TELEFONO</th>
				<th>CORREO</th>
			</tr>
		</thead>
		<tbody>
			@foreach($inscritos as $ins)
		<tr>
		    <td>{{ $ins->nombres }}</td>
		</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
