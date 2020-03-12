@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
            ENVIAR LIBRETAS
		</h2>
		</div>

                <hr>
                @include('notas.partials.error')
		@include('notas.partials.info')


					{!! Form::open(['route' => 'notas.descargarLibretaColectiva']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
                                    <div class="form-group col-md-4">
                                            <strong>Curso: <br></strong>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                            {{ Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Seleccione el curso...']) }}
                                            </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <strong>Paralelo: <br></strong>
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                                    {{ Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Seleccione el curso...']) }}
                                                    </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <strong>Parcial: <br></strong>
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                        {{ Form::select('parcial',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6' , 'id' => 'parcial', 'placeholder' => 'Seleccione el parcial...']) }}
                                                        </div>
                                                        </div>
                                            <div class="form-group col-md-4">
                                                    <strong>Quimestre: <br></strong>
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                    {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6' , 'id' => 'quimestre', 'placeholder' => 'Seleccione el quimestre...']) }}
                                                    </div>
                                                    </div>
								<div class="form-group col-md-10">
   									{!! Form::button('<i class="fas fa-search"></i> REALIZAR BUSQUEDA', ['class' => 'btn btn-primary',  'id' => 'busqueda', 'type' => 'button']) !!}
								</div>

							</div>

						</div>
                    </div>
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>NOMBRES</th>
                                <th>PARCIAL 1</th>
                                <th>PARCIAL 2</th>
                            </tr>
                        </thead>
                        
                    </table>
	</div>

      {{ Form::close() }}
     <script>
                                   $(document).ready(function() {
                                        $(window).keydown(function(event){
                                        if(event.keyCode == 13) {
                                             event.preventDefault();
                                             return false;
                                        }
                                        });
                                        });
                                      </script>
                                        <script>
                                           $('#busqueda').on('click', function(){
                                          var curso = $( "#curso option:selected" ).text();
                                          var paralelo  = $( "#paralelo option:selected" ).text();
                                          console.log(paralelo);
                                          var parcial = $('#parcial').val();
                                          var quimestre = $('#quimestre').val();
                                        
                                          var url = 'buscar_alumnos_libretas/'+curso+'/'+paralelo+'/'+parcial+'/'+quimestre;
                                          $.ajax({
                                                url: url,
                                                success: function(response)
                                                {
                                                    $.each(response, function(index, objeto){
                                                        $('#table').append('<tr><td>'+objeto.nombres+'</td><td><a href="enviar-libreta-individual-email/'+objeto.cedula+'/'+objeto.email+'/1/'+quimestre+'" class="btn btn-primary" style="color: white;"><i class="fas fa-clipboard"></i> PARCIAL 1</a></td><td><a class="btn btn-primary" style="color: white;"><i class="fas fa-clipboard"></i> PARCIAL 2</a></td></tr>');
                                                    });
                                                }
                                          });

                                          });
                                        </script>
@endsection
