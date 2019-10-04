<table>
	<thead>
		<tr>

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

         <td><strong>NIVEL: </strong></td>
         @foreach($matriculados as $matriculado)
         <td>{{ $matriculado->curso }}</td>
         @endforeach
         <td><strong>PARALELO: </strong></td>
         @foreach($matriculados as $matriculado)
         <td>{{ $matriculado->paralelo }}</td>
         @endforeach
		</tr>
		<tr>
			<td><strong>JORNADA: </strong></td>
		</tr>
	</tbody>
</table>

<table>
	<thead>
		<tr>
			<th><strong>ORD</strong></th>
			<th><strong>NOMBRES Y APELLIDOS</strong></th>
			@foreach($notas as $nota)
			<th><strong>{{ $nota->materia }}</strong></th>
			@endforeach
			<th><strong>PROMEDIO</strong></th>
			<th><strong>COMPORTAMIENTO</strong></th>
			<th><strong>OBSERVACIONES</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			@foreach($matriculados as $matriculado)
			<td>{{ $matriculado->apellidos }} {{ $matriculado->nombres }}</td>
			@endforeach
			@foreach($notas as $nota)
			<td>{{ $nota->nota_final }}</td>
			@endforeach
			<td>{{ $notas->sum('nota_final') / $notas->count('materia') }}</td>
			<td></td>

		</tr>
		<tr>
			<td>2</td>


		</tr>
		<tr>
			<td>3</td>


		</tr>
		<tr>
			<td>4</td>


		</tr>
		<tr>
			<td>5</td>


		</tr>
		<tr>
			<td>6</td>


		</tr>
		<tr>
			<td>7</td>


		</tr>
		<tr>
			<td>8</td>


		</tr>
		<tr>
			<td>9</td>


		</tr>
		<tr>
			<td>10</td>


		</tr><tr>
			<td>11</td>


		</tr><tr>
			<td>12</td>


		</tr><tr>
			<td>13</td>


		</tr>
		<tr>
			<td>14</td>


		</tr>
		<tr>
			<td>15</td>


		</tr>
		<tr>
			<td>16</td>


		</tr>
		<tr>
			<td>17</td>


		</tr>
		<tr>
			<td>18</td>


		</tr><tr>
			<td>19</td>


		</tr>
		<tr>
			<td>20</td>


		</tr>
		<tr>
			<td>21</td>


		</tr>
		<tr>
			<td>22</td>


		</tr>
		<tr>
			<td>23</td>


		</tr>
		<tr>
			<td>24</td>


		</tr>
		<tr>
			<td>25</td>


		</tr>
		<tr>
			<td>26</td>


		</tr>
		<tr>
			<td>27</td>


		</tr>
		<tr>
			<td>28</td>


		</tr>
		<tr>
			<td>29</td>


		</tr>
		<tr>
			<td>30</td>


		</tr>
		<tr>
			<td>31</td>


		</tr>
		<tr>
			<td>32</td>


		</tr>
		<tr>
			<td>33</td>


		</tr>
		<tr>
			<td>34</td>


		</tr>
		<tr>
			<td>35</td>


		</tr>
		<tr>
			<td>36</td>


		</tr>
		<tr>
			<td>37</td>


		</tr>
		<tr>
			<td>38</td>


		</tr>
		<tr>
			<td>39</td>


		</tr>
		<tr>
			<td>40</td>


		</tr>
		<tr>
			<td>41</td>


		</tr>
		<tr>
			<td>42</td>


		</tr>
		<tr>
			<td>43</td>


		</tr>
		<tr>
			<td>45</td>


		</tr>
		<tr>
			<td>46</td>


		</tr>
		<tr>
			<td>47</td>


		</tr>
		<tr>
			<td>48</td>


		</tr>
		<tr>
			<td>49</td>


		</tr>
		<tr>
			<td>50</td>


		</tr>
		<tr>
			<td>51</td>


		</tr>

	</tbody>
</table>
