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
        <div class="card">
            <div class="card-header text-center">
              <strong>INICIAL 1</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$inicial1A}} (Hombres: {{$inicial1AM}} Mujeres: {{$inicial1AF}})</strong></p>
              <p><strong>Paralelo B Total: {{$inicial1B}} (Hombres: {{$inicial1BM}} Mujeres: {{$inicial1BF}})</strong></p>
              <p><strong>Paralelo C Total: {{$inicial1C}} (Hombres: {{$inicial1CM}} Mujeres: {{$inicial1CF}})</strong></p>
              <p><strong>Paralelo D Total: {{$inicial1D}} (Hombres: {{$inicial1DM}} Mujeres: {{$inicial1DF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>INICIAL 2</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$inicial2A}} (Hombres: {{$inicial2AM}} Mujeres: {{$inicial2AF}})</strong></p>
              <p><strong>Paralelo B Total: {{$inicial2B}} (Hombres: {{$inicial2BM}} Mujeres: {{$inicial2BF}})</strong></p>
              <p><strong>Paralelo C Total: {{$inicial2C}} (Hombres: {{$inicial2CM}} Mujeres: {{$inicial2CF}})</strong></p>
              <p><strong>Paralelo D Total: {{$inicial2D}} (Hombres: {{$inicial2DM}} Mujeres: {{$inicial2DF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>PRIMERO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$pA}} (Hombres: {{$pAM}} Mujeres: {{$pAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$pB}} (Hombres: {{$pBM}} Mujeres: {{$pBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$pC}} (Hombres: {{$pCM}} Mujeres: {{$pCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$pD}} (Hombres: {{$pDM}} Mujeres: {{$pDF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>SEGUNDO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$sA}} (Hombres: {{$sAM}} Mujeres: {{$sAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$sB}} (Hombres: {{$sBM}} Mujeres: {{$sBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$sC}} (Hombres: {{$sCM}} Mujeres: {{$sCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$sD}} (Hombres: {{$sDM}} Mujeres: {{$sDF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>TERCERO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$tA}} (Hombres: {{$tAM}} Mujeres: {{$tAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$tB}} (Hombres: {{$tBM}} Mujeres: {{$tBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$tC}} (Hombres: {{$tCM}} Mujeres: {{$tCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$tD}} (Hombres: {{$tDM}} Mujeres: {{$tDF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>CUARTO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$cA}} (Hombres: {{$cAM}} Mujeres: {{$cAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$cB}} (Hombres: {{$cBM}} Mujeres: {{$cBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$cC}} (Hombres: {{$cCM}} Mujeres: {{$cCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$cD}} (Hombres: {{$cDM}} Mujeres: {{$cDF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>QUINTO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$qA}} (Hombres: {{$qAM}} Mujeres: {{$qAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$qB}} (Hombres: {{$qBM}} Mujeres: {{$qBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$qC}} (Hombres: {{$qCM}} Mujeres: {{$qCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$qD}} (Hombres: {{$qDM}} Mujeres: {{$qDF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>SEXTO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$sexA}} (Hombres: {{$sexAM}} Mujeres: {{$sexAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$sexB}} (Hombres: {{$sexBM}} Mujeres: {{$sexBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$sexC}} (Hombres: {{$sexCM}} Mujeres: {{$sexCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$sexD}} (Hombres: {{$sexDM}} Mujeres: {{$sexDF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>SEPTIMO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$sepA}} (Hombres: {{$sepAM}} Mujeres: {{$sepAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$sepB}} (Hombres: {{$sepBM}} Mujeres: {{$sepBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$sepC}} (Hombres: {{$sepCM}} Mujeres: {{$sepCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$sepD}} (Hombres: {{$sepDM}} Mujeres: {{$sepDF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>OCTAVO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$octA}} (Hombres: {{$octAM}} Mujeres: {{$octAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$octB}} (Hombres: {{$octBM}} Mujeres: {{$octBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$octC}} (Hombres: {{$octCM}} Mujeres: {{$octCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$octD}} (Hombres: {{$octDM}} Mujeres: {{$octDF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>NOVENO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$noA}} (Hombres: {{$noAM}} Mujeres: {{$noAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$noB}} (Hombres: {{$noBM}} Mujeres: {{$noBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$noC}} (Hombres: {{$noCM}} Mujeres: {{$noCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$noD}} (Hombres: {{$noDM}} Mujeres: {{$noDF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>DECIMO DE EGB</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$deA}} (Hombres: {{$deAM}} Mujeres: {{$deAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$deB}} (Hombres: {{$deBM}} Mujeres: {{$deBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$deC}} (Hombres: {{$deCM}} Mujeres: {{$deCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$deD}} (Hombres: {{$deDM}} Mujeres: {{$deDF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>PRIMERO DE BACHILLERATO</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$priA}} (Hombres: {{$priAM}} Mujeres: {{$priAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$priB}} (Hombres: {{$priBM}} Mujeres: {{$priBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$priC}} (Hombres: {{$priCM}} Mujeres: {{$priCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$priD}} (Hombres: {{$priDM}} Mujeres: {{$priDF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>SEGUNDO DE BACHILLERATO</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$segA}} (Hombres: {{$segAM}} Mujeres: {{$segAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$segB}} (Hombres: {{$segBM}} Mujeres: {{$segBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$segC}} (Hombres: {{$segCM}} Mujeres: {{$segCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$segD}} (Hombres: {{$segDM}} Mujeres: {{$segDF}})</strong></p>
            </div>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <strong>TERCERO DE BACHILLERATO</strong>
            </div>
            <div class="card-body">
              <p><strong>Paralelo A Total: {{$tercA}} (Hombres: {{$tercAM}} Mujeres: {{$tercAF}})</strong></p>
              <p><strong>Paralelo B Total: {{$tercB}} (Hombres: {{$tercBM}} Mujeres: {{$tercBF}})</strong></p>
              <p><strong>Paralelo C Total: {{$tercC}} (Hombres: {{$tercCM}} Mujeres: {{$tercCF}})</strong></p>
              <p><strong>Paralelo D Total: {{$tercD}} (Hombres: {{$tercDM}} Mujeres: {{$tercDF}})</strong></p>
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
            printData();
            })

        </script>
        <script>
                $('#boton2').click(function() {
                    window.location = "matricular-lista-total";
                 });
        </script>
@endsection
