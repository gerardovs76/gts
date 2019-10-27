@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			OBSERVACIONES
		</h2>
		</div>

        <hr>
        @include('inspecciones.modal.modalObservacion')
        @include('notas.partials.info')
        <div class="panel panel-primary">
            <div class="panel panel-heading" style="text-align: center;">INGRESE LOS DATOS PARA ASIGNAR UNA OBSERVACIÓN</div>
                <div class="panel panel-body">
                    <div class="form-row justify-content-center">
                        <button class="btn btn-primary form-control col-md-2" data-toggle="modal" data-target="#modalObservaciones" id="botonModal" style="text-align: center;">AGREGAR OBSERVACIÓN</button>
                    </div>
                </div>
        </div>

        <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th>NOMBRES</th>
                        <th>CURSO</th>
                        <th>PARALELO</th>
                        <th>PARCIAL</th>
                        <th>QUIMESTRE</th>
                        <th>FECHA</th>
                        <th>OBSERVACIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($inspeccionesObservacion))
                    @foreach($inspeccionesObservacion as $observacion)
                    <tr>
                        <td>{{$observacion->nombres}}</td>
                        <td>{{$observacion->curso}}</td>
                        <td>{{$observacion->paralelo}}</td>
                        <td>{{$observacion->quimestre}}</td>
                        <td>{{$observacion->parcial}}</td>
                        <td>{{$observacion->fecha}}</td>
                        <td>{{$observacion->observacion}}</td>
                    </tr>
                     @endforeach
                     @else
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     @endif
                </tbody>
            </table>

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
