@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">

		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			REPORTE TOTAL
		</h2>
		</div>

		<hr>

        <div class="panel panel-primary">
        <div class="panel panel-heading text-center">INGRESE LOS DATOS PARA LA BUSQUEDA...</div>
        <div class="panel panel-body">
        <div class="form-row">
        <div class="form-group col-md-4">
		<strong>Curso: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
		{!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8', 'id' => 'cursos', 'placeholder' => 'Coloque el curso']) !!}
		</div>
	</div>
		<div class="form-group col-md-4">
		<strong>Paralelo: <br></strong>
<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
		{!! Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-8', 'placeholder' => 'Ingrese el paralelo', 'id' => 'paralelo']) !!}
		</div>
	</div>
    <div class="form-group col-md-10">
    {!!Form::button('ENVIAR DATOS', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'boton'])!!}
    </div>
    </div>
        </div>
        </div>
		@include('matricular.partials.info')
		<div class="table-responsive">
		<table class="table table-striped table-bordered" id="table">
			<thead>
				<tr>

					<th>ID</th>
					<th>CURSO</th>
					<th>PARALELO</th>
					<th>SEXO M</th>
                    <th>SEXO F</th>
					<th>TOTAL</th>
				</tr>
			</thead>
			<tbody id="myTable">
				
			</tbody>
		</table>
	</div>
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('matricular.partials.aside')
	</div>-->
 <script>
    $('#boton').on('click', function(){
        var paralelo = $('#paralelo').val();
        var cursos = $('#cursos').val();

        $.get('matricular-reporte-total/'+cursos+'/'+paralelo, function(response){
            $.each(response, function(index, obj){
               console.log(obj);
            });
        });
    });
    
    
    </script>
@endsection