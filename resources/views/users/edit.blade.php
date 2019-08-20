@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="col-xs-12 col-sm-8 col-lg-12">
        <div style="background-color: #008cba; padding: 7px;">
        <h2 class="text-center" style="color: #fff;">
            ROLES Y PERMISOS
        </h2>
        </div>
        <hr>
        @include('users.partials.info')
            <div class="panel panel-primary">
                <div class="panel-heading text-center">ASIGNAR ROL A USUARIOS</div>

                <div class="panel-body">                    
                    {!! Form::model($user, ['route' => ['users.update', $user->id],
                    'method' => 'PUT']) !!}

                        @include('users.partials.form')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection