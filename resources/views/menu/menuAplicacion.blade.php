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

                <a class="dropdown-item" href="{{ route('inscripcion.create') }}">Nueva inscripción</a>
                @can('inscripcion.perfil')
                <a class="dropdown-item " href="{{ route('inscripcion.perfil') }}">Perfil</a>
                @endcan
                @can('inscripcion.index')
                <a class="dropdown-item" href="{{ route('inscripcion.index') }}">Lista de alumnos inscritos</a>
                @endcan
                @can('inscritos.excel')
                <a class="dropdown-item" href="{{ route('inscritos.excel') }}">Reporte grupal EXCEL</a>
                @endcan
                @can('inscripcion.importar')
                <a class="dropdown-item" href="{{ route('inscripcion.importar') }}">Carga Masiva</a>
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
                <a class="dropdown-item" href="{{ route('matricular.create') }}">Nuevo</a>
                @endcan
                @can('matricular.index')
                <a class="dropdown-item " href="{{ route('matricular.index') }}">Lista</a>
                @endcan
                @can('matricular.importarDatos')
                <a class="dropdown-item" href="{{ url('matricular/importar/alumnos') }}">Importar datos</a>
                @endcan
                @can('matricular.reporteTodos')
                <a class="dropdown-item" href="{{ route('matricular.reportesTodos') }}">Reporte matriculados</a>
                @endcan
                @can('matricular.index-constancia')
                <a class="dropdown-item" href="{{ route('matricular.index-constancia') }}">Constancia de estudio</a>
                @endcan
                @can('matricular.index-repo-matri')
                <a class="dropdown-item" href="{{ route('matricular.index-repo-matri') }}">Reportes bloqueados</a>
                @endcan
                <a class="dropdown-item" href="{{ route('matricular.total-alumnosCobros')}}">Matriculados total cobros</a>
                <a class="dropdown-item" href="{{ route('matricular.cas')}}">CAS</a>
                <a class="dropdown-item" href="{{ route('matricular.total-resumen')}}">Total resumen</a>
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
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('profesor.create')
                <a class="dropdown-item" href="{{ route('profesor.create') }}">Nuevo profesor</a>
                @endcan
                @can('profesor.perfil')
                <a class="dropdown-item " href="{{ route('profesor.perfil') }}">Perfil profesor</a>
                @endcan
                @can('profesor.index')
                <a class="dropdown-item" href="{{ route('profesor.index') }}">Lista profesores</a>
                @endcan
                @can('profesor.añadirMaterias')
                <a class="dropdown-item" href="{{ route('profesor.añadirMaterias') }}">Añadir materia</a>
                @endcan
                @can('profesor.verMaterias')
                <a class="dropdown-item" href="{{ route('profesor.verMaterias') }}">Ver materias asignadas</a>
                @endcan
                @can('profesor.control')
                <a class="dropdown-item" href="{{ route('profesor.control') }}">Control de profesor</a>
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
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('notas.index')
                <a class="dropdown-item" href="{{ route('notas.index') }}">Ingresar notas</a>
                @endcan
                <a class="dropdown-item" href="{{ route('notas.editar-notas')}}">Editar notas</a>
                @can('notas.cargadas')
                <a class="dropdown-item" href="{{ route('notas.cargadas') }}">Ver notas profesores</a>
                @endcan
                @can('notas.verNotasEspeciales')
                <a class="dropdown-item" href="{{ route('notas.verNotasEspeciales') }}">Ver notas especiales profesores</a>
                @endcan
                <a class="dropdown-item" href="{{route('notas.ver-notas-alumnos')}}">Ver notas alumnos</a>
                <a class="dropdown-item" href="{{route('notas.abanderados')}}">Abanderados</a>
                <a class="dropdown-item" href="{{route('notas.recuperacion')}}">Recuperacion</a>
                @can('notas.supletorios')
                <a class="dropdown-item" href="{{ route('notas.supletorios') }}">Supletorios</a>
                @endcan
                @can('notas.remedial')
                <a class="dropdown-item" href="{{ route('notas.remedial') }}">Remediales</a>
                @endcan
                @can('notas.gracia')
                <a class="dropdown-item" href="{{ route('notas.gracia') }}">Gracia</a>
                @endcan
                @can('notas.libretaIndividual')
                <a class="dropdown-item" href="{{ route('notas.libretaIndividual') }}">Libreta individual</a>
                @endcan
                @can('notas.libretaColectiva')
                <a class="dropdown-item" href="{{ route('notas.libretaColectiva') }}">Libretas colectivas</a>
                @endcan
                @can('notas.reportesExcel')
                <a class="dropdown-item" href="{{ route('notas.reportesExcel') }}">Reportes Excel </a>
                @endcan
              </div>
            </li>
            @endcan
            @can('inspeccion.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-secret"></i>
                INSPECCIÓN
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('inspeccion.index')
                <a class="dropdown-item" href="{{ route('inspeccion.index') }}">Asistencia</a>
                @endcan
                @can('inspeccion.index-conducta')
               <a class="dropdown-item" href="{{ route('inspeccion.index-conducta') }}">Conducta</a>
               @endcan
               @can('inspeccion.reporte-individual')
              <a class="dropdown-item" href="{{ route('inspeccion.reporte-individual') }}">Reporte</a>
              @endcan
              <a class="dropdown-item" href="{{route('inspeccion.index-inspeccion')}}">Lista de inspecciones</a>
              <a class="dropdown-item" href="#">ALERTA!</a>
              </div>
            </li>
            @endcan
            @can('dece.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-building"></i>
                DECE
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('dece.create')
                <a class="dropdown-item" href="{{ route('dece.create') }}">Ingresar</a>
                @endcan
                @can('dece.reporte')
                <a class="dropdown-item" href="{{ route('dece.reporte') }}">Reporte</a>
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
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('recursos_humanos.index')
                <a class="dropdown-item" href="{{ route('recursos_humanos.index') }}">Ingresar profesor</a>
                @endcan
                @can('recursos_humanos.perfil')
                <a class="dropdown-item " href="{{ route('recursos_humanos.perfil') }}">Perfil</a>
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
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
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
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('cobros.index')
                <a class="dropdown-item" href="{{ route('cobros.index') }}">Valores</a>
                @endcan
                @can('cobros.indexCobros')
                     <a class="dropdown-item" href="{{ route('cobros.indexCobros') }}">Lista de valores</a>
                     @endcan
                     @can('cobros.reportes')
                <a class="dropdown-item " href="{{ route('cobros.reportes') }}">Reportes de valores</a>
                @endcan
                @can('reportes.clientes')
                <a class="dropdown-item" href="{{ route('reportes.clientes') }}">Reporte de carga de clientes</a>
                @endcan
                @can('cobros.facturacion-index')
                <a class="dropdown-item" href="{{ route('cobros.facturacion-index')}}">Facturacion</a>
                @endcan
              </div>
            </li>
            @endcan
            @can('tareas.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-thumbtack"></i>
                TAREAS
                <span id="badge" class="badge"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              @can('tareas.index')
                <a class="dropdown-item" href="{{ route('tareas.index') }}">Asignar</a>
                @endcan
                @can('tareas.verTareas')
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
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                <a class="dropdown-item" href="{{route('horarios.asignar-horarios-estudiantes')}}">Asignar horarios estudiantes</a>
                <a class="dropdown-item" href="{{route('horarios.asignar-horarios-profesores')}}">Asignar horarios profesores</a>
                <a class="dropdown-item" href="{{route('horarios.ver-horarios')}}">Ver horarios</a>
              </div>
            </li>
            @endcan
            @can('events.menu')
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-calendar-plus"></i>
                EVENTOS
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
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
                @can('users.importarDatos')
                <a class="dropdown-item" href="{{ route('users.importarDatos') }}">Carga masiva</a>
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
                <span class="badge">{{count(Auth::user()->unreadNotifications)}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions" id="notification" onclick="markPostAsRead({{count(auth()->user()->unreadNotifications)}}">
                @foreach (Auth::user()->unreadNotifications as $notification)
                <a class="dropdown-item" href="#"><i>{{ $notification->data["envio_id"]["name"] }}</i> te ha enviado un mensaje: <b>{{ $notification->data["body"]}}</b></a>
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
                                  <a class="dropdown-item" href="{{ route('logo.asignar') }}">Añadir logo</a>
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
<script>
  $(document).ready(function(){
    $.get('tareas_count', function(response){

      $('#badge').append('<span>'+response+'</span>');
        });
  });

</script>
