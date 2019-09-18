@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-sm-8 col-lg-12">

		<div style="background-color: #008cba; padding: 7px;">
		<h2 class="text-center" style="color: #fff; font-family: Roboto;">
			TOTAL RESUMEN
		</h2>
		</div>

		<hr>
        @include('notas.partials.info')
        <div class="container" id="allData">
       <button class="btn btn-primary" id="boton"><i class="fas fa-print"></i>IMPRIMIR</button>
       <button class="btn btn-success" id="boton2"><i class="fas fa-print"></i>IMPRIMIR REPORTE TOTAL COBROS</button>
       <div class="col-md-offset-6"><strong></strong></div>
       <div  class="col-md-offset-8"><strong>Total nuevos: {{$nuevos}} &nbsp; Total antiguos: {{$antiguos}}</strong></div>
        <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>INICIAL 1</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$inicial1A}} (Hombres: {{$inicial1AM}} Mujeres: {{$inicial1AF}})  (Nuevos: {{$nuevos1A}}  Antiguos: {{$antiguos1A}})</strong></p>
              <p><strong>Paralelo B Total: {{$inicial1B}} (Hombres: {{$inicial1BM}} Mujeres: {{$inicial1BF}})  (Nuevos: {{$nuevos1B}}  Antiguos: {{$antiguos1B}})</strong></p>
              <p><strong>Paralelo C Total: {{$inicial1C}} (Hombres: {{$inicial1CM}} Mujeres: {{$inicial1CF}})  (Nuevos: {{$nuevos1C}}  Antiguos: {{$antiguos1C}})</strong></p></strong></p>
              <p><strong>Paralelo D Total: {{$inicial1D}} (Hombres: {{$inicial1DM}} Mujeres: {{$inicial1DF}})  (Nuevos: {{$nuevos1D}}  Antiguos: {{$antiguos1D}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>INICIAL 2</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$inicial2A}} (Hombres: {{$inicial2AM}} Mujeres: {{$inicial2AF}})   (Nuevos: {{$nuevos2A}}  Antiguos: {{$antiguos2A}})</strong></p>
              <p><strong>Paralelo B Total: {{$inicial2B}} (Hombres: {{$inicial2BM}} Mujeres: {{$inicial2BF}})   (Nuevos: {{$nuevos2B}}  Antiguos: {{$antiguos2B}})</strong></p>
              <p><strong>Paralelo C Total: {{$inicial2C}} (Hombres: {{$inicial2CM}} Mujeres: {{$inicial2CF}})   (Nuevos: {{$nuevos2C}}  Antiguos: {{$antiguos2C}})</strong></p>
              <p><strong>Paralelo D Total: {{$inicial2D}} (Hombres: {{$inicial2DM}} Mujeres: {{$inicial2DF}})   (Nuevos: {{$nuevos2D}}  Antiguos: {{$antiguos2D}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>PRIMERO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$pA}} (Hombres: {{$pAM}} Mujeres: {{$pAF}})   (Nuevos: {{$nuevospA}}  Antiguos: {{$antiguospA}})</strong></p>
              <p><strong>Paralelo B Total: {{$pB}} (Hombres: {{$pBM}} Mujeres: {{$pBF}})   (Nuevos: {{$nuevospB}}  Antiguos: {{$antiguospB}})</strong></p>
              <p><strong>Paralelo C Total: {{$pC}} (Hombres: {{$pCM}} Mujeres: {{$pCF}})   (Nuevos: {{$nuevospC}}  Antiguos: {{$antiguospC}})</strong></p>
              <p><strong>Paralelo D Total: {{$pD}} (Hombres: {{$pDM}} Mujeres: {{$pDF}})   (Nuevos: {{$nuevospD}}  Antiguos: {{$antiguospD}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>SEGUNDO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$sA}} (Hombres: {{$sAM}} Mujeres: {{$sAF}})   (Nuevos: {{$nuevossA}}  Antiguos: {{$antiguossA}})</strong></p>
              <p><strong>Paralelo B Total: {{$sB}} (Hombres: {{$sBM}} Mujeres: {{$sBF}})   (Nuevos: {{$nuevossB}}  Antiguos: {{$antiguossB}})</strong></p>
              <p><strong>Paralelo C Total: {{$sC}} (Hombres: {{$sCM}} Mujeres: {{$sCF}})   (Nuevos: {{$nuevossC}}  Antiguos: {{$antiguossC}})</strong></p>
              <p><strong>Paralelo D Total: {{$sD}} (Hombres: {{$sDM}} Mujeres: {{$sDF}})   (Nuevos: {{$nuevossD}}  Antiguos: {{$antiguossD}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>TERCERO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$tA}} (Hombres: {{$tAM}} Mujeres: {{$tAF}})   (Nuevos: {{$nuevostA}}  Antiguos: {{$antiguostA}})</strong></p>
              <p><strong>Paralelo B Total: {{$tB}} (Hombres: {{$tBM}} Mujeres: {{$tBF}})   (Nuevos: {{$nuevostB}}  Antiguos: {{$antiguostB}})</strong></p>
              <p><strong>Paralelo C Total: {{$tC}} (Hombres: {{$tCM}} Mujeres: {{$tCF}})   (Nuevos: {{$nuevostC}}  Antiguos: {{$antiguostC}})</strong></p>
              <p><strong>Paralelo D Total: {{$tD}} (Hombres: {{$tDM}} Mujeres: {{$tDF}})   (Nuevos: {{$nuevostD}}  Antiguos: {{$antiguostD}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>CUARTO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$cA}} (Hombres: {{$cAM}} Mujeres: {{$cAF}})   (Nuevos: {{$nuevoscA}}  Antiguos: {{$antiguoscA}})</strong></p>
              <p><strong>Paralelo B Total: {{$cB}} (Hombres: {{$cBM}} Mujeres: {{$cBF}})   (Nuevos: {{$nuevoscB}}  Antiguos: {{$antiguoscB}})</strong></p>
              <p><strong>Paralelo C Total: {{$cC}} (Hombres: {{$cCM}} Mujeres: {{$cCF}})   (Nuevos: {{$nuevoscC}}  Antiguos: {{$antiguoscC}})</strong></p>
              <p><strong>Paralelo D Total: {{$cD}} (Hombres: {{$cDM}} Mujeres: {{$cDF}})   (Nuevos: {{$nuevoscD}}  Antiguos: {{$antiguoscD}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>QUINTO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$qA}} (Hombres: {{$qAM}} Mujeres: {{$qAF}})   (Nuevos: {{$nuevosqA}}  Antiguos: {{$antiguosqA}})</strong></p>
              <p><strong>Paralelo B Total: {{$qB}} (Hombres: {{$qBM}} Mujeres: {{$qBF}})   (Nuevos: {{$nuevosqB}}  Antiguos: {{$antiguosqB}})</strong></p>
              <p><strong>Paralelo C Total: {{$qC}} (Hombres: {{$qCM}} Mujeres: {{$qCF}})   (Nuevos: {{$nuevosqC}}  Antiguos: {{$antiguosqC}})</strong></p>
              <p><strong>Paralelo D Total: {{$qD}} (Hombres: {{$qDM}} Mujeres: {{$qDF}})   (Nuevos: {{$nuevosqD}}  Antiguos: {{$antiguosqD}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>SEXTO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$sexA}} (Hombres: {{$sexAM}} Mujeres: {{$sexAF}})   (Nuevos: {{$nuevossexA}}  Antiguos: {{$antiguossexA}})</strong></p>
              <p><strong>Paralelo B Total: {{$sexB}} (Hombres: {{$sexBM}} Mujeres: {{$sexBF}})   (Nuevos: {{$nuevossexB}}  Antiguos: {{$antiguossexB}})</strong></p>
              <p><strong>Paralelo C Total: {{$sexC}} (Hombres: {{$sexCM}} Mujeres: {{$sexCF}})   (Nuevos: {{$nuevossexC}}  Antiguos: {{$antiguossexC}})</strong></p>
              <p><strong>Paralelo D Total: {{$sexD}} (Hombres: {{$sexDM}} Mujeres: {{$sexDF}})   (Nuevos: {{$nuevossexD}}  Antiguos: {{$antiguossexD}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>SEPTIMO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$sepA}} (Hombres: {{$sepAM}} Mujeres: {{$sepAF}})   (Nuevos: {{$nuevossepA}}  Antiguos: {{$antiguossepA}})</strong></p>
              <p><strong>Paralelo B Total: {{$sepB}} (Hombres: {{$sepBM}} Mujeres: {{$sepBF}})   (Nuevos: {{$nuevossepB}}  Antiguos: {{$antiguossepB}})</strong></p>
              <p><strong>Paralelo C Total: {{$sepC}} (Hombres: {{$sepCM}} Mujeres: {{$sepCF}})   (Nuevos: {{$nuevossepC}}  Antiguos: {{$antiguossepC}})</strong></p>
              <p><strong>Paralelo D Total: {{$sepD}} (Hombres: {{$sepDM}} Mujeres: {{$sepDF}})   (Nuevos: {{$nuevossepD}}  Antiguos: {{$antiguossepD}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>OCTAVO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$octA}} (Hombres: {{$octAM}} Mujeres: {{$octAF}})   (Nuevos: {{$nuevosoctA}}  Antiguos: {{$antiguosoctA}})</strong></p>
              <p><strong>Paralelo B Total: {{$octB}} (Hombres: {{$octBM}} Mujeres: {{$octBF}})   (Nuevos: {{$nuevosoctB}}  Antiguos: {{$antiguosoctB}})</strong></p>
              <p><strong>Paralelo C Total: {{$octC}} (Hombres: {{$octCM}} Mujeres: {{$octCF}})   (Nuevos: {{$nuevosoctC}}  Antiguos: {{$antiguosoctC}})</strong></p>
              <p><strong>Paralelo D Total: {{$octD}} (Hombres: {{$octDM}} Mujeres: {{$octDF}})   (Nuevos: {{$nuevosoctD}}  Antiguos: {{$antiguosoctD}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>NOVENO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$noA}} (Hombres: {{$noAM}} Mujeres: {{$noAF}})   (Nuevos: {{$nuevosnoA}}  Antiguos: {{$antiguosnoA}})</strong></p>
              <p><strong>Paralelo B Total: {{$noB}} (Hombres: {{$noBM}} Mujeres: {{$noBF}})   (Nuevos: {{$nuevosnoB}}  Antiguos: {{$antiguosnoB}})</strong></p>
              <p><strong>Paralelo C Total: {{$noC}} (Hombres: {{$noCM}} Mujeres: {{$noCF}})   (Nuevos: {{$nuevosnoC}}  Antiguos: {{$antiguosnoC}})</strong></p>
              <p><strong>Paralelo D Total: {{$noD}} (Hombres: {{$noDM}} Mujeres: {{$noDF}})   (Nuevos: {{$nuevosnoD}}  Antiguos: {{$antiguosnoD}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>DECIMO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$deA}} (Hombres: {{$deAM}} Mujeres: {{$deAF}})   (Nuevos: {{$nuevosdeA}}  Antiguos: {{$antiguosdeA}})</strong></p>
              <p><strong>Paralelo B Total: {{$deB}} (Hombres: {{$deBM}} Mujeres: {{$deBF}})   (Nuevos: {{$nuevosdeB}}  Antiguos: {{$antiguosdeB}})</strong></p>
              <p><strong>Paralelo C Total: {{$deC}} (Hombres: {{$deCM}} Mujeres: {{$deCF}})   (Nuevos: {{$nuevosdeC}}  Antiguos: {{$antiguosdeC}})</strong></p>
              <p><strong>Paralelo D Total: {{$deD}} (Hombres: {{$deDM}} Mujeres: {{$deDF}})   (Nuevos: {{$nuevosdeD}}  Antiguos: {{$antiguosdeD}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>PRIMERO DE BACHILLERATO</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$priA}} (Hombres: {{$priAM}} Mujeres: {{$priAF}})   (Nuevos: {{$nuevospriA}}  Antiguos: {{$antiguospriA}})</strong></p>
              <p><strong>Paralelo B Total: {{$priB}} (Hombres: {{$priBM}} Mujeres: {{$priBF}})   (Nuevos: {{$nuevospriB}}  Antiguos: {{$antiguospriB}})</strong></p>
              <p><strong>Paralelo C Total: {{$priC}} (Hombres: {{$priCM}} Mujeres: {{$priCF}})   (Nuevos: {{$nuevospriC}}  Antiguos: {{$antiguospriC}})</strong></p>
              <p><strong>Paralelo D Total: {{$priD}} (Hombres: {{$priDM}} Mujeres: {{$priDF}})   (Nuevos: {{$nuevospriD}}  Antiguos: {{$antiguospriD}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color : white;">
              <strong>SEGUNDO DE BACHILLERATO</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$segA}} (Hombres: {{$segAM}} Mujeres: {{$segAF}})   (Nuevos: {{$nuevossegA}}  Antiguos: {{$antiguossegA}})</strong></p>
              <p><strong>Paralelo B Total: {{$segB}} (Hombres: {{$segBM}} Mujeres: {{$segBF}})   (Nuevos: {{$nuevossegB}}  Antiguos: {{$antiguossegB}})</strong></p>
              <p><strong>Paralelo C Total: {{$segC}} (Hombres: {{$segCM}} Mujeres: {{$segCF}})   (Nuevos: {{$nuevossegC}}  Antiguos: {{$antiguossegC}})</strong></p>
              <p><strong>Paralelo D Total: {{$segD}} (Hombres: {{$segDM}} Mujeres: {{$segDF}})   (Nuevos: {{$nuevossegD}}  Antiguos: {{$antiguossegD}})</strong></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-header text-center" style="background-color: #008cba; color: white;">
              <strong>TERCERO DE BACHILLERATO</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$tercA}} (Hombres: {{$tercAM}} Mujeres: {{$tercAF}})   (Nuevos: {{$nuevostercA}}  Antiguos: {{$antiguostercA}})</strong></p>
              <p><strong>Paralelo B Total: {{$tercB}} (Hombres: {{$tercBM}} Mujeres: {{$tercBF}})   (Nuevos: {{$nuevostercB}}  Antiguos: {{$antiguostercB}})</strong></p>
              <p><strong>Paralelo C Total: {{$tercC}} (Hombres: {{$tercCM}} Mujeres: {{$tercCF}})   (Nuevos: {{$nuevostercC}}  Antiguos: {{$antiguostercC}})</strong></p>
              <p><strong>Paralelo D Total: {{$tercD}} (Hombres: {{$tercDM}} Mujeres: {{$tercDF}})   (Nuevos: {{$nuevostercD}}  Antiguos: {{$antiguostercD}})</strong></p>
            </div>
          </div>
        </div>
    </div>
        <script>
            function printData()
            {
               var allData=document.getElementById("allData");
               newWin= window.open("");
                    newWin.document.write(allData.outerHTML);
                    newWin.print();
                    newWin.close();
            }

            $('#boton').on('click',function(){
                $('#boton').css("display", "none");
                $('#boton2').css("display", "none");
            printData();
            })

        </script>
        <script>
                $('#boton2').click(function() {
                    window.location = "matricular-lista-total";
                 });
        </script>
@endsection
