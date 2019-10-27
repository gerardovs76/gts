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

				        <div class="col-md-12">

				        	@include('mensaje.partials.info')
				            <div class="panel panel-primary">
				                <div class="panel-heading text-center">Ingrese los datos y el mensaje...</div>

				                <div class="panel-body">
				                 {!! Form::open(['route' => 'mensaje.store']) !!}
				                 	<div class="form-group">
				                 	<select name="recibio_id[]" class="form-control selectpicker" data-actions-box="true" data-style="btn-info" data-live-search="true" multiple title="Seleccione a uno o varios usuarios...">
                                         <optgroup label="INICIAL 1">
				                 		@foreach($usersInicial1 as $ini1)
				                 		<option data-subtext="INICIAL 1" value="{{ $ini1->id }}">{{ $ini1->name }}</option>
                                         @endforeach
                                        </optgroup>
                                        <optgroup label="INICIAL 2">
                                        @foreach($usersInicial2 as $ini2)
                                        <option data-subtext="INICIAL 2" value="{{ $ini2->id }}">{{ $ini2->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="PRIMERO DE EGB">
                                        @foreach($users1eroB as $pb)
                                        <option data-subtext="PRIMERO DE EGB" value="{{ $pb->id }}">{{ $pb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="SEGUNDO DE EGB">
                                        @foreach($users2doB as $sb)
                                        <option data-subtext="SEGUNDO DE EGB" value="{{ $sb->id }}">{{ $sb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="TERCERO DE EGB">
                                        @foreach($users3roB as $tb)
                                        <option data-subtext="TERCERO DE EGB" value="{{ $tb->id }}">{{ $tb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="CUARTO DE EGB">
                                        @foreach($users4toB as $cb)
                                        <option data-subtext="CUARTO DE EGB" value="{{ $cb->id }}">{{ $cb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="QUINTO DE EGB">
                                        @foreach($users5toB as $qb)
                                        <option data-subtext="QUINTO DE EGB" value="{{ $qb->id }}">{{ $qb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="SEXTO DE EGB">
                                        @foreach($users6toB as $sexb)
                                        <option data-subtext="SEXTO DE EGB" value="{{ $sexb->id }}">{{ $sexb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="SEPTIMO DE EGB">
                                        @foreach($users7moB as $sepb)
                                        <option data-subtext="SEPTIMO DE EGB" value="{{ $sepb->id }}">{{ $sepb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="OCTAVO DE EGB">
                                        @foreach($users8voB as $ob)
                                        <option data-subtext="OCTAVO DE EGB" value="{{ $ob->id }}">{{ $ob->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="NOVENO DE EGB">
                                        @foreach($users9noB as $nb)
                                        <option data-subtext="NOVENO DE EGB" value="{{ $nb->id }}">{{ $nb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="DECIMO DE EGB">
                                        @foreach($users10moB as $deb)
                                       <option data-subtext="DECIMO DE EGB" value="{{ $deb->id }}">{{ $deb->name }}</option>
                                        @endforeach
                                        </optgroup>
                                        <optgroup label="PRIMERO DE BACHILLERATO">
                                        @foreach($users1bgu as $pbgu)
                                        <option data-subtext="PRIMERO DE BACHILLERATO" value="{{ $pbgu->id }}">{{ $pbgu->name }}</option>
                                       @endforeach
                                        </optgroup>
                                        <optgroup label="SEGUNDO DE BACHILLERATO">
                                                @foreach($users2bgu as $sbgu)
                                                <option data-subtext="SEGUNDO DE BACHILLERATO" value="{{ $sbgu->id }}">{{ $sbgu->name }}</option>
                                               @endforeach
                                                </optgroup>
                                                <optgroup label="TERCERO DE BACHILLERATO">
                                                        @foreach($users3bgu as $tbgu)
                                                        <option data-subtext="TERCERO DE BACHILLERATO" value="{{ $tbgu->id }}">{{ $tbgu->name }}</option>
                                                       @endforeach
                                                        </optgroup>
                                                        <optgroup label="AUTORIDADES">
                                                                @foreach($autoridades as $aut)
                                                                <option data-subtext="AUTORIDADES" value="{{ $aut->id }}">{{ $aut->name }}</option>
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
