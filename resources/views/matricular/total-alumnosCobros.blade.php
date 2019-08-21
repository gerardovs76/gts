@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			REPORTE DE COBROS TOTAL
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


					{!! Form::open(['route' => 'matricular.total-alumnosStore']) !!}
					<div class="panel panel-primary" id="panel">
						<div class="panel panel-heading text-center"></div>
						<div class="panel panel-body">
							<div class="form-row">
                                <div>
								<div class="form-group col-md-4">
		<strong>Curso: <br></strong>
		<div class="input-group-prepend" id="curso">
		<span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
		{!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8', 'id' => 'curso', 'placeholder' => 'Ingrese el curso...']) !!}<br>
		</div>
		</div>
		<div class="form-group col-md-4" id="paralelo">
		<strong>Paralelo: <br></strong>
        <div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
		{!! Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-8', 'id' => 'paralelo', 'placeholder' => 'Ingrese el paralelo']) !!}
		</div>
        </div>
        <div class="form-group col-md-12" id="busqueda">
                {!! Form::button(' <i class="fas fa-search"></i> BUSQUEDA', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'mostrarBusqueda']) !!}
         </div>
         <div class="form-group col-md-12" id="imprimir">
                {!!Form::button('<i class="fas fa-print"></i> IMPRIMIR', ['class' => 'btn btn-primary', 'type' => 'button', 'id' => 'boton'])!!}
         </div>

        <div class="form-group col-md-10 offset-md-4">
            @if(isset($curso) && isset($paralelo))
            <h4><strong>Curso: {{$curso}} - Paralelo: {{$paralelo}}</strong></h4>
            @else
            <h4>Curso: - Paralelo:</h4>
            @endif
        </div>

                                <div class="form-group col-md-10 offset-md-10" >
                                        <strong><em>Total de alumnos: </em></strong>
                                        @if(isset($sep))
                                        <p>{{count($sep)}}</p>
                                        @else
                                        <p></p>
                                        @endif
                                    </div>


							</div>

						</div>
					</div>
                   <table class="table table-hover table-striped" id="tableid" border="1">
                        <thead>
                                <tr>
                                    <th>N.</th>
                                    <th>NOMBRES</th>
                                    <th>TOTAL</th>
                                    <th>MAT</th>
                                    <th>PEN SEP</th>
                                    <th>PEN OCT</th>
                                    <th>PEN NOV</th>
                                    <th>PEN DIC</th>
                                    <th>PEN ENE</th>
                                    <th>PEN FEB</th>
                                    <th>PEN MAR</th>
                                    <th>PEN ABR</th>
                                    <th>PEN MAY</th>
                                    <th>PEN JUN</th>
                                </tr>
                            </thead>
                            @if(isset($sep))
                             <tbody>
                                 <td style="display: none;">{{$i=1}}</td>
                                     @foreach($sep as $s)
                                         <tr>
                                        <td>{{$i++}}</td>
                                         <td>{{$s->nombres}}</td>
                                         <td>{{$s->valor}}</td>
                                         <td>70</td>
                                         @if(strpos($s->referencias, 'SEP') !== FALSE)
                                         @if(strpos($s->referencias, 'INICIAL 1') !== FALSE || strpos($s->referencias, 'INICIAL 2') !== FALSE || strpos($s->referencias, 'INI') !== FALSE)
                                         <td>60</td>
                                         @elseif(strpos($s->referencias, 'PRIMERO DE EGB') !== FALSE || strpos($s->referencias, 'SEGUNDO DE EGB') !== FALSE || strpos($s->referencias, 'TERCERO DE EGB') !== FALSE || strpos($s->referencias, 'CUARTO DE EGB') !== FALSE || strpos($s->referencias, 'QUINTO DE EGB') !== FALSE || strpos($s->referencias, 'SEXTO DE EGB') !== FALSE || strpos($s->referencias, 'SEPTIMO DE EGB') !== FALSE || strpos($s->referencias, 'OCTAVO DE EGB') !== FALSE || strpos($s->referencias, 'NOVENO DE EGB') !== FALSE || strpos($s->referencias, 'DECIMO DE EGB') !== FALSE || strpos($s->referencias, '1RO') !== FALSE || strpos($s->referencias, '8VO') !== FALSE)
                                         <td>65</td>
                                         @elseif(strpos($s->referencias, 'PRIMERO DE BACHILLERATO') !== FALSE || strpos($s->referencias, 'SEGUNDO DE BACHILLERATO') !== FALSE)
                                         <td>70</td>
                                         @elseif(strpos($s->referencias, 'TERCERO DE BACHILLERATO') !== FALSE)
                                         <td>95</td>
                                         @endif
                                         @endif
                                         </tr>
                                         @endforeach

                             </tbody>
                             @else
                             <tbody>
                                 <tr>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                 </tr>
                             </tbody>
                             @endif
                         </table>

    </div>
    <script>
        $(document).ready(function() {
          $('#table').DataTable({
               "language": {
                      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                  },
                  "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, 1000] ]
          });
      } );
       </script>
       <script>
            function printData()
            {
               var divToPrint=document.getElementById("tableid");
               newWin= window.open("");
                    newWin.document.write('<style>@page{size:landscape;}</style><html><head><title></title>');
                    newWin.document.write('</head><body >');
                    newWin.document.write(divToPrint.outerHTML);
                    newWin.document.write('</body></html>');
                    newWin.print();
                    newWin.close();
            }

            $('#boton').on('click',function(){
            printData();
            })

        </script>
@endsection
