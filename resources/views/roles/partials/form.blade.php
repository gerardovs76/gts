<div class="form-group">
	<strong>Nombre: <br></strong>
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
	<strong>URL Amigable: <br></strong>
	{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
	<strong>Descripción: <br></strong>
	{{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>
<hr>
<h3><strong>Permiso especial</strong></h3>
<div class="form-group">
 	<label>{{ Form::radio('special', 'all-access') }} Acceso total</label>
 	<label>{{ Form::radio('special', 'no-access') }} Ningún acceso</label>
</div>
<hr>
<h3><strong>Lista de permisos</strong></h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($permissions as $permission)
	    <li>
	        <label>
	        {{ Form::checkbox('permissions[]', $permission->id, null) }}
	        {{ $permission->name }}
	        <em><strong>({{ $permission->description }})</strong></em>
	        </label>
	    </li>
	    @endforeach
    </ul>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>