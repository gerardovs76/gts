<div class="panel panel-primary">
                <div class="panel panel-heading">BUSQUEDA</div>
                <div class="panel panel-body">
                    <div class="form-row">

                    <div class="form-group col-md-4">
                        <strong>Curso: <br></strong>
                        <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                       {!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6', 'id' => 'cursos', 'placeholder' => 'Seleccione el curso...']) !!}
                    </div>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>Paralelo: <br></strong>
                        <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                        {!! Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6', 'id' => 'paralelo', 'placeholder' => 'Seleccione el paralelo...']) !!}
                    </div>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>Numero de parcial: <br></strong>
                        <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                        {!! Form::select('parcial',['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6', 'id' => 'parcial', 'placeholder' => 'Seleccione el parcial...']) !!}
                    </div>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>Materia: <br></strong>
                        <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                        {!! Form::select('materia',['Materia' => 'Materia'], null, ['class' => 'form-control col-md-6', 'id' => 'materia', 'placeholder' => 'Seleccione la materia...']) !!}
                                     </div>
                    </div>
                    <div class="form-group col-md-10">
                     		{!! Form::button('<i class="fas fa-plus"></i> AGREGAR GRAFICO', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'agregarGrafico']) !!}
                    </div>

                </div>

            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <script src="{{asset('js/graficos-form.js')}}"></script>
