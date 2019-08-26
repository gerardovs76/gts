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

                </div>
 <script>

    // $('#curso').on('change', function(e){
    //         e.preventDefault();
    //         var curso = e.target.value;
    //     $.get('buscar/inspeccion/alumno/'+curso, function(data){
    //             $('#especialidad').empty();
    //             $('#paralelo').empty();
    //             $('#especialidad').append('<option value="0" disable="true" selected="true">SELECCIONAR ESPECIALIDAD</OPTION');
    //             $('#paralelo').append('<option value="0" disable="true" selected="true">SELECCIONAR PARALELO</OPTION');
    //     $.each(data, function(index, regenciesObj){
    //             $('#especialidad').append('<option value="'+regenciesObj.id+'">'+ regenciesObj.especialidad +'</option>');
    //             $('#paralelo').append('<option value="'+regenciesObj.id+'">'+ regenciesObj.paralelo +'</option>');
    //         })
    //     });
    // });


    $('#fecha').on('change', function() {
        event.preventDefault();
        var curso = $('#curso').val();
        var paralelo = $('#paralelo').val();
        console.log(curso);
        console.log(especialidad);
        console.log(paralelo);
        $.get('mostrar/datos/inspeccion/'+ curso + '/' + paralelo , function(data) {
            console.log(data);
            $('#tableid').empty();
        $.each(data, function(idx, opt) {
            $('#tableid').append('<tr><td>'+ opt.nombres +'</td><td><input type="number" class="col-sm-1" name="h1[]" id="h1" value="0" ><input type="number" class="col-sm-1" name="h2[]" id="h2" value="0" ><input type="number" class="col-sm-1" name="h3[]" id="h3" value="0" ><input type="number" class="col-sm-1" name="h4[]" id="h4" value="0" ><input type="number" class="col-sm-1" name="h5[]" id="h5" value="0" ><input type="number" class="col-sm-1" name="h6[]" id="h6" value="0" ><input type="number" class="col-sm-1" name="h7[]" id="h7" value="0" ><input type="number" class="col-sm-1" name="h8[]" id="h8" value="0" ></td><td><input type="number" class="col-sm-1" name="c1[]" id="c1"><input type="number" class="col-sm-1" name="c2[]" id="c2"><input type="number" class="col-sm-1" name="c3[]" id="c3"><input type="number" class="col-sm-1" name="c4[]" id="c4"><input type="number" class="col-sm-1" name="c5[]" id="c5"><input type="number" class="col-sm-1" name="c6[]" id="c6"><input type="number" class="col-sm-1" name="c7[]" id="c7"><input type="number" class="col-sm-1" name="c8[]" id="c8"></td><td><input class="col-md-10" type="hidden" name="matriculados_id[]" id="matriculados_id" value='+ opt.id +'></td></tr>');

            $('#guardar').addClass("d-block");
            $('#tablausuarios').addClass("d-block");
                $('#h1').keyup(function(){
                var valorh1 = $('#h1').val();
                if(valorh1 == "01"){
                $('#c1').val("1");
                }else if(valorh1 == "02"){
                    $('#c2').val("1");
                }else if(valorh1 == "03"){
                    $('#c3').val("1");
                }else if(valorh1 == "04"){
                    $('#c4').val("1");
                }else if(valorh1 == "05"){
                    $('#c5').val("1");
                }else if(valorh1 == "06"){
                    $('#c6').val("1");
                }else if(valorh1 == "07"){
                    $('#c7').val("1");
                }else if(valorh1 == "08"){
                    $('#c8').val("1");
                }

 });

                $('#h2').keyup(function(){
                var valorh2 = $('#h2').val();
                var c1 = $('#c1').val();
                if(valorh2 == "01"){
                var suc1 = $('#c1').val() + Number(1);
                $('#c1').val(suc1);
                }else if(valorh2 == "02"){
                    var suc2 = $('#c2').val() + Number(1);

                    $('#c2').val(suc2);
                }else if(valorh2 == "03"){
                    var suc3 = Number($('#c3').val()) + Number(1);

                    $('#c3').val(suc3);
                }else if(valorh2 == "04"){
                    var suc4 = Number($('#c4').val()) + Number(1);

                    $('#c4').val(suc4);
                }else if(valorh2 == "05"){
                    var suc5 = Number($('#c5').val()) + Number(1);

                    $('#c5').val(suc5);
                }else if(valorh2 == "06"){
                    var suc6 = Number($('#c6').val()) + Number(1);

                    $('#c6').val(suc6);
                }else if(valorh2 == "07"){
                    var suc7 = Number($('#c7').val()) + Number(1);

                    $('#c7').val(suc7);
                }else if(valorh2 == "08"){
                    var suc8 = Number($('#c8').val()) + Number(1);
                    $('#c8').val(suc8);
                }

 });



                $('#h3').keyup(function(){
                var valorh3 = $('#h3').val();
                if(valorh3 == "01"){
                var sumc1 = Number($('#c1').val()) + Number(1);
                $('#c1').val(sumc1);
                }else if(valorh3 == "02"){

                   var sumc2 = (Number($('#c2').val()) + Number(1));
                    $('#c2').val(sumc2);
                }else if(valorh3 == "03"){

                     var sumc3 = Number($('#c3').val()) + Number(1);
                    $('#c3').val(sumc3);
                }else if(valorh3 == "04"){
                    var sumc4 = Number($('#c4').val()) + Number(1);
                    $('#c4').val(sumc4);
                }else if(valorh3 == "05"){

                    var sumc5 = Number($('#c5').val()) + Number(1);
                    $('#c5').val(sumc5);
                }else if(valorh3 == "06"){

                   var sumc6 = Number($('#c6').val()) + Number(1);
                    $('#c6').val(sumc6);
                }else if(valorh3 == "07"){

                    var sumc7 = Number($('#c7').val()) + Number(1);
                    $('#c7').val(sumc7);
                }else if(valorh3 == "08"){

                    var sumc8 = Number($('#c8').val()) + Number(1);
                    $('#c8').val(sumc8);
                }

 });



                $('#h4').keyup(function(){
                var valorh4 = $('#h4').val();
                if(valorh4 == "01"){

                 var sumac1 = Number($('#c1').val()) + Number(1);
                $('#c1').val(sumac1);
                }else if(valorh4 == "02"){
                    var sumac2 = Number($('#c2').val()) + Number(1);
                    $('#c2').val(sumac2);
                }else if(valorh4 == "03"){
                     var sumac3 = Number($('#c3').val()) + Number(1);
                    $('#c3').val(sumac3);
                }else if(valorh4 == "04"){
                    var sumac4 = Number($('#c4').val()) + Number(1);
                    $('#c4').val(sumac4);
                }else if(valorh4 == "05"){
                   var sumac5 = Number($('#c5').val()) + Number(1);
                    $('#c5').val(sumac5);
                }else if(valorh4 == "06"){
                  var sumac6 = Number($('#c6').val()) + Number(1);
                    $('#c6').val(sumac6);
                }else if(valorh4 == "07"){
                   var sumac7 = Number($('#c7').val()) + Number(1);
                    $('#c7').val(sumac7);
                }else if(valorh4 == "08"){

                    var sumac8 = Number($('#c8').val()) + Number(1);
                    $('#c8').val(sumac8);
                }

 });

                $('#h5').keyup(function(){
                var valorh5 = $('#h5').val();
                if(valorh5 == "01"){
                 var s1 = Number($('#c1').val()) + Number(1);
                $('#c1').val(s1);
                }else if(valorh5 == "02"){
                     var s2 = Number($('#c2').val()) + Number(1);
                    $('#c2').val(s2);
                }else if(valorh5 == "03"){
                    var s3 = Number($('#c3').val()) + Number(1);
                    $('#c3').val(s3);
                }else if(valorh5 == "04"){
                     var s4 = Number($('#c4').val()) + Number(1);
                    $('#c4').val(s4);
                }else if(valorh5 == "05"){
                   var s5 = Number($('#c5').val()) + Number(1);
                    $('#c5').val(s5);
                }else if(valorh5 == "06"){
                    var s6 = Number($('#c6').val()) + Number(1);
                    $('#c6').val(s6);
                }else if(valorh5 == "07"){
                   var s7 = Number($('#c7').val()) + Number(1);
                    $('#c7').val(s7);
                }else if(valorh5 == "08"){
                     var s8 = Number($('#c8').val()) + Number(1);
                    $('#c8').val(s8);
                }

 });

                $('#h6').keyup(function(){
                var valorh6 = $('#h6').val();
                if(valorh6 == "01"){
                var sumaac1 = Number($('#c1').val()) + Number(1);
                $('#c1').val(sumaac1);
                }else if(valorh6 == "02"){
                    var sumaac2 = Number($('#c2').val()) + Number(1);
                    $('#c2').val(sumaac2);
                }else if(valorh6 == "03"){
                    var sumaac3 = Number($('#c3').val()) + Number(1);
                    $('#c3').val(sumaac3);
                }else if(valorh6 == "04"){
                   var sumaac4 = Number($('#c4').val()) + Number(1);
                    $('#c4').val(sumaac4);
                }else if(valorh6 == "05"){
                   var sumaac5 = Number($('#c5').val()) + Number(1);
                    $('#c5').val(sumaac5);
                }else if(valorh6 == "06"){
                    var sumaac6 = Number($('#c6').val()) + Number(1);
                    $('#c6').val(sumaac6);
                }else if(valorh6 == "07"){
                     var sumaac7 = Number($('#c7').val()) + Number(1);
                    $('#c7').val(sumaac7);
                }else if(valorh6 == "08"){
                    var sumaac8 = Number($('#c8').val()) + Number(1);
                    $('#c8').val(sumaac8);
                }

 });

                $('#h7').keyup(function(){
                var valorh7 = $('#h7').val();
                if(valorh7 == "01"){
                var sumarc1 = Number($('#c1').val()) + Number(1);
                $('#c1').val(sumarc1);
                }else if(valorh7 == "02"){
                    var sumarc2 = Number($('#c2').val()) + Number(1);
                    $('#c2').val(sumarc2);
                }else if(valorh7 == "03"){
                   var sumarc3 = Number($('#c3').val()) + Number(1);
                    $('#c3').val(sumarc3);
                }else if(valorh7 == "04"){
                   var sumarc4 = Number($('#c4').val()) + Number(1);
                    $('#c4').val(sumarc4);
                }else if(valorh7 == "05"){
                    var sumarc5 = Number($('#c5').val()) + Number(1);
                    $('#c5').val(sumarc5);
                }else if(valorh7 == "06"){
                    var sumarc6 = Number($('#c6').val()) + Number(1);
                    $('#c6').val(sumarc6);
                }else if(valorh7 == "07"){
                    var sumarc7 = Number($('#c7').val()) + Number(1);
                    $('#c7').val(sumarc7);
                }else if(valorh7 == "08"){
                    var sumarc8 = Number($('#c8').val()) + Number(1);
                    $('#c8').val(sumarc8);
                }

 });

                $('#h8').keyup(function(){
                var valorh8 = $('#h8').val();
                if(valorh8 == "01"){
                var sumarC1 = Number($('#c1').val()) + Number(1);
                $('#c1').val(sumarC1);
                }else if(valorh8 == "02"){
                   var sumarC2 = Number($('#c2').val()) + Number(1);
                    $('#c2').val(sumarC2);
                }else if(valorh8 == "03"){
                    var sumarC3 = Number($('#c3').val()) + Number(1);
                    $('#c3').val(sumarC3);
                }else if(valorh8 == "04"){
                   var sumarC4 = Number($('#c4').val()) + Number(1);
                    $('#c4').val(sumarC4);
                }else if(valorh8 == "05"){
                   var sumarC5 = Number($('#c5').val()) + Number(1);
                    $('#c5').val(sumarC5);
                }else if(valorh8 == "06"){
                    var sumarC6 = Number($('#c6').val()) + Number(1);
                    $('#c6').val(sumarC6);
                }else if(valorh8 == "07"){
                    var sumarC7 = Number($('#c7').val()) + Number(1);
                    $('#c7').val(sumarC7);
                }else if(valorh8 == "08"){
                    var sumarC8 = Number($('#c8').val()) + Number(1);
                    $('#c8').val(sumarC8);
                }

 });



       });
    }
    ,
    'json');

});




 </script>
