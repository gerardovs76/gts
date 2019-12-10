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
					{!! Form::open(['route' => 'notas.store-examen', 'id' => 'form-id']) !!}
                           @include('notas.partials.error')
                           @include('notas.partials.form-examen')
                           @include('notas.modal.ingresarNotasModal')
                           @include('notas.modal.descripcionesModal')
                    <div class="table-responsive">
                    <table class="table table-striped table-hover d-none" id="tabla">
			<thead>
                    <button id="examenQuimestral" type="button"  type="button" data-toggle="modal" style="background-color: #FF5733;" data-target="#modalIngresarNotas" class="btn btn-primary d-none center-block"><i class="fas fa-clipboard"></i> EXAMEN QUIMESTRAL</button><br><br>
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


