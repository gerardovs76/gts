@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			LISTA INSCRIPCIONES
		</h2>
		</div>
		<hr>
		@include('inscripcion.partials.info')
		<div class="table-responsive">
		<table class="table table-striped table-bordered" id="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>CEDULA</th>
					<th>APELLIDOS</th>
					<th>NOMBRES</th>
					<th>EDAD</th>
					<th>CODIGO</th>
					<th>FECHA CREACION</th>
					<th>EDITAR</th>
					<th>BORRAR</th>

				</tr>
			</thead>
			<tbody>
				@foreach($inscripcion as $ins)
				<tr>
					<td>{{ $ins->id }}</td>
					<td>
						<strong>{{ $ins->cedula }}</strong>
					</td>
					<td>{{ $ins->apellidos}}</td>
					<td>{{ $ins->nombres}}</td>
					<td>{{ $ins->edad}}</td>
					<td>{{ $ins->codigo_nuevo}}</td>
					<td>{{ $ins->fecha_creacion}}</td>
					<td width="20px">
						<a href="{{ route('inscripcion.edit', $ins->id) }}" class="btn btn-primary btn-sm btn-block float-right"><i class="far fa-edit"></i>
							EDITAR
						</a>
					</td>
					<td width="20px">
						{!! Form::open(['route' => ['inscripcion.destroy', $ins->id], 'method' => 'DELETE']) !!}
							<button class="btn btn-danger btn-sm float-right"><i class="far fa-trash-alt"></i>
								BORRAR
							</button>
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('inscripcion.partials.aside')
	</div>-->
	<script>
  $(document).ready(function() {
    $('#table').DataTable({
    	 "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, 1000]]
    });
} );
 </script>
@endsection
