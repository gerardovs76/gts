@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div style="background-color: #008cba; padding: 7px;">
        <h2 class="text-center" style="color: #fff;">
            CONTROL DE USUARIOS
        </h2>
        </div>
        <hr>
        
        @include('users.partials.info')
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    USUARIOS
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                {{-- @can('users.show')
   --}}                              
                               {{--  @endcan
             --}}                    {{-- @can('users.edit')
   --}}                              <td width="10px">
                                    <a href="{{ route('users.edit', $user->id) }}" 
                                    class="btn btn-sm btn-primary">
                                        EDITAR
                                    </a>
                                </td>
                               {{--  @endcan
             --}}                    {{-- @can('users.destroy') --}}
                                <td width="10px">
                                    {!! Form::open(['route' => ['users.destroy', $user->id], 
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            ELIMINAR
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                              {{--   @endcan
            --}}                 </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection