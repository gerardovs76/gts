<table>
    <thead>
    <tr>
        <th><strong>CEDULA</strong></th>
        <th><strong>NOMBRES</strong></th>
        <th><strong>APELLIDOS</strong></th>
        <th><strong>CURSO</strong></th>
        <th><strong>ESPCIALIDAD</strong></th>
        <th><strong>PARALELO</strong></th>
        <th><strong>RAZON SOCIAL</strong></th>
          <th><strong>RUC</strong></th>
        <th><strong>DIRECCION FACTURA</strong></th>
        <th><strong>TELEFONO</strong></th>
        <th><strong>TIPO ESTUDIANTE</strong></th>
        <th><strong>CODIGO</strong></th>
        <th><strong>CORREO</strong></th>
        <th><strong>FECHA DE CREACION</strong></th>
    </tr>
    </thead>
    <tbody>
    @foreach($matriculados as $matriculado)
        <tr>
            <td>{{ $matriculado->cedula }}</td>
            <td>{{ $matriculado->nombres }}</td>
            <td>{{ $matriculado->apellidos }}</td>
            <td>{{ $matriculado->curso }}</td>
            <td>{{ $matriculado->especialidad }}</td>
            <td>{{ $matriculado->paralelo }}</td>
            <td>{{ $matriculado->razon_social }}</td>
            <td>{{ $matriculado->cedula_r }}</td>
            <td>{{ $matriculado->direccion_factura }}</td>
            <td>{{ $matriculado->telefono_factura }}</td>
            <td>{{ $matriculado->tipo_estudiante }}</td>
            <td>{{ $matriculado->codigo }}</td>
            <td>{{ $matriculado->email }}</td>
            <td>{{ $matriculado->fecha_creacion }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
