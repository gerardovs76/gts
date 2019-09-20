<style>

input[type=number]::-webkit-outer-spin-button,

input[type=number]::-webkit-inner-spin-button {

    -webkit-appearance: none;

    margin: 0;
}

input[type=number] {
  -moz-appearance:textfield;

}

</style>

<div class="form-row">
 <div class="form-group col-md-4">
                    <strong>Curso: <br></strong>
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    {!! Form::select('curso',['OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-6' , 'id' => 'curso', 'placeholder' => 'Seleccione el curso', 'name' => 'curso']) !!}
                    </div>
                    </div>

                    <div class="form-group col-md-4">
                    <strong>Especialidad:</strong>
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    {!! Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'T AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione la especialidad', 'id' => 'especialidad']) !!}
                    </div>
                    </div>

                    <div class="form-group col-md-4">
                    <strong>Paralelo:</strong>
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    {!! Form::select('paralelo', ['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el paralelo', 'id' => 'paralelo']) !!}
                    </div>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>Parcial:</strong>
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                        {!! Form::select('parcial', ['1' => '1', '2' => '2', '3' => '3'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el parcial', 'id' => 'parcial']) !!}
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>Quimestre:</strong>
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                            {!! Form::select('quimestre', ['1' => 'PRIMER QUIMESTRE', '2' => 'SEGUNDO QUIMESTRE'], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione el quimestre', 'id' => 'quimestre']) !!}
                            </div>
                            </div>

                    <div class="form-group col-md-4">
                    <strong>Fecha:</strong>
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    {!! Form::date('fecha', null, ['class' => 'form-control col-md-6', 'placeholder' => 'Seleccione la fecha', 'id' => 'fecha']) !!}
                    </div>
                    </div>

                </div>
 <script>
   $('#fecha').on('change', function() {
        event.preventDefault();
        var curso = $('#curso').val();
        var paralelo = $('#paralelo').val();
        var parcial = $('#parcial').val();
        var quimestre = $('#quimestre').val();
        $.get('mostrar/datos/inspeccion/'+ curso + '/' + paralelo , function(data) {
            console.log(data);
            $('#tableid').empty();
        $.each(data, function(idx, opt) {
            $('#guardar').addClass("d-block");
            $('#tablausuarios').addClass("d-block");
            $('#tableid').append('<tr><td>'+ opt.nombres +'</td><td><input type="number" class="col-sm-1" name="h1[]" id="h1" value="0" ><input type="number" class="col-sm-1" name="h2[]" id="h2" value="0" ><input type="number" class="col-sm-1" name="h3[]" id="h3" value="0" ><input type="number" class="col-sm-1" name="h4[]" id="h4" value="0" ><input type="number" class="col-sm-1" name="h5[]" id="h5" value="0" ><input type="number" class="col-sm-1" name="h6[]" id="h6" value="0" ><input type="number" class="col-sm-1" name="h7[]" id="h7" value="0"><input type="number" class="col-sm-1" name="h8[]" id="h8" value="0" ><input type="number" class="col-sm-1" name="h9[]" id="h9" value="0" ></td><td><input class="col-md-10" type="hidden" name="matriculados_id[]" id="matriculados_id" value='+ opt.id +'></td><td><input type="hidden" name="parcial" id="parcial" value='+parcial+'></td><td><input type="hidden" name="quimestre" id="quimestre" value='+quimestre+'></td></tr>');
                });
            });
        });
 </script>
