							<div class="panel panel-primary">
								<div class="panel panel-heading text-center">FICHA MEDICA DEL ALUMNO</div>
									<div class="panel panel-body">
										<div class="form-row">
							 				<div class="form-group col-sm-2">
							                    <strong>Cedula:</strong>
							                    <div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
							                    {!! Form::text('cedula', null, ['class' => 'form-control col-md-10' , 'id' => 'cedula', 'placeholder' => 'Ingrese la cedula de identidad', 'name' => 'cedula']) !!}
							                    </div>
							                </div>
							                    <div class="form-group col-md-2">
							                    <strong>Fecha:</strong>
							                    <div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
							                    {!! Form::date('fecha', null, ['class' => 'form-control col-md-10','id' => 'fecha', 'placeholder' => 'Seleccione la fecha']) !!}
							                    </div>
							            </div>
									</div>
								</div>
							</div>

							<div class="panel panel-primary">
								<div class="panel panel-heading text-center">DATOS DEL ALUMNO</div>
									<div class="panel panel-body">
										<div class="form-row">
											<div class="form-group col-sm-4">
												<strong>Nombres y apellidos: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('nombres_apellidos', null, ['class' => 'form-control col-md-10',  'id' => 'nombres_apellidos']) !!}
											</div>
										</div>

											<div class="form-group col-sm-4">
												<strong>Grado: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('curso', null, ['class' => 'form-control col-md-10', 'id' => 'curso']) !!}
											</div>
										</div>

											<div class="form-group col-sm-4">
												<strong>Paralelo: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('paralelo', null, ['class' => 'form-control col-md-10', 'id' => 'paralelo']) !!}
											</div>
										</div>

											<div class="form-group col-sm-4">
												<strong>Peso: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('peso', null, ['class' => 'form-control col-md-4']) !!}
											</div>
										</div>
											<div class="form-group col-sm-4">
												<strong>Sexo: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('sexo', null, ['class' => 'form-control col-md-10', 'id' => 'sexo']) !!}
											</div>
										</div>

											<div class="form-group col-sm-4">
												<strong>Edad: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('edad', null, ['class' => 'form-control col-md-4', 'id' => 'edad']) !!}
											</div>
										</div>

											<div class="form-group col-sm-4">
												<strong>Grupo sanguíneo: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('grupo_sanguineo', null, ['class' => 'form-control col-md-10']) !!}
											</div>
										</div>



											<div class="form-group col-sm-4">
												<strong>Talla: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('talla', null, ['class' => 'form-control col-md-4']) !!}
											</div>
										</div>

											<div class="form-group col-sm-10">
												<strong>Dirección domiciliaria completa y detallada: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
											{!! Form::text('direccion_completa', null, ['class' => 'form-control col-md-10']) !!}
											</div>
										</div>

											<div class="form-group col-sm-4">
												<strong>Presenta plan de vacunación acorde a su edad: <br></strong>
												<strong>SI:  </strong>
												{!! Form::checkbox('plan_vacunacion',"SI", ['class' => 'form-control col-sm-2']) !!}
												<strong>NO:  </strong>
												{!! Form::checkbox('plan_vacunacion',"NO", ['class' => 'form-control col-sm-2']) !!}
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-primary">
									<div class="panel panel-heading text-center">ENFERMEDADES QUE PADECE O PADECIÓ</div>
										<div class="panel panel-body">
											<div class="form-row">
												<div class="form-group col-md-4">
													<strong>Sarampión: </strong>

													{!! Form::checkbox('enfermedades_padece[]', "sarampion", ['class' => 'form-control col-sm-2']) !!}
												</div>
												<div class="form-group col-md-4">
													<strong>Varicela: </strong>

													{!! Form::checkbox('enfermedades_padece[]', "varicela", ['class' => 'form-control col-sm-2']) !!}
													</div>
												<div class="form-group col-md-4">
													<strong>Rubeola: </strong>

													{!! Form::checkbox('enfermedades_padece[]', "rubeola", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Paperas: </strong>

													{!! Form::checkbox('enfermedades_padece[]', "paperas", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Meningitis: </strong>

													{!! Form::checkbox('enfermedades_padece[]', "meningitis", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Tos convulsiva: </strong>

													{!! Form::checkbox('enfermedades_padece[]', "tos conlvusiva", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Asma: </strong>

													{!! Form::checkbox('enfermedades_padece[]', "asma", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Otitis: </strong>

													{!! Form::checkbox('enfermedades_padece[]', "otitis", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Sinusitis: </strong>
													{!! Form::checkbox('enfermedades_padece[]', "sinusitis", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Tuberculosis: </strong>
													{!! Form::checkbox('enfermedades_padece[]', "tuberculosis", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Hepatitis: </strong>
													{!! Form::checkbox('enfermedades_padece[]', "hepatitis", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Diabetes: </strong>
													{!! Form::checkbox('enfermedades_padece[]', "diabetes", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Hipertensión: </strong>
													{!! Form::checkbox('enfermedades_padece[]', "hipertension", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Epilepsia: </strong>
													{!! Form::checkbox('enfermedades_padece[]', "epilepsia", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Convulsiones: </strong>
													{!! Form::checkbox('enfermedades_padece[]', "convulsiones", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Vertigos/mareos: </strong>
													{!! Form::checkbox('enfermedades_padece[]', "vertigos/mareos", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Hernias: </strong>
													{!! Form::checkbox('enfermedades_padece[]', "hernias", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Migrañas: </strong>
													{!! Form::checkbox('enfermedades_padece[]', "migrañas", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Fiebre reumática: </strong>
													{!! Form::checkbox('enfermedades_padece[]', "fiebre reumatica", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-4">
													<strong>Problemas neurologicos: </strong>
													{!! Form::checkbox('enfermedades_padece[]', "problemas neurologicos", ['class' => 'form-control col-sm-2']) !!}
													</div>

													<div class="form-group col-md-6">
                                                    <strong>Otros: <br></strong>
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                                    {!! Form::text('enfermedades_padece[]', null, ['class' => 'form-control col-md-6']) !!}
                                        </div>
									</div>
								</div>
							</div>
						</div>


							<div class="panel panel-primary">
								<div class="panel panel-heading text-center">REACCIÓN ALÉRGICA</div>
									<div class="panel panel-body">
										<div class="form-row">
											<div class="form-group col-md-4">
												<strong>Alimentos: <br></strong>
												<strong>SI: </strong>
												{!! Form::checkbox('reaccion_alergica_alimentos[]', "SI", ['class' => 'form-control col-md-4']) !!}
												<strong>NO: </strong>
												{!! Form::checkbox('reaccion_alergica_alimentos[]', "NO", ['class' => 'form-control col-md-4']) !!}
												<br>
												<strong>En caso de ser SI especifique: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('reaccion_alergica_alimentos[]', null, ['class' => 'form-control col-md-10']) !!}
										</div>
									</div>
										<div class="form-group col-md-4">
											<strong>Medicamentos: <br></strong>
												<strong>SI: </strong>
												{!! Form::checkbox('reaccion_alergica_medicamentos[]', "SI", ['class' => 'form-control col-md-4']) !!}
												<strong>NO: </strong>
												{!! Form::checkbox('reaccion_alergica_medicamentos[]', "NO", ['class' => 'form-control col-md-4']) !!}
												<br>
												<strong>En caso de ser SI especifique: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('reaccion_alergica_medicamentos[]', null, ['class' => 'form-control col-md-10']) !!}

										</div>
									</div>
										<div class="form-group col-md-4">
											<strong>Insectos: <br></strong>
												<strong>SI: </strong>
												{!! Form::checkbox('reaccion_alergica_insectos[]', "SI", ['class' => 'form-control col-md-4']) !!}
												<strong>NO: </strong>
												{!! Form::checkbox('reaccion_alergica_insectos[]', "NO", ['class' => 'form-control col-md-4']) !!}
												<br>
												<strong>En caso de ser SI especifique: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('reaccion_alergica_insectos[]', null, ['class' => 'form-control col-md-10']) !!}

										</div>
									</div>
										<div class="form-group col-md-4">
											<strong>Otros: <br></strong>
												<strong>SI: </strong>
												{!! Form::checkbox('reaccion_alergica_otros[]', "SI", ['class' => 'form-control col-md-4']) !!}
												<strong>NO: </strong>
												{!! Form::checkbox('reaccion_alergica_otros[]', "NO", ['class' => 'form-control col-md-4']) !!}
												<br>
												<strong>En caso de ser SI especifique: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('reaccion_alergica_otros[]', null, ['class' => 'form-control col-md-10']) !!}

										</div>
									</div>
										<div class="form-group col-md-4">
											<strong>Esta bajo algunos tratamientos: <br></strong>
												<strong>SI: </strong>
												{!! Form::checkbox('bajo_tratamiento[]', "SI", ['class' => 'form-control col-md-4']) !!}
												<strong>NO: </strong>
												{!! Form::checkbox('bajo_tratamiento[]', "NO", ['class' => 'form-control col-md-4']) !!}
												<br>
												<strong>En caso de ser SI especifique: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('bajo_tratamiento[]', null, ['class' => 'form-control col-md-10']) !!}
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="panel panel-primary">
								<div class="panel panel-heading text-center">ALGUIEN DE SU FAMILIA PADECE Y/O PADECIÓ:</div>
									<div class="panel panel-body">
										<div class="form-row">
											<div class="form-group col-md-4">
												<strong>Hipertensión arterial: </strong>
												{!! Form::checkbox('p_padecio[]', "hipertension arterial", ['class' => 'form-control col-md-4']) !!}

											</div>

											<div class="form-group col-md-4">

												<strong>Diabetes: </strong>
												{!! Form::checkbox('p_padecio[]', "diabetes", ['class' => 'form-control col-md-4']) !!}

											</div>
											<div class="form-group col-md-4">
												<strong>Epilepsia: </strong>
												{!! Form::checkbox('p_padecio[]', "epilepsia", ['class' => 'form-control col-md-4']) !!}


											</div>
											<div class="form-group col-md-4">
												<strong>Enfermedad renal: </strong>
												{!! Form::checkbox('p_padecio[]', "enfermedad renal", ['class' => 'form-control col-md-4']) !!}


											</div>
											<div class="form-group col-md-4">
												<strong>Obesidad: </strong>
												{!! Form::checkbox('p_padecio[]', "obesidad", ['class' => 'form-control col-md-4']) !!}


											</div>
											<div class="form-group col-md-4">
												<strong>Depresion: </strong>
												{!! Form::checkbox('p_padecio[]', "depresion", ['class' => 'form-control col-md-4']) !!}


											</div>
											<div class="form-group col-md-8">
												<strong>Otros: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('p_padecio[]', null, ['class' => 'form-control col-md-4']) !!}

												</div>
											</div>
										</div>
									</div>
							</div>
							<div class="panel panel-primary">
								<div class="panel panel-heading text-center">COLOCAR EN ORDEN DE PRIORIDAD PARA AVISAR EN CASO DE EMERGENCIA</div>
									<div class="panel panel-body">
										<div class="form-row">
											<div class="form-group col-md-4">
												<strong>#1 Nombres completos: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('nombres_completos_1', null, ['class' => 'form-control col-md-8']) !!}
											</div>
										</div>
											<div class="form-group col-md-4">
												<strong>#2 Nombres completos: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('nombres_completos_2', null, ['class' => 'form-control col-md-8']) !!}
											</div>
										</div>
											<div class="form-group col-md-4">
												<strong>#3 Nombres completos: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('nombres_completos_3', null, ['class' => 'form-control col-md-8']) !!}
											</div>
										</div>
											<div class="form-group col-md-4">
												<strong>#1 Telef. Fijo: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('telef_fijo_1', null, ['class' => 'form-control col-md-8']) !!}
											</div>
										</div>
											<div class="form-group col-md-4">
												<strong>#2 Telef. Fijo: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('telef_fijo_2', null, ['class' => 'form-control col-md-8']) !!}
											</div>
										</div>
											<div class="form-group col-md-4">
												<strong>#3 Telef. Fijo: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('telef_fijo_3', null, ['class' => 'form-control col-md-8']) !!}
											</div>
										</div>
											<div class="form-group col-md-4">
												<strong>#1 Móvil: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('movil_1', null, ['class' => 'form-control col-md-8']) !!}
											</div>
										</div>
											<div class="form-group col-md-4">
												<strong>#2 Móvil: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('movil_2', null, ['class' => 'form-control col-md-8']) !!}
											</div>
										</div>
											<div class="form-group col-md-4">
												<strong>#3 Móvil: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('movil_3', null, ['class' => 'form-control col-md-8']) !!}
											</div>
										</div>
											<div class="form-group col-md-4">
												<strong>#1 Parentesco: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('parentesco_1', null, ['class' => 'form-control col-md-8']) !!}
											</div>
										</div>
											<div class="form-group col-md-4">
												<strong>#2 Parentesco: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('parentesco_2', null, ['class' => 'form-control col-md-8']) !!}
											</div>
										</div>
											<div class="form-group col-md-4">
												<strong>#3 Parentesco: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('parentesco_3', null, ['class' => 'form-control col-md-8']) !!}
										</div>
									</div>
									</div>
								</div>
							</div>

							<div class="panel panel-primary">
								<div class="panel panel-heading text-center">DATOS DE LA MADRE</div>
									<div class="panel panel-body">
										<div class="form-row">
											<div class="form-group col-md-4">
												<strong>Apellidos y nombres completos: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('apellidos_nombres_madre', null, ['class' => 'form-control col-md-8', 'id' => 'apellidos_nombres_madre']) !!}
										</div>
									</div>
											<div class="form-group col-md-4">
												<strong>Dirección completa y detallada: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('direccion_madre', null, ['class' => 'form-control col-md-8']) !!}
										</div>
									</div>
											<div class="form-group col-md-4">
												<strong>Teléf. fijo: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('telefono_madre', null, ['class' => 'form-control col-md-8', 'id' => 'telefono_madre']) !!}
										</div>
									</div>
											<div class="form-group col-md-4">
												<strong>Celular: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('celular_madre', null, ['class' => 'form-control col-md-8', 'id' => 'celular_madre']) !!}
										</div>
									</div>

										</div>

									</div>
							</div>

							<div class="panel panel-primary">
								<div class="panel panel-heading text-center">DATOS DEL PADRE</div>
									<div class="panel panel-body">
										<div class="form-row">
											<div class="form-group col-md-4">
												<strong>Apellidos y nombres completos: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('apellidos_nombres_padre', null, ['class' => 'form-control col-md-8', 'id' => 'apellidos_nombres_padre']) !!}
										</div>
									</div>
											<div class="form-group col-md-4">
												<strong>Dirección completa y detallada: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('direccion_padre', null, ['class' => 'form-control col-md-8']) !!}
										</div>
									</div>
											<div class="form-group col-md-4">
												<strong>Teléf. fijo: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('telefono_padre', null, ['class' => 'form-control col-md-8', 'id' => 'telefono_padre']) !!}
										</div>
									</div>
											<div class="form-group col-md-4">
												<strong>Celular: <br></strong>
												<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
												{!! Form::text('celular_padre', null, ['class' => 'form-control col-md-8', 'id' => 'celular_padre']) !!}
										</div>
									</div>

										</div>

									</div>
							</div>
							{!!Form::button('<i class="far fa-save"></i> GUARDAR', ['class' => 'btn btn-primary form-control'])!!}

<script>
	$('#fecha').on('change', function(event){
		event.preventDefault();
		var cedula = $('#cedula').val();
		console.log(cedula);
		$.get('medico_alumno/'+cedula, function(data){
			$.each(data, function(index, obj){
				$('#nombres_apellidos').val(obj.nombres);
				$('#curso').val(obj.curso);
				$('#paralelo').val(obj.paralelo);
				$('#sexo').val(obj.sexo);
				$('#edad').val(obj.edad);
				$('#apellidos_nombres_madre').val(obj.nombres_madre);
				$('#telefono_madre').val(obj.telefono_madre);
				$('#celular_madre').val(obj.celular_madre);
				$('#apellidos_nombres_padre').val(obj.nombres_padre);
				$('#telefono_padre').val(obj.telefono_padre);
				$('#celular_padre').val(obj.celular_padre);

			});

		});

	});



</script>














































































{{-- <script>
				$('#cedula').on('change', function(event) {
		event.preventDefault();
		var matriculado = event.target.value;
		console.log(matriculado);

		$.get('medico_alumnos/'+ matriculado , function(data) {
    	$.each(data, function(idx, opt) {
    		console.log(opt);
    		$('#idalumno').append('<tr><th><strong>ALUMNO: '+opt.nombres+'</strong></th></tr>');
    		$('#idcurso').append('<tr><th><strong>CURSO: '+opt.curso+'</strong></th></tr>');
   			$('#tableid').append('<tr><td><input type="text" name="sintomas" id="sintomas" class="col-sm-4" placeholder="Ingrese los sintomas..."></td></tr><tr><td><input type="text" name="indicacion" id="indicacion" class="col-sm-4" placeholder="Ingrese la indicacion..."></td></tr><tr><td><textarea name="observacion_medica" id="observacion_medica" rows="5" cols="60" placeholder="Ingrese observacion..."></textarea></tr></td><tr><td><input type="hidden" name="matriculados_id" id="matriculados_id" value='+opt.id+'></td></tr>');
   	   });
	}
	,
	'json');
	});

</script> --}}

