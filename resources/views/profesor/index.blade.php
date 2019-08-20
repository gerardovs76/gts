@extends('layouts.app')

@section('content')
		<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
          <h2 class="text-center" style="color: #fff;">
              LISTA PROFESORES
          </h2>
          </div>
		<hr>
		@include('profesor.partials.info')
		<div class="table-responsive">
		<table  class="table table-striped table-bordered" id="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>CEDULA</th>
					<th>NOMBRES Y APELLIDOS</th>
					<th>CARGO</th>
					<th>EDITAR</th>
					<th>BORRAR</th>
				</tr>
			</thead>
			<tbody>
				@foreach($profesor as $profe)
				<tr>
					<td>{{ $profe->id }}</td>
					<td>
						<strong>{{ $profe->cedula }}</strong>
					</td>
					<td>{{ $profe->nombres_apellidos}}</td>
					<td>{{$profe->cargo}}</td>
					<td width="20px">
						<a href="{{ route('profesor.edit', $profe->id) }}" class="btn btn-primary btn-sm btn-block float-right"><i class="far fa-edit"></i>
							EDITAR
						</a>
					</td>
					<td width="20px">
						{!! Form::open(['route' => ['profesor.destroy', $profe->id], 'method' => 'DELETE']) !!}
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
		@include('profesor.partials.aside')
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