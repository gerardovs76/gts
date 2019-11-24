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
                           @include('notas.modal.descripcionesModal')
                    <div class="table-responsive">
                    <table class="table table-striped table-hover d-none" id="tabla">
			<thead>
                    <button id="agregarDescripciones" type="button"  type="button" data-toggle="modal" style="background-color: #722f37;" data-target="#modalIngresarDescripciones" class="btn btn-primary d-none center-block"><i class="fas fa-clipboard"></i> AGREGAR DESCRIPCIONES</button><br><br>
                    <tr>
                    <th>
                            <button type="button"  class="btn btn-default" id="trabajos_academicos"><i class="far fa-clipboard"></i> ESTUDIANTES</button>
                    </th>
                    <th>
                    	<button type="button"  class="btn btn-primary" id="trabajos_academicos"><i class="far fa-clipboard"></i> TRABAJOS ACADEMICOS</button>
                    </th>
                    <th>

                    	<button type="button" class="btn btn-warning" id="tareas_individuales"><i class="far fa-clipboard"></i> TAREAS INDIVIDUALES</button>
                    </th>
                    <th>

                    	<button type="button" class="btn btn-danger" id="tareas_grupales"><i class="far fa-clipboard"></i> TAREAS GRUPALES</button>
                    </th>
                    <th>

                    	<button type="button" class="btn btn-info" id="lecciones"><i class="far fa-clipboard"></i> LECCIONES</button>
                    </th>
                    <th>

                    	<button type="button" class="btn btn-success" id="evaluaciones"><i class="far fa-clipboard"></i> EVALUACIONES</button>
                    </th>
                    <th>
                    	<button disabled type="button" class="btn btn-dark" id="examen"><i class="far fa-clipboard"></i> EXAMEN QUIMESTRAL</button>
                    </th>
                    <th>
                        <strong class="btn btn-primary" style="background-color: #D718EE;"><i class="far fa-clipboard"></i> PROMEDIOS</strong>
                    </th>

                    </tr>
                    </thead>
					<tbody>
				<tr>

				</tr>
			</tbody>
        </table>
				{!! Form::button('<i class="fas fa-save"></i> GUARDAR NOTAS', ['class' => 'btn btn-primary form-control d-none', 'id' => 'guardar', 'type' => 'submit']) !!}
		  {{ Form::close() }}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('notas.partials.aside')
    </div>-->
@endsection


