<table>
    <thead>
    <tr>
        <th><strong>CEDULA</strong></th>
        <th><strong>FECHA FACTURA</strong></th>
        <th><strong>RECURSOS A FACTURAR 1</strong></th>
        <th><strong>DETALLE DE FACTURA 1</strong></th>
        <th><strong>VALOR RECURSO 1</strong></th>
        <th><strong>RECURSOS A FACTURAR 2</strong></th>
        <th><strong>DETALLE DE LA FACTURA 2</strong></th>
        <th><strong>VALOR DEL RECURSO 2</strong></th>
        <th><strong>RECURSOS A FACTURAR 3</strong></th>
        <th><strong>DETALLE DE LA FACTURA 3</strong></th>
        <th><strong>VALOR DEL RECURSO 3</strong></th>
        <th><strong>REFERENCIA ADICIONAL</strong></th>
    </tr>
    </thead>
    <tbody>
    @foreach($matriculados as $matriculado)
        <tr>

            <td>{{ str_replace('-', '',$matriculado->cedula_r) }}</td>
            <td>{{ $matriculado->fecha_inicio }}</td>
            <td>PENSIONES</td>
            <td>MENSUAL {{$matriculado->referencias}}</td>
            @if(strpos($matriculado->referencias, 'INICIAL 1') !== FALSE|| strpos($matriculado->referencias, 'INICIAL 2') !== FALSE || strpos($matriculado->referencias, 'INI') !== FALSE)
            <td>60</td>
            <td>MATRICULA</td>
            <td>MATRICULA 19-20</td>
            <td>70</td>
            @elseif(strpos($matriculado->referencias, 'PRIMERO DE EGB') !== FALSE || strpos($matriculado->referencias, 'SEGUNDO DE EGB') !== FALSE || strpos($matriculado->referencias, 'TERCERO DE EGB') !== FALSE || strpos($matriculado->referencias, 'CUARTO DE EGB') !== FALSE || strpos($matriculado->referencias, 'QUINTO DE EGB') !== FALSE || strpos($matriculado->referencias, 'SEXTO DE EGB') !== FALSE || strpos($matriculado->referencias, 'SEPTIMO DE EGB') !== FALSE || strpos($matriculado->referencias, 'OCTAVO DE EGB') !== FALSE || strpos($matriculado->referencias, 'NOVENO DE EGB') !== FALSE || strpos($matriculado->referencias, 'DECIMO DE EGB') !== FALSE || strpos($matriculado->referencias, '1RO') !== FALSE || strpos($matriculado->referencias, '8VO') !== FALSE || strpos($matriculado->referencias, '2DO') !== FALSE || strpos($matriculado->referencias, '5TO') !== FALSE)
            <td>65</td>
            <td>MATRICULA</td>
            <td>MATRICULA 19-20</td>
            <td>70</td>
            @elseif(strpos($matriculado->referencias, 'PRIMERO DE BACHILLERATO') !== FALSE || strpos($matriculado->referencias,'SEGUNDO DE BACHILLERATO') !== FALSE)
            <td>70</td>
            <td>MATRICULA</td>
            <td>MATRICULA 19-20</td>
            <td>70</td>
            @elseif(strpos($matriculado->referencias,'TERCERO DE BACHILLERATO') !== FALSE)
            <td>95</td>
            <td>MATRICULA</td>
            <td>MATRICULA 19-20</td>
            <td>70</td>
            @endif
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $matriculado->num_referencia }}</td>
        </tr>
        @endforeach

    </tbody>
</table>
