<table>
    <caption style="text-align: center;">TOTAL COBROS</caption>
    <thead>
            <tr>
                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
        <tr>
            <th><strong>NO</strong></th>
            <th><strong>NOMBRES</strong></th>
            <th><strong>CEDULA</strong></th>
            <th><strong>TOTAL</strong></th>
            <th><strong>MAT</strong></th>
            <th><strong>PEN SEP</strong></th>
            <th><strong>PEN OCT</strong></th>
            <th><strong>PEN NOV</strong></th>
            <th><strong>PEN DIC</strong></th>
            <th><strong>PEN ENE</strong></th>
            <th><strong>PEN FEB</strong></th>
            <th><strong>PEN MAR</strong></th>
            <th><strong>PEN ABR</strong></th>
            <th><strong>PEN MAY</strong></th>
            <th><strong>PEN JUN</strong></th>
        </tr>
    </thead>
    @if(isset($sep))
    <tbody>
            @foreach($sep as $s)
            @if($s->valor !== '306.7' && $s->valor !== '314' && $s->valor !== '326' && $s->valor !== '353.5' && $s->valor !== '371' && $s->valor !== '196.7' && $s->valor !== '199' && $s->valor !== '201' && $s->valor !== '228.5' && $s->valor !== '246')
            <tr>
                <td><strong>{{$conteo++}}</strong></td>
                 <td><strong>{{$s->nombres}}</strong></td>
                 <td><strong>{{$s->cedula}}</strong></td>
                 <td><strong>{{$s->valor}}</strong></td>
            </tr>
            @else
               <tr>
               <td><strong>{{$conteo++}}</strong></td>
                <td><strong>{{$s->nombres}}</strong></td>
                <td><strong>{{$s->cedula}}</strong></td>
                <td><strong>{{$s->valor}}</strong></td>
                <td>70</td>
                @if(strpos($s->referencias, 'SEP') !== FALSE)
                @if(strpos($s->referencias, 'INICIAL 1') !== FALSE || strpos($s->referencias, 'INICIAL 2') !== FALSE || strpos($s->referencias, 'INI') !== FALSE)
                <td>60</td>
                @elseif(strpos($s->referencias, 'PRIMERO DE EGB') !== FALSE || strpos($s->referencias, 'SEGUNDO DE EGB') !== FALSE || strpos($s->referencias, 'TERCERO DE EGB') !== FALSE || strpos($s->referencias, 'CUARTO DE EGB') !== FALSE || strpos($s->referencias, 'QUINTO DE EGB') !== FALSE || strpos($s->referencias, 'SEXTO DE EGB') !== FALSE || strpos($s->referencias, 'SEPTIMO DE EGB') !== FALSE || strpos($s->referencias, 'OCTAVO DE EGB') !== FALSE || strpos($s->referencias, 'NOVENO DE EGB') !== FALSE || strpos($s->referencias, 'DECIMO DE EGB') !== FALSE || strpos($s->referencias, '1RO') !== FALSE || strpos($s->referencias, '8VO') !== FALSE)
                <td>65</td>
                @elseif(strpos($s->referencias, 'PRIMERO DE BACHILLERATO') !== FALSE || strpos($s->referencias, 'SEGUNDO DE BACHILLERATO') !== FALSE)
                <td>70</td>
                @elseif(strpos($s->referencias, 'TERCERO DE BACHILLERATO') !== FALSE)
                <td>95</td>
                @endif
                @endif
                </tr>
                @endif
                @endforeach

    </tbody>
    @foreach($totalNomina as $t)
    <tfoot>
        <tr>
            <td>

            </td>
            <td>
               <em><strong>Valor total de nomina: </strong></em>
            </td>
            <td>
                <strong>{{$t->valor_final}}</strong>
            </td>
        </tr>
    </tfoot>
    @endforeach
    @else
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
    @endif
</table>

