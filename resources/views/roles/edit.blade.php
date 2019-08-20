@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-lg-12">
               <div class="col-xs-12 col-sm-8 col-lg-12">
        <div style="background-color: #008cba; padding: 7px;">
        <h2 class="text-center" style="color: #fff;">
            EDICIÓN DE ROLES
        </h2>
        </div>
        <hr>
            <div class="panel panel-primary">
                <div class="panel-heading text-center">ROLES</div>

                <div class="panel-body">                    
                    {!! Form::model($role, ['route' => ['roles.update', $role->id],
                    'method' => 'PUT']) !!}

                        @include('roles.partials.form')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection