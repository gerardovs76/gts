@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">

		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			JUSTIFICACIÓN
		</h2>
        </div>



        <hr>
        {!! Form::open(['route' => 'inspeccion.store-inspeccion']) !!}
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
                                   {!! Form::select('especialidad', ['EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione la especialidad', 'id' => 'especialidad']) !!}
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
                                       {!!Form::button('<i class="fas fa-search"></i> RELIZAR BUSQUEDA', ['class' => 'btn btn-primary col-md-2', 'type' => 'button', 'id' => 'busqueda'])!!}
                                   </div>

                               </div>
                             <div class="table-responsive">
                               <table class="table table-striped table-bordered" width="100%" id="table">
                                   <thead>
                                       <tr>
                                           <th>NOMBRES</th>
                                           <th>CURSO</th>
                                           <th>PARALELO</th>
                                           <th>FECHA</th>
                                           <th>H1</th>
                                           <th>H2</th>
                                           <th>H3</th>
                                           <th>H4</th>
                                           <th>H5</th>
                                           <th>H6</th>
                                           <th>H7</th>
                                           <th>H8</th>
                                           <th>H9</th>
                                           <th>JUSTIFICACIÓN/EDICIÓN</th>
                                       </tr>
                                   </thead>

                               </table>
                            </div>
        {!!Form::close()!!}


        <script>
            $('#busqueda').on('click', function(){
                var curso = $('#curso').val();
                var paralelo = $('#paralelo').val();
                var parcial = $('#parcial').val();
                var quimestre = $('#quimestre').val();
                $.get('inspecciones-store/'+curso+'/'+paralelo+'/'+parcial+'/'+quimestre, function(response){
                    $.each(response, function(index, obj){
                        console.log(obj);
                        $('#table').append('<tbody><tr><td>'+obj.apellidos+' '+obj.nombres+'</td><td>'+obj.curso+'</td><td>'+obj.paralelo+'</td><td><strong>'+obj.fecha+'</strong></td><td>'+obj.h1+'</td><td>'+obj.h2+'</td><td>'+obj.h3+'</td><td>'+obj.h4+'</td><td>'+obj.h5+'</td><td>'+obj.h6+'</td><td>'+obj.h7+'</td><td>'+obj.h8+'</td><td>'+obj.h9+'</td><td><a href="inspeccion/'+obj.id+'/edit" class="btn btn-warning btn-sm"><i class="fa fa-paper-plane"></i> JUSTIFICACIÓN/EDICIÓN</a></td></tr></tbody>');
                    });

                });
            });
        </script>
@endsection
