@extends('layouts.app')

@section('content')
<div class="col-xs-12 col-sm-8 col-lg-12">

    <div style="background-color: #008cba; padding: 7px;">
    <h2 class="text-center" style="color: #fff; font-family: Roboto;">
        VER CARNETS
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
            <div class="form-group col-md-12">
                {!!Form::button('<i class="fas fa-paper-plane"></i> REALIZAR BUSQUEDA',['class' => 'btn btn-primary', 'type' => 'button', 'id' => 'realizarBusqueda'])!!}
            </div>
        
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <th>NOMBRES</th>
                   <th>IMPRIMIR CARNET</th>
                </thead>
                <tbody>
                </tbody>
            </table>
            {!!Form::close()!!}
    </div>
    
    <script>
    $('#realizarBusqueda').click(() => {
       var curso = $('#curso').val();
       var paralelo = $('#paralelo').val();
       var url = 'download-carnet/'+curso+'/'+paralelo;
       $.ajax({
        url: url,
        success: function(response)
        {
            $('#table tbody').empty();
            $.each(response, function(index, objeto){
                if(objeto.carnet)
                {
                 //   $('#carnet').append('<img style="margin-bottom: 20px;" src="archivos/'+objeto.carnet+'" width="100px" height="100px" />')
                   // $('#imagen-carnet').attr("src", "archivos/"+objeto.carnet);
                   // $('#carnet ul').append('<li style="padding: 3px;">Nombres: '+objeto.nombres+'<br>'+objeto.apellidos+'</li><li style="padding: 3px;">Curso: '+objeto.curso+'</li><li style="padding: 3px;">Paralelo: '+objeto.paralelo+'</li><li style="padding: 3px;">Codigo: '+objeto.codigo+'</li><li style="padding: 3px;">Año lectivo: 2020</li>');
                    $('#table').append('<tr><td>'+objeto.nombres+'</td><td><button id='+objeto.id+' class="btn btn-success botonBusqueda" type="button"><i class="fas fa-print"></i> IMPRIMIR CARNET</button></td></tr>');
                }
                else {
                     $('#table').append('<tr><td>'+objeto.nombres+'</td><td><em>No tiene asignada una foto de carnet!</em></td></tr>');
                    }
            });
        } 
       });
    });
    </script>
    <script>
        $(document).on('click', '#table .botonBusqueda', function(){
            var idMatriculado = this.id;
            var url = 'download-singular-carnet/'+idMatriculado;
            $.ajax({
                url: url,
                success: function(response)
                {
                   $.each(response, function(index, objeto){
                   // $('#imagen-carnet').attr("src", "archivos/"+objeto.carnet);
                   // $('#carnet ul').append('<li style="padding: 3px;">Nombres: '+objeto.nombres+'<br>'+objeto.apellidos+'</li><li style="padding: 3px;">Curso: '+objeto.curso+'</li><li style="padding: 3px;">Paralelo: '+objeto.paralelo+'</li><li style="padding: 3px;">Codigo: '+objeto.codigo+'</li><li style="padding: 3px;">Año lectivo: 2020</li>');
                   // var carnet =document.getElementById("screenPrincipal");
                    var li = '<li style="padding: 3px; color: #434B4D;">'+objeto.nombres+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+objeto.curso+'&nbsp;&nbsp;&nbsp;'+objeto.paralelo+'<br>'+objeto.apellidos+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+objeto.codigo+'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2019 - 2020</li>';
                    var newWin= window.open("");
                    var is_chrome = Boolean(newWin.chrome);
                    newWin.document.write('<style>@page{size:landscape; font-family:Roboto;font-size:4px; width: 297mm; height:470mm; max-height:98%; max-width:100%;}html, body{height:98%;width:100%; -webkit-print-color-adjust: exact; background-image: url(images/imagen-carnet3.jpg);background-repeat:no-repeat;no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}</style><html><head><title></title>');
                    newWin.document.write('<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />');
                    newWin.document.write('</head><body>');
                    newWin.document.write('<img id="imagen-carnet" src="carnets/'+objeto.carnet+'" alt="" width="660px" height="660px" style="position: relative;left: 260px;top:500px;border: 1px solid black; border-radius: 50%;"><ul style="position:relative;left:30px;top: 600px;font-size: 40px; font-weight: bold;list-style-type: none;">'+li+'</ul>');
                  //  newWin.document.write(carnet.outerHTML);
                    newWin.document.write('</body></html>');
                        if (is_chrome) {
                            
                            setTimeout(function() {
                                newWin.document.close();
                                newWin.focus();
                                newWin.print();
                                newWin.close();
                            }, 250);
                                        } else {
                                            
                                            newWin.document.close();
                                            newWin.focus();
                                            newWin.print();
                                            newWin.close();
                                        }
                   });
                  
                    }
            })
        });
        /* function printData()
        {
           var table=document.getElementById("carnet");
           var newWin= window.open("");
           var is_chrome = Boolean(newWin.chrome);
                newWin.document.write('<style>@page{size:landscape; font-family:Verdana;font-size:6px;} table{width : 100%; font-size : 8px;}</style><html><head><title></title>');
                newWin.document.write('</head><body><img src="images/lp.PNG" alt="" height="80" width="80" class="left"><img src="images/ib.png" alt="" height="80" width="180" style="float: right;"><h4 style="text-aling: center;">Año lectivo 2019-2020</h4>');
                newWin.document.write(table.outerHTML);
                newWin.document.write('</body></html>');
                if (is_chrome) {
                    setTimeout(function() {
                        newWin.document.close();
                        newWin.focus();
                        newWin.print();
                        newWin.close();
                    }, 250);
                    } else {
                        newWin.document.close();
                        newWin.focus();
                        newWin.print();
                        newWin.close();
                    }
                }
                $('#boton').on('click', function(){
                    alert("Hola mundo");
                printData();
                }); */
    </script>
</div>
    
@endsection