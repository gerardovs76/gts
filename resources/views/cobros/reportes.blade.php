 @extends('layouts.app')

@section('content')
     <div class="container col-xs-12 col-sm-8 col-lg-12">
          <div style="background-color: #008cba; padding: 7px;">
          <h2 class="text-center" style="color: #fff;">
             REPORTES COBROS
          </h2>
          </div>
          
          <hr>

          <div class="panel panel-primary">
     <div class="panel-heading">DATOS </div>
          
     <div class="panel-body">
          {!! Form::open(['route' => ['cobros.matriculados'], 'method' => 'get']) !!}
     <div class="form-row">
          <div class="form-group col-md-4">
          <strong>Fecha inicio: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::date('fecha',null, ['class' => 'form-control col-md-8', 'id' => 'cursos', 'placeholder' => 'Coloque el curso']) !!}
          </div>
          </div>

          <div class="form-group col-md-4">
          <strong>Fecha hasta: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::date('fecha_hasta',null, ['class' => 'form-control col-md-8', 'id' => 'cursos', 'placeholder' => 'Coloque el curso']) !!}
          </div>
          </div>

           <div class="form-group col-md-4">
          <strong>Tipo estudiante: <br></strong>
          <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
          {!! Form::select('tipo_estudiante',['NUEVO' => 'NUEVO', 'ANTIGUO' => 'ANTIGUO'],null, ['class' => 'form-control col-md-8', 'id' => 'tipo_estudiante', 'placeholder' => 'Coloque el tipo de estudiante']) !!}
          </div>
          </div>
          <div class="form-group col-md-10">
              <button class="btn btn-primary" id="agregarValores" type="submit"><i class="fas fa-print"></i> IMPRIMIR EXCEL</button>
          </div>
     </div>
     </div>
     </div>
{!! Form::close() !!}
     {{-- <script>
          $('#agregarValores').on('click', function(){

               var curso = $('#cursos').val();
               var tipo_estudiante = $('#tipo_estudiante').val();


               $.get('reportes_matriculados/'+curso, function(response){
                    

               });

          });
     </script> --}}
@endsection 