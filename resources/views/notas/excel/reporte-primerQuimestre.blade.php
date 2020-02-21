<table>
	<thead>
		<tr>

		</tr>
	</thead>
	<tbody>
		<tr>

		</tr>
		<tr>

		</tr>
		<tr>

		</tr>
		<tr>

		</tr>
		<tr>
		 	<td><strong>NIVEL: {{ $curso }}</strong></td>
		 	<td></td>
			<td><strong>PARALELO:  {{ $paralelo }}</strong></td>
		</tr>

		<tr>
			<td><strong>JORNADA: </strong></td>
		</tr>
	</tbody>
</table>

<table>
	
	<thead>
		<tr>
			<th><strong>ORD</strong></th>
			<th><strong>NOMBRES Y APELLIDOS</strong></th>
			@foreach($materias as $materia)
			<th><strong>{{ mb_strtoupper($materia->materia) }}</strong></th>
			@endforeach
			<th><strong>PROMEDIO</strong></th>
			<th><strong>COMPORTAMIENTO</strong></th>
			<th><strong>OBSERVACIONES</strong></th>
		</tr>
	</thead>
	<tbody>
		@php
		$i = 1;
		@endphp
		@foreach($notas as $nota)
		<tr>
			<td>{{$i++}}</td> 
			<td>{{mb_strtoupper($nota->apellidos)}} {{mb_strtoupper($nota->nombres)}}</td>
			@foreach($materias as $materia)
			@if($nota->notas_ta != [])
			@foreach($nota->notas_ta1 as $notas_ta)
				@if($notas_ta->materias_id == $materia->id)
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
				@endif
			@endforeach
		@else
		@endif

		@if($nota->notas_ti != [])
			@foreach($nota->notas_ti1 as $notas_ti)
				@if($notas_ti->materias_id == $materia->id)
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
				@endif
			@endforeach
		@else
		@endif

		@if($nota->notas_tg != [])
			@foreach($nota->notas_tg1 as $notas_tg)
				@if($notas_tg->materias_id == $materia->id)
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
				@endif
			@endforeach
		@else
		<td>0</td>
		@endif
		@if($nota->notas_le != [])
			@foreach($nota->notas_le1 as $notas_le)
				@if($notas_le->materias_id == $materia->id)
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
				@endif
			@endforeach
		@else
		@endif
		
		@if($nota->notas_ev != [])
			@foreach($nota->notas_ev1 as $notas_ev)
				@if($notas_ev->materias_id == $materia->id)
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
				@endif
			@endforeach
		@else
		@endif

				@php
					$nota_promedio_final = ((!isset($nota_promedio_ta) ? 0 : $nota_promedio_ta) + (!isset($nota_promedio_ti) ? 0 : $nota_promedio_ti) + (!isset($nota_promedio_tg) ? 0 : $nota_promedio_tg) + (!isset($nota_promedio_le) ? 0 : $nota_promedio_le) + (!isset($nota_promedio_ev) ? 0 : $nota_promedio_ev));
					$numero_promedio_final = ((!isset($nota_promedio_ta) ? 0 : 1) + (!isset($nota_promedio_ti) ? 0 : 1) + (!isset($nota_promedio_tg) ? 0 : 1) + (!isset($nota_promedio_le) ? 0 : 1) + (!isset($nota_promedio_ev) ? 0 : 1));
					if($nota_promedio_final == 0 && $numero_promedio_final == 0)
					{
						$promedio_final1 = 0;
					}
					else{
						$promedio_final1 = round(($nota_promedio_final) / ($numero_promedio_final), 2);
					}
				@endphp
				
				@if($nota->notas_ta != [])
				@foreach($nota->notas_ta2 as $notas_ta)
					@if($notas_ta->materias_id == $materia->id)
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
					@endif
				@endforeach
			@else
			@endif

			@if($nota->notas_ti != [])
				@foreach($nota->notas_ti2 as $notas_ti)
					@if($notas_ti->materias_id == $materia->id)
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
					@endif
				@endforeach
			@else
			@endif

			@if($nota->notas_tg != [])
				@foreach($nota->notas_tg2 as $notas_tg)
					@if($notas_tg->materias_id == $materia->id)
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
					@endif
				@endforeach
			@else
			<td>0</td>
			@endif
			@if($nota->notas_le != [])
				@foreach($nota->notas_le2 as $notas_le)
					@if($notas_le->materias_id == $materia->id)
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
					@endif
				@endforeach
			@else
			@endif
			
			@if($nota->notas_ev != [])
				@foreach($nota->notas_ev2 as $notas_ev)
					@if($notas_ev->materias_id == $materia->id)
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
					@endif
				@endforeach
			@else
			@endif

					@php
						$nota_promedio_final = ((!isset($nota_promedio_ta) ? 0 : $nota_promedio_ta) + (!isset($nota_promedio_ti) ? 0 : $nota_promedio_ti) + (!isset($nota_promedio_tg) ? 0 : $nota_promedio_tg) + (!isset($nota_promedio_le) ? 0 : $nota_promedio_le) + (!isset($nota_promedio_ev) ? 0 : $nota_promedio_ev));
						$numero_promedio_final = ((!isset($nota_promedio_ta) ? 0 : 1) + (!isset($nota_promedio_ti) ? 0 : 1) + (!isset($nota_promedio_tg) ? 0 : 1) + (!isset($nota_promedio_le) ? 0 : 1) + (!isset($nota_promedio_ev) ? 0 : 1));
						if($nota_promedio_final == 0 && $numero_promedio_final == 0)
						{
							$promedio_final2 = 0;
						}
						else{
							$promedio_final2 = round(($nota_promedio_final) / ($numero_promedio_final), 2);
						}
					@endphp

					@if($nota->notas_ta != [])
					@foreach($nota->notas_ta3 as $notas_ta)
						@if($notas_ta->materias_id == $materia->id)
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
						@endif
					@endforeach
				@else
				@endif

				@if($nota->notas_ti != [])
					@foreach($nota->notas_ti3 as $notas_ti)
						@if($notas_ti->materias_id == $materia->id)
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
						@endif
					@endforeach
				@else
				@endif

				@if($nota->notas_tg != [])
					@foreach($nota->notas_tg3 as $notas_tg)
						@if($notas_tg->materias_id == $materia->id)
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
						@endif
					@endforeach
				@else
				<td>0</td>
				@endif
				@if($nota->notas_le != [])
					@foreach($nota->notas_le3 as $notas_le)
						@if($notas_le->materias_id == $materia->id)
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
						@endif
					@endforeach
				@else
				@endif
				
				@if($nota->notas_ev != [])
					@foreach($nota->notas_ev3 as $notas_ev)
						@if($notas_ev->materias_id == $materia->id)
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
						@endif
					@endforeach
				@else
				@endif
				
				@php
								$nota_promedio_final = ((!isset($nota_promedio_ta) ? 0 : $nota_promedio_ta) + (!isset($nota_promedio_ti) ? 0 : $nota_promedio_ti) + (!isset($nota_promedio_tg) ? 0 : $nota_promedio_tg) + (!isset($nota_promedio_le) ? 0 : $nota_promedio_le) + (!isset($nota_promedio_ev) ? 0 : $nota_promedio_ev));
								$numero_promedio_final = ((!isset($nota_promedio_ta) ? 0 : 1) + (!isset($nota_promedio_ti) ? 0 : 1) + (!isset($nota_promedio_tg) ? 0 : 1) + (!isset($nota_promedio_le) ? 0 : 1) + (!isset($nota_promedio_ev) ? 0 : 1));
								if($nota_promedio_final == 0 && $numero_promedio_final == 0)
								{
									$promedio_final3 = 0;
								}
								else{
									$promedio_final3 = round(($nota_promedio_final) / ($numero_promedio_final), 2);
								}
							@endphp

								@if($promedio_final1 != '' && $promedio_final2 != '' && $promedio_final3 != '')
									@php 
									$promedio_final_quimestre = round((($promedio_final1 + $promedio_final2 + $promedio_final3) / 3), 2);
									@endphp
										@if($promedio_final_quimestre >= 7)
											<td style="color: green;">{{$promedio_final_quimestre}}</td>
										@else 
											<td style="color: red;">{{$promedio_final_quimestre}}</td>
										@endif
									
								@endif


			@endforeach
		</tr>
		@endforeach
	</tbody>

</table>
