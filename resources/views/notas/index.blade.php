@extends('layouts.app')

@section('content')

	<div class="container col-xs-12 col-sm-8 col-lg-12">
		@include('notas.partials.info')
		@if(Session::has('error'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">
			<span>&times;</span>
		</button>
		{{ Session::get('error') }}
    </div>
        @endif
					{!! Form::open(['route' => 'notas.store']) !!}
					@include('notas.partials.error')
                           @include('notas.partials.form')
                           @include('notas.modal.ingresarNotasModal')
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tabla">
			<thead>

                    <tr>
                    <th>
                    	<button disabled="disabled" type="button" data-toggle="modal" data-target="#modalIngresarNotas"  class="btn btn-primary" id="trabajos_academicos"><i class="far fa-clipboard"></i> TRABAJOS ACADEMICOS</button>
                    </th>
                    <th>

                    	<button disabled="disabled" type="button" data-toggle="modal" data-target="#modalIngresarNotas" class="btn btn-primary" id="tareas_individuales"><i class="far fa-clipboard"></i> TAREAS INDIVIDUALES</button>
                    </th>
                    <th>

                    	<button disabled="disabled" type="button" data-toggle="modal" data-target="#modalIngresarNotas" class="btn btn-primary" id="tareas_grupales"><i class="far fa-clipboard"></i> TAREAS GRUPALES</button>
                    </th>
                    <th>

                    	<button disabled="disabled" type="button" data-toggle="modal" data-target="#modalIngresarNotas" class="btn btn-primary" id="lecciones"><i class="far fa-clipboard"></i> LECCIONES</button>
                    </th>
                    <th>

                    	<button disabled="disabled" type="button" data-toggle="modal" data-target="#modalIngresarNotas" class="btn btn-primary" id="evaluaciones"><i class="far fa-clipboard"></i> EVALUACIONES</button>
                    </th>
                    <th>

                    	<button disabled="disabled" type="button" data-toggle="modal" data-target="#modalIngresarNotas" class="btn btn-primary" id="conducta"><i class="far fa-clipboard"></i> CONDUCTA</button>
                    </th>
                    <th>

                    	<button disabled="disabled" type="button" data-toggle="modal" data-target="#modalIngresarNotas" class="btn btn-primary" id="examen"><i class="far fa-clipboard"></i> EXAMEN QUIMESTRAL</button>
                    </th>

                    </tr>
                    </thead>
					<tbody>
				<tr>

				</tr>
			</tbody>
        </table>
    </div>
				{!! Form::button('<i class="fas fa-save"></i> GUARDAR NOTAS', ['class' => 'btn btn-primary form-control d-none', 'id' => 'guardar', 'type' => 'submit']) !!}
		  {{ Form::close() }}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('notas.partials.aside')
    </div>-->
@endsection


