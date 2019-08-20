@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">

		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			LISTA FRASES
		</h2>
		</div>

		<hr>
		@include('frases.partials.info')

		<table width="100%" class="table table-hover table-striped">

			<thead>
				<tr>

					<th>ID</th>
					<th>AUTOR</th>
					<th>FRASE</th>
					<th width="20px"></th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($frases as $frase)
				<tr>
					<td>{{ $frase->id }}</td>
					<td>
						<strong>{{ $frase->autor }}</strong>
					</td>
					<td>{{ $frase->frase}}</td>
					
					<td width="20px">
						<a href="{{ route('frases.edit', $frase->id) }}" class="btn btn-primary btn-sm btn-block float-right">
							EDITAR
						</a>
					</td>
					<td width="20px">
						{!! Form::open(['route' => ['frases.destroy', $frase->id], 'method' => 'DELETE']) !!}
							<button class="btn btn-danger btn-sm float-right">
								BORRAR
							</button>							
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $frases->render() !!}
	</div>
@endsection