<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GTS</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang-all.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js" integrity="sha256-4+rW6N5lf9nslJC6ut/ob7fCY2Y+VZj2Pw/2KdmQjR0=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.css" rel="stylesheet">
<style>
    body{
        font-family: "Roboto";
    }
</style>

</head>
<body>
 
        <main class="py-4">
            <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
		<div style="background-color: #43ac6a; border-color: #3c9a5f; padding: 7px;">
		<h2 class="text-center" style="color: #fff;font-family: Roboto;">
			SISTEMA DE INSCRIPCION PAUL DIRAC
		</h2>
		</div>
    <marquee><h2>EN CASO DE SER ESTUDIANTE ANTIGUO POR FAVOR INTRODUCIR EL CODIGO ANTIGUO PARA RELLENAR LOS DATOS CORRESPONDIENTES. GRACIAS</h2></marquee>
		<hr>
		@include('inscripcion.partials.error')
		{!! Form::open(['route' => 'inscripcion.store', 'id' => 'form']) !!}
			
			@include('inscripcion.partials.form')
      
			
		{!! Form::close() !!}
	</div>
        </main>
</body>
</html>

<script>
  $('#codigo_antiguo').on('change', function(){
    var codigo = $('#codigo_antiguo').val();
    console.log(codigo);
    $.get('busqueda-antiguos/'+ codigo, function(response){
      $.each(response, function(index, obj){
          console.log(obj);
       $('#nombres').val(obj.nombres);
       $('#apellidos').val(obj.apellidos);
       $('#curso').val(obj.curso);
       $('#nombres_representante').val(obj.nombres_representante);
       $('#cedula_representante').val(obj.cedula_representante);
       $('#email').val(obj.email_representante);
       $('#paralelo').val(obj.paralelo);
       $('#paraleloT').css("display", "block");

       console.log(obj.curso);
       
       if(obj.curso == 'INICIAL 1')
       {
           obj.curso = 'INICIAL 2';
           $('#curso').val(obj.curso);
           $('#cursoT').addClass("d-none");
       }
        else if(obj.curso == 'INICIAL 2')
       {
           obj.curso = 'PRIMERO DE EGB';
            $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
       }
        else if(obj.curso == 'PRIMERO DE EGB')
       {
           obj.curso = 'SEGUNDO DE EGB';
            $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
       }
       else if(obj.curso == 'SEGUNDO DE EGB')
       {
           obj.curso = 'TERCERO DE EGB';
           $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
           
       }
        else if(obj.curso == 'TERCERO DE EGB')
       {
           obj.curso = 'CUARTO DE EGB';
            $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
       }
       else if(obj.curso == 'CUARTO DE EGB')
       {
           obj.curso = 'QUINTO DE EGB';
            $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
       }
       else if(obj.curso == 'QUINTO DE EGB')
       {
           obj.curso = 'SEXTO DE EGB';
            $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
       }
       else if(obj.curso == 'SEXTO DE EGB')
       {
           obj.curso = 'SEPTIMO DE EGB';
            $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
       }
       else if(obj.curso == 'SEPTIMO DE EGB')
       {
           obj.curso = 'OCTAVO DE EGB';
            $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
       }
       else if(obj.curso == 'OCTAVO DE EGB')
       {
           obj.curso = 'NOVENO DE EGB';
            $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
       }
      else  if(obj.curso == 'NOVENO DE EGB')
       {
           obj.curso = 'DECIMO DE EGB';
            $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
       }
       else if(obj.curso == 'DECIMO DE EGB')
       {
           obj.curso = 'PRIMERO DE BACHILLERATO';
            $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
       }
      else  if(obj.curso == 'PRIMERO DE BACHILLERATO')
       {
           obj.curso = 'SEGUNDO DE BACHILLERATO';
            $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
       }
      else  if(obj.curso == 'SEGUNDO DE BACHILLERATO')
       {
           obj.curso = 'TERCERO DE BACHILLERATO';
            $('#curso').val(obj.curso);
            $('#cursoT').addClass("d-none");
       }
       

      });
    });
  });

</script>
<script>
	$(document).on('submit', '[id^=form]', function (e) {
  e.preventDefault();
  var data = $(this).serialize();
  swal({
      title: "Estas seguro de los datos suministrados?",
      text: "La informacion correspondiente se descargara en forma de PDF, de haber realizado correctamente el paso de inscripcion. Asegure que TODOS los campos de DATOS DEL ALUMNO Y REPRESENTANTE ESTEN LLENOS. GRACIAS.",
      value: true,
      visible: true,
      className: "",
  
      buttons: true,

      
  }).then(function (response) {
  	if(response === true){
      swal('Correcto', 'se ha ingresado correctamente la informacion', {
        icon: "success",});
      document.getElementById("form").submit();
      
      
  	}else{
  		swal('Incorrecto', 'la información no fue enviada hubo un error', {
  			icon: "warning",
  		});
  	}
  });
  return false;
});
</script>

