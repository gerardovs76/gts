  @extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			INSPECCIONES
		</h2>
		</div>
		<marquee width="100%" scrolldelay="100" scrollamount="5" direction="left" loop="infinite"><strong>01.FALTA INJUSTIFICADA, 02. FALTA JUSTIFICADA, 03. ATRASO, 04. FUGA, 05. MAL UNIFORMADO, 06. PRESENTACIÓN PERSONAL, 07. LLAMADO ATENCIÓN, 08. INDISCIPLINA</strong>
		</marquee>

		<hr>
		@include('inspecciones.partials.info')
		{{--@include('notas.partials.info')--}}
	      {!! Form::open(['route' => 'inspeccion.store']) !!}
			@include('inspecciones.partials.form')


		<table width="100%" class="table-hover table-condensed d-none" id="tablausuarios" >

			<thead>
                    <tr>
                    <th width="15%">
                        ALUMNOS
                    </th>
                    <th>
						HORAS CLASES
					</th>
					<th>
						CODIGO
					</th>
					<th>
						 PROMEDIO
					</th>
                    </tr>
                    </thead>
					<tbody id="tableid" class="table table-striped table-hover">
				<tr>
				</tr>
			</tbody>
		</table>
		<div class="form-group col-md-12">
            {!!Form::button('<i class="fas fa-print"></i> GUARDAR', ['class' => 'form-control btn btn-primary d-none', 'type' => 'submit', 'id' => 'guardar'])!!}
        </div>
	</div>
	{!! Form::close() !!}

	<!--<div class="col-xs-12 col-sm-4">
		@include('notas.partials.aside')
	</div>-->

@endsection
