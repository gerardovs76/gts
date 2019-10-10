@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
          <h2 class="text-center" style="color: #fff;">
             VER TAREAS
          </h2>
          </div>
		<hr>
		{{--@include('notas.partials.info')--}}

		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>NOMBRE PROF.</th>
					<th>FECHA ENTREGA</th>
					<th>TIPO TAREA</th>
					<th>TITULO</th>
					<th>DESCRIPCIÓN</th>
					<th>ARCHIVO</th>
				</tr>
			</thead>
			<tbody id="tbody">
				<tr>

				</tr>
			</tbody>
		</table>


	<!--<div class="col-xs-12 col-sm-4">
	</div>-->
	<script>
		$(document).ready(function(){

			$.get('tareas_matriculados', function(response){
				$.each(response, function(index, obj){
                    console.log(obj);
					var url = 'tareas/download/'+obj.archivo;
					console.log(url);
					$('#tbody').append('<tr><td>'+obj.profesor+'</td><td>'+obj.fecha_entrega+'</td><td>'+obj.tipo_tarea+'</td><td>'+obj.titulo+'</td><td>'+obj.descripcion+'</td><td><a  href='+url+'><i aling="center" class="fas fa-file-alt fa-2x"></i></a></td></tr>');






				});

			});
		});

	</script>
@endsection
