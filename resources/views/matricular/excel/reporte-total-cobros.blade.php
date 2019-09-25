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
            @if(!isset($s->facturaciones->first()->valor))
            <tr>
                <td><strong>{{$conteo++}}</strong></td>
                 <td><strong>{{$s->apellidos}} {{$s->nombres}}</strong></td>
                 <td><strong>{{$s->cedula}}</strong></td>
                 <td><strong>0</strong></td>
            </tr>
            @elseif($s->facturaciones->first()->valor !== '306.7' && $s->facturaciones->first()->valor !== '314' && $s->facturaciones->first()->valor !== '326' && $s->facturaciones->first()->valor !== '353.5' && $s->facturaciones->first()->valor !== '371' && $s->facturaciones->first()->valor !== '196.7' && $s->facturaciones->first()->valor !== '199' && $s->facturaciones->first()->valor !== '201' && $s->facturaciones->first()->valor !== '228.5' && $s->facturaciones->first()->valor !== '246')
            <tr>
                <td><strong>{{$conteo++}}</strong></td>
                 <td><strong>{{$s->apellidos}} {{$s->nombres}}</strong></td>
                 <td><strong>{{$s->cedula}}</strong></td>
                 <td><strong>{{$s->facturaciones->first()->valor}}</strong></td>
            </tr>
            @else
               <tr>
               <td><strong>{{$conteo++}}</strong></td>
                <td><strong>{{$s->nombres}}</strong></td>
               <td><strong>{{$s->cedula}}</strong></td>
               <td><strong>{{$s->facturaciones->first()->valor}}</strong></td>
                <td>70</td>
                @foreach($s->facturaciones as $factura)
                @if(strpos($factura->referencias, 'SEP') !== FALSE)
                @if(strpos($factura->referencias, 'INICIAL 1') !== FALSE || strpos($factura->referencias, 'INICIAL 2') !== FALSE || strpos($factura->referencias, 'INI') !== FALSE)
                <td>60</td>
                @elseif(strpos($factura->referencias, 'PRIMERO DE EGB') !== FALSE || strpos($factura->referencias, 'SEGUNDO DE EGB') !== FALSE || strpos($factura->referencias, 'TERCERO DE EGB') !== FALSE || strpos($factura->referencias, 'CUARTO DE EGB') !== FALSE || strpos($factura->referencias, 'QUINTO DE EGB') !== FALSE || strpos($factura->referencias, 'SEXTO DE EGB') !== FALSE || strpos($factura->referencias, 'SEPTIMO DE EGB') !== FALSE || strpos($factura->referencias, 'OCTAVO DE EGB') !== FALSE || strpos($factura->referencias, 'NOVENO DE EGB') !== FALSE || strpos($factura->referencias, 'DECIMO DE EGB') !== FALSE || strpos($factura->referencias, '1RO') !== FALSE || strpos($factura->referencias, '8VO') !== FALSE)
                <td>65</td>
                @elseif(strpos($factura->referencias, 'PRIMERO DE BACHILLERATO') !== FALSE || strpos($factura->referencias, 'SEGUNDO DE BACHILLERATO') !== FALSE)
                <td>70</td>
                @elseif(strpos($factura->referencias, 'TERCERO DE BACHILLERATO') !== FALSE)
                <td>95</td>
                @endif
                @endif
                @if(strpos($factura->referencias, 'OCT') !== FALSE)
               <td>{{$factura->valor}}</td>
                @endif
                @if(strpos($factura->referencias, 'NOV') !== FALSE)
               <td>{{$factura->valor}}</td>
                @endif
                @if(strpos($factura->referencias, 'DIC') !== FALSE)
               <td>{{$factura->valor}}</td>
                @endif
                @if(strpos($factura->referencias, 'ENE') !== FALSE)
               <td>{{$factura->valor}}</td>
                @endif
                @if(strpos($factura->referencias, 'FEB') !== FALSE)
               <td>{{$factura->valor}}</td>
                @endif
                @if(strpos($factura->referencias, 'MAR') !== FALSE)
               <td>{{$factura->valor}}</td>
                @endif
                @if(strpos($factura->referencias, 'ABR') !== FALSE)
               <td>{{$factura->valor}}</td>
                @endif
                @if(strpos($factura->referencias, 'MAY') !== FALSE)
               <td>{{$factura->valor}}</td>
                @endif
                @if(strpos($factura->referencias, 'JUN') !== FALSE)
               <td>{{$factura->valor}}</td>
                @endif
                @endforeach
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

