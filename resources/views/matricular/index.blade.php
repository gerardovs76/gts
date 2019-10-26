@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">

		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			LISTA MATRICULADOS
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')
		<div class="table-responsive">
		<table class="table table-striped table-bordered" id="table">
			<thead>
				<tr>

					<th>ID</th>
					<th>CEDULA</th>
					<th>APELLIDOS</th>
						<th>NOMBRES</th>
					<th>CURSO</th>
					<th>PARALELO</th>
					<th>CODIGO</th>
					<th>FECHA CREACION</th>
                    <th>EDITAR</th>
                    <th>BORRAR</th>
                    <th width="20px">PERFIL</th>


				</tr>
			</thead>
			<tbody id="myTable">
				@foreach($matricular as $matricula)
				<tr>
					<td>{{ $matricula->id }}</td>
					<td>
						<strong>{{ $matricula->cedula }}</strong>
					</td>
					<td>{{ strtoupper($matricula->apellidos)}}</td>
					<td>{{ strtoupper($matricula->nombres)}}</td>
					<td>{{ $matricula->curso }}</td>
					<td>{{ $matricula->paralelo}}</td>
					<td><strong>{{ $matricula->codigo}}</strong></td>

					<td><strong>{{ $matricula->fecha_creacion }}</strong></td>

					<td width="20px">
						<a href="{{ route('matricular.edit', $matricula->id) }}" class="btn btn-primary btn-sm btn-block float-right"><i class="far fa-edit"></i>
							EDITAR
						</a>
					</td>
					<td width="20px">
						{!! Form::open(['route' => ['matricular.destroy', $matricula->id], 'method' => 'DELETE']) !!}
							<button class="btn btn-danger btn-sm float-right">
								<i class="fa fa-trash" aria-hidden="true"></i> BORRAR
							</button>
						{!! Form::close() !!}
                    </td>
                    <td><a class="btn btn-success btn-sm" href="{{url('matricular-perfil-total-store/'.$matricula->codigo)}}"><i class="fas fa-user"></i> PERFIL</a></td>
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
