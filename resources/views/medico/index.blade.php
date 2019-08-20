@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			FICHA MEDICA
		</h2>
		</div>
		<hr>
		@include('medico.partials.info')
		{!! Form::open(['route' => 'medico.store']) !!}
			
			@include('medico.partials.form')
			
		

	
	<table width="100%" class="table-hover table-condensed" id="tablausuarios">

			<thead>

                    <tr>	
                    <th id="idalumno">
                       
                    </th>
                    <th id="idcurso">
                       
                    </th>
                    </tr>	
                    </thead>
					<tbody id="tableid" class="table table-striped table-hover">
				<tr>
				
				</tr>
			</tbody>
		</table>

	</table>
	
	{!! Form::close() !!}
	</div>
	<!--<div class="col-xs-12 col-sm-4">
		@include('medico.partials.aside')
	</div>-->
@endsection