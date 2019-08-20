@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="col-xs-12 col-sm-8 col-lg-12">
        <div style="background-color: #008cba; padding: 7px;">
        <h2 class="text-center" style="color: #fff;">
            DETALLES DEL ROL
        </h2>
        </div>
        <hr>
            <div class="panel panel-primary">
                <div class="panel-heading text-center">ROL</div>

                <div class="panel-body">                                        
                    <p><strong>Nombre:</strong>     {{ $role->name }}</p>
                    <p><strong>Slug:</strong>       {{ $role->slug }}</p>
                    <p><strong>Descripción:</strong>  {{ $role->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection