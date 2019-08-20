@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			PERFIL PROFESOR
		</h2>
		</div>

		<hr>

		@include('notas.partials.info')
		
	
					
					
					<div class="panel panel-primary" id="panel-perfil">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">
							<div class="form-group col-md-4">

						<strong>Cedula: <br></strong>
						<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
						{!! Form::text('cedula', null, ['class' => 'form-control col-md-8', 'placeholder' => 'Seleccione la cedula', 'id' => 'tipo_estudiante']) !!}
						</div>
					</div>
								<div class="form-group col-md-12">

   									<button type="#" id="busqueda" class="btn btn-primary col-md-2"><i class="fas fa-save"></i> BUSQUEDA</button>	

								</div>
								<div class="form-group col-md-12">

   								
   									<button type="#" id="boton" class="btn btn-primary col-md-2"><a href="{{ route('profesor.perfil') }}" ></a><i class="fas fa-print"></i> IMPRIMIR</button>

								</div>

								
							</div>
							
						</div>
					</div>        

                   <table class="table table-hover table-striped" id="tableid">
                   	<thead>
                   		<tr>
                   		<th>CEDULA</th>
                   		<th>NOMBRES Y APELLIDOS</th>
                   		<th>DIRECCION</th>
                   		<th>FECHA DE NAC</th>
                   		<th>CORREO</th>
                   		<th>TELEFONOS</th>
                   		<th>PERFIL DOCENTE</th>
                   		<th>ULTIMO TRABAJO</th>
                   		<th>CARGO</th>
                   		</tr>
                   	</thead>
					    <tbody>
					    
					    </tbody>
					</table>
					
	</div>

	<script>
		$('#busqueda').on('click', function(event){
			event.preventDefault();
			var cedula = $('#cedula').val();
			$.get('profesor_perfil_cedula/'+cedula, function(data){
				console.log(data);
				$.each(data, function(inx, obj){
					$('#tableid').css("display", "block");
					$('#tableid').append('<tr><td>'+obj.cedula+'</td><td>'+obj.nombres_apellidos+'</td><td>'+obj.direccion+'</td><td>'+obj.fecha_nacimiento+'</td><td>'+obj.correo+'</td><td>'+obj.movil+'<br>'+obj.convencional+'</td><td>'+obj.perfil_docente+'</td><td>'+obj.ultimo_trabajo+'</td><td>'+obj.cargo+'</td></tr>');
					$('#busqueda').css("display", "none");

				});

			});

		});

	</script>
	<script>
		$('#boton').on('click', function(){
			if($('#boton') != ''){

				$('#panel-perfil').css("display", "none");
					 window.print();
			}
        
     });

	</script>
	@endsection