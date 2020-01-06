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
			@foreach($materias as $materia)
			<th><strong>{{ $materia->materia }}</strong></th>
			@endforeach
			<th><strong>PROMEDIO</strong></th>
			<th><strong>COMPORTAMIENTO</strong></th>
			<th><strong>OBSERVACIONES</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			@php
			$i = 0;
			@endphp
			@foreach($matriculados as $matriculado)
			<td>{{$i++}}</td>
			<td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
			@endforeach
			{{-- @foreach($notas as $nota)
			<td>{{ $nota->nota_final }}</td>
			@endforeach
			<td>{{ $notas->sum('nota_final') / $notas->count('materia') }}</td> --}}
			<td></td>

		</tr>

	</tbody>
</table>
