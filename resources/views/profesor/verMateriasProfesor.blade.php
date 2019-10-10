@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			VER MATERIAS PROFESOR
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-group col-md-4">
						<strong>Cedula: <br></strong>
						<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
						{!! Form::text('cedula', null, ['class' => 'form-control col-md-8', 'id' => 'cedula']) !!}
						</div>
					</div>
							<div class="form-group col-md-10">

   									<button type="#" id="busqueda" class="btn btn-primary"><i class="fas fa-search"></i> BUSQUEDA</button>
								</div>
						</div>
					</div>
					<table class="table table-hover table-striped" id="tableid">
						<thead>
							<tr><th>NOMBRES</th>
							<th>MATERIA</th>
							<th>CURSO</th>
                            <th>PARALELO</th>
                            <th>ACCIONES</th></tr>
						</thead>
					    <tbody>

					    </tbody>
					</table>
					<script>
						$('#busqueda').on('click', function(event){
							event.preventDefault();
							var cedula = $('#cedula').val();

							$.get('ver_materias_profesor/'+cedula, function(response){
								$.each(response, function(index, obj){
									$('#tableid').append('<tr><td><strong>'+obj.nombres+'</strong></td><td><strong>'+obj.nombre_materia+'</strong></td><td><strong>'+obj.curso+'</strong></td><td><strong>'+obj.paralelo+'</strong></td><td><a href="/eliminar-materias/'+obj.id+'" class="btn btn-danger"><i class="fa fa-edit"></i>ELIMINAR MATERIA</a></td></tr>');
								});

							});

						});
					</script>
@endsection
