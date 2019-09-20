@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 <div class="col-xs-12 col-sm-8 col-lg-12">
    <div style="background-color: #008363; padding: 7px;">
    <h2 class="text-center" style="color: #fff; font-family: Roboto;">
      BIENVENIDOS AL SISTEMA DE GESTIÓN EDUCATIVA
    </h2>
    </div>
    <hr>


                     <div class="row">

                              <div class="col-lg-2">
                                <div class="panel panel-primary">
                                  <div class="panel-heading text-center"><i class="fas fa-home"></i> Bienvenido</div>
                                  <div class="panel-body">
                                 <h2 class="text-center">{{ $usuarios }}</h2><br>
                                 <hr>
                                  <h2 class="text-center"><i class="fas fa-clock"></i>{{ $fecha }}</h2>
                                  <hr>
                                  @foreach($roles as $rol)
                                  @if($rol->name == 'Super-admin')
                                  <h2 class="text-center">{{ $rol->name }}</h2>
                                  <h2 class="text-center"><i class="fas fa-user-cog"></i></h2>
                                  @elseif($rol->name == 'Alumno')
                                  <h2 class="text-center">{{ $rol->name }}</h2>
                                  <h2 class="text-center"><i class="fas fa-user-graduate"></i></h2>
                                  @elseif($rol->name == 'Profesor')
                                  <h2 class="text-center">{{ $rol->name }}</h2>
                                  <h2 class="text-center"><i class="fas fa-user-tie"></i></h2>
                                  @elseif($rol->name == 'Suspendido')
                                  <h2 class="text-center">{{ $rol->name }}</h2>
                                  <h2 class="text-center"><i class="fas fa-times"></i></h2>
                                  @endif
                                  @endforeach
                              </div>
                          </div>
                          <div class="panel panel-primary">
                            <div class="panel panel-heading text-center"><i class="far fa-newspaper"></i> Noticias</div>
                             <div class="panel panel-body">
                              @foreach($noticias as $noticia)
                             <h4><strong>{{ $noticia->nombre }}</strong></h4>
                             <h5><a href="{{ $noticia->slug }}">Ver aqui!</a></h5>
                             <h6><em>{{ $noticia->descripcion }}</em></h6>
                             <hr>
                              @endforeach
                             </div>
                           </div>
                     </div>
                      <div class="col-lg-8">
                      <div class="panel panel-primary">
                          <div class="panel-heading text-center"><i class="fas fa-calendar-alt"></i> CRONOGRAMA</div>
                            <div class="panel-body" id="calendar" >
                              {!! $calendar_details->calendar() !!}
                              {!! $calendar_details->script() !!}
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                      <div class="panel panel-primary">
                        <div class="panel panel-heading text-center"><i class="fas fa-quote-left"></i> Frases</div>
                        <div class="panel panel-body">
                          <div class="carousel-container">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" id="homepageItems">
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>


                      <div class="panel panel-primary">
                        <div class="panel panel-heading text-center"><i class="fas fa-calendar-alt"></i> Eventos</div>
                        <div class="panel panel-body">
                          @foreach($eventos as $evento)
                          <h4 class="text-center"><strong>{{ $evento->event_name }}</strong></h2>

                            <h5 class="text-center"><strong>Fecha de inicio: </strong>{{ $evento->start_date }}</h5>
                            <h5 class="text-center"><strong>Fecha fin: </strong>{{ $evento->end_date }}</h5>
                            <hr>
                          @endforeach

                        </div>
                      </div>
                      @if(Auth::user()->isRole('alumno') || Auth::user()->isRole('super-admin'))
                      <div class="panel panel-primary">
                            <div class="panel panel-heading text-center"><i class="fas fa-exclamation-triangle"></i> Resumen de faltas</div>
                            <div class="panel panel-body">
                                @foreach($inspe as $in)
                                   <p style="font-size: 12px;"><em><strong>FALTAS INJUSTIFICADAS</strong></em>(01) : <strong>{{($in->h1_count_01) +($in->h2_count_01) +($in->h3_count_01) +($in->h4_count_01) +($in->h5_count_01) +($in->h6_count_01) +($in->h7_count_01) +($in->h8_count_01)+($in->h9_count_01)}}</strong> </p>
                                   <p style="font-size: 12px;"><em><strong>FALTAS JUSTIFICADAS</strong></em>(02) : <strong>{{($in->h1_count_02) +($in->h2_count_02) +($in->h3_count_02) +($in->h4_count_02) +($in->h5_count_02) +($in->h6_count_02) +($in->h7_count_02) +($in->h8_count_02)+($in->h9_count_02)}}</strong></p>
                                   <p style="font-size: 12px;"><em><strong>MAL UNIFORMADO</strong></em>(03) : <strong>{{($in->h1_count_03) +($in->h2_count_03) +($in->h3_count_03) +($in->h4_count_03) +($in->h5_count_03) +($in->h6_count_03) +($in->h7_count_03) +($in->h8_count_03)+($in->h9_count_03)}}</strong></p>
                                   <p style="font-size: 12px;"><em><strong>PRESENTACIÓN PERSONAL</strong></em>(04) : <strong>{{($in->h1_count_04) +($in->h2_count_04) +($in->h3_count_04) +($in->h4_count_04) +($in->h5_count_04) +($in->h6_count_04) +($in->h7_count_04) +($in->h8_count_04)+($in->h9_count_04)}}</strong></p>
                                   @endforeach
                                  </div>
                              </div>
                          </div>
                          @endif

                     </div>



                    <script>
        $(document).ready(function() {
   $.ajax( {
       url: '{{ route('traer.frases') }}',
       dataType: 'json',
       success: function(data) {
        var response = '',
            indicator = '';
        for (var i = 0; i < data.length; i++) {
            response += '<div class="carousel-item"><h4><strong>' + data[i].autor + ':</strong></h4><p><em>"'+data[i].frase+'"</em></p></div>';


        }
        $('#homepageItems').append(response);
        $('.carousel-item').removeClass('active');
        $('#homepageItems .carousel-item').first().addClass('active');
        $("#myCarousel").carousel();
       }
   });
});


  </script>


@endsection
