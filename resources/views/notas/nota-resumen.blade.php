@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			RESUMEN DE TODAS LAS NOTAS INGRESADAS
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')
                    <div class="panel panel-primary">
                        <div class="panel panel-heading text-center">INGRESE LOS DATOS PARA LA BUSQUEDA</div>
                             <div class="panel panel-body">
                                        <div class="form-row">
                                            @if(Auth::user()->isRole('super-admin') || Auth::user()->isRole('dece') || Auth::user()->isRole('admin'))
                                            <div class="form-group col-md-4">
                                                 <strong>Curso: <br></strong>
                                                 <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                 {{ Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                                 </div>
                                                 </div>

                                                 <div class="form-group col-md-4">
                                                 <strong>Especialidad: <br></strong>
                                                      <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                 {{ Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'TECNICO AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-6' , 'id' => 'especialidad', 'placeholder' => 'Ingrese especialidad']) }}
                                                 </div>
                                                 </div>

                                                 <div class="form-group col-md-4">
                                                 <strong>Paralelo: <br></strong>
                                                 <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                 {{ Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
                                                 </div>
                                                 </div>
                                            @elseif(Auth::user()->isRole('profesor'))
                                            <div class="form-group col-md-4">
                                                 <strong>Curso: <br></strong>
                                                 <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                 {{ Form::select('curso',[], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                                 </div>
                                                 </div>

                                                 <div class="form-group col-md-4">
                                                 <strong>Especialidad: <br></strong>
                                                      <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                 {{ Form::select('especialidad',['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'TECNICO AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-6' , 'id' => 'especialidad', 'placeholder' => 'Ingrese especialidad']) }}
                                                 </div>
                                                 </div>

                                                 <div class="form-group col-md-4">
                                                 <strong>Paralelo: <br></strong>
                                                 <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                 {{ Form::select('paralelo',[], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
                                                 </div>
                                                 </div>
                                            @endif
                                                 <div class="form-group col-md-4">
                                                 <strong>Materia: <br></strong>
                                                 <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                 {{ Form::select('materia', ['materia' => 'MATERIA'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Materia', 'id' => 'materia']) }}
                                                 </div>
                                                 </div>

                                                 <div class="form-group col-md-4">
                                                 <strong>Quimestre: <br></strong>
                                                 <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                 {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el quimestre', 'id' => 'quimestre']) }}
                                                 </div>
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <strong>Parcial: <br></strong>
                                                 <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                 {{ Form::select('quimestre',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el parcial', 'id' => 'parcial']) }}
                                                 </div>
                                                 </div>
                                                 <div class="form-group col-md-4">
                                                 <strong>Tipo de tarea: <br></strong>
                                                 <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                 {{ Form::select('quimestre',['nota_ta' => 'TRABAJOS ACADEMICOS', 'nota_ti' => 'TAREAS INDIVIDUALES', 'nota_tg' => 'TAREAS GRUPALES', 'nota_le' => 'LECCIONES', 'nota_ev' =>  'EVALUACION', 'conducta' => 'CONDUCTA'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el tipo de tarea...', 'id' => 'tipoTarea']) }}
                                                 </div>
                                                 </div>
                                                   <div class="form-group col-md-12">
                                                   {!! Form::button('<i class="fas fa-clipboard"></i> REALIZAR BUSQUEDA', ['class' => 'btn btn-primary', 'id' => 'realizarBusqueda']) !!}
                                                 </div>
                                       </div>
                                     </div>
                                    </div>



                    <table class="table table-striped table-hover" id="tabla">
			<thead>
                <tr>
                    <th><strong>Nro</strong></th>
                    <th>DESCRIPCION</th>
                    <th>FECHA CREACION</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
			<tbody id="tableid">
				<tr>

				</tr>
			</tbody>
		</table>
    </div>
@if(Auth::user()->isRole('profesor'))
<script>
$(document).ready(function(){
    var url1 = 'notas/cargar-notas-profesor';
    $.ajax({
        url: url1,
        success: function(response)
        {
            $.each(response, function(index, obj){
                $('#curso').append('<option value="'+obj.curso+'">'+obj.curso+'</option>');
            });
        },
        error: function(error)
        {

        }
            });
        });
</script>
<script>
    $(document).ready(() => {
        var url2 = 'notas/cargar-notas-profesor-paralelo';
        $.ajax({
            url: url2,
            success: function(response)
            {
                $.each(response, function(index, obj){
                $('#paralelo').append('<option value="'+obj.paralelo+'">'+obj.paralelo+'</option>');
            });
            },
            error: function(error)
            {

            }
        });
    });
</script>
@endif
     <script>
        $('#paralelo').on('change', function() {
         var curso = $( "#curso option:selected" ).text();
         var paralelo  = $( "#paralelo option:selected" ).text();
         var url3 = 'buscar_notas/'+curso+'/'+paralelo;
         $.ajax({
             url: url3,
             success: function(data)
             {
                $('#materia').empty();
                    $('#materia').append('<option value="0" disable="true" selected="true">SELECCIONAR MATERIA</OPTION');
                    $.each(data, function(index, regenciesObj){
                    $('#materia').append('<option value="'+regenciesObj.id+'">'+ regenciesObj.materia +'</option>');
                    var materia = document.getElementById("materia").value;

               });
             },
             error: function(error)
             {

             }
         });
        });
        </script>
     <script>
         $('#realizarBusqueda').on('click', function(){
             var tipoTarea = $('#tipoTarea').val();
             var parcial = $('#parcial').val();
             var quimestre = $('#quimestre').val();
             var materia = $('#materia').val();
             var url4 = 'notas-resumen/'+tipoTarea+'/'+parcial+'/'+quimestre+'/'+materia;
             $.ajax({
                url: url4,
                success: function(response)
                {
            if($('#tipoTarea').val() == 'nota_ta')
            {   
                $('#tableid').empty();
                $.each(response, function(index, obj){
                   
                    $('#tableid').append('<tr><td><strong>'+(index + 1)+'</strong></td><td>'+obj.descripcion+'</td><td>'+obj.created_at+'</td><td style="width: 20px;"><a class="btn btn-danger" href="notas-delete-all-resumen/'+obj.descripcion+'/'+obj.created_at+'"><i class="fas fa-trash"></i> BORRAR TODAS ESTAS NOTAS PARA UN CURSO</a></td></tr>');
                });
            }else if($('#tipoTarea').val() == 'nota_ti')
            {
                $('#tableid').empty();
             $.each(response, function(index, obj){
                 $('#tableid').append('<tr><td><strong>'+(index + 1)+'</strong></td><td>'+obj.descripcion+'</td><td>'+obj.created_at+'</td></tr>');
             });
            }else if($('#tipoTarea').val() == 'nota_tg')
            {
                $('#tableid').empty();
             $.each(response, function(index, obj){
                 $('#tableid').append('<tr><td><strong>'+(index + 1)+'</strong></td><td>'+obj.descripcion+'</td><td>'+obj.created_at+'</td></tr>');
             });
            }else if($('#tipoTarea').val() == 'nota_le')
            {
                $('#tableid').empty();
             $.each(response, function(index, obj){
                 $('#tableid').append('<tr><td><strong>'+(index + 1)+'</strong></td><td>'+obj.descripcion+'</td><td>'+obj.created_at+'</td></tr>');
             });
            }else if($('#tipoTarea').val() == 'nota_ev')
            {
                $('#tableid').empty();
             $.each(response, function(index, obj){
                 $('#tableid').append('<tr><td><strong>'+(index + 1)+'</strong></td><td>'+obj.descripcion+'</td><td>'+obj.created_at+'</td></tr>');
             });
            }
            else if($('#tipoTarea').val() == 'conducta')
            {
                $('#tableid').empty();
             $.each(response, function(index, obj){
                 $('#tableid').append('<tr><td><strong>'+(index + 1)+'</strong></td><td>'+obj.descripcion+'</td><td>'+obj.created_at+'</td></tr>');
             });
            }

                },
                error: function(error)
                {

                }
             });
         });
     </script>

@endsection
