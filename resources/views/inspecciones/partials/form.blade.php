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
                    {!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTI DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-10' , 'id' => 'curso', 'placeholder' => 'Seleccione el curso', 'name' => 'curso']) !!}
                    </div>
                    </div>

                    <div class="form-group col-md-2">
                    <strong>Especialidad:</strong>
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    {!! Form::select('especialidad', ['EDUCACION INICIAL' => 'EDUCACION INICIAL','EDUCACION GENERAL BASICA' => 'EDUCACION GENERAL BASICA','GENERAL UNIFICADO' => 'GENERAL UNIFICADO', 'TECNICO EN CONTABILIDAD' => 'TECNICO EN CONTABILIDAD', 'TECNICO EN INFORMATICA' => 'TECNICO EN INFORMATICA', 'T AUTOMOTRIZ' => 'TECNICO AUTOMOTRIZ', 'BACHILLERATO INTERNACIONAL' => 'BACHILLERATO INTERNACIONAL'], null, ['class' => 'form-control col-md-10', 'placeholder' => 'Seleccione la especialidad', 'id' => 'especialidad']) !!}
                    </div>
                    </div>

                    <div class="form-group col-md-2">
                    <strong>Paralelo:</strong>
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    {!! Form::select('paralelo', ['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-10', 'placeholder' => 'Seleccione el paralelo', 'id' => 'paralelo']) !!}
                    </div>
                    </div>

                    <div class="form-group col-md-2">
                    <strong>Fecha:</strong>
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    {!! Form::date('fecha', null, ['class' => 'form-control col-md-10', 'placeholder' => 'Seleccione la fecha', 'id' => 'fecha']) !!}
                    </div>
                    </div>
                    <div class="form-group col-md-12">
                        {!!Form::button('<i class="fas fa-print"></i> GUARDAR', ['class' => 'form-control btn btn-primary d-none', 'type' => 'submit', 'id' => 'guardar'])!!}
                    </div>

                </div>
 <script>
   $('#fecha').on('change', function() {
        event.preventDefault();
        var curso = $('#curso').val();
        var paralelo = $('#paralelo').val();
        $.get('mostrar/datos/inspeccion/'+ curso + '/' + paralelo , function(data) {
            console.log(data);
            $('#tableid').empty();
        $.each(data, function(idx, opt) {
            $('#guardar').addClass("d-block");
            $('#tableid').append('<tr><td>'+ opt.nombres +'</td><td><input type="number" class="col-sm-1" name="h1[]" id="h1" value="0" ><input type="number" class="col-sm-1" name="h2[]" id="h2" value="0" ><input type="number" class="col-sm-1" name="h3[]" id="h3" value="0" ><input type="number" class="col-sm-1" name="h4[]" id="h4" value="0" ><input type="number" class="col-sm-1" name="h5[]" id="h5" value="0" ><input type="number" class="col-sm-1" name="h6[]" id="h6" value="0" ><input type="number" class="col-sm-1" name="h7[]" id="h7" value="0" ><input type="number" class="col-sm-1" name="h8[]" id="h8" value="0" ></td><td><input type="number" class="col-sm-1" name="c1[]" id="c1"><input type="number" class="col-sm-1" name="c2[]" id="c2"><input type="number" class="col-sm-1" name="c3[]" id="c3"><input type="number" class="col-sm-1" name="c4[]" id="c4"><input type="number" class="col-sm-1" name="c5[]" id="c5"><input type="number" class="col-sm-1" name="c6[]" id="c6"><input type="number" class="col-sm-1" name="c7[]" id="c7"><input type="number" class="col-sm-1" name="c8[]" id="c8"></td><td><input class="col-md-10" type="hidden" name="matriculados_id[]" id="matriculados_id" value='+ opt.id +'></td></tr>');
                });
            });
        });
 </script>
