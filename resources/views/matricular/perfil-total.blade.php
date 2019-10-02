@extends('layouts.app')
@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			PERFIL TOTAL
		</h2>
		</div>

		<hr>
		@include('notas.partials.info')


                    {!! Form::open(['route' => 'matricular.perfil-total-store']) !!}
                    <div class="panel panel-primary">
                        <div class="panel panel-heading">Ingrese sus datos..</div>
                        <div class="panel panel-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong>Codigo: </strong><br>
                                    <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                    {!!Form::text('codigo',null, ['class' => 'form-control col-md-6', 'placeholder' => 'Ingrese el codigo...'])!!}
                                    </div>
                                </div>
                                    <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary col-md-2"><i class="fa fa-paper-plane"></i>VER PERFIL</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!!Form::close()!!}

    </div>
    <div class="container">
            <div class="row">
    <div class="container col-xs-8 col-sm-8 col-lg-8">
        <div class="panel panel-primary">
            <div class="panel panel-heading text-center">DATOS</div>
            <div class="panel panel-body">

               <table class="table table-striped table-bordered">
                   <thead>
                       @if(isset($matriculadosPerfil))
                       @foreach($matriculadosPerfil as $perfil)
                       <img src={{asset("archivos/$perfil->foto_carnet")}} alt="" class="pull-right"  style="border:1px solid #021a40;" width="100" height="100">
                       <tr>
                           <th>
                               Datos del alumno: {{$perfil->cedula}} , {{$perfil->nombres}} {{$perfil->apellidos}}
                           </th>
                       </tr><tr>
                            <th>
                              Curso y paralelo: {{$perfil->curso}} {{$perfil->paralelo}}
                            </th>
                        </tr>
                        <tr>
                                <th>
                                    Sexo y edad: {{$perfil->inscripcion->sexo}} {{$perfil->inscripcion->edad}} años
                                </th>
                            </tr>
                            <tr>
                                    <th>
                                        Dirección: {{$perfil->inscripcion->direccion_alumno}}
                                    </th>
                                </tr>
                                <tr>
                                        <th>
                                            Datos del representante: {{$perfil->inscripcion->cedrepresentante}},{{$perfil->inscripcion->nombres_representante}}, {{$perfil->inscripcion->tipo_persona}}
                                        </th>
                                    </tr>
                                    <tr>
                                            <th>
                                                Telefonos: {{$perfil->inscripcion->convencional}},{{$perfil->inscripcion->movil}}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" style="background-color: #008cba; color: white;">
                                                PAGOS
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                    @if(!isset($perfil->facturaciones->first()->valor))
                                                     SEP VALOR : 0
                                                    @elseif($perfil->facturaciones->first()->valor !== '306.7' && $perfil->facturaciones->first()->valor !== '314' && $perfil->facturaciones->first()->valor !== '326' && $perfil->facturaciones->first()->valor !== '353.5' && $perfil->facturaciones->first()->valor !== '371' && $perfil->facturaciones->first()->valor !== '196.7' && $perfil->facturaciones->first()->valor !== '199' && $perfil->facturaciones->first()->valor !== '201' && $perfil->facturaciones->first()->valor !== '228.5' && $perfil->facturaciones->first()->valor !== '246')
                                                       SEP VALOR : {{$perfil->facturaciones->first()->valor}}
                                                    @else
                                                       @if(isset($perfil->facturaciones->first()->valor))
                                                      SEP VALOR : {{$perfil->facturaciones->first()->valor}}
                                                       @elseif($perfil->facturaciones->first()->valor == '')
                                                      SEP VALOR : 0
                                                       @endif
                                                        MATRICULA: 70
                                                        @foreach($perfil->facturaciones as $factura)
                                                        @if(strpos($factura->referencias, 'SEP') !== FALSE)
                                                        @if(strpos($factura->referencias, 'INICIAL 1') !== FALSE || strpos($factura->referencias, 'INICIAL 2') !== FALSE || strpos($factura->referencias, 'INI') !== FALSE)
                                                        PENSIÓN: 60
                                                        @elseif(strpos($factura->referencias, 'PRIMERO DE EGB') !== FALSE || strpos($factura->referencias, 'SEGUNDO DE EGB') !== FALSE || strpos($factura->referencias, 'TERCERO DE EGB') !== FALSE || strpos($factura->referencias, 'CUARTO DE EGB') !== FALSE || strpos($factura->referencias, 'QUINTO DE EGB') !== FALSE || strpos($factura->referencias, 'SEXTO DE EGB') !== FALSE || strpos($factura->referencias, 'SEPTIMO DE EGB') !== FALSE || strpos($factura->referencias, 'OCTAVO DE EGB') !== FALSE || strpos($factura->referencias, 'NOVENO DE EGB') !== FALSE || strpos($factura->referencias, 'DECIMO DE EGB') !== FALSE || strpos($factura->referencias, '1RO') !== FALSE || strpos($factura->referencias, '8VO') !== FALSE)
                                                        PENSIÓN: 65
                                                        @elseif(strpos($factura->referencias, 'PRIMERO DE BACHILLERATO') !== FALSE || strpos($factura->referencias, 'SEGUNDO DE BACHILLERATO') !== FALSE)
                                                        PENSIÓN: 70
                                                        @elseif(strpos($factura->referencias, 'TERCERO DE BACHILLERATO') !== FALSE)
                                                        PENSIÓN: 95
                                                        @endif
                                                        @if($factura->fecha_inicio !== null && $factura->num_referencia !== null)
                                                        - FECHA INICIO : {{$factura->fecha_inicio}}   -    NUMERO DE REFERENCIA : {{$factura->num_referencia}}
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                        @endif
                                            </th>
                                        </tr>
                                                    <tr>
                                                        @if(strpos($factura->referencias, 'OCT') !== FALSE)
                                                        <th>OCT PENSIÓN: {{$factura->valor}} - FECHA INICIO : {{$factura->fecha_inicio}}   -    NUMERO DE REFERENCIA : {{$factura->num_referencia}}</th>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        @if(strpos($factura->referencias, 'NOV') !== FALSE)
                                                        <th>NOV PENSIÓN: {{$factura->valor}} - FECHA INICIO : {{$factura->fecha_inicio}}   -    NUMERO DE REFERENCIA : {{$factura->num_referencia}}</th>
                                                        @else
                                                        <th>NOV PENSIÓN: 0</th>
                                                         @endif
                                                    </tr>
                                                    <tr>
                                                        @if(strpos($factura->referencias, 'DIC') !== FALSE)
                                                        <th>DIC PENSIÓN: {{$factura->valor}} - FECHA INICIO : {{$factura->fecha_inicio}}   -    NUMERO DE REFERENCIA : {{$factura->num_referencia}}</th>
                                                        @else
                                                        <th>DIC PENSIÓN: 0</th>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        @if(strpos($factura->referencias, 'ENE') !== FALSE)
                                                        <th>ENE PENSIÓN: {{$factura->valor}} - FECHA INICIO : {{$factura->fecha_inicio}}   -    NUMERO DE REFERENCIA : {{$factura->num_referencia}}</th>
                                                        @else
                                                        <th>ENE PENSIÓN: 0</th>
                                                        @endif
                                                   </tr>
                                                    <tr>

                                                        @if(strpos($factura->referencias, 'FEB') !== FALSE)
                                                        <th>FEB PENSIÓN: {{$factura->valor}} - FECHA INICIO : {{$factura->fecha_inicio}}   -    NUMERO DE REFERENCIA : {{$factura->num_referencia}}</th>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        @if(strpos($factura->referencias, 'MAR') !== FALSE)
                                                        <th>MAR PENSIÓN: {{$factura->valor}} - FECHA INICIO : {{$factura->fecha_inicio}}   -    NUMERO DE REFERENCIA : {{$factura->num_referencia}}</th>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        @if(strpos($factura->referencias, 'ABR') !== FALSE)
                                                        <th>ABR PENSIÓN: {{$factura->valor}} - FECHA INICIO : {{$factura->fecha_inicio}}   -    NUMERO DE REFERENCIA : {{$factura->num_referencia}}</th>
                                                        @else
                                                        <th>ABR PENSIÓN: 0</th>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        @if(strpos($factura->referencias, 'MAY') !== FALSE)
                                                        <th>MAY PENSIÓN: {{$factura->valor}} - FECHA INICIO : {{$factura->fecha_inicio}}   -    NUMERO DE REFERENCIA : {{$factura->num_referencia}}</th>
                                                        @else
                                                        <th>MAY PENSIÓN: 0</th>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        @if(strpos($factura->referencias, 'JUN') !== FALSE)
                                                        <th>JUN PENSIÓN: {{$factura->valor}} - FECHA INICIO : {{$factura->fecha_inicio}}   -    NUMERO DE REFERENCIA : {{$factura->num_referencia}}</th>
                                                        @else
                                                        <th>JUN PENSIÓN: 0</th>
                                                        @endif
                                                    </tr>

                                        </tr>
                                        @endforeach

                        @else
                        <img src="images/account-not-found.png" alt="" class="pull-right" style="border:1px solid #021a40;" width="100" height="100">
                        <tr>
                                <th>
                                    Nombres y apellidos:
                                </th>
                            </tr><tr>
                                 <th>
                                   Curso y paralelo:
                                 </th>
                             </tr>
                             <tr>
                                     <th>
                                         Sexo y edad:
                                     </th>
                                 </tr>
                                 <tr>
                                         <th>
                                             Dirección:
                                         </th>
                                     </tr>
                                     <tr>
                                             <th>
                                                 Representante:
                                             </th>
                                         </tr>
                                         <tr>
                                                 <th>
                                                     Telefonos:
                                                 </th>
                                             </tr>
                                             <tr>
                                                    <th class="text-center" style="background-color: #008cba; color: white;">
                                                        PAGOS
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        SEP:
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                            OCT:
                                                        </th>
                                                    </tr>
                                                   <tr>
                                                        <th>
                                                                NOV:

                                                            </th>
                                                   </tr>
                                                            <tr>
                                                            <th>
                                                                    DIC:

                                                                </th>
                                                       </tr>
                                                                <tr>
                                                                <th>
                                                                        ENE:

                                                                    </th>
                                                           </tr>
                                                                    <tr>
                                                                    <th>
                                                                            FEB:

                                                                        </th>
                                                               </tr>
                                                                        <tr>
                                                                        <th>
                                                                                MAR:

                                                                            </th>
                                                                   </tr>
                                                                            <tr>
                                                                            <th>
                                                                                    ABR:

                                                                                </th>
                                                                       </tr>
                                                                                <tr>
                                                                                <th>
                                                                                        MAY:

                                                                                    </th>
                                                                           </tr>
                                                                                    <tr>
                                                                                    <th>
                                                                                            JUN:
                                                                                        </th>
                                                                               </tr
                                        @endif

                   </thead>
               </table>
            </div>
        </div>
    </div>
        </div>
            </div>
@endsection
