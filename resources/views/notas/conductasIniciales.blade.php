@extends('layouts.app')

@section('content')
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }
    </style>
    <div class="col-xs-12 col-sm-8 col-lg-12">

		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			CONDUCTAS INICIALES
		</h2>
		</div>

		<hr>
<div class="panel panel-primary" id="panel1">
              <div class="panel panel-heading text-center" style="padding: 1px;"><h3>INGRESE LOS DATOS PARA LA BUSQUEDA SIGUIENDO EL ORDEN NUMERICO...</h3></div>
                   <div class="panel panel-body">
                              <div class="form-row">
                                  @if(Auth::user()->isRole('super-admin') || Auth::user()->isRole('dece') || Auth::user()->isRole('admin'))
                                  <div class="form-group col-md-4">
                                       <strong>1.- Curso: <br></strong>
                                       <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                       </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                       <strong>3.- Paralelo: <br></strong>
                                       <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
                                       </div>
                                       </div>
                                  @elseif(Auth::user()->isRole('profesor'))
                                  <div class="form-group col-md-4">
                                       <strong>1.- Curso: <br></strong>
                                       <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('curso',$profesorCurso, null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                       </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                       <strong>3.- Paralelo: <br></strong>
                                       <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('paralelo',$profesorParalelo, null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
                                       </div>
                                       </div>
                                  @endif
                                       <div class="form-group col-md-4">
                                       <strong>5.- Quimestre: <br></strong>
                                       <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el quimestre', 'id' => 'quimestre']) }}
                                       </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                       <strong>6.- Parcial: <br></strong>
                                       <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                       {{ Form::select('parcial',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el parcial', 'id' => 'parcial']) }}
                                       </div>
                                       </div>
                                         <div  class="form-group col-md-12">
                                         {!! Form::button('<i class="fas fa-clipboard"></i> AGREGAR NOTAS', ['class' => 'btn btn-primary', 'id' => 'agregarNotas']) !!}
                                         <button id="saveNotas"  class="btn btn-primary pull-right d-none" type="submit"><i class="fas fa-clipboard"></i> GUARDAR NOTAS</button>
                                       </div>
                             </div>
                           </div>
                          </div>
                        </div>
                        @endsection