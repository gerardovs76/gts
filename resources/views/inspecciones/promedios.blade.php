@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
            <i class="fa fa-paper-plane"></i>
			PROMEDIO INSPECCIONES
		</h2>
		</div>
		<marquee width="100%" scrolldelay="100" scrollamount="5" direction="left" loop="infinite"><strong>01.FALTA INJUSTIFICADA, 02. FALTA JUSTIFICADA, 03. MAL UNIFORMADO, 04. PRESENTACIÓN PERSONAL</strong>
		</marquee>

		<hr>
		@include('inspecciones.partials.info')
		{{--@include('notas.partials.info')--}}
	      {!! Form::open(['route' => 'inspeccion.store']) !!}
          <div class="form-row">
                <div class="form-group col-md-4">
                                   <strong>Curso: <br></strong>
                                   <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                   {!! Form::select('curso',['OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Seleccione el curso', 'name' => 'curso']) !!}
                                   </div>
                                   </div>

                                   <div class="form-group col-md-4">
                                   <strong>Especialidad:</strong>
                                   <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                   {!! Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'T AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione la especialidad', 'id' => 'especialidad']) !!}
                                   </div>
                                   </div>

                                   <div class="form-group col-md-4">
                                   <strong>Paralelo:</strong>
                                   <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                   {!! Form::select('paralelo', ['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el paralelo', 'id' => 'paralelo']) !!}
                                   </div>
                                   </div>
                                   <div class="form-group col-md-4">
                                       <strong>Parcial:</strong>
                                       <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {!! Form::select('parcial', ['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el parcial', 'id' => 'parcial']) !!}
                                       </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                           <strong>Quimestre:</strong>
                                           <div class="input-group-prepend">
                                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                           {!! Form::select('quimestre', ['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el quimestre', 'id' => 'quimestre']) !!}
                                           </div>
                                           </div>
                                        <div class="form-group col-md-12">
                                            {!!Form::button('<i class="fas fa-search"></i> REALIZAR BUSQUEDA', ['class' => 'btn btn-primary', 'type' => 'button'])!!}
                                        </div>
                               </div>


		<table class="table table-bordered table-striped" id="tablausuarios" >

			<thead>

                    <tr>
                    <th>ALUMNOS</th>
                    <th>PROMEDIO ASIGNADO POR INSPECCIÓN</th>
                    <th>PROMEDIO FINAL</th>
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
