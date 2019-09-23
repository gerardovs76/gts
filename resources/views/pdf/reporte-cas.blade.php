<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
	<title>REPORTE CAS</title>
</head>
<style>
		table#mitabla {
    border-collapse: collapse;
    border: 1px solid #CCC;
    margin: 0 auto;
    font-size: 8px;
}

table#mitabla th {
    font-weight: bold;
    background-color: #E1E1E1;
    padding:5px;
}

table#mitabla tbody tr:hover td {
    background-color: #F3F3F3;
}

table#mitabla td {
    padding: 5px 10px;
}
	</style>
<body>
        <img src="images/lp.PNG" alt="" height="80" width="80" style="float: left;">
        <img src="images/ib.png" alt="" height="80" width="180" style="float: right;">
    <h2 align="center"><strong>CAS</strong></h2>
    <br>
    <br>
    <hr>
    <br>
    <table id="mitabla">
        <thead>
            <tr>
                <th><strong>Cedula</strong></th>
                <th><strong>Nombres</strong></th>
                <th><strong>Apellidos</strong></th>
                <th><strong>Curso</strong></th>
                <th><strong>Paralelo</strong></th>
                <th><strong>Fecha nacimiento</strong></th>
                <th><strong>Representante</strong></th>
                <th><strong>Nombres Representante</strong></th>
                <th><strong>Cedula Representante</strong></th>
                <th><strong>Correo</strong></th>
                <th><strong>Telefono convencional</strong></th>
                <th><strong>Telefono movil</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($matriculados as $matri)
            <tr>
                <td><strong>{{$matri->cedula}}</strong></td>
                <td><strong>{{$matri->nombres}}</strong></td>
                <td><strong>{{$matri->apellidos}}</strong></td>
                <td><strong>{{$matri->curso}}</strong></td>
                <td><strong>{{$matri->paralelo}}</strong></td>
                <td><strong>{{$matri->fecha_nacimiento}}</strong></td>
                <td><strong>{{$matri->representante}}</strong></td>
                <td><strong>{{$matri->nombres_representante}}</strong></td>
                <td><strong>{{$matri->cedrepresentante}}</strong></td>
                <td><strong>{{$matri->email}}</strong></td>
                <td><strong>{{$matri->convencional}}</strong></td>
                <td><strong>{{$matri->movil}}</strong></td>
            </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>
