  @extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			INSPECCIONES
		</h2>
		</div>
		<marquee width="100%" scrolldelay="100" scrollamount="5" direction="left" loop="infinite"><strong>01.FALTA INJUSTIFICADA, 02. FALTA JUSTIFICADA, 03. MAL UNIFORMADO, 04. PRESENTACIÓN PERSONAL</strong>
		</marquee>

		<hr>
		@include('inspecciones.partials.info')
		{{--@include('notas.partials.info')--}}
	      {!! Form::open(['route' => 'inspeccion.store']) !!}
			@include('inspecciones.partials.form')


		<table width="100%" class="table-hover table-condensed d-none" id="tablausuarios" >

			<thead>

                    <tr>
                    <th>
                        ALUMNOS
                    </th>
                    <th>
						HORAS CLASES
					</th>
                    </tr>
                    </thead>
					<tbody id="tableid" class="table table-striped table-hover">
				<tr>
				</tr>
			</tbody>
		</table>
			{!! Form::button('<i class="fas fa-print"></i> GUARDAR', ['class' => 'btn btn-primary form-control d-none', 'type' => 'submit', 'id' => 'guardar']) !!}
	</div>
	{!! Form::close() !!}

	<!--<div class="col-xs-12 col-sm-4">
		@include('notas.partials.aside')
	</div>-->

@endsection
