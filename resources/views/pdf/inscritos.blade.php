<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF INSCRITOS</title>
    <style>
		table#mitabla {
    border-collapse: collapse;
    border: 1px solid #CCC;
    margin: 0 auto;
    font-size: 10px;
}

table#mitabla th {
    font-weight: bold;
    background-color: #E1E1E1;
    padding:1px;
}

table#mitabla tbody tr:hover td {
    background-color: #F3F3F3;
}


	</style>
</head>
<body>
        <img src="images/logo-institucion.png" alt="" height="80" width="80" style="float: left;">
        <img src="images/ib.png" alt="" height="80" width="180" style="float: right;">

        <h2 align="center">Sistema de inscripcion</h2>
        <br><br><br>
        <h3>Estimado .- {{$inscripcion->apellidos}} {{$inscripcion->nombres}}</h3>
        <h5>CURSO: {{$inscripcion->curso}} &nbsp;&nbsp; PARALELO: {{$inscripcion->paralelo}}</h5>
        <h5>FECHA DE REGISTRO: {{$inscripcion->fecha_creacion}} &nbsp;&nbsp; SEXO: {{$inscripcion->sexo}}</h5>
        <h5>CODIGO: <strong>{{$inscripcion->codigo_nuevo}}</strong></h5>
        <hr>
        <br>
        <h3 align="center"><strong>Datos del representante</strong></h3>
        <br>
        <h5>REPRESENTANTE: {{$inscripcion->representante}} &nbsp;&nbsp; TIPO DE PERSONA: {{$inscripcion->tipo_persona}} &nbsp;&nbsp; CEDULA REPRESENTANTE: {{$inscripcion->cedrepresentante}}</h5>
        <h5>NOMBRES REPRESENTANTE: {{$inscripcion->nombres_representante}} &nbsp;&nbsp; TELEFONOS: {{$inscripcion->convencional}} - {{$inscripcion->movil}}</h5>
        <h5>FECHA DE NACIMIENTO: {{$inscripcion->fn_representante}} &nbsp;&nbsp; EDAD: {{$inscripcion->edad_representante}} &nbsp;&nbsp; CORREO: {{$inscripcion->email}}</h5>
        <h5>PROFESION: {{$inscripcion->profesion}} &nbsp;&nbsp; OCUPACION: {{$inscripcion->ocupacion}}</h5>
        <br>
        <br>
        <br>
        <p><strong>Cualquier consulta no dude en comunicarse con nosotros</strong></p>
        <br>
        <em><strong>Saludos.</strong></em>
        <br>
</body>
</html>
