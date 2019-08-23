@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			LISTA MATERIAS
		</h2>
		</div>
		<hr>
		@include('materias.partials.info')
		<div class="table-responsive">
		<table  class="table table-striped table-bordered" id="table">
			<thead>
				<tr>

					<th>ID</th>
					<th>MATERIA</th>
                    <th>CURSO</th>
                    <th>PARALELO</th>
                    <th>TIPO MATERIA</th>
					<th>EDITAR</th>
					<th>BORRAR</th>
				</tr>
			</thead>
			<tbody>
				@foreach($materias as $materia)
				<tr>
					<td>{{ $materia->id }}</td>
					<td>{{ $materia->materia}}</td>
                    <td>{{ $materia->curso}}</td>
                    <td>{{$materia->paralelo}}</td>
                    <td>{{$materia->tipo_materia}}</td>
					<td width="20px">
						<a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-primary btn-sm btn-block float-right"><i class="far fa-edit"></i>
							EDITAR
						</a>
					</td>
					<td width="20px">
						{!! Form::open(['route' => ['materias.destroy', $materia->id], 'method' => 'DELETE']) !!}
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
		@include('materias.partials.aside')
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
	</script>
@endsection
