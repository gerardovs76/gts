@extends('layouts.app')

@section('content')
<div class="container col-xs-12 col-sm-12 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
          <h2 class="text-center" style="color: #fff;">
              LISTA DE INGRESOS
          </h2>
          </div>
        <hr>

        <div class="panel panel-primary">
            <div class="panel panel-heading" style="text-align: center;">LISTA DE INGRESOS..</div>
            <div class="panel panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>NOMBRE DEL ARCHIVO</th>
                            <th>FECHA DE CREACIÓN DEL ARCHIVO</th>
                            <th>ARCHIVO</th>
                            <th>ELIMINAR EL ARCHIVO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($facturacion))
                        @foreach($facturacion as $fac)
                        <tr>
                            <td>{{$fac->archivos}}</td>
                            <td>{{$fac->fecha_creacion}}</td>
                            <td style="text-align: center;"><a href="{{url('facturacion/download/'.$fac->archivos)}}"><i style="text-align: center;" class="fas fa-file-alt fa-3x"></i></a></td>
                            <td><a class="btn btn-danger" href="{{url('facturacion/delete/'.$fac->id)}}">ELIMINAR <i class="fas fa-danger"></i></a></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
@endsection
