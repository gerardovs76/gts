@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			PROMEDIO INSPECCIONES
		</h2>
		</div>

		<hr>
        @include('partials.errors')
        @include('partials.success')
	      {!! Form::open(['route' => 'inspeccion.promedios-store']) !!}
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
                                   {!! Form::select('especialidad', ['EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'T AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione la especialidad', 'id' => 'especialidad']) !!}
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
                                            {!!Form::button('<i class="fas fa-search"></i> REALIZAR BUSQUEDA', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'busqueda'])!!}
                                        </div>
                               </div>


		<table class="table table-bordered table-striped" id="tablainspeccion" >

			<thead>

                    <tr>
                    <th>ALUMNOS</th>
                    <th>PROMEDIO ASIGNADO POR INSPECCIÓN</th>
                    <th>TOTAL FALTAS 01(INJUSTIFICADAS)</th>
                    <th>TOTAL FALTAS 02(JUSTIFICADAS)</th>
                    <th>TOTAL FALTAS 03(MAL UNIFORMADO)</th>
                    <th>TOTAL FALTAS 04(PRESENTACIÓN PERSONAL)</th>
                    <th>PROMEDIO FINAL</th>
                    </tr>
                    </thead>
                    @if(isset($inspe))
					<tbody id="tableid" class="table table-striped table-hover">

                        @foreach($inspe as $in)
                        <tr>
                            <td>{{$in->apellidos}} {{$in->nombres}}</td>
                            <td>10</td>
                            <td>{{($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01)}}</td>
                            <td>{{($in->h1_count_02 +$in->h2_count_02 +$in->h3_count_02 +$in->h4_count_02 +$in->h5_count_02 +$in->h6_count_02 +$in->h7_count_02 +$in->h8_count_02)}}</td>
                            <td>{{($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03)}}</td>
                            <td>{{($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04)}}</td>
                            @if( 10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04)) * 0.25) <= 6.99)
                            <td style="color: red;" id="promedio">{{ 10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04)) * 0.25)}}</td>
                            @else
                            <td style="color:green;" id="promedio">{{ 10 - ((($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01) + ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03) + ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04)) * 0.25)}}</td>
                            @endif
                        </tr>

                        @endforeach
            </tbody>
            @else
            <tbody id="tableid" class="table table-striped table-hover">

            </tbody>
            @endif
		</table>
	</div>
    {!! Form::close() !!}
    <script>
        $('#busqueda').on('click', function(){
            if($('#promedio') =< '7')
            $('#promedio').css("color", "red");

        });
    </script>
@endsection
