@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			REPORTE
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
                                    <div class="form-group col-md-4">
											<strong>Cedula: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('cedula', null, ['class' => 'form-control col-md-8' , 'id' => 'cedula']) !!}
											</div>
										</div>
								<div class="form-group col-md-10">

   									{!! Form::button('<i class="fas fa-search"></i> REALIZAR BUSQUEDA', ['class' => 'btn btn-primary',  'id' => 'busqueda', 'type' => 'submit']) !!}
								</div>

							</div>

						</div>
					</div>


                    <table class="table table-striped table-hover" id="tableid">
			<thead>

                    <tr>
                    <th>
                    	<p>
                    	<strong>NOMBRES Y APELLIDOS</strong>
                    	</p>
                    </th>
					<th>
						<strong>CEDULA</strong>
					</th>
					<th>
						<strong>FECHA</strong>
					</th>
					<th>
				<strong>ACCIÓN REALIZADA</strong>
					</th>
					<th>
				<strong>SUGERENCIA Y OBSERVACIONES</strong>
					</th>
					<th>
				<strong>RESPONSABLES</strong>
					</th>
                    </tr>
                    </thead>
					<tbody>
				<tr>

				</tr>
			</tbody>
		</table>

	</div>


	  <script src="{{asset('js/dece-reporte.js')}}"></script>
@endsection
