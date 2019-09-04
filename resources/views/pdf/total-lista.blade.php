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
    <h6><p><strong style="font-size: 8; margin-left: 20px">Listado Todos los cursos Todos los paralelos</strong><strong style="font-size: 8; margin-left: 600px;">Total estudiantes: {{$totM + $totF}}</strong></p></h6>
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
                                                <td><strong>2do - SEGUNDO DE BASICA</strong></td>
                                                <td><strong>PARA - PARALELO A</strong></td>
                                                <td><strong>{{$sam + $saf}}</strong></td>
                                                <td><strong>{{$sam}}</strong></td>
                                                <td><strong>{{$saf}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td><strong>2do - SEGUNDO DE BASICA</strong></td>
                                                <td><strong>PARB - PARALELO B</strong></td>
                                                <td><strong>{{$sbm + $sbf}}</strong></td>
                                                <td><strong>{{$sbm}}</strong></td>
                                                <td><strong>{{$sbf}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td><strong>2do - SEGUNDO DE BASICA</strong></td>
                                                <td><strong>PARC - PARALELO C</strong></td>
                                                <td><strong>{{$scm + $scf}}</strong></td>
                                                <td><strong>{{$scm}}</strong></td>
                                                <td><strong>{{$scf}}</strong></td>
                                                </tr>
                                            <tr>
                                                <td><strong>2do - SEGUNDO DE BASICA</strong></td>
                                                <td><strong>PARD - PARALELO D</strong></td>
                                                <td><strong>{{$sdm + $sdf}}</strong></td>
                                                <td><strong>{{$sdm}}</strong></td>
                                                <td><strong>{{$sdf}}</strong></td>
                                            </tr>
                                            <tr>
                                                    <td><strong>3ro - TERCERO DE BÁSICA</strong></td>
                                                    <td><strong>PARA - PARALELO A</strong></td>
                                                    <td><strong>{{$tam + $taf}}</strong></td>
                                                    <td><strong>{{$tam}}</strong></td>
                                                    <td><strong>{{$taf}}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>3ro - TERCERO DE BÁSICA</strong></td>
                                                    <td><strong>PARB - PARALELO B</strong></td>
                                                    <td><strong>{{$tbm + $tbf}}</strong></td>
                                                    <td><strong>{{$tbm}}</strong></td>
                                                    <td><strong>{{$tbf}}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>3ro - TERCERO DE BÁSICA</strong></td>
                                                    <td><strong>PARC - PARALELO C</strong></td>
                                                    <td><strong>{{$tcm + $tcf}}</strong></td>
                                                    <td><strong>{{$tcm}}</strong></td>
                                                    <td><strong>{{$tcf}}</strong></td>
                                                    </tr>
                                                <tr>
                                                    <td><strong>3ro - TERCERO DE BÁSICA</strong></td>
                                                    <td><strong>PARD - PARALELO D</strong></td>
                                                    <td><strong>{{$tdm + $tdf}}</strong></td>
                                                    <td><strong>{{$tdm}}</strong></td>
                                                    <td><strong>{{$tdf}}</strong></td>
                                                </tr>
                                                <tr>
                                                        <td><strong>4to - CUARTO DE BÁSICA</strong></td>
                                                        <td><strong>PARA - PARALELO A</strong></td>
                                                        <td><strong>{{$cam + $caf}}</strong></td>
                                                        <td><strong>{{$cam}}</strong></td>
                                                        <td><strong>{{$caf}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>4to - CUARTO DE BÁSICA</strong></td>
                                                        <td><strong>PARB - PARALELO B</strong></td>
                                                        <td><strong>{{$cbm + $cbf}}</strong></td>
                                                        <td><strong>{{$cbm}}</strong></td>
                                                        <td><strong>{{$cbf}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>4to - CUARTO DE BÁSICA</strong></td>
                                                        <td><strong>PARC - PARALELO C</strong></td>
                                                        <td><strong>{{$ccm + $ccf}}</strong></td>
                                                        <td><strong>{{$ccm}}</strong></td>
                                                        <td><strong>{{$ccf}}</strong></td>
                                                        </tr>
                                                    <tr>
                                                        <td><strong>4to - CUARTO DE BÁSICA</strong></td>
                                                        <td><strong>PARD - PARALELO D</strong></td>
                                                        <td><strong>{{$cdm + $cdf}}</strong></td>
                                                        <td><strong>{{$cdm}}</strong></td>
                                                        <td><strong>{{$cdf}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                            <td><strong>5to - QUINTO DE BÁSICA</strong></td>
                                                            <td><strong>PARA - PARALELO A</strong></td>
                                                            <td><strong>{{$qam + $qaf}}</strong></td>
                                                            <td><strong>{{$qam}}</strong></td>
                                                            <td><strong>{{$qaf}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>5to - QUINTO DE BÁSICA</strong></td>
                                                            <td><strong>PARB - PARALELO B</strong></td>
                                                            <td><strong>{{$qbm + $qbf}}</strong></td>
                                                            <td><strong>{{$qbm}}</strong></td>
                                                            <td><strong>{{$qbf}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>5to - QUINTO DE BÁSICA</strong></td>
                                                            <td><strong>PARC - PARALELO C</strong></td>
                                                            <td><strong>{{$qcm + $qcf}}</strong></td>
                                                            <td><strong>{{$qcm}}</strong></td>
                                                            <td><strong>{{$qcf}}</strong></td>
                                                            </tr>
                                                        <tr>
                                                            <td><strong>5to - QUINTO DE BÁSICA</strong></td>
                                                            <td><strong>PARD - PARALELO D</strong></td>
                                                            <td><strong>{{$qdm + $qdf}}</strong></td>
                                                            <td><strong>{{$qdm}}</strong></td>
                                                            <td><strong>{{$qdf}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                                <td><strong>6to - SEXTO DE BÁSICA</strong></td>
                                                                <td><strong>PARA - PARALELO A</strong></td>
                                                                <td><strong>{{$sexam + $sexaf}}</strong></td>
                                                                <td><strong>{{$sexam}}</strong></td>
                                                                <td><strong>{{$sexaf}}</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>6to - SEXTO DE BÁSICA</strong></td>
                                                                <td><strong>PARB - PARALELO B</strong></td>
                                                                <td><strong>{{$sexbm + $sexbf}}</strong></td>
                                                                <td><strong>{{$sexbm}}</strong></td>
                                                                <td><strong>{{$sexbf}}</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>6to - SEXTO DE BÁSICA</strong></td>
                                                                <td><strong>PARC - PARALELO C</strong></td>
                                                                <td><strong>{{$sexcm + $sexcf}}</strong></td>
                                                                <td><strong>{{$sexcm}}</strong></td>
                                                                <td><strong>{{$sexcf}}</strong></td>
                                                                </tr>
                                                            <tr>
                                                                <td><strong>6to - SEXTO DE BÁSICA</strong></td>
                                                                <td><strong>PARD - PARALELO D</strong></td>
                                                                <td><strong>{{$sexdm + $sexdf}}</strong></td>
                                                                <td><strong>{{$sexdm}}</strong></td>
                                                                <td><strong>{{$sexdf}}</strong></td>
                                                            </tr>
                                                            <tr>
                                                                    <td><strong>7mo - SEPTIMO DE BÁSICA</strong></td>
                                                                    <td><strong>PARA - PARALELO A</strong></td>
                                                                    <td><strong>{{$sepam + $sepaf}}</strong></td>
                                                                    <td><strong>{{$sepam}}</strong></td>
                                                                    <td><strong>{{$sepaf}}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>7mo - SEPTIMO DE BÁSICA</strong></td>
                                                                    <td><strong>PARB - PARALELO B</strong></td>
                                                                    <td><strong>{{$sepbm + $sepbf}}</strong></td>
                                                                    <td><strong>{{$sepbm}}</strong></td>
                                                                    <td><strong>{{$sepbf}}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>7mo - SEPTIMO DE BÁSICA</strong></td>
                                                                    <td><strong>PARC - PARALELO C</strong></td>
                                                                    <td><strong>{{$sepcm + $sepcf}}</strong></td>
                                                                    <td><strong>{{$sepcm}}</strong></td>
                                                                    <td><strong>{{$sepcf}}</strong></td>
                                                                    </tr>
                                                                <tr>
                                                                    <td><strong>7mo - SEPTIMO DE BÁSICA</strong></td>
                                                                    <td><strong>PARD - PARALELO D</strong></td>
                                                                    <td><strong>{{$sepdm + $sepdf}}</strong></td>
                                                                    <td><strong>{{$sepdm}}</strong></td>
                                                                    <td><strong>{{$sepdf}}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                        <td><strong>8vo - OCTAVO DE BÁSICA</strong></td>
                                                                        <td><strong>PARA - PARALELO A</strong></td>
                                                                        <td><strong>{{$octam + $octaf}}</strong></td>
                                                                        <td><strong>{{$octam}}</strong></td>
                                                                        <td><strong>{{$octaf}}</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>8vo - OCTAVO DE BÁSICA</strong></td>
                                                                        <td><strong>PARB - PARALELO B</strong></td>
                                                                        <td><strong>{{$octbm + $octbf}}</strong></td>
                                                                        <td><strong>{{$octbm}}</strong></td>
                                                                        <td><strong>{{$octbf}}</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>8vo - OCTAVO DE BÁSICA</strong></td>
                                                                        <td><strong>PARC - PARALELO C</strong></td>
                                                                        <td><strong>{{$octcm + $octcf}}</strong></td>
                                                                        <td><strong>{{$octcm}}</strong></td>
                                                                        <td><strong>{{$octcf}}</strong></td>
                                                                        </tr>
                                                                    <tr>
                                                                        <td><strong>8vo - OCTAVO DE BÁSICA</strong></td>
                                                                        <td><strong>PARD - PARALELO D</strong></td>
                                                                        <td><strong>{{$octdm + $octdf}}</strong></td>
                                                                        <td><strong>{{$octdm}}</strong></td>
                                                                        <td><strong>{{$octdf}}</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>9no - NOVENO DE BÁSICA</strong></td>
                                                                        <td><strong>PARA - PARALELO A</strong></td>
                                                                        <td><strong>{{$novam + $novaf}}</strong></td>
                                                                        <td><strong>{{$novam}}</strong></td>
                                                                        <td><strong>{{$novaf}}</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>9no - NOVENO DE BÁSICA</strong></td>
                                                                        <td><strong>PARB - PARALELO B</strong></td>
                                                                        <td><strong>{{$novbm + $novbf}}</strong></td>
                                                                        <td><strong>{{$novbm}}</strong></td>
                                                                        <td><strong>{{$novbf}}</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>9no - NOVENO DE BÁSICA</strong></td>
                                                                      <td><strong>PARC - PARALELO C</strong></td>
                                                                        <td><strong>{{$novcm + $novcf}}</strong></td>
                                                                        <td><strong>{{$novcm}}</strong></td>
                                                                        <td><strong>{{$novcf}}</strong></td>
                                                                        </tr>
                                                                    <tr>
                                                                        <td><strong>9no - NOVENO DE BÁSICA</strong></td>
                                                                        <td><strong>PARD - PARALELO D</strong></td>
                                                                        <td><strong>{{$novdm + $novdf}}</strong></td>
                                                                        <td><strong>{{$novdm}}</strong></td>
                                                                        <td><strong>{{$novdf}}</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                            <td><strong>10mo - DECIMO DE BÁSICA</strong></td>
                                                                            <td><strong>PARA - PARALELO A</strong></td>
                                                                            <td><strong>{{$decam + $decaf}}</strong></td>
                                                                            <td><strong>{{$decam}}</strong></td>
                                                                             <td><strong>{{$decaf}}</strong></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>10mo - DECIMO DE BÁSICA</strong></td>
                                                                            <td><strong>PARB - PARALELO B</strong></td>
                                                                            <td><strong>{{$decbm + $decbf}}</strong></td>
                                                                            <td><strong>{{$decbm}}</strong></td>
                                                                            <td><strong>{{$decbf}}</strong></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>10mo - DECIMO DE BÁSICA</strong></td>
                                                                            <td><strong>PARC - PARALELO C</strong></td>
                                                                            <td><strong>{{$deccm + $deccf}}</strong></td>
                                                                            <td><strong>{{$deccm}}</strong></td>
                                                                            <td><strong>{{$deccf}}</strong></td>
                                                                            </tr>
                                                                        <tr>
                                                                            <td><strong>10mo - DECIMO DE BÁSICA</strong></td>
                                                                            <td><strong>PARD - PARALELO D</strong></td>
                                                                            <td><strong>{{$decdm + $decdf}}</strong></td>
                                                                            <td><strong>{{$decdm}}</strong></td>
                                                                            <td><strong>{{$decdf}}</strong></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td><strong>1BGU - PRIMERO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                                                                                <td><strong>PARA - PARALELO A</strong></td>
                                                                                <td><strong>{{$primam + $primaf}}</strong></td>
                                                                                <td><strong>{{$primam}}</strong></td>
                                                                                 <td><strong>{{$primaf}}</strong></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>1BGU - PRIMERO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                                                                                <td><strong>PARB - PARALELO B</strong></td>
                                                                                <td><strong>{{$primbm + $primbf}}</strong></td>
                                                                                <td><strong>{{$primbm}}</strong></td>
                                                                                <td><strong>{{$primbf}}</strong></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>1BGU - PRIMERO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                                                                                <td><strong>PARC - PARALELO C</strong></td>
                                                                                <td><strong>{{$primcm + $primcf}}</strong></td>
                                                                                <td><strong>{{$primcm}}</strong></td>
                                                                                <td><strong>{{$primcf}}</strong></td>
                                                                                </tr>
                                                                            <tr>
                                                                                <td><strong>1BGU - PRIMERO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                                                                                <td><strong>PARD - PARALELO D</strong></td>
                                                                                <td><strong>{{$primdm + $primdf}}</strong></td>
                                                                                <td><strong>{{$primdm}}</strong></td>
                                                                                <td><strong>{{$primdf}}</strong></td>
                                                                            </tr>
                                                                            <tr>
                                                                                    <td><strong>2BGU - SEGUNDO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                                                                                    <td><strong>PARA - PARALELO A</strong></td>
                                                                                    <td><strong>{{$segam + $segaf}}</strong></td>
                                                                                    <td><strong>{{$segam}}</strong></td>
                                                                                     <td><strong>{{$segaf}}</strong></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><strong>2BGU - SEGUNDO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                                                                                    <td><strong>PARB - PARALELO B</strong></td>
                                                                                    <td><strong>{{$segbm + $segbf}}</strong></td>
                                                                                    <td><strong>{{$segbm}}</strong></td>
                                                                                    <td><strong>{{$segbf}}</strong></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><strong>2BGU - SEGUNDO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                                                                                    <td><strong>PARC - PARALELO C</strong></td>
                                                                                    <td><strong>{{$segcm + $segcf}}</strong></td>
                                                                                    <td><strong>{{$segcm}}</strong></td>
                                                                                    <td><strong>{{$segcf}}</strong></td>
                                                                                    </tr>
                                                                                <tr>
                                                                                    <td><strong>2BGU - SEGUNDO DE BACHILLERATO GENERAL UNIFICADO</strong></td>
                                                                                    <td><strong>PARD - PARALELO D</strong></td>
                                                                                    <td><strong>{{$segdm + $segdf}}</strong></td>
                                                                                    <td><strong>{{$segdm}}</strong></td>
                                                                                    <td><strong>{{$segdf}}</strong></td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td><strong>3BGU - TERCERO DE BACHILLERATO UNIFICADO</strong></td>
                                                                                        <td><strong>PARA - PARALELO A</strong></td>
                                                                                        <td><strong>{{$tercam + $tercaf}}</strong></td>
                                                                                        <td><strong>{{$tercam}}</strong></td>
                                                                                         <td><strong>{{$tercaf}}</strong></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>3BGU - TERCERO DE BACHILLERATO UNIFICADO</strong></td>
                                                                                        <td><strong>PARB - PARALELO B</strong></td>
                                                                                        <td><strong>{{$tercbm + $tercbf}}</strong></td>
                                                                                        <td><strong>{{$tercbm}}</strong></td>
                                                                                        <td><strong>{{$tercbf}}</strong></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>3BGU - TERCERO DE BACHILLERATO UNIFICADO</strong></td>
                                                                                        <td><strong>PARC - PARALELO C</strong></td>
                                                                                        <td><strong>{{$terccm + $terccf}}</strong></td>
                                                                                        <td><strong>{{$terccm}}</strong></td>
                                                                                        <td><strong>{{$terccf}}</strong></td>
                                                                                        </tr>
                                                                                    <tr>
                                                                                        <td><strong>3BGU - TERCERO DE BACHILLERATO UNIFICADO</strong></td>
                                                                                        <td><strong>PARD - PARALELO D</strong></td>
                                                                                        <td><strong>{{$tercdm + $tercdf}}</strong></td>
                                                                                        <td><strong>{{$tercdm}}</strong></td>
                                                                                        <td><strong>{{$tercdf}}</strong></td>
                                                                                    </tr>

            <tr>
                <td border="0px"></td>
                <td border="0px"><strong>TOTAL</strong></td>
                <td><strong>{{$totM + $totF}}</strong></td>
                <td><strong>{{$totM}}</strong></td>
                <td><strong>{{$totF}}</strong></td>
            </tr>
        </tbody>
    </table>


</body>
</html>
