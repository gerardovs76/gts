@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">

		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			REPORTE DE MATRICULADOS BLOQUEADOS
		</h2>
		</div>

		<hr>
		@include('matricular.partials.info')
		<div class="table-responsive">
		<table class="table table-striped table-bordered" id="table">
			<thead>
				<tr>

					<th>ID</th>
					<th>CEDULA</th>
					<th>NOMBRES</th>
					<th>APELLIDOS</th>
					<th>CURSO</th>
					<th>PARALELO</th>
                    <th>CODIGO</th>
                    <th>STATUS</th>
					<th>DESBLOQUEAR</th>
				

					
				</tr>
			</thead>
			<tbody id="myTable">
				@foreach($matricular as $matricula)
				<tr>
					<td>{{ $matricula->id }}</td>
					<td>
						<strong>{{ $matricula->cedula }}</strong>
					</td>
					<td>{{ $matricula->nombres}}</td>
					<td>{{ $matricula->apellidos}}</td>
					<td>{{ $matricula->curso }}</td>
					<td>{{ $matricula->paralelo}}</td>
                    <td><strong>{{ $matricula->codigo}}</strong></td>
                    <td><strong>{{$matricula->tipo_estudiante}}</strong>
					<td width="20px">
						<a href="{{ route('matricular.cambiarStatus', $matricula->id) }}" class="btn btn-success btn-sm btn-block float-right"><i class="fas fa-unlock"></i>
							DESBLOQUEAR
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('matricular.partials.aside')
	</div>-->
	<script>
  $(document).ready(function() {
    $('#table').DataTable({
    	 "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, 1000] ]
    });
} );
 </script>
@endsection