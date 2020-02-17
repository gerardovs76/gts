@extends('layouts.app')

@section('content')
<div class="col-xs-12 col-sm-8 col-lg-12">

    <div style="background-color: #008cba; padding: 7px;">
    <h2 class="text-center" style="color: #fff; font-family: Roboto;">
        CARNETS
    </h2>
    </div>
    <hr>
    @include('notas.partials.info')
    {!!Form::open(['route' => 'matricular.storeCarnets', 'method' => 'post', 'enctype' => 'multipart/form-data'])!!}
            <div class="panel panel-primary">
                <div class="panel panel-heading text-center">INGRESE LOS DATOS PARA LA BUSQUEDA...</div>
                <div class="panel panel-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
            <strong>Curso: <br></strong>
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
            {!! Form::select('curso',['INICIAL 1' => 'INICIAL 1', 'INICIAL 2' => 'INICIAL 2', 'PRIMERO DE EGB' => 'PRIMERO DE EGB', 'SEGUNDO DE EGB' => 'SEGUNDO DE EGB', 'TERCERO DE EGB' => 'TERCERO DE EGB', 'CUARTO DE EGB' => 'CUARTO DE EGB', 'QUINTO DE EGB' => 'QUINTO DE EGB', 'SEXTO DE EGB' => 'SEXTO DE EGB', 'SEPTIMO DE EGB' => 'SEPTIMO DE EGB', 'OCTAVO DE EGB' => 'OCTAVO DE EGB', 'NOVENO DE EGB' => 'NOVENO DE EGB', 'DECIMO DE EGB' => 'DECIMO DE EGB', 'PRIMERO DE BACHILLERATO' => 'PRIMERO DE BACHILLERATO', 'SEGUNDO DE BACHILLERATO' => 'SEGUNDO DE BACHILLERATO', 'TERCERO DE BACHILLERATO' => 'TERCERO DE BACHILLERATO'], null, ['class' => 'form-control col-md-8', 'id' => 'curso', 'placeholder' => 'Ingrese el curso...']) !!}<br>
            </div>
            </div>
            <div class="form-group col-md-4">
            <strong>Paralelo: <br></strong>
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                {!! Form::select('paralelo',['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J'], null, ['class' => 'form-control col-md-8', 'id' => 'paralelo', 'placeholder' => 'Ingrese el paralelo']) !!}<br>
                </div>
            </div>
            <div class="form-group col-md-6 d-none" id="selectEstudianteIndividual">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                <select name="estudiantes" id="estudiantes" class="form-control" placeholder="Seleccione los estudiantes...">
              
                </select>
                </div>
            </div>
            <div class="form-group col-md-12">
                <div class="form-group col-md-6">
                {!!Form::button('<i class="fa fa-save"></i> BUSQUEDA INDIVIDUAL', ['class' => 'btn btn-primary col-md-4 d-none', 'id' => 'buttonIndividual', 'type' => 'button'])!!}
                </div>
                <div class="form-group col-md-6">
                    {!!Form::button('<i class="fa fa-save"></i> BUSQUEDA GRUPAL', ['class' => 'btn btn-primary col-md-4 pull-right d-none', 'id' => 'buttonGrupal', 'type' => 'button'])!!}
                </div>
            </div>
            <div class="form-group col-md-12">
                {!!Form::button('<i class="fas fa-paper-plane"></i> REALIZAR BUSQUEDA',['class' => 'btn btn-primary d-none', 'type' => 'button', 'id' => 'realizarBusquedaIndividual'])!!}
            </div>
           {{--  <div class="form-group col-md-12">
                {!!Form::button('<i class="fas fa-paper-plane"></i> REALIZAR BUSQUEDA',['class' => 'btn btn-primary', 'type' => 'button', 'id' => 'realizarBusqueda'])!!}
            </div> --}}
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <th>NOMBRES</th>
                    <th>AGREGAR FOTOS <em>Solo se acepta(.png)</em></th>
                </thead>
                <tbody>

                </tbody>
            </table>

             <div class="form-group col-md-12">
                {!!Form::button('<i class="fa fa-save"></i> GUARDAR',['class' => 'btn btn-primary col-md-2 d-none', 'id' => 'botonGuardar', 'type' => 'submit'])!!}
            </div> 
            {!!Form::close()!!}
           



        <script>
            $('#paralelo').change(() => {
                $('#buttonIndividual').addClass("d-block");
                $('#buttonGrupal').addClass("d-block");
                async function pasoIndivudual1()
                {
                $('#buttonIndividual').click(() => {

                    $('#buttonGrupal').removeClass("d-block");
                    
                    var curso = $('#curso').val();
                    var paralelo = $('#paralelo').val();
                    var url = 'matricular/carnet/'+curso+'/'+paralelo;
                    $.ajax({
                        url: url,
                        success: function(response){
                            $.each(response, function(index,obj){
                                $('#selectEstudianteIndividual select').append('<option value='+obj.id+'>'+obj.nombres+'</option>');
                            });
                            $('#selectEstudianteIndividual').addClass("d-block");
                            $('#buttonIndividual').removeClass("d-block");
                            $('#realizarBusquedaIndividual').addClass("d-block");
                        }
                    });
                });
                                   
            }
            async function pasoIndividual2()
            {
                await pasoIndivudual1();
                $('#realizarBusquedaIndividual').click(() => {
                    var estudiantes = $('#estudiantes').val();
                    var url = 'matricular/buscar_alumnos_individuales_carnet/'+estudiantes;
                    $.ajax({
                    url: url,
                    success: function(response)
                    {
                        $('#table tbody').empty();
                            $.each(response, function(index, objeto){
                                $('#table').append('<tr><td>'+objeto.nombres+'</td><td><input type="hidden" name="matriculados_id[]" value='+objeto.id+'><input type="file" name="foto[]" value="null" /></td></tr>');
                                $('#botonGuardar').addClass("d-block");
                            });
                    } 
                    });
                });
            }
            async function pasoFinalIndividual()
            {
                await pasoIndividual2();
            }
            pasoFinalIndividual();
                $('#buttonGrupal').click(() => {
                    $('#buttonIndividual').removeClass("d-block");
                    var curso = $('#curso').val();
                    var paralelo = $('#paralelo').val();
                    var url = 'matricular/carnet/'+curso+'/'+paralelo;
                    $.ajax({
                        url: url,
                        success: function(response)
                        {
                            $('#table tbody').empty();
                            $.each(response, function(index, objeto){
                                $('#table').append('<tr><td>'+objeto.nombres+'</td><td><input type="hidden" name="matriculados_id[]" value='+objeto.id+'><input type="file" name="foto[]" value="null" /></td></tr>');
                                $('#botonGuardar').addClass("d-block");
                            });
                        
                        } 
                    });
                });
            });
        </script>
    {{-- <script>
    $('#realizarBusqueda').click(() => {
       var curso = $('#curso').val();
       var paralelo = $('#paralelo').val();
       var url = 'matricular/carnet/'+curso+'/'+paralelo;
       $.ajax({
        url: url,
        success: function(response)
        {
            $('#table tbody').empty();
            $.each(response, function(index, objeto){
                $('#table').append('<tr><td>'+objeto.nombres+'</td><td><input type="hidden" name="matriculados_id[]" value='+objeto.id+'><input type="file" name="foto[]" value="null" /></td></tr>');
                $('#botonGuardar').addClass("d-block");
            });
          
        } 
       });
    });
    </script> --}}
</div>
    
@endsection