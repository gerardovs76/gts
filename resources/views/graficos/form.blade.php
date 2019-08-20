<div class="panel panel-primary">
                <div class="panel panel-heading">BUSQUEDA</div>
                <div class="panel panel-body">
                    <div class="form-row">
      
                    <div class="form-group col-md-4">
                        <strong>Curso: <br></strong>
                       {!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8', 'id' => 'cursos', 'placeholder' => 'Coloque el curso']) !!}                        
                    </div>

                    <div class="form-group col-md-4">
                        <strong>Paralelo: <br></strong>
                        {!! Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6', 'id' => 'paralelo', 'placeholder' => 'Seleccione el paralelo']) !!}                        
                    </div>

                    <div class="form-group col-md-4">
                        <strong>Numero de parcial: <br></strong>
                        {!! Form::select('parcial',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6', 'id' => 'parcial']) !!}
                    </div>
                    <div class="form-group col-md-4">
                        <strong>Materia: <br></strong>
                        {!! Form::select('materia',['Materia' => 'Materia'], null, ['class' => 'form-control col-md-6', 'id' => 'materia']) !!}                    </div>
                    <div class="form-group col-md-10">
                     		{!! Form::button('AGREGAR GRAFICO', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'agregarGrafico']) !!}
                            <a href="#" class="btn btn-primary" id="downloadPdf" >IMPRIMIR PDF</a>
                    	
                    </div>
                    
                </div>
                
            </div>
        </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <script>
        	$('#paralelo').on('change', function(){
        		var curso = $('#cursos').val();
        		var paralelo = $('#paralelo').val();

  
        		$.get('graficos_materias/'+curso+'/'+paralelo, function(response){
        			$.each(response, function(index, obj){
        				$('#materia').append('<option value='+obj.id+'>'+obj.materia+'</option>');
        				


        			});
        		});

        	});
        				// codigo correcto para la busqueda 
			$('#agregarGrafico').on('click', function(){
				var curso = $('#cursos').val();
				var paralelo = $('#paralelo').val();
				var parcial = $('#parcial').val();
				var materias = $("#materia option:selected").val();

                var nombres = new Array();
                var porcentaje = new Array();

                    $.get('graficos_notas/'+curso+'/'+paralelo+'/'+parcial+'/'+materias, function(response){
                        response.forEach(function (data){
                            var suma = ((data.nota_ta * 1) + (data.nota_ti * 1) +(data.nota_tg * 1) +(data.nota_le * 1) +(data.nota_ev * 1)) / 5;
                            nombres.push(data.nombres);
                            porcentaje.push(suma);
                            console.log(nombres);
                        });
                        Chart.defaults.global.defaultFontColor = 'black';
                        var ctx = document.getElementById("canvas").getContext('2d');
                                var myChart = new Chart(ctx,{
                                    type: 'bar',
                                    data: {
                                        labels: nombres,
                                        datasets: [{
                                            label: 'Porcentaje',
                                            data: porcentaje,
                                            borderWidth: 1,
                                             backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{ ticks: { beginAtZero: true } }],
                                            xAxes: [{ beginAtZero: true, ticks: {autoSkip: false} }],
                                        }
                                    }
                                });
                    });					
				});    	
        </script>