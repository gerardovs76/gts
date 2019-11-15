<h2 style="text-align: center;">CAS</h2>
<table>
    <thead>
            <tr>
                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
        <tr>
            <th><strong>CEDULA</strong></th>
            <th><strong>NOMBRES</strong></th>
            <th><strong>APELLIDOS</strong></th>
            <th><strong>CURSO</strong></th>
            <th><strong>PARALELO</strong></th>
            <th><strong>FECHA NACIMIENTO</strong></th>
            <th><strong>REPRESENTANTE</strong></th>
            <th><strong>NOMBRES REPRESETANTE</strong></th>
            <th><strong>CEDULA REPRESENTANTE</strong></th>
            <th><strong>CORRREO</strong></th>
            <th><strong>TELEFONO CONVENCIONAL</strong></th>
            <th><strong>TELEFONO MOVIL</strong></th>
            <th><strong>TIPO ESTUDIANTE</strong></th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($matriculados as $matri)
        <tr>

            <td><strong>{{$matri->cedula}}</strong></td>
            <td><strong>{{$matri->nombres}}</strong></td>
            <td><strong>{{$matri->apellidos}}</strong></td>
            <td><strong>{{$matri->curso}}</strong></td>
            <td><strong>{{$matri->paralelo}}</strong></td>
            <td><strong>{{$matri->fecha_nacimiento}}</strong></td>
            <td><strong>{{$matri->representante}}</strong></td>
            <td><strong>{{$matri->nombres_representante}}</strong></td>
            <td><strong>{{$matri->cedrepresentante}}</strong></td>
            <td><strong>{{$matri->email}}</strong></td>
            <td><strong>{{$matri->convencional}}</strong></td>
            <td><strong>{{$matri->movil}}</strong></td>
            <td><strong>{{$matri->tipo_estudiante}}</strong></td>
        </tr>
        @endforeach
    </tbody>
</table>
