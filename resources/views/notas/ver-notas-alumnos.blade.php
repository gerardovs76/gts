@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			LISTA DE NOTAS ALUMNOS
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


					{!! Form::open(['route' => 'notas.cargar-notas-alumnos']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">

							<div class="form-group col-md-4">
                                             <strong>Cedula: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                             {{ Form::text('cedula', Auth::user()->cedula, ['class' => 'form-control col-md-6' , 'id' => 'cedula', 'readonly']) }}
                                             </div>
                                             </div>
                                              <div class="form-group col-md-4">
                                             <strong>Quimestre: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                             {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6' , 'id' => 'quimestre', 'placeholder' => 'Seleccione el quimestre...']) }}
                                             </div>
                                             </div>
                                             <div class="form-group col-md-4">
                                             <strong>Parcial: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                             {{ Form::select('parcial',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6' , 'id' => 'parcial', 'placeholder' => 'Seleccione el parcial...']) }}
                                             </div>
                                             </div>
                                             <div class="form-group col-md-4">
                                             <strong>Materia: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                             {{ Form::select('materia',[], null, ['class' => 'form-control col-md-6' , 'id' => 'materia', 'placeholder' => 'Seleccione la materia...']) }}
                                             </div>
                                             </div>


								<div class="form-group col-md-10">

   									{!! Form::button('<i class="fas fa-clipboard"></i> VER NOTAS', ['class' => 'btn btn-primary', 'type' => 'submit','id' => 'verNotas']) !!}
								</div>

							</div>

						</div>
					</div>


                    <table class="table table-striped table-bordered" id="tableid">
			<thead>

                    <tr>
                    <th>
                    	<p>
                    	<strong>ALUMNOS</strong>
                    	</p>
                    </th>
					<th>
						<p>TRABAJO ACADEMICO</p>
					</th>
					<th>
						<p>TAREAS INDIVIDUALES</p>
					</th>
					<th>
						<p>TAREAS GRUPALES</p>
					</th>
					<th>
						<p>LECCIONES</p>
					</th>
					<th>
						<p>EVALUACIONES</p>
                    </th>
                    <th>
                        <p>CONDUCTA</p>
                    </th>
					<th>
						<p>PROMEDIO</p>
					</th>
                    </tr>
                    </thead>
					<tbody id="tableid">
                        @if(isset($notas))
                        @foreach($notas as $nota)
                        <tr>
                            <td><strong>{{$nota->apellidos}} {{$nota->nombres}}</strong></td>
                        @foreach($nota->notas as $notaIndi)
                        <td>{{$notaIndi->nota_ta}}</td>
                        <td>{{$notaIndi->nota_ti}}</td>
                        <td>{{$notaIndi->nota_tg}}</td>
                        <td>{{$notaIndi->nota_le}}</td>
                        <td>{{$notaIndi->nota_ev}}</td>
                        <td>{{$notaIndi->nota_conducta == null ? 0 : $notaIndi->nota_conducta}}</td>
                        @if($notaIndi->nota_final < 7 && isset($nota->recuperaciones->first()->nota_recuperacion))
                        @foreach($nota->recuperaciones as $recuperacion)
                        @if($recuperacion->promedio_final < 7)
                        <td style="color: red;">{{$recuperacion->promedio_final}}</td>
                        @else
                        <td style="color: green;">{{$recuperacion->promedio_final}}</td>
                        @endif
                        @endforeach
                        @else
                        @if($notaIndi->nota_final < 7)
                        <td style="color: red;">{{$notaIndi->nota_final}}</td>
                        @else
                        <td style="color: green;">{{$notaIndi->nota_final}}</td>
                        @endif
                        @endif
                        @endforeach
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td></td>
                </tr>
                @endif
			</tbody>
        </table>
        {!!Form::close()!!}
    </div>
    <script>
      $('#parcial').on('change', function(){
                var cedula = $('#cedula').val();
                var url = 'cargar-materias-alumnos/'+cedula;
                $.ajax({
                    url: url,
                    success: function(response)
                    {
                    $.each(response, function(index, obj){
                    $('#materia').append('<option value='+obj.id+'>'+obj.materia+'</option>');
                   });
                    },
                    error: function(error)
                    {

                    }
                });
            });
    </script>
    @endsection

