@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			LISTA COBROS
		</h2>
		</div>
		<hr>
		@include('inscripcion.partials.info')
		<div class="table-responsive">
		<table  class="table table-striped table-bordered" id="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>CURSO</th>
					<th>MATRICULA</th>
					<th>PENSIÓN</th>
					<th>TIPO ESTUDIANTE</th>
					<th>TOTAL</th>
					<th>EDITAR</th>
					<th>BORRAR</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cobros as $cobro)
				<tr>
					<td>{{ $cobro->id }}</td>
					<td>
					{{ $cobro->curso }}
					</td>
					<td>{{ $cobro->matricula}}</td>
					<td>{{ $cobro->pension}}</td>
					<td>{{ $cobro->tipo_estudiante}}</td>
					<td>{{ $cobro->total}}</td>
					<td width="20px">
						<a href="{{ route('cobros.edit', $cobro->id) }}" class="btn btn-primary btn-sm btn-block float-right"><i class="far fa-edit"></i>
							EDITAR
						</a>
					</td>
					<td width="20px">
						{!! Form::open(['route' => ['cobros.destroy', $cobro->id], 'method' => 'DELETE']) !!}
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
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });
} );
 </script>
@endsection