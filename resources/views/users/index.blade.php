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
                    <table class="table table-striped table-hover" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRES</th>
                                <th>EDITAR</th>
                                <th>ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>

                       <td width="10px">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="far fa-edit"></i>
                                        EDITAR
                                    </a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['users.destroy', $user->id],
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                            ELIMINAR
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                           </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function() {
          $('#table').DataTable({
               "language": {
                      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                  },
                  "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, 1000] ]
          });
      } );
       </script>
@endsection
