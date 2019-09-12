@extends('layouts.app')

@section('content')

	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			HORARIOS ESTUDIANTES
		</h2>
		</div>

		<hr>
		@include('horarios.partials.info')
					{!! Form::open([]) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">Seleccione los datos y guarde el archivo...</div>
						<div class="panel panel-body">
							<div class="form-row">
                                <div class="form-group col-md-4">
                                        <strong>Curso: </strong><br>
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                    {!!Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el curso', 'id' => 'curso'])!!}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                        <strong>Paralelo: </strong><br>
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                    {!!Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el curso', 'id' => 'paralelo'])!!}
                                    </div>
                                </div>
                                @if(Auth::user()->roles('profesor'))
                                <div class="form-group col-md-4">
                                    <strong>Tipo: </strong><br>
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!!Form::select('tipo',['profesor' => 'PROFESOR'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el tipo', 'id' => 'tipo'])!!}
                                </div>
                            </div>
                            @elseif(Auth::user()->roles('alumno'))
                             <div class="form-group col-md-4">
                                    <strong>Tipo: </strong><br>
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!!Form::select('tipo',['profesor' => 'PROFESOR'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el tipo', 'id' => 'tipo'])!!}
                                </div>
                            </div>
                            @endif
								<div class="form-group col-md-12">
   									{!! Form::button('<i class="fas fa-search"></i> BUSCAR HORARIO', ['class' => 'btn btn-primary', 'type' => 'button', 'id' => 'boton']) !!}
								</div>

							</div>

						</div>
                    </div>
                    {!!Form::close()!!}
                    <div class="row justify-content-center align-items-center">
                    <button type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#myModal" id="botonModal">
                        <i class="fas fa-eye"></i> VER HORARIO
                      </button>


                      <div class="modal" id="myModal">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">


                            <div class="modal-header">
                              <h4 class="modal-title text-center" id="modal-title"></h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>


                            <div class="modal-body" id="modal-body">

                            </div>


                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i> Cerrar</button>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
    </div>
    <style>
        @media (min-width: $screen-sm-min) { // this is the 768px breakpoint
            .modal-dialog {
                max-width: 600px;
                width: auto;
            }
        }

        @media (min-width: $screen-md-min) { // this is the 992px breakpoint
            .modal-dialog {
                max-width: 800px;
            }
        }
        .img-responsive-height
            {
            display: block;
            width: auto;
            max-height: 100%
            }
    </style>

    <script>
        $('#boton').on('click', function(e){
           e.preventDefault();
            var curso = $('#curso').val();
            var paralelo = $('#paralelo').val();
            var tipo = $('#tipo').val();

            if(tipo == 'profesor')
            {
                $('#botonModal').addClass("d-block");
                $('#modal-title').append('<h4>'+curso+'-'+paralelo+'</h4>')
                $('#modal-body').append('<img class="img-responsive" src="archivos/'+curso+'-p-'+paralelo+'.png" id="imagenHorario" style="width: 760px; height: 700px;">');
            }
            else if(tipo == 'estudiante')
            {
                $('#botonModal').addClass("d-block");
                $('#modal-title').append('<h4>'+curso+'-'+paralelo+'</h4>')
                $('#modal-body').append('<img class="img-responsive" src="archivos/'+curso+'-e-'+paralelo+'.png" id="imagenHorario" style="width: 760px; height: 700px;">');
            }

        });
    </script>
@endsection

