
<div style="background: yellow; text-align: center;"><p>REGISTRO DE DATOS</p></div>
<table border="1">
    <thead>
        <tr>
        <th scope="row"><strong>Institución educativa: </strong></th>
        <td>UNIDAD EDUCATIVA PAUL DIRAC</td>
    </tr>
    <tr>
        <th scope="row"><strong>Año Lectivo: </strong></th>
        <td>2019 - 2020</td>
    </tr>
    <tr>
        <th scope="row"><strong>Jornada: </strong></th>
    </tr>
    <tr>
         <th scope="row"><strong>Nivel: </strong></th>
         <td>{{$curso}}</td>
    </tr>
    <tr>
        <th scope="row"><strong>Promovido a: </strong></th>
    </tr>
    <tr>
        <th scope="row"><strong>Paralelo: </strong></th>
        <td>{{$paralelo}}</td>
    </tr>
    <tr>
      <th scope="row"><strong>RECTOR: </strong></th>
      <td>LCDA. CARMEN RAMIREZ</td>
    </tr>
    <tr>
       <th scope="row"><strong>SECRETARIA</strong></th>
       <td>LCDA. MONSERRATH RAMIREZ</td>
    </tr>

    </thead>
    <tbody>
    </tbody>
</table>
<div><p>REGISTRO DE NOMINA DE ESTUDIANTE</p></div>
<table>
    <thead>
        <tr>
            <th><strong>Nro. </strong></th>
            <th><strong>APELLIDOS Y NOMBRES</strong></th>
        </tr>
    </thead>
    <tbody>
        {{$i=1}}
            @foreach($matriculados as $matriculado)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$matriculado->apellidos}}  {{$matriculado->nombres}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
