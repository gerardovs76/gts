@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			ASIGNAR NOTAS PARA MOSTRAR ALUMNOS NUEVOS
		</h2>
		</div>

                <hr>
                @include('notas.partials.error')
		@include('notas.partials.info')
					{!! Form::open(['route' => 'notas.asignar-notas-alumnos-nuevos-store']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
                                <div class="form-group col-md-4">
                                    <strong>1.- Curso: <br></strong>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                            {{ Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Seleccione el curso...']) }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <strong>2.- Paralelo: <br></strong>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                            {{ Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Seleccione el paralelo']) }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <strong>3.- Alumnos: <br></strong>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                {{ Form::select('alumnos', [], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione los alumnos', 'id' => 'alumnos']) }}
                                            </div>
                                        </div>
                                    <div class="form-group col-md-4">
                                        <strong>4.- Materia: <br></strong>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                {{ Form::select('materia', [], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione la materia', 'id' => 'materia']) }}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <strong>5.- Quimestre: <br></strong>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el quimestre', 'id' => 'quimestre']) }}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <strong>6.- Parcial: <br></strong>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                {{ Form::select('parcial',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el parcial', 'id' => 'parcial']) }}
                                            </div>
                                        </div>
								<div class="form-group col-md-10">
   									{!! Form::button('<i class="fas fa-print"></i> ENVIAR', ['class' => 'btn btn-primary',  'id' => 'verNotas', 'type' => 'submit']) !!}
								</div>

							</div>

						</div>
					</div>
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
             $('#paralelo').on('change', function() {
                 var curso = $( "#curso option:selected" ).text();
                 var paralelo  = $( "#paralelo option:selected" ).text();
                 var urlMaterias = 'buscar_notas/'+curso+'/'+paralelo;
                 var urlAlumnos = 'buscar_alumnos2/'+curso+'/'+paralelo;
                 $.ajax({
                     url: urlMaterias,
                     success: function(data)
                     {
                                 $('#materia').empty();
                             $.each(data, function(index, regenciesObj){
                                 $('#materia').append('<option value="'+regenciesObj.id+'">'+ regenciesObj.materia +'</option>');
                                 var materia = document.getElementById("materia").value;

                              });
                     }
                 });
                $.ajax({
                    url:urlAlumnos,
                    success: function(data)
                    {
                        $('#alumnos').empty();
                            $.each(data, function(index,obj){
                                $('#alumnos').append('<option value='+obj.id+'>'+obj.nombres+'</option>');
                            });
                    }
                })
             });
             </script>
@endsection
