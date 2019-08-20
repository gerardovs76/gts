<table>
    <thead>
    <tr>
        <th>CO= COBROS SIEMPRE</th>
        <th>CODIGO CON EL CUAL EL CLIENTE SE ACERCARÁ A PAGAR</th>
        <th>MONEDA</th>
        <th>VALOR</th>
        <th>SERVICIO</th>
        <th></th>
        <th></th>
        <th>REFERENCIA</th>
        <th></th>
        <th>RUC EMPRESA</th>
        <th>NOMBRE</th>
        <th>CODIGO BANCO</th>
    </tr>
    </thead>
    <tbody>
    @foreach($matriculados as $matriculado)
        <tr>
            <td>CO</td>
            <td>{{ $matriculado->codigo }}</td>
            <td>USD</td>
            <td>{{str_replace(".", '',$matriculado->total)}}</td>
            <td>REC</td>
            <td></td>
            <td></td>
            <td>{{ $matriculado->curso }}-{{ $matriculado->paralelo }} SEP  MAT + PEN + SERV  </td>
            <td>R</td>
            <td>{{str_replace(".", '',"1792677556001")}}</td>
            <td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
            <td>32</td>
        </tr>
        <tr>
        	<td>CO</td>
            <td>{{ $matriculado->codigo }}</td>
            <td>USD</td>
            <td>{{str_replace(".", '',$matriculado->pension)}}</td>
            <td>REC</td>
            <td></td>
            <td></td>
            <td>{{ $matriculado->curso }}-{{ $matriculado->paralelo }} OCT PENSION</td>
            <td>R</td>
            <td>1792677556001</td>
            <td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
            <td>32</td>
        	
        </tr>
        <tr>
        	<td>CO</td>
            <td>{{ $matriculado->codigo }}</td>
            <td>USD</td>
            <td>{{str_replace(".", '',$matriculado->pension)}}</td>
            <td>REC</td>
            <td></td>
            <td></td>
            <td>{{ $matriculado->curso }}-{{ $matriculado->paralelo }} NOV PENSION</td>
            <td>R</td>
            <td>1792677556001</td>
            <td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
            <td>32</td>
        	
        </tr>
        <tr>
        	<td>CO</td>
            <td>{{ $matriculado->codigo }}</td>
            <td>USD</td>
            <td>{{str_replace(".", '',$matriculado->pension)}}</td>
            <td>REC</td>
            <td></td>
            <td></td>
            <td>{{ $matriculado->curso }}-{{ $matriculado->paralelo }} DIC PENSION</td>
            <td>R</td>
            <td>1792677556001</td>
            <td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
            <td>32</td>
        	
        </tr>
        <tr>
        	<td>CO</td>
            <td>{{ $matriculado->codigo }}</td>
            <td>USD</td>
            <td>{{str_replace(".", '',$matriculado->pension)}}</td>
            <td>REC</td>
            <td></td>
            <td></td>
            <td>{{ $matriculado->curso }}-{{ $matriculado->paralelo }} ENE PENSION</td>
            <td>R</td>
            <td>1792677556001</td>
            <td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
            <td>32</td>
        	
        </tr>
        <tr>
        	<td>CO</td>
            <td>{{ $matriculado->codigo }}</td>
            <td>USD</td>
            <td>{{str_replace(".", '',$matriculado->pension)}}</td>
            <td>REC</td>
            <td></td>
            <td></td>
            <td>{{ $matriculado->curso }}-{{ $matriculado->paralelo }} FEB PENSION</td>
            <td>R</td>
            <td>1792677556001</td>
            <td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
            <td>32</td>
        	
        </tr>
        <tr>
        	<td>CO</td>
            <td>{{ $matriculado->codigo }}</td>
            <td>USD</td>
            <td>{{str_replace(".", '',$matriculado->pension)}}</td>
            <td>REC</td>
            <td></td>
            <td></td>
            <td>{{ $matriculado->curso }}-{{ $matriculado->paralelo }} MAR PENSION</td>
            <td>R</td>
            <td>1792677556001</td>
            <td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
            <td>32</td>
        	
        </tr>
        <tr>
        	<td>CO</td>
            <td>{{ $matriculado->codigo }}</td>
            <td>USD</td>
            <td>{{str_replace(".", '',$matriculado->pension)}}</td>
            <td>REC</td>
            <td></td>
            <td></td>
            <td>{{ $matriculado->curso }}-{{ $matriculado->paralelo }} ABR PENSION</td>
            <td>R</td>
            <td>1792677556001</td>
            <td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
            <td>32</td>
        	
        </tr>
        <tr>
        	<td>CO</td>
            <td>{{ $matriculado->codigo }}</td>
            <td>USD</td>
            <td>{{str_replace(".", '',$matriculado->pension)}}</td>
            <td>REC</td>
            <td></td>
            <td></td>
            <td>{{ $matriculado->curso }}-{{ $matriculado->paralelo }} MAY PENSION</td>
            <td>R</td>
            <td>1792677556001</td>
            <td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
            <td>32</td>
        	
        </tr>
        <tr>
        	<td>CO</td>
            <td>{{ $matriculado->codigo }}</td>
            <td>USD</td>
            <td>{{str_replace(".", '',$matriculado->pension)}}</td>
            <td>REC</td>
            <td></td>
            <td></td>
            <td>{{ $matriculado->curso }}-{{ $matriculado->paralelo }} JUN PENSION</td>
            <td>R</td>
            <td>1792677556001</td>
            <td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
            <td>32</td>
        	
        </tr>
    @endforeach
    </tbody>
</table>