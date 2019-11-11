@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
            <div style="background-color: #008cba; padding: 7px;">
                    <h2 class="text-center" style="color: #fff;">
                        EDITAR NOTAS
                    </h2>
                    </div>
		<hr>
		@include('notas.partials.error')
		{!! Form::model($notas, ['route' => ['notas.update', $notas->id, $tt], 'method' => 'PUT']) !!}

			@include('notas.partials.form-editar')

		{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('notas.partials.aside')
	</div>-->
@endsection
