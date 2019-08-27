@extends('layouts.app')

@section('content')

        <div class="container">

          <div style="background-color: #008cba; padding: 7px;">
    <h2 class="text-center" style="color: #fff;">
      EVENTOS
    </h2>
    </div>
    <hr>
            <div class="panel panel-primary">

             <div class="panel-heading">NOVEDADES</div>

              <div class="panel-body">

                   {!! Form::open(array('route' => 'events.add','method'=>'POST','files'=>'true')) !!}
                    <div class="row">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                          @if (Session::has('success'))
                             <div class="alert alert-success">{{ Session::get('success') }}</div>
                          @elseif (Session::has('warnning'))
                              <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                          @endif

                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong>Nombre del evento: <br></strong>
                           <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                            {!! Form::text('event_name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                          </div>
                      </div>

                      <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                          <strong>Fecha de inicio: <br></strong>
                          <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                          {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                          {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                          <strong>Fecha final: <br></strong>
                          <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                          {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                          {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                      {!!Form::button('<i class="fas fa-plus"></i> AÑADIR EVENTO', ['class' => 'btn btn-primary'])!!}
                      </div>
                    </div>
                   {!! Form::close() !!}

             </div>

            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">Detalles del evento</div>
              <div class="panel-body">
                {!! $calendar_details->calendar() !!}
                {!! $calendar_details->script() !!}


              </div>
            </div>

            </div>



@endsection
