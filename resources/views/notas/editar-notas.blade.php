@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			EDITAR NOTAS
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


					{!! Form::open(['route' => 'notas.store']) !!}
                   		@include('notas.partials.form-edit')

                    <table class="table table-bordered table-hover" id="tabla">
			<thead>
                <tr>
                    <th><strong>NOTA</strong></th>
                    <th>DESCRIPCION</th>
                    <th>FECHA CREACION</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
			<tbody id="tableid">
				<tr>

				</tr>
			</tbody>
		</table>
		  {{ Form::close() }}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('notas.partials.aside')
	</div>-->
	{{-- <script>
 // function mifuncion(elemento) {
	// var parcial = ($(elemento).data('value'));
	// var numeroParcial = (parcial);
	// localStorage.setItem("parcial", JSON.stringify(numeroParcial));
	// var materiaGlobal;
 //  }
</script>
	 --}}

@endsection
