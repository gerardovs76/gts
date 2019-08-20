									<div class="panel panel-primary">
										<div class="panel-heading text-center">PROCESO DE SEGUIMIENTO INDIVIDUAL</div>
											
										<div class="panel-body">
										
										<div class="form-row">
											<div class="form-group col-md-4">
											<strong>Cedula: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('cedula', null, ['class' => 'form-control col-md-8' , 'id' => 'cedula']) !!}
											</div>
										</div>
											<div class="form-group col-md-4">
											<strong>Nombres del estudiante: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
											{!! Form::text('nombres', null, ['class' => 'form-control col-md-8', 'id' => 'nombres']) !!}

											</div>
										</div>
											<div class="form-group col-md-4">
											<strong>Apellidos del estudiante: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
											{!! Form::text('apellidos', null, ['class' => 'form-control col-md-8', 'id' => 'apellidos']) !!}
											</div>
									</div>
											<div class="form-group col-md-4">
											<strong>Fecha de nacimiento del estudiante: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
											{!! Form::date('fecha_nacimiento', null, ['class' => 'form-control col-md-8', 'id' => 'fecha_nacimiento'])!!}
											</div>
									</div>
											<div class="form-group col-md-4">
											<strong>Año de E.B O BGU: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
											{!! Form::text('año_eb_bgu', null, ['class' => 'form-control col-md-8', 'id' => 'curso']) !!}
											</div>
									</div>
											<div class="form-group col-md-4">
											<strong>Nombre del representante legal: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
											{!! Form::text('nombre_representante', null, ['class' => 'form-control col-md-8', 'id' => 'nombre_representante']) !!}
											</div>
									</div>
											<div class="form-group col-md-4">
											<strong>C.I del representante: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('cedula_representante', null, ['class' => 'form-control col-md-8', 'id' => 'cedula_representante']) !!}
											</div>
									</div>
											<div class="form-group col-md-4">
											<strong>Numeros Telef: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-phone-square"></i></span>
											{!! Form::text('numero_telefono', null, ['class' => 'form-control col-md-8', 'id' => 'numero_telefono']) !!}
										</div>
										<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
											{!! Form::text('numero_movil', null, ['class' => 'form-control col-md-8', 'id' => 'numero_movil']) !!}
											</div>
									</div>
											<div class="form-group col-md-4">
											<strong>Dirección Domiciliaria:: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
											{!! Form::text('paralelo', null, ['class' => 'form-control col-md-8', 'id' => 'direccion']) !!}
											</div>
									</div>
											<div class="form-group col-md-4">
											<strong>Presenta NEE: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('presenta_nee', null, ['class' => 'form-control col-md-8']) !!}
											</div>
									</div>
											<div class="form-group col-md-4">
											<strong>Estructura familiar: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('estructura_familiar', null, ['class' => 'form-control col-md-8']) !!}
											</div>
									</div>
											<div class="form-group col-md-4">
											<strong>Nombre del profesional: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('nombre_profesional', null, ['class' => 'form-control col-md-8']) !!}
											</div>
									</div>
											<div class="form-group col-md-4">
											<strong>Remitido por: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('remitido_por', null, ['class' => 'form-control col-md-8']) !!}
											</div>
									</div>
											<div class="form-group col-md-4">
											<strong>Fecha de seguimiento: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::date('fecha_seguimiento', null, ['class' => 'form-control col-md-8']) !!}
											</div>
									</div>
											<div class="form-group col-md-4">
											<strong>Breve descripción del problema: <br></strong>
									<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('descripcion_problema', null, ['class' => 'form-control col-md-8']) !!}
											</div>
									</div>
									<div class="form-group col-md-10">
												{!! Form::button('AGREGAR DETALLE', ['class' => 'btn btn-primary', 'id' => 'agregarDetalle'] )  !!}
												      </div>
											<input type="hidden" id="inscripcion" name="inscripcion">
										</div>
									</div>
									</div>

									<div class="panel panel-primary" style="display: none;" id="formularioDetalle">
										<div class="panel panel-heading text-center">DETALLE</div>
											<div class="panel panel-body">
												<div class="form-row">
													<div class="form-group col-md-4">
														<strong>Fecha: <br></strong>
													{!! Form::date('fecha', null, ['class' => 'form-control col-md-8']) !!}	
													</div>
													<div class="form-group col-md-4">
														<strong>Acción realizada: <br></strong>
													{!! Form::text('accion_realizada', null, ['class' => 'form-control col-md-8']) !!}	
													</div>

													<div class="form-group col-md-4">
														<strong>Sugerencias y observaciones: <br></strong>
													{!! Form::text('sugerencias_observaciones', null, ['class' => 'form-control col-md-8']) !!}
														
													</div>

													<div class="form-group col-md-4">
														<strong>Responsable: <br></strong>
														{!! Form::text('responsable', null, ['class' => 'form-control col-md-8']) !!}
													</div>
													<div class="form-group col-md-10">
													{!! Form::button('GUARDAR', ['class' => 'btn btn-primary','type' => 'submit', 'id' => 'agregarDetalle'] )  !!}
														
													</div>
													
												</div>
											</div>
										</div>



<script>
      $('#cedula').on('change', function(event){
      	event.preventDefault();
       var cedula = event.target.value;
       console.log(cedula);

       $.get('buscar_dece/'+cedula, function(data){
       	console.log(data);
       	$.each(data, function(index, objeto){
       		$('#nombres').val(objeto.nombres);
       		$('#apellidos').val(objeto.apellidos);
       		$('#fecha_nacimiento').val(objeto.fecha_nacimiento);
       		$('#curso').val(objeto.curso);
       		$('#nombre_representante').val(objeto.nombres_representante);
       		$('#cedula_representante').val(objeto.cedula_representante);
       		$('#numero_telefono').val(objeto.numero_telefono);
       		$('#numero_movil').val(objeto.numero_movil);
       		$('#direccion').val(objeto.direccion);

       	});
       });
   });

      $('#agregarDetalle').on('click', function(){

      	$('#formularioDetalle').css("display", "block");
      	$('#agregarDetalle').css("display", "none");

      });

 
</script>


