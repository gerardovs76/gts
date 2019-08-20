<div class="form-group">
	<strong>Nombre: <br></strong>
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
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
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>