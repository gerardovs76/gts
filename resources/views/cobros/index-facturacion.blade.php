@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">

		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			LISTA DETALLADAS DE FACTURAS
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')
		<div class="table-responsive">
		<table class="table table-striped table-bordered" id="table">
			<thead>
				<tr>

					<th>ID</th>
					<th>FECHA INICIO</th>
					<th>FECHA FIN</th>
                    <th>CODIGO</th>
					<th>NOMBRES</th>
					<th>VALOR</th>
					<th>REFERENCIAS</th>
					<th>NUM REFERENCIAS</th>
                    <th>FECHA DE CREACIÓN</th>
                    <th>EDITAR</th>
                    <th width="20px">BORRAR</th>
				</tr>
            </thead>
        @if(isset($facturacion))
			<tbody id="myTable">
				@foreach($facturacion as $fac)
				<tr>
					<td>{{ $fac->id }}</td>
					<td>
						<strong>{{ $fac->fecha_inicio }}</strong>
					</td>
					<td>{{ $fac->fecha_fin}}</td>
					<td>{{$fac->codigo}}</td>
					<td>{{ $fac->nombres }}</td>
					<td>{{ $fac->valor}}</td>
					<td><strong>{{ $fac->referencias}}</strong></td>

					<td><strong>{{ $fac->num_referencia }}</strong></td>
                <td><strong>{{$fac->fecha_creacion}}</strong></td>
					 <td width="20px">
						<a href="{{ route('cobros.facturacion-edit', $fac->id) }}" class="btn btn-primary btn-sm btn-block float-right"><i class="far fa-edit"></i>
							EDITAR
						</a>
					</td>
					<td width="20px">
						{!! Form::open(['route' => ['cobros.facturacion-delete', $fac->id], 'method' => 'DELETE']) !!}
							<button class="btn btn-danger btn-sm float-right">
								<i class="fa fa-trash" aria-hidden="true"></i> BORRAR
							</button>
						{!! Form::close() !!}
                    </td>
				</tr>
				@endforeach
            </tbody>
            @else 
            <tbody>
                <tr>
                    <td></td>
                </tr>
            </tbody>
            @endif
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
