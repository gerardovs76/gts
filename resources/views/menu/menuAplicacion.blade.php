   <!-- Fixed navbar -->

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="{{ url('home') }}">GTS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
      @can('inscripcion.menu')
        <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-school"></i>
                INSCRIPCIÓN
              </a>
              <div class="dropdown-menu dropdown-menu-center" aria-labelledby="bd-versions">
                <a class="dropdown-item" href="{{ route('inscripcion.create') }}">Nueva inscripción alumno</a>
               {{--  @can('inscripcion.perfil')
                <a class="dropdown-item " href="{{ route('inscripcion.perfil') }}">Perfil</a>
                @endcan --}}
                @can('inscripcion.index')
                <a class="dropdown-item" href="{{ route('inscripcion.index') }}">Lista de alumnos inscritos</a>
                @endcan
                @can('inscritos.excel')
                <a class="dropdown-item" href="{{ route('inscritos.excel') }}">Reporte grupal EXCEL inscritos</a>
                @endcan
                @can('inscripcion.importar')
                <a class="dropdown-item" href="{{ route('inscripcion.importar') }}">Carga masiva inscritos</a>
                @endcan
                @can('exportar.usuarios')
                <a class="dropdown-item" href="{{ route('exportar.usuarios') }}">Exportar carga masiva para usuarios</a>
                @endcan
                @can('inscripcion.reportesInscritos')
                 <a class="dropdown-item" href="{{ route('inscripcion.reportesInscritos') }}">Exportar carga masiva para matriculados</a>
                 @endcan
              </div>
            </li>
            @endcan

            @can('matricular.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="far fa-sticky-note"></i>
                MATRICULACIÓN
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('matricular.create')
                <a class="dropdown-item" href="{{ route('matricular.create') }}">Nuevo alumno</a>
                @endcan
                @can('matricular.index')
                <a class="dropdown-item " href="{{ route('matricular.index') }}">Lista matriculados</a>
                @endcan
                @can('matricular.importarDatos')
                <a class="dropdown-item" href="{{ url('matricular/importar/alumnos') }}">Importar datos inscritos</a>
                @endcan
                @can('matricular.reporteTodos')
                <a class="dropdown-item" href="{{ route('matricular.reportesTodos') }}">Reporte y Certificado Matriculados</a>
                @endcan
                @can('matricular.index-constancia')
                <a class="dropdown-item" href="{{ route('matricular.index-constancia') }}">Constancia de estudio</a>
                @endcan
                @can('matricular.index-repo-matri')
                <a class="dropdown-item" href="{{ route('matricular.index-repo-matri') }}">Reportes bloqueados</a>
                @endcan
                @can('matricular.total-alumnosCobros')
                <a class="dropdown-item" href="{{ route('matricular.total-alumnosCobros')}}">Matriculados total cobros</a>
                @endcan
                @can('matricular.cas')
                <a class="dropdown-item" href="{{ route('matricular.cas')}}">CAS</a>
                @endcan
                 @can('matricular.total-resumen')
                <a class="dropdown-item" href="{{ route('matricular.total-resumen')}}">Total Alumnos</a>
                @endcan
              <a class="dropdown-item" href="{{ route('matricular.carnet') }}">Ingrese Foto Carnets</a>
              @if(Auth::user()->isRole('super-admin'))
              <a class="dropdown-item" href="{{ route('matricular.showCarnets') }}">Ver carnets </a> 
              @endif
              </div>
            </li>
            @endcan
            @can('materias.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-clipboard"></i>
                MATERIAS
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('materias.create')
                <a class="dropdown-item" href="{{ route('materias.create') }}">Nueva materia</a>
                @endcan
                <a class="dropdown-item" href="{{route('materias.import-materias')}}">Carga masiva materias</a>
                @can('materias.index')
                <a class="dropdown-item" href="{{ route('materias.index') }}">Lista de materias</a>
                @endcan
                @can('materias.curso')
                <a class="dropdown-item" href="{{ route('materias.curso') }}">Malla curricular</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('profesor.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-chalkboard-teacher"></i>
                PROFESORES
              </a>
              <div class="dropdown-menu dropdown-menu-center" aria-labelledby="bd-versions">
                @can('profesor.create')
                <a class="dropdown-item" href="{{ route('profesor.create') }}">Registrar profesor</a>
                @endcan
                {{-- @can('profesor.perfil')
                <a class="dropdown-item " href="{{ route('profesor.perfil') }}">Perfil profesor</a>
                @endcan --}}
                @can('profesor.index')
                <a class="dropdown-item" href="{{ route('profesor.index') }}">Lista profesores</a>
                @endcan
                @can('profesor.añadirMaterias')
                <a class="dropdown-item" href="{{ route('profesor.añadirMaterias') }}">Añadir materia profesor</a>
                @endcan
                @can('profesor.verMaterias')
                <a class="dropdown-item" href="{{ route('profesor.verMaterias') }}">Ver materias asignadas profesor</a>
                @endcan
                @can('profesor.control')
                <a class="dropdown-item" href="{{ route('profesor.control') }}">Ingreso al sistema profesores</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('notas.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-book-open"></i>
                NOTAS
              </a>
              <div class="dropdown-menu dropdown-menu-center" aria-labelledby="bd-versions">
              @can('notas.index')
                <a class="dropdown-item" href="{{ route('notas.index') }}">Ingresar notas</a>
               {{-- <a class="dropdown-item" href="{{route('notas.examen')}}">Examen quimestral</a> --}}
                @endcan
                @can('notas.cargadas')
                <a class="dropdown-item" href="{{ route('notas.cargadas') }}">Ver notas profesores</a>
                <a class="dropdown-item" href="{{ route('notas.conductasIniciales')}}">Ingreso conducta sección básica</a>
                @endcan
               {{-- <a class="dropdown-item" href="{{ route('notas.enviar-libreta-individuales') }}">Enviar libretas individuales</a>-}}
          {{--       @can('notas.verNotasEspeciales')
                <a class="dropdown-item" href="{{ route('notas.verNotasEspeciales') }}">Ver notas especiales profesores</a>
                @endcan --}}
                @can('notas.ver-notas-alumnos')
                <a class="dropdown-item" href="{{route('notas.ver-notas-alumnos')}}">Ver notas alumnos</a>
                <a class="dropdown-item" href="{{route('notas.reporte-individual-libreta')}}">Libreta individual parcial</a>
                @endcan
                @can('notas.abanderados')
                <a class="dropdown-item" href="{{route('notas.abanderados')}}">Archivo para abanderados</a>
                @endcan
                @if(Auth::user()->isRole('profesor'))
                <a class="dropdown-item" href="{{route('notas.libretasQuimestrarlesProfesores')}}">Libretas quimestrales para profesor</a>
                @endif
                @if(Auth::user()->isRole('super-admin'))
                <a class="dropdown-item" href="{{route('notas.asignarNotasAlumnosNuevos')}}">Asignar notas a alumnos nuevos</a>
                @endif
               
                {{-- @can('notas.recuperacion')
                <a class="dropdown-item" href="{{route('notas.recuperacion')}}">Recuperacion</a>
                @endcan
                @can('notas.supletorios')
                <a class="dropdown-item" href="{{ route('notas.supletorios') }}">Supletorios</a>
                @endcan
                @can('notas.remedial')
                <a class="dropdown-item" href="{{ route('notas.remedial') }}">Remediales</a>
                @endcan
                @can('notas.gracia')
                <a class="dropdown-item" href="{{ route('notas.gracia') }}">Gracia</a>
                @endcan --}}
                @can('notas.reporte-individual-libreta')
                <a class="dropdown-item" href="{{route('notas.reporte-individual-libreta')}}">Libreta individual parcial</a>
                <a class="dropdown-item" href="{{ route('notas.libreta-individual-quimestre') }}">Libretas individual quimestres</a>
                @endcan
                @can('notas.libretaIndividual')
                <a class="dropdown-item" href="{{ route('notas.libretaIndividual') }}">Libreta colectivas parcial</a>
                <a class="dropdown-item" href="{{ route('notas.libreta-colectiva-quimestre') }}">Libretas colectivas quimestres</a>
                @endcan
              
                @can('notas.reportesExcel')
                <a class="dropdown-item" href="{{ route('notas.reportesExcel') }}">Reportes Excel Notas</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('inspeccion.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-secret"></i>
                INSPECCIÓN
                <span id="badge2" class="badge-pill badge-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-center" aria-labelledby="bd-versions">
                @can('inscripcion.index')
                <a class="dropdown-item" href="{{ route('inscripcion.index') }}">Lista de alumnos inscritos</a>
                @endcan
              @can('inspeccion.index')
                <a class="dropdown-item" href="{{ route('inspeccion.index') }}">Ingrese asistencia</a>
                @endcan
                @if(Auth::user()->isRole('super-admin') || Auth::user()->isRole('inspector'))
                <a class="dropdown-item" href="{{route('inspeccion.observacion')}}">Ingrese observaciones</a>
                @endif
              
                @can('inspeccion.index-conducta')
               <a class="dropdown-item" href="{{ route('inspeccion.index-conducta') }}">Certificado de conducta</a>
               @endcan
               @can('inspeccion.reporte-individual')
              <a class="dropdown-item" href="{{ route('inspeccion.reporte-individual') }}">Imprimir leccionario</a>
              @endcan
              @can('inspeccion.index-inspeccion')
              <a class="dropdown-item" href="{{route('inspeccion.index-inspeccion')}}">Justificación faltas</a>
              @endcan
              @can('inspeccion.promedios')
              <a class="dropdown-item" href="{{route('inspeccion.promedios')}}">Ver promedios inspección</a>
              @endcan
              {{-- @can('inspeccion.alertas')
              <span class="badge badge-danger"></span>
              <a id="alertaMenu" class="dropdown-item" href="{{route('inspeccion.alertas')}}">ALERTA!</a>
              @endcan --}}
              </div>
            </li>
            @endcan
            @can('dece.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-building"></i>
                DECE
              </a>
              <div class="dropdown-menu dropdown-menu-center" aria-labelledby="bd-versions">
              @can('dece.create')
                <a class="dropdown-item" href="{{ route('dece.create') }}">Ingrese ficha alumno</a>
                @endcan
                @can('dece.reporte')
                <a class="dropdown-item" href="{{ route('dece.reporte') }}">Reporte alumnos</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('recursos_humanos.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ambulance"></i>
                RR.HH
              </a>
              <div class="dropdown-menu dropdown-menu-center" aria-labelledby="bd-versions">
              @can('recursos_humanos.index')
                <a class="dropdown-item" href="{{ route('recursos_humanos.index') }}">Ingrese datos profesor</a>
                @endcan
                @can('recursos_humanos.perfil')
                <a class="dropdown-item " href="{{ route('recursos_humanos.perfil') }}">Ver Perfil Profesor</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('medico.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-hospital-alt"></i>
                MEDICO
              </a>
              <div class="dropdown-menu dropdown-menu-center" aria-labelledby="bd-versions">
              @can('medico.index')
                <a class="dropdown-item" href="{{ route('medico.index') }}">Ficha medica</a>
                @endcan
                @can('medico.observacion')
                <a class="dropdown-item" href="{{ route('medico.observacion') }}">Ingresar observación</a>
                @endcan
                @can('medico.reporte')
                <a class="dropdown-item" href="{{ route('medico.reporte') }}">Reportes</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('cobros.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-money-bill-wave"></i>
                COBROS
              </a>
              <div class="dropdown-menu dropdown-menu-center" aria-labelledby="bd-versions">

              @can('cobros.index')
                <a class="dropdown-item" href="{{ route('cobros.index') }}">Ingres valores a cobrar</a>
                @endcan
                @can('cobros.indexCobros')
                     <a class="dropdown-item" href="{{ route('cobros.indexCobros') }}">Reporte valores generados</a>
                     @endcan
                     @can('cobros.reportes')
                <a class="dropdown-item " href="{{ route('cobros.reportes') }}">Reporte clientes a facturar</a>
                @endcan
                @can('reportes.clientes')
                <a class="dropdown-item" href="{{ route('reportes.clientes') }}">Reporte de carga de clientes</a>
                @endcan
                @if(Auth::user()->isRole('super-admin'))
                <a class="dropdown-item" href="{{route('cobros.lista-facturaciones')}}">Lista de Ingresos Banco</a>
                @endif
                @can('cobros.facturacion-index')
              <a class="dropdown-item" href="{{route('cobros.facturacion-index-lista')}}">Lista alumnos pagados banco</a>
                <a class="dropdown-item" href="{{ route('cobros.facturacion-index')}}">Ingreso facturación/ tarjetas </a>
                @endcan
              </div>
            </li>
            @endcan
            @can('tareas.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-thumbtack"></i>
                TAREAS
                <span id="badge" class="badge-pill badge-primary"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-center" aria-labelledby="bd-versions">
              @can('tareas.index')
                <a class="dropdown-item" href="{{ route('tareas.index') }}">Tareas/Comunicados</a>
                @endcan
                @can('tareas.ver-tareas')
                <a class="dropdown-item" href="{{ route('tareas.verTareas') }}">Ver tareas</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('horarios.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-clock"></i>
                HORARIOS
              </a>
              <div class="dropdown-menu dropdown-menu-center" aria-labelledby="bd-versions">
                @can('horarios.asignar-horarios-estudiantes')
                <a class="dropdown-item" href="{{route('horarios.asignar-horarios-estudiantes')}}">Asignar horarios estudiantes</a>
                @endcan
                @can('horarios.asignar-horarios-profesores')
                <a class="dropdown-item" href="{{route('horarios.asignar-horarios-profesores')}}">Asignar horarios profesores</a>
                @endcan
                @can('horarios.ver-horarios')
                <a class="dropdown-item" href="{{route('horarios.ver-horarios')}}">Ver horarios</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('events.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-calendar-plus"></i>
                EVENTOS
              </a>
              <div class="dropdown-menu dropdown-menu-center" aria-labelledby="bd-versions">
              @can('events.index')
                <a class="dropdown-item" href="{{ route('events.index') }}">Añadir evento</a>
                @endcan
              </div>
            </li>
            @endcan

  </ul>
  <ul class="navbar-nav">
  @can('grafico.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-chart-bar"></i>
                ESTADISTICAS
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('grafico.index')
                <a class="dropdown-item" href="{{ route('grafico.index') }}">Ver graficos</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('mensaje.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="far fa-envelope"></i>
                MENSAJERIA
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('mensaje.index')
                <a class="dropdown-item" href="{{ route('mensaje.index') }}">Enviar mensaje</a>
                <a class="dropdown-item" href="{{ route('mensaje.ver_mensajes')}}">Ver mensajes</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('users.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-users"></i>
                USUARIOS
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('users.index')
                <a class="dropdown-item" href="{{ route('users.index') }}">Ver usuarios</a>
                @endcan
                @can('users.asignar-cargo')
                <a class="dropdown-item" href="{{ route('users.asignar-cargo') }}">Asignar cargos</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('roles.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-shield"></i>
                ROLES Y PERMISOS
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('roles.index')
                <a class="dropdown-item" href="{{ route('roles.index') }}">Ver roles</a>
                @endcan
                @can('roles.create')
                <a class="dropdown-item" href="{{ route('roles.create') }}">Crear rol</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('frases.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-quote-right"></i>
                FRASES
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('frases')
                <a class="dropdown-item" href="{{ route('frases.create') }}">Añadir frase</a>
                @endcan
                @can('frases')
                <a class="dropdown-item" href="{{ route('frases.index') }}">Lista frase</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('noticias.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-newspaper"></i>
                NOTICIAS
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('noticias')
                <a class="dropdown-item" href="{{ route('noticias.create') }}">Añadir noticia</a>
                @endcan
                @can('noticias')
                 <a class="dropdown-item" href="{{ route('noticias.index') }}">Lista noticia</a>
                 @endcan
              </div>
            </li>
            @endcan
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="far fa-bell"></i>
                NOTIFICACIONES
                <span class="badge-pill badge-primary">{{count(Auth::user()->unreadNotifications)}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions" id="notification" onclick="markPostAsRead({{count(auth()->user()->unreadNotifications)}}">
                @foreach (Auth::user()->unreadNotifications as $notification)
                <a class="dropdown-item" href="{{route('mensaje.ver_mensajes')}}">Tienes una notificación de mensaje:</b></a>
                @endforeach
              </div>
            </li>
      </ul>
                    <ul class="navbar-nav navbar-right">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarCollapse">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
    </div>

  </nav>




<script>
        var mynotificationcount;
        function markPostAsRead(countofNotification){
         mynotificationcount= countofNotification;
       }
</script>
<script>
    $('#notification a').on('click', function(e){
        e.preventDefault();
        var href = this.href;
        var url = "{{route('markasread')}}";
        if(mynotificationcount !== '0') {
           $.get(url).always(function(){window.location.href = href;});
          // window.location.href="{{ route('markasread') }}";
        } else {
            window.location.href = href;
        }
    });
</script>
{{-- <script>
  $(document).ready(function(){
    $.get('tareas_count', function(response){
        if(response > 0){
            $('#badge').append('<span>'+response+'</span>');
        }else{
            $('#badge').append('<span>0</span>');
        }
        });
    $.get('inspecciones-count-alertas', function(response){
        if(response > 0){
        $('#badge2').append('<span>'+response+'</span>');
        $('#alertaMenu').css("background-color", "#ea2f10");
        $('#alertaMenu').css("color", "white");
        }else{
            $('#badge2').append('<span>0</span>');
        }
    });
  });


</script> --}}
