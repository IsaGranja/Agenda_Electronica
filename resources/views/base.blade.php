<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{ URL::asset('/') }}" target="_top">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/glyphicon.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/Ayudantes_AgendaElectronica-style.css') }}" />
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/jquery-3.3.1.slim.min.js') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/popper.min.js') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></script>
</head>

<body class="col-12">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg col-12 navbar-light colorPUCE">
        <a class="navbar-brand" href='http://www.puce.edu.ec'><img class="logo" height='50px' src="{{ url('img/puceLogo.jpg') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opciones
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ url('/pagProvincias') }}">Provincias</a></li>
                    <li><a class="dropdown-item" href="{{ url('/pagCiudades') }}">Ciudades</a></li>
                    <li><a class="dropdown-item" href="{{ url('/pagUniversidades') }}">Universidades</a></li>
                    <li><a class="dropdown-item" href="{{ url('/pagSedes') }}">Sedes</a></li>
                    <li><a class="dropdown-item" href="{{ url('/pagPeriodos') }}">Períodos</a></li>
                    <li><a class="dropdown-item" href="{{ url('/pagFacultades') }}">Facultades</a></li>
                    <li><a class="dropdown-item" href="{{ url('/pagFacultadesxSede') }}">Facultades por sedes</a></li>
                    <li><a class="dropdown-item" href="{{ url('/pagEscuelas') }}">Escuelas</a></li>
                    <li><a class="dropdown-item" href="{{ url('/pagCarreras') }}">Carreras</a></li>
                    <li><a class="dropdown-item" href="{{ url('/pagProfesores') }}">Profesores</a></li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">Estudiantes </a>
                        <ul class="dropdown-menu" style="margin: none; padding:0;">
                            <li><a class="dropdown-item" tabindex="-1" href="{{ url('/pagEstudiantes') }}">Estudiantes General</a></li>
                            <li><a class="dropdown-item" tabindex="-1" href="{{ url('/pagEstudiantes-excel/create') }}">Estudiantes Excel</a></li>
                        </ul>                            
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">Asignaturas </a>
                        <ul class="dropdown-menu" style="margin: none; padding:0;">
                            <li><a class="dropdown-item" tabindex="-1" href="{{ url('/pagAsignaturas') }}">Asignaturas General</a></li>
                            <li><a class="dropdown-item" tabindex="-1" href="{{ url('/pagAsigxEstu') }}">Asignaturas por Estudiante</a></li>
                            <li><a class="dropdown-item" tabindex="-1" href="{{ url('/pagAsigxProf') }}">Asignaturas por Profesor</a></li>
                        </ul>                            
                    </li>
                    <li><a class="dropdown-item" href="{{ url('/pagUnidades') }}">Unidades</a></li>
                    <li><a class="dropdown-item" href="{{ url('/pagTemas') }}">Temas</a></li>
                    <li><a class="dropdown-item" href="{{ url('/talleres') }}">Talleres</a></li>
                    <li><a class="dropdown-item" href="{{ url('/pagEvaluaciones') }}">Evaluaciones</a></li>
                    <li><a class="dropdown-item" href="{{ url('/glosarios') }}">Glosario</a></li>
                    <li><a class="dropdown-item" href="{{ url('/contenidos') }}">Contenidos</a></li>
                </ul>
                <script>
                    $(document).ready(function(){
                    $('.dropdown-submenu a.test').on("click", function(e){
                        $(this).next('ul').toggle();
                        e.stopPropagation();
                        e.preventDefault();
                    });
                    });
                </script>
            </li>
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link"  href="{{ url('/') }}">Descargar <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item " style="color: white;">
                    <b>Bienvenido {{ Auth::user()->email }} </b>
                </li>
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/main/logout') }}">Cerrar Sesión <span class="sr-only">(current)</span></a>
                </li>
            </ul>
    </div>
    </nav>
    {{-- Body --}}
    <div class="row">
        <div class="col-12">@yield('content')</div>
    </div>
    {{-- Footer --}}
    <footer class="col-12 colorPUCE">
        <div class="card-body text-center">
			<p class="micro legible center mb-0">Laboratorios de Tecnologías de Información y Comunicación - Facultad de Ingeniería - Escuela de Sistemas</p>
    </footer>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>

</html>
