<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
	<title>PDF CONSTANCIA DE ESTUDIO</title>
</head>
<style>
	body{
		font-family: Arial;
		font-size: 10;
		margin-right: 10%;
		margin-left: 10%;

	}
	img{
		margin-right: 40%;
		margin-left: 40%;
	}
	
</style>
<body>
	<img src="{{ asset('images/logo-pauld.png') }}" alt="" height="100" width="100" class="center">
	<br><br><br>
	<div>
		<p style="text-align: center">CERTIFICADO DE CONDUCTA</p><br>
	</div><br><br>

	<div>
		<p style="text-align: justify;">QUIEN SUSCRIBE,@foreach($cargos as $cargo){{ $cargo->cargo }} {{ $cargo->nombres }}@endforeach, EN CARACTER DE DIRECTOR(E), DE PAUL DIRAC CON SEDE EN QUITO HACE CONSTAR POR MEDIO DE LA PRESENTE QUE EL ESTUDIANTE,@foreach($matriculado as $m) {{ $m->apellidos }} {{ $m->nombres }}, DOCUMENTO DE IDETIFICACION N° {{ $m->cedula }} CURSA EL: {{ $m->curso }} {{ $m->paralelo }}@endforeach CORRESPONDIENTE AL PERIODO LECTIVO: 2019-2020, DOCUMENTO DE CONSTANCIA QUE SE EXPIDE A SOLICITUD DE LA PARTE INTERESADA.</p><br><br><br><br><br>



		
		<p>EN QUITO, A LOS {{ $data->day }} DIAS DEL MES DE {{ $data->month }} DEL AÑO {{ $data->year }}.</p>
	</div><br><br><br><br





	<div>
		<p style="text-align: center;">ATENTAMENTE</p>
		<br>
		<p style="text-align: center;">-----------------------------------------------</p>
		<br>
		<p style="text-align: center"></p>
		
	</div>


</body>
</html>