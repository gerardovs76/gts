<table>
        <thead>
            <tr>
                <h3>SUBSECRETARIA DE APOYO, SEGUIMIENTO Y REGULACIÓN DE LA EDUCACIÓN</h3>
            </tr>
            <tr>
                <h5>
                    Dirección Nacional de Regulación de la Educación
                </h5>
            </tr>
            <tr>
                <h4>FICHA DE REGISTRO DE CALIFICACIONES PARA ABANDERADOS</h4>
            </tr>
        </thead>
        <tbody>
            <tr>

            </tr>
            <tr>

            </tr>
            <tr>
            </tr>
            <tr>

            </tr>
            <tr>

            </tr>
            <tr></tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th><strong>No.</strong></th>
                <th><strong>No. de Identificación</strong></th>
                <th><strong>Apellidos y Nombres</strong></th>
                <th><strong>2°</strong></th>
                <th><strong>3°</strong></th>
                <th><strong>4°</strong></th>
                <th><strong>5°</strong></th>
                <th><strong>6°</strong></th>
                <th><strong>7°</strong></th>
                <th><strong>8°</strong></th>
                <th><strong>9°</strong></th>
                <th><strong>10°</strong></th>
                <th><strong>1°</strong></th>
                <th><strong>2°</strong></th>
                <th><strong>PROMEDIO</strong></th>
            </tr>
        </thead>
        <tbody>
            {{$i=1}}
            @foreach($abanderados as $abande)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$abande->cedula}}</td>
                <td>{{$abande->apellidos}} {{$abande->nombres}}</td>
                <td>{{$abande->basica_2}}</td>
                <td>{{$abande->basica_3}}</td>
                <td>{{$abande->basica_4}}</td>
                <td>{{$abande->basica_5}}</td>
                <td>{{$abande->basica_6}}</td>
                <td>{{$abande->basica_7}}</td>
                <td>{{$abande->basica_8}}</td>
                <td>{{$abande->basica_9}}</td>
                <td>{{$abande->basica_10}}</td>
                <td>{{$abande->bachillerato_1}}</td>
                <td>{{$abande->bachillerato_2}}</td>
                <td>{{$abande->promedio_final}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
