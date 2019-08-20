@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<h2 class="text-center">
			MEDICO
		</h2>
		<hr>
		@include('medico.partials.info')
		{!! Form::open(['route' => 'medico/show']) !!}
			
			<div class="alert alert-secondary text-center"><strong>DATOS</strong></div>
	<div class="form-row">
 <div class="form-group col-md-4">
                    <strong>Cedula:</strong>
                    {!! Form::text('cedula', null, ['class' => 'form-control col-md-10' , 'id' => 'cedula', 'placeholder' => 'Ingrese la cedula de identidad', 'name' => 'cedula']) !!}
                    </div>
                  
</div> 	          
	
	<table width="100%" class="table-hover table-condensed" id="tablausuarios">

			<thead>

                    <tr>	
                    <th id="idalumno">
                       
                    </th>
                    <th id="idcurso">
                       
                    </th>
                    </tr>	
                    </thead>
					<tbody id="tableid" class="table table-striped table-hover">
				<tr>
				
				</tr>
			</tbody>
		</table>

	</table>
	{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
	{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('medico.partials.aside')
	</div>-->
	<script>
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
				   
</script>
@endsection