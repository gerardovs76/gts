@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			NOTAS
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')
		
					
					{!! Form::open(['route' => 'notas.store']) !!}
                   		@include('notas.partials.form')
                  
                    <table class="table table-striped table-hover" id="tabla">
			<thead>

                    <tr>	
                    <th>
                    	<p>
                    	<strong>ALUMNOS</strong>
                    	</p>
                    </th>
					<th>
						<p>NOTA</p>
					</th>
                    </tr>	
                    </thead>
					<tbody id="tableid">
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