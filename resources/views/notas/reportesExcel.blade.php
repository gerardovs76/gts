@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			REPORTE EXCEL
		</h2>
		</div>
		<hr>
		@include('notas.partials.info')


					{!! Form::open(['route' => 'notas.reportesExcelTodo', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">INGRESAR LOS DATOS PARA LA BUSQUEDA.</div>
						<div class="panel panel-body">
							<div class="form-row">
								@if(Auth::user()->isRole('super-admin'))
								<div class="form-group col-md-4">
									<strong>Curso: <br></strong>
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
											{!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8', 'id' => 'curso', 'placeholder' => 'Ingrese el curso...']) !!}<br>
									</div>
								</div>
								<div class="form-group col-md-4">
									<strong>Paralelo: <br></strong>
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
										{!! Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-8', 'id' => 'paralelo', 'placeholder' => 'Ingrese el paralelo...']) !!}<br>
									</div>
								</div>
								@elseif(Auth::user()->isRole('profesor'))
								<div class="form-group col-md-4">
									<strong>Curso: <br></strong>
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
											{!! Form::select('curso',[], null, ['class' => 'form-control col-md-8', 'id' => 'curso', 'placeholder' => 'Ingrese el curso...']) !!}<br>
									</div>
								</div>
								<div class="form-group col-md-4">
									<strong>Paralelo: <br></strong>
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
										{!! Form::select('paralelo',[], null, ['class' => 'form-control col-md-8', 'id' => 'paralelo', 'placeholder' => 'Ingrese el paralelo...']) !!}<br>
									</div>
								</div>
								@endif
		@if(Auth::user()->isRole('super-admin'))
		<div class="form-group col-md-4">
			<strong>Tipo de documento: <br></strong>
				<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
				{!! Form::select('tipo_documento',['NOMINA1' => 'NOMINA 1', 'NOMINA2' => 'NOMINA 2', 'PRIMERQUIMESTRE' => 'PRIMER QUIMESTRE', 'SEGUNDOQUIMESTRE' => 'SEGUNDO QUIMESTRE', 'CUADROFINAL' => 'CUADRO FINAL'], null, ['class' => 'form-control col-md-8', 'id' => 'tipo_documento', 'placeholder' => 'Ingrese el tipo de documento...']) !!}<br>
			</div>
		</div>
		@elseif(Auth::user()->isRole('profesor'))
		<div class="form-group col-md-4">
			<strong>Tipo de documento: <br></strong>
				<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
				{!! Form::select('tipo_documento',['PRIMERQUIMESTRE' => 'PRIMER QUIMESTRE', 'SEGUNDOQUIMESTRE' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-8', 'id' => 'tipo_documento', 'placeholder' => 'Ingrese el tipo de documento...']) !!}<br>
			</div>
		</div>
		@endif

							<div class="form-group col-md-12">
   									{!! Form::button('<i class="fas fa-print"></i> IMPRIMIR EXCEL', ['class' => 'btn btn-primary', 'type' => 'submit','name' => 'nomina1']) !!}
								</div>
							</div>

						</div>
					</div>
                   <table class="table table-hover table-striped" id="tableid" style="display: none;" align="center">
					    <tbody>

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
@endsection


