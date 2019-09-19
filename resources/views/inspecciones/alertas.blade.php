@extends('layouts.app')

@section('content')
	<div class="container col-xs-12 col-sm-8 col-lg-12">
		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff;">
			ALERTAS
		</h2>
		</div>

		<hr>


		<table class="table table-bordered table-striped" id="tablainspeccion" >
            <thead>
                <tr>
                    <th>NOMBRES Y APELLIDOS</th>
                    <th>CURSO Y PARALELO</th>
                    <th>FALTAS INJUSTIFICADAS</th>
                    <th>FALTAS JUSTIFICADAS</th>
                    <th>MAL UNIFORMADO</th>
                    <th>PRESENTACIÓN PERSONAL</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody id="tableid1">
                <div class="d-none">
                    {{$i=1}}
                </div>
                    @foreach($inspe as $in)

                <tr>
                    @if(($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 ) > 2 ||
                    ($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 ) > 2 ||
                    ($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 ) > 2)
                    <div class="d-none" id="count">
                    {{$i++}}
                    </div>
                    <td id="tdnombres">{{$in->apellidos}} {{$in->nombres}}</td>
                    <td>{{$in->curso}} {{$in->paralelo}}</td>
                    <td>{{($in->h1_count_01 +$in->h2_count_01 +$in->h3_count_01 +$in->h4_count_01 +$in->h5_count_01 +$in->h6_count_01 +$in->h7_count_01 +$in->h8_count_01 )}}</td>
                    <td></td>
                    <td>{{($in->h1_count_03 +$in->h2_count_03 +$in->h3_count_03 +$in->h4_count_03 +$in->h5_count_03 +$in->h6_count_03 +$in->h7_count_03 +$in->h8_count_03 )}}</td>
                    <td>{{($in->h1_count_04 +$in->h2_count_04 +$in->h3_count_04 +$in->h4_count_04 +$in->h5_count_04 +$in->h6_count_04 +$in->h7_count_04 +$in->h8_count_04 )}}</td>
                    <td><a href="matricular-perfil-total" class="btn btn-primary"><i class="fa fa-paper-plane"></i> IR AL PERFIL</a></td>
                    @endif
                </tr>
                @endforeach

            </tbody>
		</table>
    </div>
    <script>
        $(document).ready(function(){

            var count = $('#count').val();
            console.log(count);

        });
    </script>
@endsection
