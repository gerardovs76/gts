<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
	<title>REPORTE CAS</title>
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
                <td><strong>{{$inicial1A}}</strong></td>
                <td><strong>{{$inicial1AM}}</strong></td>
                <td><strong>{{$inicial1AF}}</strong></td>
            </tr>
            <tr>
                <td><strong>INI 1 - INICIAL 1</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$inicial1B}}</strong></td>
                <td><strong>{{$inicial1BM}}</strong></td>
                <td><strong>{{$inicial1BF}}</strong></td>
            </tr>
            <tr>
                <td><strong>INI 1 - INICIAL 1</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$inicial1C}}</strong></td>
                <td><strong>{{$inicial1CM}}</strong></td>
                <td><strong>{{$inicial1CF}}</strong></td>
            </tr>
            <tr>
                <td><strong>INI 1 - INICIAL 1</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$inicial1D}}</strong></td>
                <td><strong>{{$inicial1DM}}</strong></td>
                <td><strong>{{$inicial1DF}}</strong></td>
            </tr>
            <tr>
                <td><strong>INI 2- INICIAL 2</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$inicial2A}}</strong></td>
                <td><strong>{{$inicial2AM}}</strong></td>
                <td><strong>{{$inicial2AF}}</strong></td>
            </tr>
            <tr>
                <td><strong>INI 2- INICIAL 2</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$inicial2B}}</strong></td>
                <td><strong>{{$inicial2BM}}</strong></td>
                <td><strong>{{$inicial2BF}}</strong></td>
            </tr>
            <tr>
                <td><strong>INI 2- INICIAL 2</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$inicial2C}}</strong></td>
                <td><strong>{{$inicial2CM}}</strong></td>
                <td><strong>{{$inicial2CF}}</strong></td>
            </tr>
            <tr>
                <td><strong>INI 2- INICIAL 2</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$inicial2D}}</strong></td>
                <td><strong>{{$inicial2DM}}</strong></td>
                <td><strong>{{$inicial2DF}}</strong></td>
            </tr>
            <tr>
                <td><strong>1ro - PRIMERO DE BASICA</strong></td>
                <td><strong>PARB - PARALELO A</strong></td>
                <td><strong>{{$pA}}</strong></td>
                <td><strong>{{$pAM}}</strong></td>
                <td><strong>{{$pAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>1ro - PRIMERO DE BASICA</strong></td>
                <td><strong>PARA - PARALELO B</strong></td>
                <td><strong>{{$pB}}</strong></td>
                <td><strong>{{$pBM}}</strong></td>
                <td><strong>{{$pBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>1ro - PRIMERO DE BASICA</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$pC}}</strong></td>
                <td><strong>{{$pCM}}</strong></td>
                <td><strong>{{$pCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>1ro - PRIMERO DE BASICA</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$pD}}</strong></td>
                <td><strong>{{$pDM}}</strong></td>
                <td><strong>{{$pDF}}</strong></td>
            </tr>
            <tr>
                <td><strong>2do - SEGUNDO DE BASICA</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$sA}}</strong></td>
                <td><strong>{{$sAM}}</strong></td>
                <td><strong>{{$sAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>2do - SEGUNDO DE BASICA</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$sB}}</strong></td>
                <td><strong>{{$sBM}}</strong></td>
                <td><strong>{{$sBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>2do - SEGUNDO DE BASICA</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$sC}}</strong></td>
                <td><strong>{{$sCM}}</strong></td>
                <td><strong>{{$sCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>2do - SEGUNDO DE BASICA</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$sD}}</strong></td>
                <td><strong>{{$sDM}}</strong></td>
                <td><strong>{{$sDF}}</strong></td>
            </tr>
            <tr>
                <td><strong>3ro - TERCERO DE BASICA</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$tA}}</strong></td>
                <td><strong>{{$tAM}}</strong></td>
                <td><strong>{{$tAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>3ro - TERCERO DE BASICA</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$tB}}</strong></td>
                <td><strong>{{$tBM}}</strong></td>
                <td><strong>{{$tBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>3ro - TERCERO DE BASICA</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$tC}}</strong></td>
                <td><strong>{{$tCM}}</strong></td>
                <td><strong>{{$tCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>3ro - TERCERO DE BASICA</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$tD}}</strong></td>
                <td><strong>{{$tDM}}</strong></td>
                <td><strong>{{$tDF}}</strong></td>
            </tr>
            <tr>
                <td><strong>4to - CUARTO DE BASICA</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$cA}}</strong></td>
                <td><strong>{{$cAM}}</strong></td>
                <td><strong>{{$cAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>4to - CUARTO DE BASICA</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$cB}}</strong></td>
                <td><strong>{{$cBM}}</strong></td>
                <td><strong>{{$cBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>4to - CUARTO DE BASICA</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$cC}}</strong></td>
                <td><strong>{{$cCM}}</strong></td>
                <td><strong>{{$cCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>4to - CUARTO DE BASICA</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$cD}}</strong></td>
                <td><strong>{{$cDM}}</strong></td>
                <td><strong>{{$cDF}}</strong></td>
            </tr>
            <tr>
                <td><strong>5to - QUINTO DE BASICA</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$qA}}</strong></td>
                <td><strong>{{$qAM}}</strong></td>
                <td><strong>{{$qAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>5to - QUINTO DE BASICA</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$qB}}</strong></td>
                <td><strong>{{$qBM}}</strong></td>
                <td><strong>{{$qBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>5to - QUINTO DE BASICA</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$qC}}</strong></td>
                <td><strong>{{$qCM}}</strong></td>
                <td><strong>{{$qCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>5to - QUINTO DE BASICA</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$qD}}</strong></td>
                <td><strong>{{$qDM}}</strong></td>
                <td><strong>{{$qDF}}</strong></td>
            </tr>
            <tr>
                <td><strong>6to - SEXTO DE BASICA</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$sexA}}</strong></td>
                <td><strong>{{$sexAM}}</strong></td>
                <td><strong>{{$sexAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>6to - SEXTO DE BASICA</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$sexB}}</strong></td>
                <td><strong>{{$sexBM}}</strong></td>
                <td><strong>{{$sexBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>6to - SEXTO DE BASICA</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$sexC}}</strong></td>
                <td><strong>{{$sexCM}}</strong></td>
                <td><strong>{{$sexCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>6to - SEXTO DE BASICA</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$sexD}}</strong></td>
                <td><strong>{{$sexDM}}</strong></td>
                <td><strong>{{$sexDF}}</strong></td>
            </tr>
            <tr>
                <td><strong>7mo - SÉPTIMO DE BASICA</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$sepA}}</strong></td>
                <td><strong>{{$sepAM}}</strong></td>
                <td><strong>{{$sepAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>7mo - SÉPTIMO DE BASICA</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$sepB}}</strong></td>
                <td><strong>{{$sepBM}}</strong></td>
                <td><strong>{{$sepBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>7mo - SÉPTIMO DE BASICA</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$sepC}}</strong></td>
                <td><strong>{{$sepCM}}</strong></td>
                <td><strong>{{$sepCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>7mo - SÉPTIMO DE BASICA</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$sepD}}</strong></td>
                <td><strong>{{$sepDM}}</strong></td>
                <td><strong>{{$sepDF}}</strong></td>
            </tr>
            <tr>
                <td><strong>8vo - OCTAVO DE BASICA</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$octA}}</strong></td>
                <td><strong>{{$octAM}}</strong></td>
                <td><strong>{{$octAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>8vo - OCTAVO DE BASICA</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$octB}}</strong></td>
                <td><strong>{{$octBM}}</strong></td>
                <td><strong>{{$octBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>8vo - OCTAVO DE BASICA</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$octC}}</strong></td>
                <td><strong>{{$octCM}}</strong></td>
                <td><strong>{{$octCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>8vo - OCTAVO DE BASICA</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$octD}}</strong></td>
                <td><strong>{{$octDM}}</strong></td>
                <td><strong>{{$octDF}}</strong></td>
            </tr>
            <tr>
                <td><strong>9no - NOVENO DE BASICA</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$noA}}</strong></td>
                <td><strong>{{$noAM}}</strong></td>
                <td><strong>{{$noAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>9no - NOVENO DE BASICA</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$noB}}</strong></td>
                <td><strong>{{$noBM}}</strong></td>
                <td><strong>{{$noBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>9no - NOVENO DE BASICA</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$noC}}</strong></td>
                <td><strong>{{$noCM}}</strong></td>
                <td><strong>{{$noCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>9no - NOVENO DE BASICA</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$noD}}</strong></td>
                <td><strong>{{$noDM}}</strong></td>
                <td><strong>{{$noDF}}</strong></td>
            </tr>
            <tr>
                <td><strong>10mo - DECIMO DE BASICA</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$deA}}</strong></td>
                <td><strong>{{$deAM}}</strong></td>
                <td><strong>{{$deAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>10mo - DECIMO DE BASICA</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$deB}}</strong></td>
                <td><strong>{{$deBM}}</strong></td>
                <td><strong>{{$deBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>10mo - DECIMO DE BASICA</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$deC}}</strong></td>
                <td><strong>{{$deCM}}</strong></td>
                <td><strong>{{$deCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>10mo - DECIMO DE BASICA</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$deD}}</strong></td>
                <td><strong>{{$deDM}}</strong></td>
                <td><strong>{{$deDF}}</strong></td>
            </tr>
            <tr>
                <td><strong>1BGU - PRIMERO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$priA}}</strong></td>
                <td><strong>{{$priAM}}</strong></td>
                <td><strong>{{$priAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>1BGU - PRIMERO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$priB}}</strong></td>
                <td><strong>{{$priBM}}</strong></td>
                <td><strong>{{$priBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>1BGU - PRIMERO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$priC}}</strong></td>
                <td><strong>{{$priCM}}</strong></td>
                <td><strong>{{$priCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>1BGU - PRIMERO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$priD}}</strong></td>
                <td><strong>{{$priDM}}</strong></td>
                <td><strong>{{$priDF}}</strong></td>
            </tr>
            <tr>
                <td><strong>2BGU - SEGUNDO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$segA}}</strong></td>
                <td><strong>{{$segAM}}</strong></td>
                <td><strong>{{$segAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>2BGU - SEGUNDO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$segB}}</strong></td>
                <td><strong>{{$segBM}}</strong></td>
                <td><strong>{{$segBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>2BGU - SEGUNDO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$segC}}</strong></td>
                <td><strong>{{$segCM}}</strong></td>
                <td><strong>{{$segCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>2BGU - SEGUNDO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$segD}}</strong></td>
                <td><strong>{{$segDM}}</strong></td>
                <td><strong>{{$segDF}}</strong></td>
            </tr>
            <tr>
                <td><strong>3BGU - TERCERO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                <td><strong>PARA - PARALELO A</strong></td>
                <td><strong>{{$tercA}}</strong></td>
                <td><strong>{{$tercAM}}</strong></td>
                <td><strong>{{$tercAF}}</strong></td>
            </tr>
            <tr>
                <td><strong>3BGU - TERCERO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                <td><strong>PARB - PARALELO B</strong></td>
                <td><strong>{{$tercB}}</strong></td>
                <td><strong>{{$tercBM}}</strong></td>
                <td><strong>{{$tercBF}}</strong></td>
            </tr>
            <tr>
                <td><strong>3BGU - TERCERO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                <td><strong>PARC - PARALELO C</strong></td>
                <td><strong>{{$tercC}}</strong></td>
                <td><strong>{{$tercCM}}</strong></td>
                <td><strong>{{$tercCF}}</strong></td>
            </tr>
            <tr>
                <td><strong>3BGU - TERCERO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                <td><strong>PARD - PARALELO D</strong></td>
                <td><strong>{{$tercD}}</strong></td>
                <td><strong>{{$tercDM}}</strong></td>
                <td><strong>{{$tercDF}}</strong></td>
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
