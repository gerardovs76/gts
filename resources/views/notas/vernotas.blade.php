@extends('layouts.app')

@section('content')
	
	<div class="container col-xs-12 col-sm-12 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			LISTA DE NOTAS
		</h2>
		</div>

        <hr>
        @include('notas.partials.error')
				@include('notas.partials.info')


					{!! Form::open(['route' => 'notas.cargar-notas-store']) !!}
					<div class="panel panel-primary">
						<div class="panel panel-heading text-center">POR FAVOR INTRODUZCA LOS DATOS PARA LA BUSQUEDA</div>
						<div class="panel panel-body">
							<div class="form-row">

                                        @if(Auth::user()->isRole('super-admin'))
                                        <div class="form-group col-md-4">
                                             <strong>Curso: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                             {{ Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Seleccione el curso...']) }}
                                             </div>
                                             </div>
                                             <div class="form-group col-md-4">
                                             <strong>Paralelo: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-sort-alpha-up"></i></span>
                                             {{ Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Seleccione el paralelo...']) }}
                                             </div>
                                             </div>
                                             @elseif(Auth::user()->isRole('profesor'))
                                             <div class="form-group col-md-4">
                                                    <strong>Curso: <br></strong>
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                    {{ Form::select('curso',[], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Ingrese curso']) }}
                                                    </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <strong>Paralelo: <br></strong>
                                                    <div class="input-group-prepend">
                                                         <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                                    {{ Form::select('paralelo',[], null, ['class' => 'form-control col-md-6' , 'id' => 'paralelo', 'placeholder' => 'Ingrese paralelo']) }}
                                                    </div>
                                                    </div>
                                            @endif
                                              <div class="form-group col-md-4">
                                             <strong>Quimestre: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                             {{ Form::select('quimestre',['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6' , 'id' => 'quimestre', 'placeholder' => 'Seleccione el quimestre...']) }}
                                             </div>
                                             </div>
                                             <div class="form-group col-md-4">
                                             <strong>Parcial: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                             {{ Form::select('parcial',['1' => '1', '2' => '2', '3' => '3', 'Q' => 'Quimestre'], null, ['class' => 'form-control col-md-6' , 'id' => 'parcial', 'placeholder' => 'Seleccione el parcial...']) }}
                                             </div>
                                             </div>
                                             <div class="form-group col-md-4">
                                             <strong>Materia: <br></strong>
                                             <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                             {{ Form::select('materia',[], null, ['class' => 'form-control col-md-6' , 'id' => 'materia', 'placeholder' => 'Seleccione la materia...']) }}
                                             </div>
                                             </div>

								<div class="form-group col-md-10">
@php
	if(isset($parcial)){
		if($parcial == "Q") {
			$mostrarParcial = "Resumen Quimestral";
		} else {
			$mostrarParcial = "Parcial: ".$parcial;
		}
	}
@endphp
                                       {!! Form::button('<i class="fas fa-clipboard"></i> VER NOTAS', ['class' => 'btn btn-primary','type' => 'submit', 'id' => 'verNotas']) !!}
                                        @if(isset($curso) && isset($paralelo))
                                       <p class="pull-right" style="font-size: 20px;"><strong><em>Curso: {{$curso}} - Paralelo: {{$paralelo}} - {{$mostrarParcial}} - Quimestre: {{$quimestre}}</em></strong></p>
                                       @else
                                       <p class="pull-right"><em>Curso: - Paralelo: - Parcial: - Quimestre:  </em></p>
                                       @endif
								</div>

							</div>
							<h2  id="mostrar-materia"class="text-center text-uppercase"></h2>
						</div>
						
					</div>


    <table class="table table-bordered table-hover" id="tableid">
			<thead>
			@if(isset($curso))
				<tr>
					<th>
						<p>
						<strong>ALUMNOS</strong>
						</p>
					</th>
				@if(isset($parcial))
					@if($parcial != 'Q')
						<th>
							<p>TRABAJO ACADEMICO</p>
						</th>
						<th>
							<p>TAREAS INDIVIDUALES</p>
						</th>
						<th>
							<p>TAREAS GRUPALES</p>
						</th>
						<th>
							<p>LECCIONES</p>
						</th>
						<th>
							<p>EVALUACIONES</p>
						</th>
					@else
						<th>
							<p>1er Parcial</p>
						</th>
						<th>
							<p>2do Parcial</p>
						</th>
						<th>
							<p>3er Parcial</p>
						</th>
						<th>
							<p>Promedio 80%</p>
						</th>
					@endif
				@endif
					
					<th>
							@if(isset($quimestre))
							@if($quimestre == '1')
							<p>EXAMEN 1ER QUIM.</p>
							@elseif($quimestre == '2')
							<p>EXAMEN 2DO QUIM.</p>
							@else
							<p>EXAMEN</p>
							@endif
							@else
							<p>EXAMEN</p>
							@endif
					</th>
				@if(isset($parcial))
					@if($parcial == 'Q')
					<th>
						<p>Examen 20%</p>
					</th>
					@endif
				@endif
					<th>
						<p>PROMEDIO</p>
					</th>
				</tr>
			@endif
			</thead>
			<tbody id="tableid">
			@if(isset($notas))

			@foreach($notas as $nota)
				<tr>
					<td><strong>{{$nota->apellidos}} {{$nota->nombres}}</strong></td>
@if(isset($parcial))
	@if($parcial != 'Q')
		{{-- Notas TA --}} 
				@if($nota->notas_ta->count() != 0)
						@foreach($nota->notas_ta as $notas_ta)
								@php
										$nota_final_ta = ($notas_ta->nota_ta1 + $notas_ta->nota_ta2 + $notas_ta->nota_ta3 + $notas_ta->nota_ta4 + $notas_ta->nota_ta5);
										$numero_nota_final_ta = (($notas_ta->nota_ta1 == 0 ? 0 : 1) + ($notas_ta->nota_ta2 == 0 ? 0 : 1) + ($notas_ta->nota_ta3 == 0 ? 0 : 1) + ($notas_ta->nota_ta4 == 0 ? 0 : 1) + ($notas_ta->nota_ta5 == 0 ? 0 : 1));
										if($nota_final_ta == 0 && $numero_nota_final_ta == 0){
												$nota_promedio_ta = 0;
										}
										else{
												$nota_promedio_ta = round(($nota_final_ta) / ($numero_nota_final_ta), 2);
										}
								@endphp
								@if($nota_promedio_ta >= 7)
									@php
										$clase_ta = "green";
									@endphp
								@else
									@php
										$clase_ta = "red"
									@endphp
								@endif
						@endforeach
				@else
					@php
						$clase_ta = "red";
						$nota_promedio_ta = 0;
					@endphp
				@endif    
		{{-- FIN Notas TA --}}  

		{{-- Notas TI --}} 
			@if($nota->notas_ti->count() != 0)
				@foreach($nota->notas_ti as $notas_ti)
					@php
						$nota_final_ti = ($notas_ti->nota_ti1 + $notas_ti->nota_ti2 + $notas_ti->nota_ti3 + $notas_ti->nota_ti4 + $notas_ti->nota_ti5);
						$numero_nota_final_ti = (($notas_ti->nota_ti1 == 0 ? 0 : 1) + ($notas_ti->nota_ti2 == 0 ? 0 : 1) + ($notas_ti->nota_ti3 == 0 ? 0 : 1) + ($notas_ti->nota_ti4 == 0 ? 0 : 1) + ($notas_ti->nota_ti5 == 0 ? 0 : 1));
						if($nota_final_ti == 0 && $numero_nota_final_ti == 0){
								$nota_promedio_ti = 0;
						}
						else{
								$nota_promedio_ti = round(($nota_final_ti) / ($numero_nota_final_ti), 2);
						}
					@endphp
					@if($nota_promedio_ti >= 7)
						@php
							$clase_ti = "green";
						@endphp
					@else
						@php
							$clase_ti = "red"
						@endphp
					@endif
				@endforeach
			@else
				@php
					$clase_ti = "red";
					$nota_promedio_ti = 0;
				@endphp
			@endif
		{{-- FIN Notas TI --}}  

		{{-- Notas TG --}} 
			@if($nota->notas_tg->count() != 0)
				@foreach($nota->notas_tg as $notas_tg)
					@php
						$nota_final_tg = ($notas_tg->nota_tg1 + $notas_tg->nota_tg2 + $notas_tg->nota_tg3 + $notas_tg->nota_tg4 + $notas_tg->nota_tg5);
						$numero_nota_final_tg = (($notas_tg->nota_tg1 == 0 ? 0 : 1) + ($notas_tg->nota_tg2 == 0 ? 0 : 1) + ($notas_tg->nota_tg3 == 0 ? 0 : 1) + ($notas_tg->nota_tg4 == 0 ? 0 : 1) + ($notas_tg->nota_tg5 == 0 ? 0 : 1));
						if($nota_final_tg == 0 && $numero_nota_final_tg == 0){
								$nota_promedio_tg = 0;
						}
						else{
								$nota_promedio_tg = round(($nota_final_tg) / ($numero_nota_final_tg), 2);
						}
					@endphp
					@if($nota_promedio_tg >= 7)
						@php
							$clase_tg = "green";
						@endphp
					@else
						@php
							$clase_tg = "red"
						@endphp
					@endif
				@endforeach
			@else
				@php
					$clase_tg = "red";
					$nota_promedio_tg = 0;
				@endphp
			@endif
		{{-- FIN Notas TG --}} 

		{{-- Notas LE --}} 
			@if($nota->notas_le->count() != 0)
				@foreach($nota->notas_le as $notas_le)
					@php
						$nota_final_le = ($notas_le->nota_le1 + $notas_le->nota_le2 + $notas_le->nota_le3 + $notas_le->nota_le4 + $notas_le->nota_le5);
						$numero_nota_final_le = (($notas_le->nota_le1 == 0 ? 0 : 1) + ($notas_le->nota_le2 == 0 ? 0 : 1) + ($notas_le->nota_le3 == 0 ? 0 : 1) + ($notas_le->nota_le4 == 0 ? 0 : 1) + ($notas_le->nota_le5 == 0 ? 0 : 1));
						if($nota_final_le == 0 && $numero_nota_final_le == 0){
								$nota_promedio_le = 0;
						}
						else{
								$nota_promedio_le = round(($nota_final_le) / ($numero_nota_final_le), 2);
						}
					@endphp
					@if($nota_promedio_le >= 7)
						@php
							$clase_le = "green";
						@endphp
					@else
						@php
							$clase_le = "red"
						@endphp
					@endif
				@endforeach
			@else
				@php
					$clase_le = "red";
					$nota_promedio_le = 0;
				@endphp
			@endif 
		{{-- FIN Notas LE --}} 	
			
		{{-- Notas EV --}} 
			@if($nota->notas_ev->count() != 0)
				@foreach($nota->notas_ev as $notas_ev)
					@php
						$nota_final_ev = ($notas_ev->nota_ev1 + $notas_ev->nota_ev2 + $notas_ev->nota_ev3 + $notas_ev->nota_ev4 + $notas_ev->nota_ev5);
						$numero_nota_final_ev = (($notas_ev->nota_ev1 == 0 ? 0 : 1) + ($notas_ev->nota_ev2 == 0 ? 0 : 1) + ($notas_ev->nota_ev3 == 0 ? 0 : 1) + ($notas_ev->nota_ev4 == 0 ? 0 : 1) + ($notas_ev->nota_ev5 == 0 ? 0 : 1));
						if($nota_final_ev == 0 && $numero_nota_final_ev == 0){
								$nota_promedio_ev = 0;
						}
						else{
								$nota_promedio_ev = round(($nota_final_ev) / ($numero_nota_final_ev), 2);
						}
					@endphp
				@if($nota_promedio_ev >= 7)
					@php
						$clase_ev = "green";
					@endphp
				@else
					@php
						$clase_ev = "red"
					@endphp
				@endif
				@endforeach
			@else
				@php
					$clase_ev = "red";
					$nota_promedio_ev = 0;
				@endphp
			@endif
		{{-- FIN Notas EV --}} 

		
				
				<td style="color: {{$clase_ta}}">{{$nota_promedio_ta}}</td>
				<td style="color: {{$clase_ti}}">{{$nota_promedio_ti}}</td>
				<td style="color: {{$clase_tg}}">{{$nota_promedio_tg}}</td>
				<td style="color: {{$clase_le}}">{{$nota_promedio_le}}</td>
				<td style="color: {{$clase_ev}}">{{$nota_promedio_ev}}</td>
				
	@else
@php
$nota_promedio_ta1=0;
$nota_promedio_ta2=0;
$nota_promedio_ta3=0;
$nota_promedio_ti1=0;
$nota_promedio_ti2=0;
$nota_promedio_ti3=0;
$nota_promedio_tg1=0;
$nota_promedio_tg2=0;
$nota_promedio_tg3=0;
$nota_promedio_le1=0;
$nota_promedio_le2=0;
$nota_promedio_le3=0;
$nota_promedio_ev1=0;
$nota_promedio_ev2=0;
$nota_promedio_ev3=0;
$promedio_final=0;
@endphp
{{-- Notas TA --}} 

@foreach($nota->notas_ta as $nota_ta)
@if($nota_ta->parcial == 1)

			@if($nota_ta->count() != 0)
				@php
						$nota_final_ta = ($nota_ta->nota_ta1 + $nota_ta->nota_ta2 + $nota_ta->nota_ta3 + $nota_ta->nota_ta4 + $nota_ta->nota_ta5);
						$numero_nota_final_ta = (($nota_ta->nota_ta1 == 0 ? 0 : 1) + ($nota_ta->nota_ta2 == 0 ? 0 : 1) + ($nota_ta->nota_ta3 == 0 ? 0 : 1) + ($nota_ta->nota_ta4 == 0 ? 0 : 1) + ($nota_ta->nota_ta5 == 0 ? 0 : 1));
						if($nota_final_ta == 0 && $numero_nota_final_ta == 0){
								$nota_promedio_ta1 = 0;
						}
						else{
								$nota_promedio_ta1 = round(($nota_final_ta) / ($numero_nota_final_ta), 2);
						}
				@endphp
			@else
				@php $nota_promedio_ta1 = 0; @endphp
			@endif    

	@endif
	@if($nota_ta->parcial == 2)

			@if($nota_ta->count() != 0)
				@php
						$nota_final_ta = ($nota_ta->nota_ta1 + $nota_ta->nota_ta2 + $nota_ta->nota_ta3 + $nota_ta->nota_ta4 + $nota_ta->nota_ta5);
						$numero_nota_final_ta = (($nota_ta->nota_ta1 == 0 ? 0 : 1) + ($nota_ta->nota_ta2 == 0 ? 0 : 1) + ($nota_ta->nota_ta3 == 0 ? 0 : 1) + ($nota_ta->nota_ta4 == 0 ? 0 : 1) + ($nota_ta->nota_ta5 == 0 ? 0 : 1));
						if($nota_final_ta == 0 && $numero_nota_final_ta == 0){
								$nota_promedio_ta2 = 0;
						}
						else{
								$nota_promedio_ta2 = round(($nota_final_ta) / ($numero_nota_final_ta), 2);
						}
				@endphp
			@else
				@php $nota_promedio_ta2 = 0; @endphp
			@endif    

	@endif
	@if($nota_ta->parcial == 3)

			@if($nota_ta->count() != 0)
				@php
						$nota_final_ta = ($nota_ta->nota_ta1 + $nota_ta->nota_ta2 + $nota_ta->nota_ta3 + $nota_ta->nota_ta4 + $nota_ta->nota_ta5);
						$numero_nota_final_ta = (($nota_ta->nota_ta1 == 0 ? 0 : 1) + ($nota_ta->nota_ta2 == 0 ? 0 : 1) + ($nota_ta->nota_ta3 == 0 ? 0 : 1) + ($nota_ta->nota_ta4 == 0 ? 0 : 1) + ($nota_ta->nota_ta5 == 0 ? 0 : 1));
						if($nota_final_ta == 0 && $numero_nota_final_ta == 0){
								$nota_promedio_ta3 = 0;
						}
						else{
								$nota_promedio_ta3 = round(($nota_final_ta) / ($numero_nota_final_ta), 2);
						}
				@endphp
			@else
				@php $nota_promedio_ta3 = 0; @endphp
			@endif    

	@endif
@endforeach

{{-- FIN Notas TA --}} 

{{-- Notas TI --}} 
@foreach($nota->notas_ti as $nota_ti)
@if($nota_ti->parcial == 1)

			@if($nota_ti->count() != 0)
				@php
						$nota_final_ti = ($nota_ti->nota_ti1 + $nota_ti->nota_ti2 + $nota_ti->nota_ti3 + $nota_ti->nota_ti4 + $nota_ti->nota_ti5);
						$numero_nota_final_ti = (($nota_ti->nota_ti1 == 0 ? 0 : 1) + ($nota_ti->nota_ti2 == 0 ? 0 : 1) + ($nota_ti->nota_ti3 == 0 ? 0 : 1) + ($nota_ti->nota_ti4 == 0 ? 0 : 1) + ($nota_ti->nota_ti5 == 0 ? 0 : 1));
						if($nota_final_ti == 0 && $numero_nota_final_ti == 0){
								$nota_promedio_ti1 = 0;
						}
						else{
								$nota_promedio_ti1 = round(($nota_final_ti) / ($numero_nota_final_ti), 2);
						}
				@endphp
			@else
				@php $nota_promedio_ti1 = 0; @endphp
			@endif    

	@endif
	@if($nota_ti->parcial == 2)

			@if($nota_ti->count() != 0)
				@php
						$nota_final_ti = ($nota_ti->nota_ti1 + $nota_ti->nota_ti2 + $nota_ti->nota_ti3 + $nota_ti->nota_ti4 + $nota_ti->nota_ti5);
						$numero_nota_final_ti = (($nota_ti->nota_ti1 == 0 ? 0 : 1) + ($nota_ti->nota_ti2 == 0 ? 0 : 1) + ($nota_ti->nota_ti3 == 0 ? 0 : 1) + ($nota_ti->nota_ti4 == 0 ? 0 : 1) + ($nota_ti->nota_ti5 == 0 ? 0 : 1));
						if($nota_final_ti == 0 && $numero_nota_final_ti == 0){
								$nota_promedio_ti2 = 0;
						}
						else{
								$nota_promedio_ti2 = round(($nota_final_ti) / ($numero_nota_final_ti), 2);
						}
				@endphp
			@else
				@php $nota_promedio_ti2 = 0; @endphp
			@endif    

	@endif
	@if($nota_ti->parcial == 3)

			@if($nota_ti->count() != 0)
				@php
						$nota_final_ti = ($nota_ti->nota_ti1 + $nota_ti->nota_ti2 + $nota_ti->nota_ti3 + $nota_ti->nota_ti4 + $nota_ti->nota_ti5);
						$numero_nota_final_ti = (($nota_ti->nota_ti1 == 0 ? 0 : 1) + ($nota_ti->nota_ti2 == 0 ? 0 : 1) + ($nota_ti->nota_ti3 == 0 ? 0 : 1) + ($nota_ti->nota_ti4 == 0 ? 0 : 1) + ($nota_ti->nota_ti5 == 0 ? 0 : 1));
						if($nota_final_ti == 0 && $numero_nota_final_ti == 0){
								$nota_promedio_ti3 = 0;
						}
						else{
								$nota_promedio_ti3 = round(($nota_final_ti) / ($numero_nota_final_ti), 2);
						}
				@endphp
			@else
				@php $nota_promedio_ti3 = 0; @endphp
			@endif    

	@endif
@endforeach

	{{-- FIN Notas TI --}} 

	{{-- Notas TI --}} 
@foreach($nota->notas_tg as $nota_tg)
@if($nota_tg->parcial == 1)

			@if($nota_tg->count() != 0)
				@php
						$nota_final_tg = ($nota_tg->nota_tg1 + $nota_tg->nota_tg2 + $nota_tg->nota_tg3 + $nota_tg->nota_tg4 + $nota_tg->nota_tg5);
						$numero_nota_final_tg = (($nota_tg->nota_tg1 == 0 ? 0 : 1) + ($nota_tg->nota_tg2 == 0 ? 0 : 1) + ($nota_tg->nota_tg3 == 0 ? 0 : 1) + ($nota_tg->nota_tg4 == 0 ? 0 : 1) + ($nota_tg->nota_tg5 == 0 ? 0 : 1));
						if($nota_final_tg == 0 && $numero_nota_final_tg == 0){
								$nota_promedio_tg1 = 0;
						}
						else{
								$nota_promedio_tg1 = round(($nota_final_tg) / ($numero_nota_final_tg), 2);
						}
				@endphp
			@else
				@php $nota_promedio_tg1 = 0; @endphp
			@endif    

	@endif
	@if($nota_tg->parcial == 2)

			@if($nota_tg->count() != 0)
				@php
						$nota_final_tg = ($nota_tg->nota_tg1 + $nota_tg->nota_tg2 + $nota_tg->nota_tg3 + $nota_tg->nota_tg4 + $nota_tg->nota_tg5);
						$numero_nota_final_tg = (($nota_tg->nota_tg1 == 0 ? 0 : 1) + ($nota_tg->nota_tg2 == 0 ? 0 : 1) + ($nota_tg->nota_tg3 == 0 ? 0 : 1) + ($nota_tg->nota_tg4 == 0 ? 0 : 1) + ($nota_tg->nota_tg5 == 0 ? 0 : 1));
						if($nota_final_tg == 0 && $numero_nota_final_tg == 0){
								$nota_promedio_tg2 = 0;
						}
						else{
								$nota_promedio_tg2 = round(($nota_final_tg) / ($numero_nota_final_tg), 2);
						}
				@endphp
			@else
				@php $nota_promedio_tg2 = 0; @endphp
			@endif    

	@endif
	@if($nota_tg->parcial == 3)

			@if($nota_tg->count() != 0)
				@php
						$nota_final_tg = ($nota_tg->nota_tg1 + $nota_tg->nota_tg2 + $nota_tg->nota_tg3 + $nota_tg->nota_tg4 + $nota_tg->nota_tg5);
						$numero_nota_final_tg = (($nota_tg->nota_tg1 == 0 ? 0 : 1) + ($nota_tg->nota_tg2 == 0 ? 0 : 1) + ($nota_tg->nota_tg3 == 0 ? 0 : 1) + ($nota_tg->nota_tg4 == 0 ? 0 : 1) + ($nota_tg->nota_tg5 == 0 ? 0 : 1));
						if($nota_final_tg == 0 && $numero_nota_final_tg == 0){
								$nota_promedio_tg3 = 0;
						}
						else{
								$nota_promedio_tg3 = round(($nota_final_tg) / ($numero_nota_final_tg), 2);
						}
				@endphp
			@else
@php 				$nota_promedio_tg3 = 0; @endphp
			@endif    

	@endif
@endforeach

	{{-- FIN Notas TG --}} 

	{{-- Notas LE --}} 
@foreach($nota->notas_le as $nota_le)
@if($nota_le->parcial == 1)

			@if($nota_le->count() != 0)
				@php
						$nota_final_le = ($nota_le->nota_le1 + $nota_le->nota_le2 + $nota_le->nota_le3 + $nota_le->nota_le4 + $nota_le->nota_le5);
						$numero_nota_final_le = (($nota_le->nota_le1 == 0 ? 0 : 1) + ($nota_le->nota_le2 == 0 ? 0 : 1) + ($nota_le->nota_le3 == 0 ? 0 : 1) + ($nota_le->nota_le4 == 0 ? 0 : 1) + ($nota_le->nota_le5 == 0 ? 0 : 1));
						if($nota_final_le == 0 && $numero_nota_final_le == 0){
								$nota_promedio_le1 = 0;
						}
						else{
								$nota_promedio_le1 = round(($nota_final_le) / ($numero_nota_final_le), 2);
						}
				@endphp
			@else
				@php $nota_promedio_le1 = 0; @endphp
			@endif       

	@endif
	@if($nota_le->parcial == 2)

			@if($nota_le->count() != 0)
				@php
						$nota_final_le = ($nota_le->nota_le1 + $nota_le->nota_le2 + $nota_le->nota_le3 + $nota_le->nota_le4 + $nota_le->nota_le5);
						$numero_nota_final_le = (($nota_le->nota_le1 == 0 ? 0 : 1) + ($nota_le->nota_le2 == 0 ? 0 : 1) + ($nota_le->nota_le3 == 0 ? 0 : 1) + ($nota_le->nota_le4 == 0 ? 0 : 1) + ($nota_le->nota_le5 == 0 ? 0 : 1));
						if($nota_final_le == 0 && $numero_nota_final_le == 0){
								$nota_promedio_le2 = 0;
						}
						else{
								$nota_promedio_le2 = round(($nota_final_le) / ($numero_nota_final_le), 2);
						}
				@endphp
			@else
				@php $nota_promedio_le2 = 0; @endphp
			@endif    

	@endif
	@if($nota_le->parcial == 3)

			@if($nota_le->count() != 0)
				@php
						$nota_final_le = ($nota_le->nota_le1 + $nota_le->nota_le2 + $nota_le->nota_le3 + $nota_le->nota_le4 + $nota_le->nota_le5);
						$numero_nota_final_le = (($nota_le->nota_le1 == 0 ? 0 : 1) + ($nota_le->nota_le2 == 0 ? 0 : 1) + ($nota_le->nota_le3 == 0 ? 0 : 1) + ($nota_le->nota_le4 == 0 ? 0 : 1) + ($nota_le->nota_le5 == 0 ? 0 : 1));
						if($nota_final_le == 0 && $numero_nota_final_le == 0){
								$nota_promedio_le3 = 0;
						}
						else{
								$nota_promedio_le3 = round(($nota_final_le) / ($numero_nota_final_le), 2);
						}
				@endphp
			@else
				@php $nota_promedio_le3 = 0; @endphp
			@endif    

	@endif
@endforeach

	{{-- FIN Notas LE --}} 

	{{-- Notas EV --}} 
@foreach($nota->notas_ev as $nota_ev)
@if($nota_ev->parcial == 1)

			@if($nota_ev->count() != 0)
				@php
						$nota_final_ev = ($nota_ev->nota_ev1 + $nota_ev->nota_ev2 + $nota_ev->nota_ev3 + $nota_ev->nota_ev4 + $nota_ev->nota_ev5);
						$numero_nota_final_ev = (($nota_ev->nota_ev1 == 0 ? 0 : 1) + ($nota_ev->nota_ev2 == 0 ? 0 : 1) + ($nota_ev->nota_ev3 == 0 ? 0 : 1) + ($nota_ev->nota_ev4 == 0 ? 0 : 1) + ($nota_ev->nota_ev5 == 0 ? 0 : 1));
						if($nota_final_ev == 0 && $numero_nota_final_ev == 0){
								$nota_promedio_ev1 = 0;
						}
						else{
								$nota_promedio_ev1 = round(($nota_final_ev) / ($numero_nota_final_ev), 2);
						}
				@endphp
			@else
				@php $nota_promedio_ev1 = 0; @endphp
			@endif    

	@endif
	@if($nota_ev->parcial == 2)

			@if($nota_ev->count() != 0)
				@php
						$nota_final_ev = ($nota_ev->nota_ev1 + $nota_ev->nota_ev2 + $nota_ev->nota_ev3 + $nota_ev->nota_ev4 + $nota_ev->nota_ev5);
						$numero_nota_final_ev = (($nota_ev->nota_ev1 == 0 ? 0 : 1) + ($nota_ev->nota_ev2 == 0 ? 0 : 1) + ($nota_ev->nota_ev3 == 0 ? 0 : 1) + ($nota_ev->nota_ev4 == 0 ? 0 : 1) + ($nota_ev->nota_ev5 == 0 ? 0 : 1));
						if($nota_final_ev == 0 && $numero_nota_final_ev == 0){
								$nota_promedio_ev2 = 0;
						}
						else{
								$nota_promedio_ev2 = round(($nota_final_ev) / ($numero_nota_final_ev), 2);
						}
				@endphp
			@else
				@php $nota_promedio_ev2 = 0; @endphp
			@endif    

	@endif
	@if($nota_ev->parcial == 3)

			@if($nota_ev->count() != 0)
				@php
						$nota_final_ev = ($nota_ev->nota_ev1 + $nota_ev->nota_ev2 + $nota_ev->nota_ev3 + $nota_ev->nota_ev4 + $nota_ev->nota_ev5);
						$numero_nota_final_ev = (($nota_ev->nota_ev1 == 0 ? 0 : 1) + ($nota_ev->nota_ev2 == 0 ? 0 : 1) + ($nota_ev->nota_ev3 == 0 ? 0 : 1) + ($nota_ev->nota_ev4 == 0 ? 0 : 1) + ($nota_ev->nota_ev5 == 0 ? 0 : 1));
						if($nota_final_ev == 0 && $numero_nota_final_ev == 0){
								$nota_promedio_ev3 = 0;
						}
						else{
								$nota_promedio_ev3 = round(($nota_final_ev) / ($numero_nota_final_ev), 2);
						}
				@endphp
			@else
				@php $nota_promedio_ev3 = 0; @endphp
			@endif    

	@endif
@endforeach

	{{-- FIN Notas EV --}} 

	{{-- PARCIAL 1 --}}
@php 
	$suma_parcial_1 = $nota_promedio_ta1 + $nota_promedio_ti1 + $nota_promedio_tg1 + $nota_promedio_le1 + $nota_promedio_ev1;
	$promedio_parcial_1 = round($suma_parcial_1/5, 2);
	if($promedio_parcial_1 >= 7) {
		$clase1 = "green";
	} else {
		$clase1 = "red";
	}
@endphp
{{-- PARCIAL 2 --}}
@php 
	$suma_parcial_2 = $nota_promedio_ta2 + $nota_promedio_ti2 + $nota_promedio_tg2 + $nota_promedio_le2 + $nota_promedio_ev2;
	$promedio_parcial_2 = round($suma_parcial_2/5, 2);
	if($promedio_parcial_2 >= 7) {
		$clase2 = "green";
	} else {
		$clase2 = "red";
	}
@endphp
{{-- PARCIAL 3 --}}
@php 
	$suma_parcial_3 = $nota_promedio_ta3 + $nota_promedio_ti3 + $nota_promedio_tg3 + $nota_promedio_le3 + $nota_promedio_ev3;
	$promedio_parcial_3 = round($suma_parcial_3/5, 2);
	if($promedio_parcial_3 >= 7) {
		$clase3 = "green";
	} else {
		$clase3 = "red";
	}
@endphp

{{-- Promedio 80% --}}
@php
	$promedio80 = $promedio_parcial_1 + $promedio_parcial_2 + $promedio_parcial_3;
	$promedio80 = round(($promedio80/3*0.8), 2);
	if($promedio80 >= 7) {
		$clase80 = "green";
	} else {
		$clase80 = "red";
	}
@endphp
				<td style="color: {{$clase1}}">{{$promedio_parcial_1}}</td>
				<td style="color: {{$clase2}}">{{$promedio_parcial_2}}</td>
				<td style="color: {{$clase3}}">{{$promedio_parcial_3}}</td>
				<td style="color: {{$clase80}}">{{$promedio80}}</td>
	@endif
@endif

{{-- CONDUCTA --}} 
	@if($nota->notas_conducta->count() != 0)
		@foreach($nota->notas_conducta as $notas_conducta)
			@php $nota_final_conducta = $notas_conducta->nota_final_conducta; @endphp
		@endforeach
	@else
	@php $nota_final_conducta = 0; @endphp
	@endif
{{-- CONDUCTA --}} 

{{-- EXAMEN --}} 

	@if($nota->notas_examen->count() != 0)
		@foreach($nota->notas_examen as $notas_examen)
			@php $nota_final_ex = $notas_examen->nota_final_examen; @endphp
			@if($nota_final_ex >= 7)
				@php $clase_ex = "green"; @endphp
			@else
				@php $clase_ex = "red"; @endphp
			@endif
		@endforeach
	@else
		@php 
			$clase_ex = "red"; 
			$nota_final_ex = 0;
		@endphp
	@endif
	@php
		$examen_20 = round($nota_final_ex * 0.2, 2);
	@endphp
{{-- FIN EXAMEN --}}	
{{-- PROMEDIOS --}} 
@if(isset($parcial))
	@if($parcial != 'Q')
		@php
			$nota_promedio_final = ((!isset($nota_promedio_ta) ? 0 : $nota_promedio_ta) + (!isset($nota_promedio_ti) ? 0 : $nota_promedio_ti) + (!isset($nota_promedio_tg) ? 0 : $nota_promedio_tg) + (!isset($nota_promedio_le) ? 0 : $nota_promedio_le) + (!isset($nota_promedio_ev) ? 0 : $nota_promedio_ev));
			$numero_promedio_final = ((!isset($nota_promedio_ta) ? 0 : 1) + (!isset($nota_promedio_ti) ? 0 : 1) + (!isset($nota_promedio_tg) ? 0 : 1) + (!isset($nota_promedio_le) ? 0 : 1) + (!isset($nota_promedio_ev) ? 0 : 1));
			if($nota_promedio_final == 0 && $numero_promedio_final == 0) {
				$promedio_final = 0;
			} else{
				$promedio_final = round(($nota_promedio_final) / ($numero_promedio_final), 2);
			}
		@endphp
		@if($promedio_final >= 7)
			@php $clase_pr = "green"; @endphp
		@else
			@php $clase_pr = "red"; @endphp
		@endif
	@else
		@php $promedio_final = $promedio80 + $examen_20; @endphp
		@if($promedio_final >= 7)
			@php $clase_pr = "green"; @endphp
		@else
			@php $clase_pr = "red"; @endphp
		@endif
	@endif
@endif

{{-- FIN PROMEDIOS --}}

				
				<td style="color: {{$clase_ex}}">{{$nota_final_ex}}</td>
	@if(isset($parcial))
		@if($parcial == 'Q')
				<td style="color: {{$clase_ex}}">{{$examen_20}}</td>
		@endif
	@endif
				<td style="color: {{$clase_pr}}">{{$promedio_final}}</td>

			</tr>
		@endforeach
	@else
			<tr>

			</tr>
	@endif
		</tbody>
	</table>
        {{ Form::close() }}
	</div>
</div>
@if(Auth::user()->isRole('profesor'))
<script>
$(document).ready(function(){
    var url1 = 'notas/cargar-notas-profesor';
    $.ajax({
        url: url1,
        success: function(response)
        {
            $.each(response, function(index, obj){
            $('#curso').append('<option value="'+obj.curso+'">'+obj.curso+'</option>');
        });
        },
        error: function(error)
        {

        }
        });
    });
</script>
<script>
    $(document).ready(() => {
        var url2 = 'notas/cargar-notas-profesor-paralelo';
        $.ajax({
            url: url2,
            success: function(response)
            {
                $.each(response, function(index, obj){
                $('#paralelo').append('<option value="'+obj.paralelo+'">'+obj.paralelo+'</option>');
                });
            },
            error: function(error)
            {

            }
        });
    });
</script>
@endif
{{-- <script>
    setInterval(() => {
        function bloquearTodo()
    {
        var curso = $('#curso option:selected').text();
        var paralelo = $('#paralelo option:selected').text();
        var parcial = $('#parcial').val();
        var quimestre = $('#quimestre').val();
        var materia = $('#materia').val();

        setInterval(() => {
            if(curso == '' || paralelo == '' || parcial == '' || quimestre == '' || materia == '')
            {
                console.log(curso);
                console.log(paralelo);
                console.log(parcial);
                console.log(materia);
                console.log(quimestre);
                $('#verNotas').attr("disabled", true);
            }
            else {
                console.log(curso);
                console.log(paralelo);
                console.log(parcial);
                console.log(materia);
                console.log(quimestre);
                $('#verNotas').attr("disabled", false);
            }
        }, 5);
    }
    bloquearTodo();
    }, 500);




</script> --}}
<script>
$('#paralelo').on('change', function(){
    var curso = $( "#curso option:selected" ).text();
    var paralelo  = $( "#paralelo option:selected" ).text();
	//console.log(curso, paralelo)
    var url3 = 'notas/cargar-materias/'+curso+'/'+paralelo;
    $.ajax({
        url: url3,
        success: function(response)
        {
            $.each(response, function(index, obj){
            $('#materia').append('<option value='+obj.id+'>'+obj.materia+'</option>');
            });
        },
        error: function(error)
        {

        }
    });
});
$(document).ready(function(){
	var curso = "<?php if(isset($curso)){echo $curso;} ?>";
    var paralelo  = "<?php if(isset($paralelo)){echo $paralelo;} ?>";
	var materia  = "<?php if(isset($materia)){echo $materia;} ?>";
	//console.log("este es " + curso + paralelo + materia);
    var url4 = 'notas/cargar-materias/'+curso+'/'+paralelo;
	if (curso) {
		$.ajax({
			url: url4,
			success: function(response)
			{
				//console.log(response);
				//console.log("El id de la materia es: " + materia);
				$.each(response, function(index, obj){
					if (materia == obj.id) {
						//console.log("La materia es: " + obj.materia)
						$('#mostrar-materia').html(obj.materia)
					}
				})
				
			},
			error: function(error)
			{
				console.log(error);
			}
		});
	}
	
});
</script>
@endsection
