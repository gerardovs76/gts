@extends('layouts.app')


@section('content')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-es_ES.min.js "> </script>
	<div class="col-xs-12 col-sm-8 col-lg-12 col-md-12">
    <div style="background-color: #008cba; padding: 7px;">
    <h2 class="text-center" style="color: #fff;">
      MENSAJERIA
    </h2>
    </div>
    <hr>


    <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel panel-heading text-center">Registro de mensajes</div>
                    <div class="panel panel-body">
                        @foreach (Auth::user()->notifications as $notification)
               <i>{{ $notification->data["envio_id"]["name"] }}</i> te ha enviado un mensaje: <b>{{ $notification->data["body"]}}</b><br>
                @endforeach


                    </div>
                    </div>
            </div>
    </div>
    </div>

    @endsection
