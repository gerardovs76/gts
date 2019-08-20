
<div style="background: yellow; text-align: center;"><p>REGISTRO DE DATOS</p></div>
<table border="1">
    <thead>
        <tr>
        <th scope="row"><strong>Institución educativa: </strong></th>
        <td>UNIDAD EDUCATIVA PAUL DIRAC</td>
    </tr>
    <tr>
        <th scope="row"><strong>Año Lectivo: </strong></th>
    </tr>
    <tr>
        <th scope="row"><strong>Jornada: </strong></th>
    </tr>
    <tr>
         <th scope="row"><strong>Nivel: </strong></th>
         @foreach($matriculados as $matriculado)
         <td>{{$matriculado->curso}}</td>
         @endforeach
    </tr>
    <tr>
        <th scope="row"><strong>Promovido a: </strong></th>
    </tr>
    <tr>
        <th scope="row"><strong>Paralelo: </strong></th>
        @foreach($matriculados as $matriculado)
        <td>{{$matriculado->paralelo}}</td>
        @endforeach
    </tr>
    <tr>
      <th scope="row"><strong>RECTOR</strong></th>  
    </tr>
    <tr>
       <th scope="row"><strong>SECRETARIA</strong></th> 
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
        <tr>
            <td>1</td>
            @foreach($matriculados as $matriculado)
            <td>{{$matriculado->apellidos}}  {{$matriculado->nombres}}</td>
            @endforeach
        </tr>
    </tbody>
</table>