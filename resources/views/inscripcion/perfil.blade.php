@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			PERFIL INSCRIPCIÓN
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')
		
					
					{!! Form::open(['route' => 'supletorios.store']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<strong>Cedula: <br></strong>
									{!! Form::text('cedula', null, ['class' => 'form-control col-md-6', 'id' => 'cedula', 'placeholder' => 'Ingrese la cedula']) !!}
								</div>
								<div class="form-group col-md-4">
									<strong>Apellidos: <br></strong>
									{!! Form::text('apellidos',null, ['class' => 'form-control col-md-6', 'id' => 'apellidos', 'placeholder' => 'Ingrese los apellidos']) !!}
								</div>
								<div class="form-group col-md-8">

   									<button type="#" id="busqueda" class="btn btn-primary">BUSQUEDA</button>									
								</div>
								
							</div>
							
						</div>
					</div>        
                   <table class="table table-hover table-striped" id="tableid" style="display: none;" align="center">
					    <tbody>
					    
					    </tbody>
					</table>
	</div>
	<script>
		$('#busqueda').on('click', function(event){
			event.preventDefault();
			var cedula = $('#cedula').val();
			$.get('busqueda_perfil_cedula/'+cedula, function(data){
				console.log(data);
				$.each(data, function(inx, obj){
					$('#tableid').css("display", "block");
					$('#tableid').append('<tr><th><strong>Cedula:</strong></th><td>'+obj.cedula+'</td></tr><tr><th><strong>Nombres:</strong></th><td>'+obj.nombres+'</td></tr><tr><th><strong>Apellidos:</strong></th><td>'+obj.apellidos+'</td></tr><tr><th><strong>Edad:</strong></th><td>'+obj.edad+'</td></tr><tr><th><strong>Sexo:</strong></th><td>'+obj.sexo+'</td></tr><tr><th><strong>Representante:</strong></th><td>'+obj.info_representante+'</td></tr><tr><th><strong>Parentesco:</strong></th><td>'+obj.parentesco+'</td></tr><tr><th><strong>direccion:</strong></th><td>'+obj.direccion_representante+'</td></tr><tr><th><strong>Movil:</strong></th><td>'+obj.movil+'</td></tr><tr><th><strong>Convencional:</strong></th><td>'+obj.convencional+'</td></tr>');
					$('#busqueda').css("display", "none");

				});

			});

		});

		$('#busqueda').on('click', function(event){
			event.preventDefault();
			var apellidos = $('#apellidos').val();
			$.get('busqueda_perfil_apellidos/'+apellidos, function(data){
				console.log(data);
				$.each(data, function(inx, obj){
					$('#tableid').css("display", "block");
					$('#tableid').append('<tr><th><strong>Cedula:</strong></th><td>'+obj.cedula+'</td></tr><tr><th><strong>Nombres:</strong></th><td>'+obj.nombres+'</td></tr><tr><th><strong>Apellidos:</strong></th><td>'+obj.apellidos+'</td></tr><tr><th><strong>Edad:</strong></th><td>'+obj.edad+'</td></tr><tr><th><strong>Sexo:</strong></th><td>'+obj.sexo+'</td></tr><tr><th><strong>Representante:</strong></th><td>'+obj.info_representante+'</td></tr><tr><th><strong>Parentesco:</strong></th><td>'+obj.parentesco+'</td></tr><tr><th><strong>direccion:</strong></th><td>'+obj.direccion_representante+'</td></tr><tr><th><strong>Movil:</strong></th><td>'+obj.movil+'</td></tr><tr><th><strong>Convencional:</strong></th><td>'+obj.convencional+'</td></tr>')
					$('#busqueda').css("display", "none");

				});

			});

		});
	</script>
	@endsection