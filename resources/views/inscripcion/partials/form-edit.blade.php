
	<div class="form-row">
		<div class="form-group col-md-4">

						<strong>Tipo estudiante: <br></strong>
						<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
						{!! Form::select('tipo_estudiante',['NUEVO' => 'NUEVO', 'ANTIGUO' => 'ANTIGUO'], null, ['class' => 'form-control col-md-8', 'placeholder' => 'Seleccione el tipo de estudiante', 'id' => 'tipo_estudiante']) !!}
						</div>
					</div>
					 <div class="form-group col-md-4">
            <strong>Codigo antiguo: <br></strong>
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
            {!! Form::text('codigo_antiguo', null, ['class' => 'form-control col-md-8', 'id' => 'codigo_antiguo']) !!}
            </div>
          </div>
		
	
		


			
		</div>
		<div id="formularioAntiguo">
			<div class="panel panel-success">
			<div class="panel panel-heading text-center">DATOS DEL ALUMNO</div>
				<div class="panel panel-body" id="panelBody">
					
					<div class="form-group col-md-4">
						<strong>Cedula: <br></strong>
						<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
						{!! Form::text('cedula', null, ['class' => 'form-control col-md-8']) !!}
						</div>
					</div>
					<div class="form-group col-md-4">
						<strong>Nombres: <br></strong>
						<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
						{!! Form::text('nombres', null, ['class' => 'form-control col-md-8', 'id' => 'nombres']) !!}
						</div>
					</div>
					<div class="form-group col-md-4">
						<strong>Apellidos: <br></strong>
						<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
						{!! Form::text('apellidos', null, ['class' => 'form-control col-md-8', 'id' => 'apellidos']) !!}
						</div>
					</div>
					<div class="form-group col-md-4">
						<strong>Fecha nacimiento: <br></strong>
						<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
						{!! Form::date('fecha_nacimiento', null, ['class' => 'form-control col-md-4']) !!}
						</div>
					</div>
					<div class="form-group col-md-4">
						<strong>Curso al que desea inscribir: <br></strong>
						<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-school"></i></span>
						{!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6', 'id' => 'curso']) !!}
						</div>
					</div>
					<div class="form-group col-md-4">
						<strong>Dirección alumno <br></strong>
						<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-address-card"></i></span>
						{!! Form::text('direccion_alumno', null, ['class' => 'form-control col-md-6']) !!}
						</div>
					</div>
					<div class="form-group col-md-4">
						<strong>Sexo: <br></strong>
						<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
						{!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['class' => 'form-control col-md-4']) !!}
						</div>
						</div>
						<div class="form-group col-md-4">
						<strong>Codigo nuevo:  <br></strong>
						<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-address-card"></i></span>
						{!! Form::text('codigo_nuevo', null, ['class' => 'form-control col-md-6', 'id' => 'codigo_nuevo', 'readonly']) !!}
						</div>
					</div>	
					</div>
				</div>

						<button type="button" id="bottonAparecer" name="bottonAparecer" class="btn btn-success"><i class="fas fa-plus"> Agregar Representante</i></button>
			</div>
	
	<div id="formularioR" class="form-row" style="display: none;">
		<div class="panel panel-success">
			<div class="panel panel-heading text-center">DATOS REPRESENTANTE</div>
			<div class="panel panel-body">
		<div class="form-group col-md-4">
	<strong>Seleccione al Representante: <br></strong>
