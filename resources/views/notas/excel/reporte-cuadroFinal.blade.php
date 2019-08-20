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
         @foreach($matriculados as $matriculado)
         <td>{{ $matriculado->curso }}</td>
         @endforeach
         <td><strong>PARALELO: </strong></td>
         @foreach($matriculados as $matriculado)
         <td>{{ $matriculado->paralelo }}</td>
         @endforeach
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
		<tr>
			<td>1</td>
			@foreach($matriculados as $matriculado)
			<td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
			@endforeach
			<td>111111</td>
			<td>111111</td>
			<td></td>

		</tr>
	</tbody>
</table>