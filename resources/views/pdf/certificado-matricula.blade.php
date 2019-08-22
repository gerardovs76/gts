<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
	<title>CERTIFICADO MATRICULA</title>
</head>
<style>
	body{
		font-family: Arial;
		font-size: 12;
		margin-right: 10%;
		margin-left: 10%;

	}
	img{
		margin-left: 60%;
	}


</style>
<body>
    <h6 style="float: left;"><strong>UNIDAD EDUCATIVA PAUL DIRAC</strong></h6>
	<img src="{{ asset('images/logo-pauld.png') }}" alt="" height="100" width="100">
	<br><br><br>
	<div>
		<h3 style="text-align: center">CERTIFICADO DE MATRICULA</h3><br>
		<hr>
	</div><br><br>
    <div style="float:left;">
	<p><strong>Año lectivo: 2019 - 2020</strong></p>
	<p>Certifico que, previo al cumplimiento de los requisitos legales y reglamentarios ha sido inscrita en la Secretaria del Plantel de la siguiente matrícula: </p>
    </div>
	<br>
	@foreach($certificado as $certi)
    <p><strong>Apellidos: {{$certi->apellidos}}</strong></p>
	<p><strong>Nombres: {{$certi->nombres}}</strong></p>
	<p><strong>Nivel: {{$certi->curso}}</strong></p>
	<p><strong>Paralelo: {{$certi->paralelo}}</strong></p>
	<p><strong>Fecha: {{$date}}</strong></p>
	@endforeach
	<br>
	<br>
	<br>
    <div style="width:250px;float: left; font-size: 12px; font-weight: bold;">
	<div align="center">----------------------------------------------------</div>
	<p style="text-align: center;">Sra. MONSERRATH RAMIREZ</p>
	<p style="text-align: center;">SECRETARIA GENERAL</p>
	</div>
	<div style="width:350px;float: left; font-size: 12px; font-weight: bold;">
	<div align="center">----------------------------------------------------</div>
	<p style="text-align: center;">LCDA. CARMEN RAMIREZ</p>
	<p style="text-align: center;">RECTORA</p>
	</div>


</body>
</html>
