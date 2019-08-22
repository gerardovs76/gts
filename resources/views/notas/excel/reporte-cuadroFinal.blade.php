<table>
	<thead>
		<tr>

		</tr>
	</thead>
	<tbody>
		<tr>

		</tr>
		<tr>

		</tr>
		<tr>

		</tr>
		<tr>

		</tr>
		<tr>

         <td><strong>NIVEL: </strong></td>
         <td>{{ $matriculados->curso }}</td>
         <td><strong>PARALELO: </strong></td>
         <td>{{ $matriculados->paralelo }}</td>
		</tr>
		<tr>
			<td><strong>JORNADA: </strong></td>
		</tr>
	</tbody>
</table>

<table>
	<thead>
		<tr>
			<th><strong>ORD</strong></th>
			<th><strong>NOMBRES Y APELLIDOS</strong></th>
			<th><strong>MATRICULA</strong></th>
			<th><strong>FOLIO</strong></th>
			<th><strong>OBSERVACIONES</strong></th>
		</tr>
	</thead>
	<tbody>
            @foreach($matriculados as $matriculado)
		<tr>
			<td>1</td>
			<td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
			<td>111111</td>
			<td>111111</td>
			<td></td>
        </tr>
        @endforeach
	</tbody>
</table>
