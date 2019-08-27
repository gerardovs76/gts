@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">

		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			LISTA DE INSPECCIONES
		</h2>
        </div>



        <hr>
        {!! Form::open(['route' => 'inspeccion.store-inspeccion']) !!}
        <div class="form-row">
                <div class="form-group col-md-4">
                        <strong>Fecha:</strong>
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                        {!! Form::date('fecha', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Seleccione la fecha', 'id' => 'fecha']) !!}
                        </div>
                        </div>
                        <div class="form-group col-md-10">
                            {!!Form::button('<i class="fas fa-search"></i> BUSCAR', ['class' => 'btn btn-primary', 'type' => 'submit'])!!}
                        </div>

        </div>


        {!!Form::close()!!}
		@include('notas.partials.info')
		<div class="table-responsive">
		<table class="table table-striped table-bordered" id="table">
			<thead>
				<tr>
                    <th>FECHA</th>
					<th>CEDULA</th>
					<th>NOMBRES</th>
					<th>APELLIDOS</th>
					<th>CURSO</th>
					<th>PARALELO</th>
					<th>H1</th>
                    <th>H2</th>
                    <th>H3</th>
                    <th>H4</th>
                    <th>H5</th>
                    <th>H6</th>
                    <th>H7</th>
                    <th>H8</th>
                    <th>CO1</th>
                    <th>CO2</th>
                    <th>CO3</th>
                    <th>CO4</th>
                    <th>CO5</th>
                    <th>CO6</th>
                    <th>CO7</th>
                    <th>CO8</th>
				</tr>
            </thead>
            @if(isset($inspeccion))
			<tbody id="myTable">
                {{$i=0}}
                @foreach($inspeccion as $ins)
				<tr>
                    <td>{{$ins->fecha}}</td>
					<td>{{$ins->cedula}}</td>
					<td>{{$ins->nombres}}</td>
					<td>{{$ins->apellidos}}</td>
					<td>{{$ins->curso}}</td>
					<td>{{$ins->paralelo}}</td>
					<td>{{$ins->h1}}</td>
                    <td>{{$ins->h2}}</td>
                    <td>{{$ins->h3}}</td>
					<td>{{$ins->h4}}</td>
					<td>{{$ins->h5}}</td>
					<td>{{$ins->h6}}</td>
					<td>{{$ins->h7}}</td>
                    <td>{{$ins->h8}}</td>
                    <td>{{(strpos($ins->h1, '01') !== FALSE) + (strpos($ins->h2, '01') !== FALSE) + (strpos($ins->h3, '01') !== FALSE) + (strpos($ins->h4, '01') !== FALSE) + (strpos($ins->h5, '01') !== FALSE) + (strpos($ins->h6, '01') !== FALSE) + (strpos($ins->h7, '01') !== FALSE) + (strpos($ins->h8, '01') !== FALSE)}}</td>
                    <td>{{(strpos($ins->h1, '02') !== FALSE) + (strpos($ins->h2, '02') !== FALSE) + (strpos($ins->h3, '02') !== FALSE) + (strpos($ins->h4, '02') !== FALSE) + (strpos($ins->h5, '02') !== FALSE) + (strpos($ins->h6, '02') !== FALSE) + (strpos($ins->h7, '02') !== FALSE) + (strpos($ins->h8, '02') !== FALSE)}}</td>
					<td>{{(strpos($ins->h1, '03') !== FALSE) + (strpos($ins->h2, '03') !== FALSE) + (strpos($ins->h3, '03') !== FALSE) + (strpos($ins->h4, '03') !== FALSE) + (strpos($ins->h5, '03') !== FALSE) + (strpos($ins->h6, '03') !== FALSE) + (strpos($ins->h7, '03') !== FALSE) + (strpos($ins->h8, '03') !== FALSE)}}</td>
					<td>{{(strpos($ins->h1, '04') !== FALSE) + (strpos($ins->h2, '04') !== FALSE) + (strpos($ins->h3, '04') !== FALSE) + (strpos($ins->h4, '04') !== FALSE) + (strpos($ins->h5, '04') !== FALSE) + (strpos($ins->h6, '04') !== FALSE) + (strpos($ins->h7, '04') !== FALSE) + (strpos($ins->h8, '04') !== FALSE)}}</td>
					<td>{{(strpos($ins->h1, '05') !== FALSE) + (strpos($ins->h2, '05') !== FALSE) + (strpos($ins->h3, '05') !== FALSE) + (strpos($ins->h4, '05') !== FALSE) + (strpos($ins->h5, '05') !== FALSE) + (strpos($ins->h6, '05') !== FALSE) + (strpos($ins->h7, '05') !== FALSE) + (strpos($ins->h8, '05') !== FALSE)}}</td>
					<td>{{(strpos($ins->h1, '06') !== FALSE) + (strpos($ins->h2, '06') !== FALSE) + (strpos($ins->h3, '06') !== FALSE) + (strpos($ins->h4, '06') !== FALSE) + (strpos($ins->h5, '06') !== FALSE) + (strpos($ins->h6, '06') !== FALSE) + (strpos($ins->h7, '06') !== FALSE) + (strpos($ins->h8, '06') !== FALSE)}}</td>
					<td>{{(strpos($ins->h1, '07') !== FALSE) + (strpos($ins->h2, '07') !== FALSE) + (strpos($ins->h3, '07') !== FALSE) + (strpos($ins->h4, '07') !== FALSE) + (strpos($ins->h5, '07') !== FALSE) + (strpos($ins->h6, '07') !== FALSE) + (strpos($ins->h7, '07') !== FALSE) + (strpos($ins->h8, '07') !== FALSE)}}</td>
					<td>{{(strpos($ins->h1, '08') !== FALSE) + (strpos($ins->h2, '08') !== FALSE) + (strpos($ins->h3, '08') !== FALSE) + (strpos($ins->h4, '08') !== FALSE) + (strpos($ins->h5, '08') !== FALSE) + (strpos($ins->h6, '08') !== FALSE) + (strpos($ins->h7, '08') !== FALSE) + (strpos($ins->h8, '08') !== FALSE)}}</td>
                </tr>
                @endforeach
            </tbody>
            @else
            <tbody id="myTable">
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
@endsection
