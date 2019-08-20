@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">

		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			LISTA DE NOTICIAS
		</h2>
		</div>

		<hr>
		@include('noticias.partials.info')

		<table width="100%" class="table table-hover table-striped">

			<thead>
				<tr>

					<th>ID</th>
					<th>NOMBRE</th>
					<th>SLUG</th>
					<th>DESCRIPCION</th>
					<th width="20px"></th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($noticias as $noticia)
				<tr>
					<td>{{ $noticia->id }}</td>
					<td>
						<strong>{{ $noticia->nombre }}</strong>
					</td>
					<td>{{ $noticia->slug}}</td>
					<td>{{ $noticia->descripcion}}</td>
					
					<td width="20px">
						<a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-primary btn-sm btn-block float-right">
							EDITAR
						</a>
					</td>
					<td width="20px">
						{!! Form::open(['route' => ['noticias.destroy', $noticia->id], 'method' => 'DELETE']) !!}
							<button class="btn btn-danger btn-sm float-right">
								BORRAR
							</button>							
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $noticias->render() !!}
	</div>
@endsection