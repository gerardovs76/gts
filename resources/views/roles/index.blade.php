@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-lg-12">
        <div style="background-color: #008cba; padding: 7px;">
        <h2 class="text-center" style="color: #fff;">
            ROLES Y PERMISOS
        </h2>
        </div>
        <hr>
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    ROLES
                  {{--   @can('roles.create') --}}
                  {{--   @endcan --}}
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
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                {{-- @can('roles.show') --}}
                                <td width="10px">
                                    <a href="{{ route('roles.show', $role->id) }}" 
                                    class="btn btn-sm btn-primary">
                                        VER
                                    </a>
                                </td>
                                {{-- @endcan
                                @can('roles.edit') --}}
                                <td width="10px">
                                    <a href="{{ route('roles.edit', $role->id) }}" 
                                    class="btn btn-sm btn-primary">
                                        EDITAR
                                    </a>
                                </td>
                               {{--  @endcan
                                @can('roles.destroy') --}}
                                <td width="10px">
                                    {!! Form::open(['route' => ['roles.destroy', $role->id], 
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            ELIMINAR
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                               {{--  @endcan --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection