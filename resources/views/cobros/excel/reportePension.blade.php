<table>
    <thead>
    <tr>
        <th><strong>CEDULA</strong></th>
        <th><strong>FECHA FACTURA</strong></th>
        <th><strong>RECURSOS A FACTURAR 1</strong></th>
        <th><strong>DETALLE DE FACTURA 1</strong></th>
        <th><strong>VALOR RECURSO 1</strong></th>
        <th><strong>RECURSOS A FACTURAR 2</strong></th>
        <th><strong>RAZON SOCIAL</strong></th>
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

            <td>{{ $matriculado->cedula_r }}</td>
            <td>{{ $matriculado->fecha_inicio }}</td>
            <td>PAGO</td>
            <td>PENSIÓN: {{$matriculado->referencias}}</td>
            <td>{{ $matriculado->valor}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $matriculado->num_referencia }}</td>
        </tr>
        @endforeach

    </tbody>
</table>
