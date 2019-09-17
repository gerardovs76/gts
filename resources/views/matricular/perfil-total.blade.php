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
                                    {!!Form::text('codigo',null, ['class' => 'form-control col-md-6', 'placeholder' => 'Ingrese la cedula...'])!!}
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
                       <img src="images/logo-pauld.png" alt="" class="pull-right"  style="border:1px solid #021a40;" width="100" height="100">
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
                                    Sexo y edad: {{$perfil->sexo}} {{$perfil->edad}} años
                                </th>
                            </tr>
                            <tr>
                                    <th>
                                        Dirección: {{$perfil->direccion_alumno}}
                                    </th>
                                </tr>
                                <tr>
                                        <th>
                                            Datos del representante: {{$perfil->cedrepresentante}},{{$perfil->nombres_representante}}, {{$perfil->tipo_persona}}
                                        </th>
                                    </tr>
                                    <tr>
                                            <th>
                                                Telefonos: {{$perfil->convencional}},{{$perfil->movil}}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" style="background-color: #008cba; color: white;">
                                                PAGOS
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                SEP: VALOR TOTAL: {{$perfil->valor}} - @if(strpos($perfil->referencias, 'SEP') !== FALSE)
                                                @if(strpos($perfil->referencias, 'INICIAL 1') !== FALSE || strpos($perfil->referencias, 'INICIAL 2') !== FALSE || strpos($perfil->referencias, 'INI') !== FALSE)
                                                PENSIÓN 60
                                                @elseif(strpos($perfil->referencias, 'PRIMERO DE EGB') !== FALSE || strpos($perfil->referencias, 'SEGUNDO DE EGB') !== FALSE || strpos($perfil->referencias, 'TERCERO DE EGB') !== FALSE || strpos($perfil->referencias, 'CUARTO DE EGB') !== FALSE || strpos($perfil->referencias, 'QUINTO DE EGB') !== FALSE || strpos($perfil->referencias, 'SEXTO DE EGB') !== FALSE || strpos($perfil->referencias, 'SEPTIMO DE EGB') !== FALSE || strpos($perfil->referencias, 'OCTAVO DE EGB') !== FALSE || strpos($perfil->referencias, 'NOVENO DE EGB') !== FALSE || strpos($perfil->referencias, 'DECIMO DE EGB') !== FALSE || strpos($perfil->referencias, '1RO') !== FALSE || strpos($perfil->referencias, '8VO') !== FALSE)
                                                65
                                                @elseif(strpos($perfil->referencias, 'PRIMERO DE BACHILLERATO') !== FALSE || strpos($perfil->referencias, 'SEGUNDO DE BACHILLERATO') !== FALSE)
                                                70
                                                @elseif(strpos($perfil->referencias, 'TERCERO DE BACHILLERATO') !== FALSE)
                                                95
                                                @endif
                                                @endif
                                                - FECHA INICIO : {{$perfil->fecha_inicio}}   -    NUMERO DE REFERENCIA : {{$perfil->num_referencia}}
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
