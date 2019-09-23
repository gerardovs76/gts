<div class="form-group">
	<strong>Nombre: <br></strong>
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    <strong>Cedula: <br></strong>
    {{Form::text('cedula', null, ['class' => 'form-control', 'id' => 'cedula'])}}
</div>
<div class="form-group">
    <strong>Correo Electronico: </strong>
    {{Form::email('email', null, ['class' => 'form-control', 'id' => 'email'])}}
</div>
<hr>
<h3><strong>Lista de roles:</strong></h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($roles as $role)
	    <li>
	        <label>
	        {{ Form::checkbox('roles[]', $role->id, null) }}
	        {{ $role->name }}
	        <em>({{ $role->description}})</em>
	        </label>
	    </li>
	    @endforeach
    </ul>
</div>
<div class="form-group">
	{{ Form::button('<i class="far fa-save"></i> GUARDAR', ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) }}
</div>
