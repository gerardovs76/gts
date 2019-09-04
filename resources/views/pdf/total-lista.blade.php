<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
	<title>REPORTE TOTAL</title>
</head>
<style>
		table#mitabla {
    border-collapse: collapse;
    border: 1px;
    margin: 0 auto;
    font-size: 12px;

}

table#mitabla th {
    font-weight: bold;
    padding:1px;
}
table#mitabla td {
    padding: 5px 10px;
}
	</style>
<body>
    <img src="images/lp.PNG" width="100" height="100" align="right">
    <h5 align="left"><strong>UNIDAD EDUCATIVA PAUL DIRAC</strong></h5>
    <p><strong style="font-size: 6;">Fecha de impresión: {{$date}}</strong></p>
    <h6><p><strong style="font-size: 8; margin-left: 20px">Listado Todos los cursos Todos los paralelos</strong><strong style="font-size: 8; margin-left: 600px;">Total estudiantes: {{$total}}</strong></p></h6>
    <table id="mitabla" border="1">
        <thead>
            <tr>
                <th width="50px"><strong>Apellidos</strong></th>
                <th><strong>Nombres</strong></th>
                <th width="20px"><strong>#Matriculados</strong></th>
                <th><strong>Hombres</strong></th>
                <th><strong>Mujeres</strong></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>INI 1 - INICIAL 1</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$i1am + $i1af}}</strong></td>
                <td><strong>{{$i1am}}</strong></td>
                <td><strong>{{$i1af}}</strong></td>
            </tr>
            <tr>
                    <td><strong>INI 1 - INICIAL 1</strong></td>
                    <td><strong>PARB - PARALELO B</strong></td>
                    <td><strong>{{$i1bm + $i1bf}}</strong></td>
                    <td><strong>{{$i1bm}}</strong></td>
                    <td><strong>{{$i1bf}}</strong></td>
                </tr>
                <tr>
                        <td><strong>INI 1 - INICIAL 1</strong></td>
                        <td><strong>PARC - PARALELO C</strong></td>
                        <td><strong>{{$i1cm + $i1cf}}</strong></td>
                        <td><strong>{{$i1cm}}</strong></td>
                        <td><strong>{{$i1cf}}</strong></td>
                    </tr>
                    <tr>
                            <td><strong>INI 2 - INICIAL 2</strong></td>
                            <td><strong>PARA - PARALELO A</strong></td>
                            <td><strong>{{$i2am + $i2af}}</strong></td>
                            <td><strong>{{$i2am}}</strong></td>
                            <td><strong>{{$i2af}}</strong></td>
                        </tr>
                        <tr>
                                <td><strong>INI 2 - INICIAL 2</strong></td>
                                <td><strong>PARB - PARALELO B</strong></td>
                                <td><strong>{{$i2bm + $i2bf}}</strong></td>
                                <td><strong>{{$i2bm}}</strong></td>
                                <td><strong>{{$i2bf}}</strong></td>
                            </tr>
                            <tr>
                                    <td><strong>INI 2 - INICIAL 2</strong></td>
                                    <td><strong>PARC - PARALELO C</strong></td>
                                    <td><strong>{{$i2cm + $i2cf}}</strong></td>
                                    <td><strong>{{$i2cm}}</strong></td>
                                    <td><strong>{{$i2cf}}</strong></td>
                                </tr>
                                <tr>
                                        <td><strong>1ro - PRIMERO DE BÁSICA</strong></td>
                                        <td><strong>PARA - PARALELO A</strong></td>
                                        <td><strong>{{$pam + $paf}}</strong></td>
                                        <td><strong>{{$pam}}</strong></td>
                                        <td><strong>{{$paf}}</strong></td>
                                    </tr>
                                    <tr>
                                            <td><strong>1ro - PRIMERO DE BÁSICA</strong></td>
                                            <td><strong>PARB - PARALELO B</strong></td>
                                            <td><strong>{{$pbm + $pbf}}</strong></td>
                                            <td><strong>{{$pbm}}</strong></td>
                                            <td><strong>{{$pbf}}</strong></td>
                                        </tr>
                                        <tr>
                                                <td><strong>1ro - PRIMERO DE BÁSICA</strong></td>
                                                <td><strong>PARC - PARALELO C</strong></td>
                                                <td><strong>{{$pcm + $pcf}}</strong></td>
                                                <td><strong>{{$pcm}}</strong></td>
                                                <td><strong>{{$pcf}}</strong></td>
                                            </tr>
                                            <tr>
                                                    <td><strong>1ro - PRIMERO DE BÁSICA</strong></td>
                                                    <td><strong>PARD - PARALELO D</strong></td>
                                                    <td><strong>{{$pdm + $pdf}}</strong></td>
                                                    <td><strong>{{$pdm}}</strong></td>
                                                    <td><strong>{{$pdf}}</strong></td>
                                                </tr>
            <tr>
                <td border="0px"></td>
                <td border="0px"><strong>TOTAL</strong></td>
                <td><strong>{{$total}}</strong></td>
                <td><strong>{{$totalM}}</strong></td>
                <td><strong>{{$totalF}}</strong></td>
            </tr>
        </tbody>
    </table>


</body>
</html>