<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-user-friends"></i></span>
	{!! Form::select('representante',['PAPA' => 'PAPA', 'MAMA' => 'MAMA'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione al representante...']) !!}
	</div>
	</div>
		<div class="form-group col-md-4">
	<strong>Tipo persona: <br></strong>
<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-book-reader"></i></span>
	{!! Form::select('tipo_persona',['NATURAL' => 'NATURAL', 'JURÍDICA' => 'JURÍDICA'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de persona...']) !!}
	</div>
	</div>
	<div class="form-group col-md-4">
	<strong>Cedula del representante: <br></strong>
<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
	{!! Form::text('cedrepresentante', null, ['class' => 'form-control', 'id' => 'cedula_representante']) !!}
	</div>
	</div>
	<div class="form-group col-md-4">
	<strong>Nombres representante: <br></strong>
<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
	{!! Form::text('nombres_representante', null, ['class' => 'form-control', 'id' => 'nombres_representante']) !!}
	</div>
	</div>
	<div class="form-group col-md-4">
	<strong>Dirección: <br></strong>
	<div class="input-group-prepend">
	<span class="input-group-text"><i class="fas fa-address-card"></i></span>
	{!! Form::text('direccion_representante', null, ['class' => 'form-control']) !!}
	</div>
	</div>
	<div class="form-group col-md-4">
	<strong>Sector: <br></strong>
	<div class="input-group-prepend">
			<span class="input-group-text"><i class="fas fa-address-card"></i></span>
	{!! Form::select('sector',['SUR' => 'SUR', 'NORTE' => 'NORTE', 'CENTRO' => 'CENTRO', 'VALLE' => 'VALLE'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el sector...']) !!}
	</div>
		</div>
	<div class="form-group col-md-4">
	<strong>Telefono: <br></strong>
	<div class="input-group-prepend">
			<span class="input-group-text"><i class="fas fa-phone-square"></i></span>
	{!! Form::number('convencional', null, ['class' => 'form-control']) !!}
	</div>
		</div>
	<div class="form-group col-md-4">
	<strong>Celular: <br></strong>
		<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
	{!! Form::number('movil', null, ['class' => 'form-control']) !!}
	</div>
			</div>
	<div class="form-group col-md-4">
	<strong>F. nacimiento: <br></strong>
<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
	{!! Form::date('fn_representante', null, ['class' => 'form-control']) !!}
	</div>
	</div>
	<div class="form-group col-md-4">
	<strong>Edad: <br></strong>
<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-pager"></i></span>
	{!! Form::text('edad_representante', null, ['class' => 'form-control']) !!}
	</div>
	</div>
	<div class="form-group col-md-4">
	<strong>Correo: <br></strong>
<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-at"></i></span>
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
	</div>
	</div>
	<div class="form-group col-md-4">
	<strong>Profesión: <br></strong>
	<div class="input-group-prepend">
			<span class="input-group-text"><i class="fas fa-user-tie"></i></span>
	{!! Form::text('profesion', null, ['class' => 'form-control']) !!}
	</div>
		</div>
	<div class="form-group col-md-4">
	<strong>Ocupación: <br></strong>
<div class="input-group-prepend">
		<span class="input-group-text"><i class="fas fa-search-location"></i></span>
	{!! Form::text('ocupacion', null, ['class' => 'form-control']) !!}
	</div>
	</div>
	<div class="form-group col-md-10">
<button type="button" id="bottonAparecer3" name="bottonAparecer3" class="btn btn-success"><i class="fas fa-plus">AGREGAR PADRE</i></button>
	     </div>
       </div>	
   </div>
</div>
	
		<div id="formularioPadre" class="form-row" style="display: none;">
			<div class="panel panel-success">
				<div class="panel panel-heading text-center">DATOS DEL PADRE</div>
					<div class="panel panel-body">
										<div class="form-group col-md-4">
										<strong>Cedula del padre: <br></strong>
									<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
										{!! Form::text('cedula_padre', null, ['class' => 'form-control']) !!}
										</div>
										</div>
										<div class="form-group col-md-4">
										<strong>Apellidos: <br></strong>
									<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
										{!! Form::text('apellidos_padre', null, ['class' => 'form-control']) !!}
										</div>
										</div>
										<div class="form-group col-md-4">
										<strong>Nombres: <br></strong>
									<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
										{!! Form::text('nombres_padre', null, ['class' => 'form-control']) !!}
										</div>
										</div>
										<div class="form-group col-md-4">
										<strong>Dirección: <br></strong>
										<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-address-card"></i></span>
										{!! Form::text('direccion_padre', null, ['class' => 'form-control']) !!}
										</div>
										</div>
										<div class="form-group col-md-4">
										<strong>Telefono: <br></strong>
										<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-phone-square"></i></span>
										{!! Form::number('telefono_padre', null, ['class' => 'form-control']) !!}
										</div>
											</div>
										<div class="form-group col-md-4">
										<strong>Celular: <br></strong>
											<div class="input-group-prepend">
													<span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
										{!! Form::number('celular_padre', null, ['class' => 'form-control']) !!}
										</div>
												</div>
										<div class="form-group col-md-4">
										<strong>Correo: <br></strong>
									<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-at"></i></span>
										{!! Form::text('correo_padre', null, ['class' => 'form-control']) !!}
										</div>
										</div>
										<div class="form-group col-md-4">
										<strong>Profesión: <br></strong>
										<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user-tie"></i></span>
										{!! Form::text('profesion_padre', null, ['class' => 'form-control']) !!}
										</div>
											</div>
										<div class="form-group col-md-4">
										<strong>Ocupación: <br></strong>
									<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-search-location"></i></span>
										{!! Form::text('ocupacion_padre', null, ['class' => 'form-control']) !!}
										</div>
										</div>
										<div class="form-group col-md-10">
									<button type="button" id="bottonAparecer4" name="bottonAparecer4" class="btn btn-success"><i class="fas fa-plus">AGREGAR MADRE</i></button>
										</div>
			</div>
		</div>
	</div>


	<div id="formularioMadre" class="form-row" style="display: none;">
			<div class="panel panel-success">
				<div class="panel panel-heading text-center">DATOS DE LA MADRE</div>
					<div class="panel panel-body">
										<div class="form-group col-md-4">
										<strong>Cedula de la madre: <br></strong>
									<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
										{!! Form::text('cedula_madre', null, ['class' => 'form-control']) !!}
										</div>
										</div>
										<div class="form-group col-md-4">
										<strong>Apellidos: <br></strong>
									<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
										{!! Form::text('apellidos_madre', null, ['class' => 'form-control']) !!}
										</div>
										</div>
										<div class="form-group col-md-4">
										<strong>Nombres: <br></strong>
									<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
										{!! Form::text('nombres_madre', null, ['class' => 'form-control']) !!}
										</div>
										</div>
										<div class="form-group col-md-4">
										<strong>Dirección: <br></strong>
										<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-address-card"></i></span>
										{!! Form::text('direccion_madre', null, ['class' => 'form-control']) !!}
										</div>
										</div>
										<div class="form-group col-md-4">
										<strong>Telefono: <br></strong>
										<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-phone-square"></i></span>
										{!! Form::number('telefono_madre', null, ['class' => 'form-control']) !!}
										</div>
											</div>
										<div class="form-group col-md-4">
										<strong>Celular: <br></strong>
											<div class="input-group-prepend">
													<span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
										{!! Form::number('celular_madre', null, ['class' => 'form-control']) !!}
										</div>
												</div>
										<div class="form-group col-md-4">
										<strong>Correo: <br></strong>
									<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-at"></i></span>
										{!! Form::text('correo_madre', null, ['class' => 'form-control']) !!}
										</div>
										</div>
										<div class="form-group col-md-4">
										<strong>Profesión: <br></strong>
										<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user-tie"></i></span>
										{!! Form::text('profesion_madre', null, ['class' => 'form-control']) !!}
										</div>
											</div>
										<div class="form-group col-md-4">
										<strong>Ocupación: <br></strong>
									<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-search-location"></i></span>
										{!! Form::text('ocupacion_madre', null, ['class' => 'form-control']) !!}
										</div>
										</div>
										<div class="alert alert-success col-md-12 text-center">CITA</div>
					<div class="form-group col-md-4">
						<strong>Cita: <br></strong>
						<input type="date" name="fecha" class="form-control" id="cita" placeholder="Ingrese la fecha">
						<select name="hora" class="form-control" placeholder="Ingrese la hora">
							<option value="07:00">07:00</option>
							<option value="08:00">08:00</option>
							<option value="09:00">09:00</option>
							<option value="10:00">10:00</option>
							<option value="11:00">11:00</option>
							<option value="12:00">12:00</option>
							<option value="13:00">13:00</option>
							<option value="14:00">14:00</option>
							<option value="15:00">15:00</option>
							<option value="16:00">16:00</option>
							<option value="17:00">17:00</option>
						</select>
					</div>
										<div class="form-group col-md-10">
									{!! Form::button('GUARDAR <i class="fas fa-save"></i>', ['type' => 'submit', 'id' => 'botonEnviar', 'name' => 'botonEnviar', 'class' => 'btn btn-success'] )  !!}
										</div>
			</div>
		</div>
	</div>



			
		</div>
			</div>
			<script>
<<<<<<< HEAD
=======
				$(document).ready(function(){
					 var numal = Math.round(Math.random()*10000);
					var ceros = '190';
					var suma = ceros + numal;
					$('#codigo_nuevo').val(suma);
				});
			</script>
			<script>
>>>>>>> cf4994e7d996b40733e99ab10185314986566406
  $('#codigo_antiguo').on('change', function(){
    var codigo = $('#codigo_antiguo').val();
    console.log(codigo);
    $.get('busqueda-antiguos/'+ codigo, function(response){
      $.each(response, function(index, obj){
       $('#nombres').val(obj.nombres);
       $('#apellidos').val(obj.apellidos);
       $('#curso').val(obj.curso);
       $('#nombres_representante').val(obj.nombres_representante);
       $('#cedula_representante').val(obj.cedula_representante);
       $('#email').val(obj.email_representante);

      });
    });
  });

</script>
		{{-- <script>
      $('#tipo_estudiante').on('change', function(){
        if($('#tipo_estudiante').val() == 'NUEVO'){
          $('#formularioNuevo').css("display", "block");
        }
        if($('#tipo_estudiante').val() == 'ANTIGUO'){
          $('#formularioAntiguo').css("display", "block");
        }
        
      });
    </script> --}}
	<script>

		$('#bottonAparecer').on('click', function(){
			$('#formularioR').css("display", "block");
			$('#bottonAparecer').css("display", "none");
		});

		$('#bottonAparecer2').on('click', function(){
			$('#formulario2').css("display", "block");
			$('#bottonAparecer2').css("display", "none");

		});
		$('#bottonAparecer3').on('click', function(){
			$('#formularioPadre').css("display", "block");
			$('#bottonAparecer3').css("display", "none");

		});
		$('#bottonAparecer4').on('click', function(){
			$('#formularioMadre').css("display", "block");
			$('#bottonAparecer4').css("display", "none");

		});
	</script>