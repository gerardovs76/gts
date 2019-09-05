@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			NOTAS ABANDERADOS
		</h2>
		</div>

		<hr>
        @include('notas.partials.info')
        @include('notas.modal.abanderadosModal')


					{!! Form::open(['route' => 'notas.abanderados-store']) !!}
                    <div class="panel panel-primary">
                        <div class="panel panel-heading text-center">INGRESE LOS DATOS PARA LA BUSQUEDA</div>
                             <div class="panel panel-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                 <strong>Curso: <br></strong>
                                                 <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                 {{ Form::select('curso',['TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                                 </div>
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <strong>Paralelo: <br></strong>
                                                 <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                 {{ Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
                                                 </div>
                                                 </div>
                                                   <div id ="agregarNotas" class="form-group col-md-12">
                                                   {!! Form::button('<i class="fas fa-clipboard"></i> AGREGAR NOTAS', ['class' => 'btn btn-primary col-md-2', 'id' => 'agregarNotas']) !!}

                                                 </div>
                                                 <div class="form-group col-md-12">
                                                     <button type="button" class="form-control col-md-2 btn btn-primary pull-right" id="abanderadosModal" data-toggle="modal" data-target="#modalAbanderados"><i class="fas fa-search"></i> REPORTE ABANDERADOS</button>
                                                 </div>



                                       </div>
                                     </div>
                                    </div>

        <table class="table table-bordere table-hover" id="tabla" width="100%">
			<thead>
                <tr>
                    <th><strong>Nro.</strong></th>
                    <th><strong>Cedula</strong></th>
                    <th><strong>Apellidos y Nombres</strong></th>
                    <th style="text-align: center;"><strong>2°</strong></th>
                    <th style="text-align: center;"><strong>3°</strong></th>
                    <th style="text-align: center;"><strong>4°</strong></th>
                    <th style="text-align: center;"><strong>5°</strong></th>
                    <th style="text-align: center;"><strong>6°</strong></th>
                    <th style="text-align: center;"><strong>7°</strong></th>
                    <th style="text-align: center;"><strong>8°</strong></th>
                    <th style="text-align: center;"><strong>9°</strong></th>
                    <th style="text-align: center;"><strong>10°</strong></th>
                    <th style="text-align: center;"><strong>1°</strong></th>
                    <th style="text-align: center;"><strong>2°</strong></th>
                </tr>
            </thead>
			<tbody width="15%">
			</tbody>
		</table>
				{!! Form::button('<i class="fas fa-save"></i> GUARDAR NOTAS', ['class' => 'btn btn-primary form-control d-none', 'id' => 'guardar', 'type' => 'submit']) !!}
          {{ Form::close() }}

    </div>
    <style>
            .modal-header-primary {
                color:#fff;
                padding:9px 15px;
                border-bottom:1px solid #eee;
                background-color: #428bca;
                -webkit-border-top-left-radius: 5px;
                -webkit-border-top-right-radius: 5px;
                -moz-border-radius-topleft: 5px;
                -moz-border-radius-topright: 5px;
                 border-top-left-radius: 5px;
                 border-top-right-radius: 5px;
            }
            .modal-header-info {
                color:#fff;
                padding:9px 15px;
                border-bottom:1px solid #eee;
                background-color: #5bc0de;
                -webkit-border-top-left-radius: 5px;
                -webkit-border-top-right-radius: 5px;
                -moz-border-radius-topleft: 5px;
                -moz-border-radius-topright: 5px;
                 border-top-left-radius: 5px;
                 border-top-right-radius: 5px;
            }
    </style>
    <script>
            $('#agregarNotas').on('click', function(e){
                    e.preventDefault();
                var curso = $('#curso').val();
                var paralelo = $('#paralelo').val();

                $.get('api-abanderados/'+curso+'/'+paralelo, function(response){
                    $.each(response, function(index, obj){
                        console.log(obj);
                        $('#guardar').addClass("d-block");
                        $('#tabla').append('<tr><td>'+(index + 1)+'</td><td>'+obj.cedula+'</td><td><p>'+obj.apellidos+' '+obj.nombres+'</p></td><td><input type="text" value="0" class="form-control col-md-9" id="basica_2" name="basica_2[]"></td><td><input type="text" value="0" class="form-control col-md-9" id="basica_3" name="basica_3[]"></td><td><input type="text" value="0" class="form-control col-md-9" id="basica_4" name="basica_4[]"></td><td><input type="text" value="0" class="form-control col-md-9" id="basica_5" name="basica_5[]"></td><td><input type="text" value="0" class="form-control col-md-9" id="basica_6" name="basica_6[]"></td><td><input type="text" value="0" class="form-control col-md-9" id="basica_7" name="basica_7[]"></td><td><input type="text" value="0" class="form-control col-md-9" id="basica_8" name="basica_8[]"></td><td><input type="text" value="0" class="form-control col-md-9" id="basica_9" name="basica_9[]"></td><td><input type="text" value="0" class="form-control col-md-9" id="basica_10" name="basica_10[]"></td><td><input type="text" value="0" class="form-control col-md-9" id="bachillerato_1" name="bachillerato_1[]"></td><td><input type="text" value="0" class="form-control col-md-9" id="bachillerato_2" name="bachillerato_2[]"></td><td><input type="hidden" value='+obj.id+' id="matriculados_id" name="matriculados_id[]"></td></tr>');
                    });
                  });
              });
    </script>

@endsection
