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
</head>
<body class="col-12">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg col-12 navbar-light colorPUCE">
        <a class="navbar-brand" href='http://www.puce.edu.ec'><img class="logo" src="{{ url('img/puceLogo.jpg') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/pagProvincias') }}">Provincias</a>
                    <a class="dropdown-item" href="{{ url('/pagCiudades') }}">Ciudades</a>
                    <a class="dropdown-item" href="{{ url('/pagUniversidades') }}">Universidades</a>
                    <a class="dropdown-item" href="{{ url('/pagSedes') }}">Sedes</a>
                    <a class="dropdown-item" href="{{ url('/pagPeriodos') }}">Períodos</a>
                    <a class="dropdown-item" href="{{ url('/pagFacultades') }}">Facultades</a>
                    <a class="dropdown-item" href="{{ url('/pagFacultadesxSede') }}">Facultades por sedes</a>
                    <a class="dropdown-item" href="{{ url('/pagEscuelas') }}">Escuelas</a>
                    <a class="dropdown-item" href="{{ url('/pagCarreras') }}">Carreras</a>
                    <a class="dropdown-item" href="{{ url('/pagEstudiantes') }}">Estudiantes</a>
                    <a class="dropdown-item" href="{{ url('/pagEstudiantesExcel') }}">Estudiantes (Excel)</a>
                    <a class="dropdown-item" href="{{ url('/pagProfesores') }}">Profesores</a>
                    <a class="dropdown-item" href="{{ url('/pagAsignaturas') }}">Asignaturas</a>
                    <a class="dropdown-item" href="{{ url('/pagAsignaturasxEstudiante') }}">Asignaturas por estudiante</a>
                    <a class="dropdown-item" href="{{ url('/pagAsignaturasxProfesor') }}">Asignaturas por profesor</a>
                    <a class="dropdown-item" href="{{ url('/pagUnidades') }}">Unidades</a>
                    <a class="dropdown-item" href="{{ url('/pagTemas') }}">Temas</a>
                    <a class="dropdown-item" href="{{ url('/pagTalleres') }}">Talleres</a>
                    <a class="dropdown-item" href="{{ url('/pagEvaluaciones') }}">Evaluaciones</a>
                    <a class="dropdown-item" href="{{ url('/pagGlosarios') }}">Glosario</a>
                    <a class="dropdown-item" href="{{ url('/pagContenidos') }}">Contenidos</a>
                    
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/pagLogin') }}">Cerrar Sesión <span class="sr-only">(current)</span></a>
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
			<p class="micro legible center mb-0">CENTRO DE EDUCACIÓN VIRTUAL Y TECNOLOGÍA EDUCATIVA - CEVTE <br>
             Para soporte comunicarse: <br> Teléfono: (+593) 299 1700 ext. 1509 / 1845 / 1127 
             <br> Correo electrónico: cevte@puce.edu.ec</p>
    </footer>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>
</html>