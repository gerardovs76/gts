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
                                  <div class="panel-heading text-center">Bienvenido</div>
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
                            <div class="panel panel-heading">Noticias</div>
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
                          <div class="panel-heading">Cronograma</div>
                            <div class="panel-body" id="calendar" >  
                              {!! $calendar_details->calendar() !!}
                              {!! $calendar_details->script() !!}
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                      <div class="panel panel-primary">
                        <div class="panel panel-heading text-center">Frases</div>
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
                        <div class="panel panel-heading text-center"><i class="fas fa-calendar-alt"></i><br>Eventos</div>
                        <div class="panel panel-body">
                          @foreach($eventos as $evento)
                          <h4 class="text-center"><strong>{{ $evento->event_name }}</strong></h2>
                        
                            <h5 class="text-center"><strong>Fecha de inicio: </strong>{{ $evento->start_date }}</h5>
                            <h5 class="text-center"><strong>Fecha fin: </strong>{{ $evento->end_date }}</h5>
                            <hr>
                          @endforeach
                          
                        </div>
                      </div>
                       
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
