@extends('layouts.app')


@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12 col-md-12">
<div style="background-color: #008cba; padding: 7px;">
    <h2 class="text-center" style="color: #fff;">
      MENSAJERIA
    </h2>
    </div>
    <hr>

				    <div class="row">
				    	<div class="col-md-6">
				    		<div class="panel panel-primary">
				    			<div class="panel panel-heading text-center">Registro de mensajes</div>
				    			<div class="panel panel-body">
				    				@foreach (Auth::user()->notifications as $notification)
			               <i>{{ $notification->data["envio_id"]["name"] }}</i> te ha enviado un mensaje: <b>{{ $notification->data["body"]}}</b><br>
			                @endforeach


				    			</div>
				    			</div>

				    	</div>
				        <div class="col-md-6">

				        	@include('mensaje.partials.info')
				            <div class="panel panel-primary">
				                <div class="panel-heading text-center">Ingrese los datos y el mensaje...</div>

				                <div class="panel-body">
				                 {!! Form::open(['route' => 'mensaje.store']) !!}
				                 	<div class="form-group">
				                 	<select name="recibio_id[]" class="form-control selectpicker" multiple title="Seleccione a uno o varios usuarios...">
                                         <option value="#">Seleccione el usuario</option>
                                         <optgroup label="INICIAL 1">
				                 		@foreach($usersInicial1 as $ini1)
				                 		<option value="{{ $ini1->id }}">{{ $ini1->name }}</option>
                                         @endforeach
                                        </optgroup>
                                        <optgroup label="INICIAL 2">
                                        @foreach($usersInicial2 as $ini2)
                                        <option value="{{ $ini2->id }}">{{ $ini2->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="PRIMERO DE EGB">
                                        @foreach($users1eroB as $pb)
                                        <option value="{{ $pb->id }}">{{ $pb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="SEGUNDO DE EGB">
                                        @foreach($users2doB as $sb)
                                        <option value="{{ $sb->id }}">{{ $sb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="TERCERO DE EGB">
                                        @foreach($users3roB as $tb)
                                        <option value="{{ $tb->id }}">{{ $tb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="CUARTO DE EGB">
                                        @foreach($users4toB as $cb)
                                        <option value="{{ $cb->id }}">{{ $cb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="QUINTO DE EGB">
                                        @foreach($users5toB as $qb)
                                        <option value="{{ $qb->id }}">{{ $qb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="SEXTO DE EGB">
                                        @foreach($users6toB as $sexb)
                                        <option value="{{ $sexb->id }}">{{ $sexb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="SEPTIMO DE EGB">
                                        @foreach($users7moB as $sepb)
                                        <option value="{{ $sepb->id }}">{{ $sepb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="OCTAVO DE EGB">
                                        @foreach($users8voB as $ob)
                                        <option value="{{ $ob->id }}">{{ $ob->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="NOVENO DE EGB">
                                        @foreach($users9noB as $nb)
                                        <option value="{{ $nb->id }}">{{ $nb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="DECIMO DE EGB">
                                        @foreach($users10moB as $deb)
                                       <option value="{{ $deb->id }}">{{ $deb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="PRIMERO DE BACHILLERATO">
                                        @foreach($users1bgu as $pbgu)
                                        <option value="{{ $pbgu->id }}">{{ $pbgu->name }}</option>
                                       @endforeach
                                        </optgroup>
                                        <optgroup label="SEGUNDO DE BACHILLERATO">
                                                @foreach($users2bgu as $sbgu)
                                                <option value="{{ $sbgu->id }}">{{ $sbgu->name }}</option>
                                               @endforeach
                                                </optgroup>
                                                <optgroup label="TERCERO DE BACHILLERATO">
                                                        @foreach($users3bgu as $tbgu)
                                                        <option value="{{ $tbgu->id }}">{{ $tbgu->name }}</option>
                                                       @endforeach
                                                        </optgroup>
                                                        <optgroup label="AUTORIDADES">
                                                                @foreach($autoridades as $aut)
                                                                <option value="{{ $aut->id }}">{{ $aut->name }}</option>
                                                               @endforeach
                                                                </optgroup>
                                        </select>
                                        </div>
				                 	<div class="form-group ">
				                 	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
				                 	</div>

				                 	<div class="form-group">
				                 	{!!Form::button('<i class="fa fa-paper-plane"></i> ENVIAR', ['class' => 'btn btn-primary btn-block', 'type' => 'submit'])!!}
				                 	</div>

				                 {!! Form::close() !!}

				                </div>
				            </div>
				        </div>
				    </div>
				</div>|


@endsection
