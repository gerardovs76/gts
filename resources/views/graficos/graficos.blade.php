@extends('layouts.app')
@section('content')
		<div id="reportPage">

        <div class="col-xs-12 col-sm-8 col-lg-12">
<div style="background-color: #008cba; padding: 7px;">
    <h2 class="text-center" style="color: #fff;">
     ESTADISTICAS
    </h2>
    </div>
    <hr>
            @include('graficos.form')
            <div class="panel panel-primary">
                <div class="panel-heading">Grafico</div>
                <div class="panel-body">
                   <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection