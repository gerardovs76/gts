@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-12 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
          <h2 class="text-center" style="color: #fff;">
             VER TAREAS
          </h2>
          </div>
		<hr>
		@include('notas.partials.info')

        <div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
                    <th>NOMBRE PROF.</th>
                    <th>CURSO</th>
                    <th>PARALELO</th>
					<th>FECHA ENTREGA</th>
					<th>TIPO TAREA</th>
					<th>TITULO</th>
					<th>DESCRIPCIÓN</th>
                    <th>ARCHIVO</th>
                    <th>ELIMINAR</th>
				</tr>
			</thead>
			<tbody id="tbody">
				<tr>

				</tr>
			</tbody>
        </table>
    </div>


	<!--<div class="col-xs-12 col-sm-4">
    </div>-->
    @if(Auth::user()->isRole('alumno'))
	<script>
		$(document).ready(function(){

			$.get('tareas_matriculados', function(response){
                console.log(response);
				$.each(response, function(index, obj){
					var url = 'tareas/download/'+obj.archivo;
					$('#tbody').append('<tr><td>'+obj.nombre_profesor+'</td><td>'+obj.curso+'</td><td>'+obj.paralelo+'</td><td>'+obj.fecha_entrega+'</td><td>'+obj.tipo_tarea+'</td><td>'+obj.titulo+'</td><td>'+obj.descripcion+'</td><td><a  href='+url+'><i aling="center" class="fas fa-file-alt fa-2x"></i></a></td></tr>');

				});

			});
		});
    </script>
    @elseif(Auth::user()->isRole('profesor'))
    <script>
		$(document).ready(function(){

			$.get('tareas_matriculados', function(response){
                console.log(response);
				$.each(response, function(index, obj){
					var url = 'tareas/download/'+obj.archivo;
					$('#tbody').append('<tr><td>'+obj.nombre_profesor+'</td><td>'+obj.curso+'</td><td>'+obj.paralelo+'</td><td>'+obj.fecha_entrega+'</td><td>'+obj.tipo_tarea+'</td><td>'+obj.titulo+'</td><td>'+obj.descripcion+'</td><td><a  href='+url+'><i aling="center" class="fas fa-file-alt fa-2x"></i></a></td><td><a href="tareas/'+obj.id+'" class="btn btn-danger btn-sm">ELIMINAR</a></td></tr>');

				});

			});
		});
    </script>
    @elseif(Auth::user()->isRole('super-admin'))
    <script>
		$(document).ready(function(){
			$.get('tareas_matriculados', function(response){
                console.log(response);
				$.each(response, function(index, obj){
					var url = 'tareas/download/'+obj.archivo;
					$('#tbody').append('<tr><td>'+obj.nombre_profesor+'</td><td>'+obj.curso+'</td><td>'+obj.paralelo+'</td><td>'+obj.fecha_entrega+'</td><td>'+obj.tipo_tarea+'</td><td>'+obj.titulo+'</td><td>'+obj.descripcion+'</td><td><a  href='+url+'><i aling="center" class="fas fa-file-alt fa-2x"></i></a></td><td><a href="tareas/'+obj.id+'" class="btn btn-danger btn-sm">ELIMINAR</a></td></tr>');
				});

			});
		});
    </script>
    @endif
@endsection
