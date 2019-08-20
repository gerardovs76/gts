  @extends('layouts.app')

@section('content')
     <div class="container col-xs-12 col-sm-8 col-lg-12">
          <div style="background-color: #008cba; padding: 7px;">
          <h2 class="text-center" style="color: #fff;">
               EDITAR COBROS
          </h2>
          </div>
          
          <hr>
          {{--@include('notas.partials.info')--}}
          @include('cobros.partials.info')

    {!! Form::model($cobros, ['route' => ['cobros.update', $cobros->id], 'method' => 'PUT']) !!}                
      @include('cobros.partials.form')
     {!! Form::close() !!}


 @endsection